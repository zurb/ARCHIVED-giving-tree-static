<?
  $page_title = "Donation Details";
  $page_template = "donation-details";  
?>
<?php include("includes/_header.php"); ?>

<div class="row">
  <div class="six columns">
    <form>
      <label>1. Company Name:
        <input type="text">
      </label>
      <label>2. Dedication:
        <select>
          <option>None</option>
          <option>On behalf of</option>
          <option>In memory of</option>
        </select>
      </label>
      <p>Send dedication acknowledgement to:</p>
      <label>Name:
        <input type="text">
      </label>
      <label>Email:
        <input type="text">
      </label>
      <label>3. Privacy Preferences:
        <select>
          <option>Provide my full contact information</option>
          <option>Provide none of my personal (anonymous)</option>
        </select>
      </label>
    </form>

    <table>
      <thead>
        <tr>
          <td>Donation List (1 Item)</td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><label><input text="0"></label></td>
          <td>Donate to support the drive</td>
          <td>$10.00 <a href="#">remove</a></td>
        </tr>
        <tr><td>Subtotal: $10.00</td></tr>
      </tbody>
    </table>
    <p>Virtual Giving Tree donations lets us do the shopping for you! We receive discounts through bulk purchases and your donation helps with these orders. Backpacks and supplies are delivered by the manufacturers to our warehouse to be assembled and distributed.</p>
  </div>
</div>

<?php include("includes/_virtual-footer.php");  ?>