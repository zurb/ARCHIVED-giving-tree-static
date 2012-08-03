<?
  $page_title = "Volunteer or Host" ;
  $page_template = "main";
  $logo = $_GET['logo'];
?>
<?php include("includes/_header.php"); ?>

<!-- SPONSORPAGE CONTENT -->
<div id="mainContent">
  
  <div class="row">
    <div class="twelve columns">
      <img src="http://www.placehold.it/1000x300">
    </div>
  </div>
  
  <div class="row">
    <div class="twelve columns">
      <hr>
    </div>
  </div>
  
  <div class="row">
    <div class="twelve columns">
      <? if (isset($logo)): ?>
      <img src="<?= $logo ?>">
      <? endif; ?>
      <h5>Your donation has been received</h5>

      <p>Thank you for helping a child get the school supplies to succeed!</p>
      
      <ul class="block-grid three-up">
      <li><div class="fb-like" data-href="http://familygivingtree.org" data-send="false" data-width="450" data-show-faces="false" data-action="recommend"></div></li>
      <li><a href="https://twitter.com/share?text=%40FGTtweets%20I%20just%20donated%20at%20Family%20Giving%20Tree!" class="twitter-share-button" data-lang="en">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></li>
      <li><!-- Place this tag where you want the +1 button to render. -->
<div class="g-plusone" data-annotation="inline" data-width="300"></div>

<!-- Place this tag after the last +1 button tag. -->
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script></li>
      </ul>
      
    </div>
  </div>
  
  
  <div class="row">
    <div class="twelve columns">
      <hr>
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