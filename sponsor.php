<?
  $page_title = "Volunteer or Host" ;
  $page_template = "main";  
?>
<?php include("includes/_header.php"); ?>

<!-- SPONSORPAGE CONTENT -->
<div id="mainContent">

  <div class="row featured">
    <div class="twelve columns">
     <div class="orbit-wrapper"style="height:350px;">
       <div id="featured" >
         <img src="http://www.placehold.it/1000x350"/>
         <img src="http://www.placehold.it/1000x350"/>
         <img src="http://www.placehold.it/1000x350"/>
       </div>
     </div>
    </div>
  </div>
  
  <div class="row">
    <div class="twelve columns">
      <h3>Current Sponsors</h3>
    </div>
  </div>
  
  <div class="row">
    <div class="seven columns">
      <ul class="block-grid four-up">
        <li><img src="http://www.placehold.it/100x60"></li>
        <li><img src="http://www.placehold.it/100x60"></li>
        <li><img src="http://www.placehold.it/100x60"></li>
        <li><img src="http://www.placehold.it/100x60"></li>
        <li><img src="http://www.placehold.it/100x60"></li>
        <li><img src="http://www.placehold.it/100x60"></li>
        <li><img src="http://www.placehold.it/100x60"></li>
        <li><img src="http://www.placehold.it/100x60"></li>
        <li><img src="http://www.placehold.it/100x60"></li>
        <li><img src="http://www.placehold.it/100x60"></li>
        <li><img src="http://www.placehold.it/100x60"></li>
        <li><img src="http://www.placehold.it/100x60"></li>
      </ul>
    </div>
    <div class="five columns">
      <div class="donations-money">
        <h2>$1,000,000</h2>
        <h6>in donations to date</h6>
      </div>
      <div class="donations-supplies">
        <h2>868,439</h2>
        <h6>supplies provided</h6>
      </div>
      <div class="donations-wishes">
        <h2>34,876</h2>
        <h6>wishes fulfilled</h6>
      </div>
    </div>
  </div>
  
  <div class="row">
    <div class="twelve columns">
      <hr>
    </div>
  </div>
  
  <div class="row">
    <div class="eight columns">
      <h4>Why Sponsor Family Giving Tree</h4>
      <p>Your company or business can make a big impact as a Family Giving Tree sponsor. You can either sponsor our Back to School Drive or our Holiday Wish Drive. When you sponsor and buy in bulk, we receive generous manufacture discounts on quality backpacks, school supplies and gifts or other items for our drives.</p>
      <p>For our Back to School Drives, the students who receive backpacks from our drive usually begin school with few or no supplies. We believe they deserve an equal start, with the supplies they need to learn. When it comes to our Holiday Wish Drives, you’ll be ensuring that a child doesn’t have to go without a gift during the holidays.</p>
      <p>We value our sponsors and acknowledge them in several ways. This is just a small example of our sponsor benefits package: </p>
      <ul>
        <li>Recognition in the Family Giving Tree monthly e-newsletter (readership of 34,000+)</li>
        <li>Prominent visibility as a major funder at our warehouse</li>
        <li>Recognized and thanked as a sponsor in a &frac12;-page San Jose Mercury News advertisement</li>
        <li>Acknowledged as a major sponsor on the Family Giving Tree Web site</li>
      </ul>
      
      <p>To learn more about sponsorship opportunities and benefits, please contact:</p>
      <p><strong>Jeanne Clabaugh</strong><br />
      Director of Development<br />
      <a href="jeanne@familygivingtree.org">jeanne@familygivingtree.org</a><br />
      (408) 946-3111 ext. 225</p>
    </div>
    <div class="four columns">
      <img src="http://www.placehold.it/400x750">
    </div>
  </div>
  
  <br /><br />
      
  <div class="row">
    <div class="four columns">
      <img src="http://www.placehold.it/400x750">
    </div>
    <div class="eight columns"> 
      <h4>Become a Back to School Drive Sponsor!</h4>
      <p>Your company or business will make a big impact as a Back to School Drive Sponsor. By bulk purchasing in advance, we receive generous manufacturer discounts on quality backpacks, school supplies, and other items for the drive.  The students who receive backpacks from our drive usually begin school with few or no supplies. We believe they deserve an equal start, with the supplies they need to fully engage in learning throughout the school year.</p>
      <p>We value our sponsors and acknowledge them in several ways. The following is an example of our sponsor benefits package:</p>
      <ul>
        <li>Recognition in the Family Giving Tree monthly e-newsletter (readership of 34,000+)</li>
        <li>Prominent visibility as a major funder at our Back to School Drive warehouse, which hosts more than 700 volunteers each August</li>
        <li>Recognized and thanked as a Back to School Drive Sponsor in a ½-page San Jose Mercury News advertisement</li>
        <li>Acknowledged as a major Back to School Drive Sponsor on the Family Giving Tree Web site</li>
        <li>Recognition as a major funder at our annual Celebration Luncheon in September.</li>
      </ul>
      
      <p>To learn more about sponsorship opportunities and benefits, please contact:</p>
      <div class="row">
        <div class="six columns">
          <p><strong>Jeanne Clabaugh</strong><br />
          Director of Development<br />
          <a href="jeanne@familygivingtree.org">jeanne@familygivingtree.org</a><br />
          (408) 946-3111 ext. 225</p>
        </div>

        <div class="six columns">
          <p><strong>Theo Olson</strong><br />
          Development Manager<br />
          <a href="theo@familygivingtree.org">theo@familygivingtree.org</a></p>
        </div>
      </div>
    </div>
  </div>
  
</div>
<br>
<br>

<?php content_for('footer', function() { ?>
  <script type="text/javascript">
    $(".row.featured").spin({lines:9, width:4})
     $(window).load(function() {
         $('#featured').orbit();
         $(".row.featured").spin(false);
     });
  </script>
  <div id="sponsorModal" class="reveal-modal">
    <h2>Awesome. I have it.</h2>
    <p class="lead">Your couch.  I it's mine.</p>
    <p>Im a cool paragraph that lives inside of an even cooler modal. Wins</p>
    <a class="close-reveal-modal">&#215;</a>
  </div>
<?php })?>

<?php include("includes/_footer.php");  ?>