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
      <li><img src="http://www.placehold.it/16x16"> Share on Facebook</li>
      <li><img src="http://www.placehold.it/16x16"> Tweet</li>
      <li><img src="http://www.placehold.it/16x16"> Google Plus</li>
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