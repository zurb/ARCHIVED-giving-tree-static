require "yaml"
require "./lib/better_ftp"
root = File.dirname(__FILE__)
deploy = YAML::load_file(File.join(root, "deploy.yml"))
deploy_to = deploy["deploy_to"]

task :deploy => [
  :test, 
  :export_to_site
]

task :test => [
  :replace_tabs_with_2_spaces, 
  :check_for_non_sass_urls,
  :create_site_manifest
]

task :replace_tabs_with_2_spaces do
  js_files = Dir.glob("#{root}/javascripts/**/*.js")
  scss_files = Dir.glob("#{root}/sass/**/*.scss")
  php_files = Dir.glob("#{root}/**/*.php")
  files = js_files + scss_files + php_files
  update_count = 0
  files.each do |file|
    has_tabs = false
    new_content = ""
    open(file,"r") do |f|
      if !f.grep(/\t/).count.zero?
        has_tabs = true
        f.rewind
        new_content = f.read.gsub(/\t/,"  ")
      end
    end
    if has_tabs
      open(file,"w") {|f| f.write new_content}
      puts "REPLACED WITH SPACES: #{file}"
      `git add #{file.gsub(root + "/","")}`
      update_count = update_count + 1
    end
  end
  raise "PENDING TAB CONVERSIONS" unless update_count.zero?
end

task :run_w3c_validations do
  true
end

task :check_for_non_sass_urls do  
  scss_files = Dir.glob("#{root}/sass/**/*.scss")
  
  scss_files.each do |scss|
    open(scss) do |f| 
      if !f.grep(/[^-]url\(/).count.zero?
        puts "CONTAINS NON-SASS URLS: #{scss}"
        raise "NON_SASS_URLS_FOUND"
      end
    end
  end
end

task :check_for_broken_links do
  
end

task :export_to_site do
  ftp = BetterFTP.open(deploy["host"], deploy["username"], deploy["password"])
  files = `git ls-files`.split("\n").map {|f| "#{root}/#{f}"}
  `compass compile`
  css_files = Dir.glob("#{root}/stylesheets/**/*.css")
  
  files = files + css_files
  files.each do |abs_path|
    f = File.open(abs_path)
    relative_path = abs_path.gsub(root,"")
    puts "Uploading: #{relative_path}"
    begin
      ftp.put(f, "#{deploy_to}/#{relative_path}")
    rescue => e
      if ftp.directory?("#{deploy_to}/#{File.dirname(relative_path)}")
        puts "Error: #{e.to_s}"
      else
        puts "Making directory: #{deploy_to}/#{File.dirname(relative_path)}"
        ftp.mkdir_p("#{deploy_to}/#{File.dirname(relative_path)}")
        begin
          # Try to upload again now that directory exists
          ftp.put(f, "#{deploy_to}/#{relative_path}")
        rescue => e2
          puts e2.to_s
        end
      end
    end
    f.close
  end
  ftp.quit
end

task :create_site_manifest do
  files = Dir.glob("**/*.php").reject {|f| f.match(/includes\//)}
  urls = files.map {|f| "http://staging.familygivingtree.org/#{f}" }
  open("MANIFEST","w") do |f|
    f.write urls.join("\n").to_s
  end
  res = `git add MANIFEST`
  raise "MANIFEST CHANGED, PLEASE COMMIT" unless res.empty?
end