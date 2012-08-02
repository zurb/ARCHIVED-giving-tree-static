require "yaml"
require "./lib/better_ftp"
root = File.dirname(__FILE__)
deploy = YAML::load_file(File.join(root, "deploy.yml"))
deploy_to = deploy["deploy_to"]

task :default => [:export_to_site]

task :test => [:replace_tabs_with_2_spaces, :check_for_non_sass_urls, :run_s3_validations]

task :replace_tabs_with_2_spaces do
  true
end

task :run_w3c_validations do
  true
end

task :check_for_non_sass_urls do
  # scss_files = Dir.glob("#{root}/sass/**/*.scss")
  # 
  # scss_files.each do |scss|
  #   open(scss) { |f| f.grep(/url/) }
  # end
  true
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
