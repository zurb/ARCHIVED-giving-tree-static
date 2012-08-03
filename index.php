<?
    $page_title = "Home";
    $page_template = "Main";
?>
<?php include("includes/_header.php"); ?>

<div class="row featured">
    <div class="twelve columns">
        <div class="orbit-wrapper" id="featured">
            <div>
                <div class="content">
                    <h1>You Can Help Our Millionth Child</h1>
                    <p>This year, we’ll reach our goal of helping one million children locally. You could be the person who fulfils the unique holiday wish of our millionth child.</p>
                    <a href="who-we-help.php" class="button radius">Millionth Child &raquo;</a>
                </div>
                <img src="http://placehold.it/980x367">
            </div>
            <div>
                <div class="content">
                    <h1>Plant a Seed </h1>
                    <p>Putting a smile on a kid’s face doesn’t just happen. It takes the kindness of those who become part of our community of Elves. People who plant seeds by donating their time, a backpack or even a few dollars to fulfill the needs of children in low-income communities.</p>
                    <a href="donate.php" class="button radius">Donate Today &raquo;</a>
                </div>
                <img src="http://placehold.it/980x367">
            </div>
            <div>
                <div class="content">
                    <h1>Lead a Holiday Wish Drive</h1>
                    <p>As the holidays get closer, your company or organization can help lead a drive by displaying wish cards for fellow workers, customers, members or friends. </p>
                    <a href="lead-a-drive.php" class="button radius">Lead a Drive &raquo;</a>
                </div>
                <img src="http://placehold.it/980x367">
            </div>
            <div>
                <div class="content">
                    <h1>Volunteer for Your Community</h1>
                    <p>Our roots in the communities we serve go deep thanks to our volunteers. Without them, we wouldn’t be able to put smiles on the faces of the kids we help. </p>
                    <a href="volunteer.php" class="button radius">Volunteer &raquo;</a>
                </div>
                <img src="http://placehold.it/980x367">
            </div>
        </div>
        <ul class="button-group radius orbit-buttons">
          <li data-orbit-index="0"><a href="#" class="button radius">Millionth Child</a></li>
          <li data-orbit-index="1"><a href="#" class="button radius">Donate Today</a></li>
          <li data-orbit-index="2"><a href="#" class="button radius">Lead a Drive</a></li>
          <li data-orbit-index="3"><a href="#" class="button radius">Volunteer</a></li>
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

<div class="row">
    <div class="twelve columns">
        <h3>One Fulfilled Wish, One Backpack at a Time</h3>
        <div class="row">
            <div class="nine columns">
                <p>Since 1990, Family Giving Tree has been fulfilling the holiday wishes of children in low-income neighborhoods and providing backpacks stuffed with school supplies so they’re prepared to learn. It’s more than just gifts or rulers or pencils. It’s giving kids precious, happy memories. It’s amazing to know that we’ve put smiles on the faces of a million kids.</p>
                <a href="" class="small white button">Learn more about our roots &raquo;</a>
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
                <h4>We're Heading Into Our Holiday Wish Drive</h4>
                <p>As we wrap up our Back to School Drive, we’re heading right into our Holiday Wish Drive where you could help fulfill the unique holiday wish of an underserved child with a donation. Your company or organization can lead a drive or you can join our community of Elves. &hellip; <a href="">more &raquo;</a></p>
            </div>
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
        </div>
    </div>
</div>

<?php content_for('footer', function() { ?>
  <script type="text/javascript"> 
    $(".row.featured").spin({lines:9, width:4})
   $(window).load(function() {
       $('#featured').orbit({ pauseOnHover: true, startClockOnMouseOut: true, advanceSpeed: 5000, fluid: '16x6' });
       $(".row.featured").spin(false);
   });
  </script>
<?php })?>

<?php include("includes/_footer.php");  ?>
