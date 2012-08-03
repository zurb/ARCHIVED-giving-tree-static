<?
    $page_title = "Home";
    $page_template = "Main";
?>
<?php include("includes/_header.php"); ?>

<style>
/* Feature */
.featured { position: relative; margin-bottom: 20px; }
.featured ul { position: absolute; bottom: 0; left: 280px; z-index: 1000; }
.featured .orbit-wrapper .content { position: absolute; top: 80px; left: 80px; width: 200px }
#featured { background: url(spinner.gif) center center #f4f4f4; height: 300px; }
#featured div { display: none; }
#featured.orbit { background: none; }
#featured.orbit div { display: block; }
/* Stats / News */
.stats { border: 2px solid #ccc; padding: 10px; margin-top: 10px }
.stats h3 { margin: 0; padding: 0; text-align: right; }
/* Testimonials */
.testimonial { margin-top: 10px; text-align: center; }
.testimonial .quote { margin: 0 160px; font-size: 18px; color: #666; }
</style>

<div class="row featured">
    <div class="twelve columns">
        <!-- Four spots on the slider, Donate, Lead a Drive, Volunteer, Marketing Blurb -->
        <div class="orbit-wrapper" style="width: 950px; height: 367px" id="featured">
            <div>
                <div class="content">
                    <h1>Donate</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Integer malesuada dapibus fermentum.</p>
                    <a href="#" class="button radius">Donate &raquo;</a>
                </div>
                <img src="http://placehold.it/980x367">
            </div>
            <div>
                <div class="content">
                    <h1>Organize</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Integer malesuada dapibus fermentum.</p>
                    <a href="#" class="button radius">Lead a Drive &raquo;</a>
                </div>
                <img src="http://placehold.it/980x367">
            </div>
            <div>
                <div class="content">
                    <h1>Volunteer</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Integer malesuada dapibus fermentum.</p>
                    <a href="#" class="button radius">Volunteer &raquo;</a>
                </div>
                <img src="http://placehold.it/980x367">
            </div>
            <div>
                <div class="content">
                    <h1>Featured</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Integer malesuada dapibus fermentum.</p>
                </div>
                <img src="http://placehold.it/980x367">
            </div>
        </div>
        <ul class="button-group radius">
            <li><a href="#" class="button radius">Donate</a></li>
            <li><a href="#" class="button radius">Lead a Drive</a></li>
            <li><a href="#" class="button radius">Volunteer</a></li>
            <li><a href="#" class="button radius">Featured</a></li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="four columns">
        <h3>970,516 Children</h3>
        <p>Have received holiday gifts or back-to-school supplies through
            Family Giving Tree since 1990</p>
    </div>
    <div class="four columns">
        <h3>1,123,228 Gifts</h3>
        <p>Delivered to needy children. We provide gifts during the holidays, 
            and back-to-school supplies during the school year.</p>
    </div>
    <div class="four columns">
        <h3>89%</h3>
        <p>of every donation we raise goes straight to participating charities</p>
    </div>
</div>

<div class="row" style="display: none">
    <div class="twelve columns">
        <div class="stats">
            <div class="row">
                <div class="three columns">
                    <h3>Spotlight</h3>
                </div>
                <div class="nine columns">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer malesuada dapibus fermentum. Sed at velit massa. Sed consectetur bibendum magna nec pulvinar. Suspendisse posuere auctor enim nec malesuada. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
                </div>
            </div>
        </div>
        <div class="testimonial">
            <p class="quote">&#8220;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer malesuada dapibus fermentum. Sed at velit massa. &#8221;</p>
            <img src="http://placehold.it/40x40">
            <p>- Samuel Jenkins, Roche Diagnostics</p>
        </div>
    </div>
</div>

<div class="row">
    <div class="twelve columns">
        <h3>About</h3>
        <div class="row">
            <div class="nine columns">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer malesuada dapibus fermentum. Sed at velit massa. Sed consectetur bibendum magna nec pulvinar. Suspendisse posuere auctor enim nec malesuada. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer malesuada dapibus fermentum. Sed at velit massa. Sed consectetur bibendum magna nec pulvinar. Suspendisse posuere auctor enim nec malesuada. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. <a href="">learn more &raquo;</a></p>
            </div>
            <div class="three columns">
                <img src="http://placehold.it/200x200">
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="twelve columns">
        <h3>News</h3>
        <div class="row">
            <div class="four columns">
                <h4>FGT on eBay</h4>
                <p>Looking for another way to support the Family Giving Tree?
                    Check out eBay&#8217;s Facebook page to see how you can help
                    without spending a penny. Simply complete the form and eBay will
                    donate a supply-filled&hellip; <a href="">more &raquo;</a></p>
            </div>
            <div class="four columns">
                <h4>ZurbWIRED</h4>
                <p>After three attempts to submit a winning application to the zany
                    folks at ZURB, and among so many excellent proposals from local
                    nonprofits at that, we&#8217;ve finally been chosen as this year&#8217;s&hellip;
                    <a href="">more &raquo;</a></p>
            </div>
            <div class="four columns">
                <h4>Back to School &amp; STEM</h4>
                <p>Children from low-income families have many barriers to success in the
                    classroom, let alone engaging in career fields related to Science,
                    Technology, Engineering and Mathematics (STEM)&hellip;
                    <a href="">more &raquo;</a></p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div style="height: 40px"></div>
</div>

<?php include("includes/_footer.php");  ?>

<script type="text/javascript"> 
   $(window).load(function() {
       $('#featured').orbit({ fluid: '16x6' });
   });
</script>
