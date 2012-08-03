<?
  $page_title = "Virtual Giving Tree";
  $page_template = "virtual";  
?>
<?php include("includes/_virtual-header.php"); ?>

<div class="container header">
	<div class="row">
	<h1 class="purple">Back to School Drive</h1>
	</div>
</div>

<div class="row">
	<div class="three columns">
    <div class="panel">
      <h5><a href="virtual-about-fgt.php">About Family Giving Tree</a></h5>
      <p>Donate to support the drive.</p>
      <hr>
      <h5>Live Stats</h5>
      <ol>
        <li>Provide Full Backpacks:<br>
	        <span>$20100.00</span>
        </li>
        <li>Provide Supplies <br>
	        <span>$495.00</span>
        </li>
        <li>Support the Drive<br>
	        <span>$3154.41</span>
        </li>
      </ol>
    </div>
  </div>
  <div class="nine columns">
    <div class="row">
      <div class="two columns">
        <img src="vgt-images/backpacks.png">
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
        <img src="vgt-images/supplies.png">
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
        <img src="vgt-images/money.png">
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
    
    <a class="medium banner button purple" href="virtual-checkout.php">Continue</a>
    
  </div>

  

</div>

<?php include("includes/_virtual-footer.php");  ?>