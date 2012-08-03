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
    <div class="twelve columns">
      <h4>Why Sponsor Family Giving Tree</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis erat arcu, vitae dignissim lectus. Donec enim nunc, vestibulum nec volutpat eget, lobortis sed odio. Donec hendrerit, velit id faucibus ultricies, turpis eros suscipit leo, sed consequat libero elit eu tellus. Phasellus fringilla nunc nisl. Vestibulum feugiat pharetra turpis quis euismod. Morbi vitae nunc et diam laoreet gravida varius a magna.</p>

      <p>Nulla at ligula ligula, nec varius felis. Vestibulum diam erat, commodo sit amet tristique a, varius ut est. Nunc id felis orci, eu eleifend libero. Nam id turpis mauris. Suspendisse potenti. Sed viverra pellentesque erat ut aliquet. Duis at dui enim, tristique ultricies lorem. In fermentum lorem viverra massa auctor id lobortis metus malesuada. Aliquam dui arcu, rhoncus nec dignissim quis, feugiat ac est. Vestibulum sollicitudin nulla nec nisl tincidunt gravida. Nulla facilisi.</p>
      
      <a href="#" class="medium button">Become a Sponsor</a>
      
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