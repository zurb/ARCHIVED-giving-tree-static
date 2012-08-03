<?

session_start();

include_once("includes/mysql_obj.php");
include_once("includes/functions.php");

$mysql = new mysql_obj;

$TaskId = $_REQUEST['taskId'];

//Saves the Details into Database 

if($_POST['Submit'] == '  Submit  ')

{

  $Name = makesafestr(trim($_POST['Name']));

  $Email = trim($_POST['Email']);

  $Email_ver = trim($_POST['Email_ver']);

  $phoneNo = trim($_POST['phoneNo']);

  $companyName = makesafestr(trim($_POST['companyName']));

  $noofvolunteers = trim($_POST['noofvolunteers']);

  $slot = trim($_POST['slot']);

  $arrslot = explode('-',$slot);

  $SlotId = $arrslot[0];

  $TaskId = $_REQUEST['taskId'];

  if(!$SlotId){

    $msg.= "Please Select Timeslot<br>";

  }

  if(!$Name){

    $msg.= "Please Enter  Name<br>";

  }elseif(!eregi("^[a-zA-Z'.\ ]+$",$Name)){

    $msg.="Please Enter only characters for Name<br>";

  }

  if(!$Email){

    $msg.= "Please Enter  Email<br>";

  }elseif(!is_valid_email($Email)){

    $msg.="Please Enter Valid Email<br>";

  }

  if(!$Email_ver){

    $msg.= "Please Enter  Email for Verification<br>";

  }elseif($Email != $Email_ver){  

    $msg .="Both Emails are not Same.<br>";  

  }

  if(!check_phoneno($phoneNo)){

    $msg.="Please Enter valid Phone No<br>";

  }

  if($companyName){

    if(!eregi("^[a-zA-Z'.\ ]+$",$companyName)){

      $msg.="Please Enter only characters for Company Name<br>";

    }

  }

  if(!$noofvolunteers){

    $msg.= "Please Enter  No. Of Volunteers<br>";

  }elseif(!eregi("^[0-9]+$",$noofvolunteers)){

    $msg.="Please Enter only numerics for No. Of Volunteers<br>";

  }

  if(!$msg){

    if($noofvolunteers > $arrslot[1]){

      $msg = "No. of Volunteers doesn't exceed available Volunteers<br>";

    }else{

      $sqlinsert_reserve = "INSERT INTO volunteers(Name,Email,phoneNo,companyName,noofvolunteers,SlotId,Register_date) VALUES ('".$Name."', '".$Email."', '".$phoneNo."', '".$companyName."', $noofvolunteers, $SlotId, now())";

      $res = $mysql->query($sqlinsert_reserve);

      

      $sql_max1 = "select max(VolunteerId) as maxid from volunteers";

      $rs = $mysql->fetch_array($sql_max1,MYSQL_ASSOC);

      $VolunteerId = $rs[0][maxid];

      sendmailnew($VolunteerId,1);

      header("location:reg_mail.php");

      exit;

    }

  }

  

}

$sql = "select * from taskdetails where TaskId = '".$TaskId."'";

$rec = $mysql->fetch_array($sql,MYSQL_ASSOC);

$date1 = explode("-",$rec[0][Date]);

?>

<h2>Register to Volunteer</h2>
<p class="error"><? echo $msg; ?></p>
<p><strong>Day/Task:</strong> <span id="daytask"></span> </p>
<form action="vol_register.php" method="post" id="warehouseform">
  <input type="hidden" name="TaskId" value="<?php echo $_REQUEST['taskId'];?>">
  
  <?php echo date("l", mktime(0, 0, 0, $date1[1], $date1[2], $date1[0]));?>

  <?php echo $date1[1].'/'.$date1[2].'/'.$date1[0];?>

  <?php echo $rec[0][Task];?>

  <?php 

  $sql = "select * from slotdetails where TaskId ='".$_REQUEST['taskId']."' order by SAMPM,Starttime";

  $rec = $mysql->fetch_array($sql,MYSQL_ASSOC);

  for($i=0;$i<count($rec);$i++){

    $noofvolunteer = 0;

    $sqlavailable = "select *  from slotdetails sd, volunteers vo where sd.SlotId=vo.SlotId and vo.SlotId = '".$rec[$i][SlotId]."'"; 

    $res = $mysql->fetch_array($sqlavailable,MYSQL_ASSOC);

    for($k=0;$k<count($res);$k++){

      $noofvolunteer += $res[$k]['noofvolunteers'];

    }

    $availble = $rec[$i][NoofVolunteersReq] - $noofvolunteer;



    ?>
    <br />

    <input type="radio"  name="slot" value="<?php echo $rec[$i][SlotId].'-'.$availble;?>" <?php if($SlotId == $rec[$i][SlotId]) echo 'checked';?>>
    <?php $arrStarttime=explode(':', $rec[$i][Starttime]);  $arrEndtime=explode(':', $rec[$i][Endtime]);  echo $arrStarttime[0].':'.$arrStarttime[1].' '.$rec[$i][SAMPM].' - '.$arrEndtime[0].':'.$arrEndtime[1].' '.$rec[$i][EAMPM].' ( '.$availble.' Available ) ';?>



  <?php } //end row looping ?>

  <br />
  
  <p>
    <label for="name">Name</label>
    <input type="text" id="name" name="name" value="<? if ($Name!='') { echo stripslashes(stripslashes($Name));} ?>" />
  </p>
  <p>
    <label for="email">Email</label>
    <input type="text" id="email" name="email" value="<? if ($Email!='') { echo $Email;}?>" />
  </p>
  <p>
    <label for="emailconfirm">Confirm Email</label>
    <input type="text" id="emailconfirm" name="email_ver" value="<? if ($Email_ver!='') { echo $Email_ver;}?>" />
  </p>
  <p>
    <label for="phone">Phone Number</label>
    <input type="text" id="phone" name="phoneno" value="<? if ($phoneNo!='') { echo $phoneNo;}?>" />
  </p>
  <p>
    <label for="phone">Group/Company Name</label>
    <input type="text" id="group" name="companyname" value="<? if ($companyName!='') { echo stripslashes(stripslashes($companyName));}?>" />
  </p>
  <p>
    <label for="phone">Number of Volunteers</label>
    <input type="text" id="number" name="noofvolunteers" value="<? if ($noofvolunteers!='') { echo $noofvolunteers;} ?>" />
  </p>
  <p class="text-center"> <a href="#" class="another-reveal-close">Cancel</a> &nbsp;
    <input type="submit" value="Submit" class="button">
  </p>
</form>

<script type="text/javascript">
  $('#warehouseform').ajaxForm({success: function(response) {
    $("#registerModalContent").html(response);
  }})
  .keypress(function(e) {
      if (e.which == 13) {
        $(this).submit();
      }
    });
</script>