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
      <? else: ?>
      <h5>Family Giving Tree</h5>
      <? endif; ?>
      <p>Believe it or not, the seed of Family Giving Tree was planted as a San Jose State MBA class project. The assignment: “create a program that adds value to someone else’s life.” Originally, Family Giving Tree fulfilled the wishes of 2,010 children in East Palo Alto. From there, it continued to grow and grow under the leadership of co-founder Jennifer Cullenbine, who believes in nurturing children’s precious memories by fulfilling their needs.</p> 

      <p>Today, Family Giving Tree continues to fulfill the unique holiday wishes of children in low-income communities and provide donated backpacks stuffed with school supplies so they’re prepared to learn. It’s not just about gifts or rulers or even backpacks. It’s about giving children happy memories and bestowing joy. Over the years, we’ve helped put smiles on the faces of a million kids. </p>
      
      <p>Thank You:</p>

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