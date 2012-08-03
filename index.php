<?
    $page_title = "Home";
    $page_template = "main";
?>
<?php include("includes/_header.php"); ?>

<div class="row featured hide-for-small">
    <div class="twelve columns">
        <div class="orbit-wrapper" id="featured">
            <div id="sliderOne">
                <div class="content">
                    <h1>You Can Help Our Millionth Child</h1>
                    <p>This year, we’ll reach our goal of helping one million children locally. You could be the person who fulfils the unique holiday wish of our millionth child.</p>
                    <a href="donate.php" class="button banner purple">Donate Today &raquo;</a>
                </div>
            </div>
            <div id="sliderTwo">
                <div class="content">
                    <h1>Plant a Seed </h1>
                    <p>Putting a smile on a kid’s face doesn’t just happen. It takes the kindness of those who become part of our community of Elves. People plant seeds by donating their time, a backpack or even a few dollars to fulfill the needs of children in low-income communities.</p>
                    <a href="donate.php" class="button banner purple">Donate Today &raquo;</a>
                </div>
            </div>
            <div id="sliderThree">
                <div class="content">
                    <h1>Lead a Holiday Wish Drive</h1>
                    <p>As the holidays get closer, your company or organization can help lead a drive by displaying wish cards for fellow workers, customers, members or friends. </p>
                    <a href="lead-a-drive.php" class="button banner purple">Lead a Drive &raquo;</a>
                </div>
            </div>
            <div id="sliderFour">
                <div class="content">
                    <h1>Volunteer for Your Community</h1>
                    <p>Our roots in the communities we serve go deep thanks to our volunteers. Without them, we wouldn’t be able to put smiles on the faces of the kids we help. </p>
                    <a href="volunteer.php" class="button banner purple">Volunteer &raquo;</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="full rule">
</div>

<div class="full stats">
    <div class="row">
        <div class="four columns">
            <img src="images/icons/backpack.png" alt="person">
            <h3 class="orange">15,000 Backpacks</h3>
            <p>Is our distribution goal for the 2012 Back to School Drive</p>
        </div>
        <div class="four columns">
            <img src="images/icons/gift.png" alt="gift">
            <h3 class="green">847,288 Wishes Fulfilled</h3>
            <p>These are the children who have received holiday gifts or back-to-school supplies through
                Family Giving Tree since 1990</p>
        </div>
        <div class="four columns">
            <img src="images/icons/person.png" alt="money">
            <h3 class="pink">7,000 Volunteers</h3>
            <p>Will donate their time in our warehouse this year</p>
        </div>
    </div>
</div>

<div class="row">
    <div class="twelve columns">
        <div class="row">
            <div class="nine columns">
                <h2>One Fulfilled Wish, One Backpack at a Time</h2>
                <p>Since 1990, Family Giving Tree has been fulfilling the holiday wishes of children in low-income neighborhoods and providing backpacks stuffed with school supplies so they’re prepared to learn. It’s more than just gifts or rulers or pencils. It’s giving kids precious, happy memories. It’s amazing to know that we’ve put smiles on the faces of a million kids. <a href="donate.php">Learn more about donating &raquo;</a></p>
            </div>
            <div class="three columns">
                <img src="images/people/home-kid.png">
            </div>
        </div>
    </div>
</div>

<br><br>

<div class="row">
    <div class="twelve columns">
        <img src="images/horizontal-rule1.png">
    </div>
</div>

<br><br>

<div class="row news">
    <div class="twelve columns">
        <h2>News</h2>
        <div class="row">
            <div class="four columns">
                <p><strong>We're Heading Into Our Holiday Wish Drive</strong></p>
                <p>As we wrap up our Back to School Drive, we’re heading right into our Holiday Wish Drive where you could help fulfill the unique holiday wish of an underserved child with a donation. Your company or organization can lead a drive or you can join our community of Elves &hellip; <a href="donate.php">more &raquo;</a></p>
            </div>
            <div class="four columns">
                <p><strong>FGT on eBay</strong></p>
                <p>Looking for another way to support the Family Giving Tree?
                    Check out eBay&#8217;s Facebook page to see how you can help
                    without spending a penny. Simply complete the form and eBay will
                    donate a supply-filled backpack to a child in need. <a href="http://www.facebook.com/eBay/app_263639493746045">more &raquo;</a></p>
            </div>
            <div class="four columns">
                <p><strong>ZURBwired</strong></p>
                <p>After three attempts to submit a winning application to the zany
                    folks at ZURB, and among so many excellent proposals from local
                    nonprofits at that, we&#8217;ve finally been chosen as this year&#8217;s lucky winner.
                    <a href="http://zurbwired.com">more &raquo;</a></p>
            </div>
        </div>
    </div>
</div>

<div class="row home-quote">
    <div class="five columns offset-by-one">
        <img src="images/people/home-quote.png" alt="kid">
    </div>
    <div class="six columns">
        <img src="images/bg/pink-blob-top.png">
        <blockquote>I want to tell you thank you for the craft kit.  I like to make stuff.  I want to have jewelry like the girls at school and now I can make it myself! <cite>Maritza, age 6</cite></blockquote>
        <img src="images/bg/pink-blob-bottom.png">
    </div>
</div>

<?php content_for('footer', function() { ?>
  <script type="text/javascript"> 
    // $(".row.featured").spin({lines:9, width:4})
   $(window).load(function() {
      var orbitRatio;
      if ($(window).width() > 1000) {
        orbitRatio = "1430x508";
      } else {
        orbitRatio = "2x1";
      }
       $('#featured').orbit({ pauseOnHover: true, startClockOnMouseOut: true, advanceSpeed: 5000, fluid: orbitRatio, bullets: true });
       $(".row.featured").spin(false);
   });
  </script>
<?php })?>

<?php include("includes/_footer.php");  ?>
