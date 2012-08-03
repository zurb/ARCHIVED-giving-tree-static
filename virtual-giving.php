<?
  $page_title = "Virtual Giving Tree";
  $page_template = "virtual";  
?>
<?php include("includes/_virtual-header.php"); ?>

<div class="row">
  <div class="nine columns">
    <div class="row">
      <div class="two columns">
        <img src="http://placehold.it/200x200">
      </div>
      <div class="six columns">
        <h5>Backpack</h5>
        <p>Description Donec ullamcorper nulla non metus auctor fringilla. Sed posuere consectetur est at lobortis.</p>
      </div>
      <div class="two columns">
        <h6>Price</h6>
        <h4>$30</h4>
      </div>
      <div class="two columns">
        <h6>QTY</h6>
        <form>
          <input type="text" placeholder="0">
        </form>
      </div>
    </div>

    <div class="row">
      <div class="two columns">
        <img src="http://placehold.it/200x200">
      </div>
      <div class="six columns">
        <h5>Supplies</h5>
        <p>Description Donec ullamcorper nulla non metus auctor fringilla. Sed posuere consectetur est at lobortis.</p>
      </div>
      <div class="two columns">
        <h6>Price</h6>
        <h4>$15</h4>
      </div>
      <div class="two columns">
        <h6>QTY</h6>
        <form>
          <input type="text" placeholder="0">
        </form>
      </div>
    </div>

    <div class="row">
      <div class="two columns">
        <img src="http://placehold.it/200x200">
      </div>
      <div class="six columns">
        <h5>Money</h5>
        <p>Description Donec ullamcorper nulla non metus auctor fringilla. Sed posuere consectetur est at lobortis.</p>
      </div>
      <div class="two columns">
        <form>
          <div class="row collapse">
            <div class="two columns">
              <span class="prefix"><strong>$</strong></span>
            </div>
            <div class="ten columns">
              <input type="text" placeholder="0">
            </div>
          </div>
        </form>
      </div>
      <div class="two columns">
      </div>
    </div>
    <hr>
    <a href="virtual-giving-details.php" class="button right">Continue</a>
  </div>

  <div class="three columns">
    <div class="panel">
      <h5><a href="#">About Family Giving Tree</a></h5>
      <p>Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Etiam porta sem malesuada magna mollis euismod.</p>
      <hr>
      <h5>Goal Status</h5>
      <p>You are <strong>50%</strong> of the way through.</p>
      <h5>Top Teams</h5>
      <ol>
        <li>Team 1</li>
        <li>Team 2</li>
        <li>Team 3</li>
      </ol>
      <a href="#">Read More &raquo;</a>
    </div>
  </div>

</div>

<?php include("includes/_virtual-footer.php");  ?>