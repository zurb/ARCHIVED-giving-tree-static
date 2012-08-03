<?
    $page_title = "Home";
    $page_template = "Main";
?>
<?php include("includes/_header.php"); ?>

<div class="row featured">
    <div class="twelve columns">
        <!-- Four spots on the slider, Donate, Lead a Drive, Volunteer, Marketing Blurb -->
        <div class="orbit-wrapper" style="width: 950px; height: 350px" id="featured">
            <img src="http://placehold.it/980x350">
            <img src="http://placehold.it/980x350">
            <img src="http://placehold.it/980x350">
            <img src="http://placehold.it/980x350">
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
        <h3>123,228 Gifts</h3>
        <p>Delivered to needy children. We provide gifts during the holidays, 
            and back-to-school supplies during the school year.</p>
    </div>
    <div class="four columns">
        <h3>89%</h3>
        <p>of every donation we raise goes straight to participating charities</p>
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

<?php include("includes/_footer.php");  ?>

<script type="text/javascript">
   $(window).load(function() {
       $('#featured').orbit();
   });
</script>
