<?php 

define("VOLUNTEER_EMAIL_RECIPIENT", "chatche+zurbwired@gmail.com");

function is_valid_email($email) {

  

  $result = TRUE;

    if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email)) {

    $result = FALSE;

    }

    return $result;

}

function makesafestr($str)

{

  //echo 'hello'.$str.'hello';

  //$str = trim($str);  

  //echo 'second'.$str."second";

  $str = addslashes($str);  

  return $str;

}

function check_phoneno($phoneno)

{

  if(!preg_match("/[^-+0-9]+$/ ",$phoneno))

    return TRUE;

  else

    return FALSE;

}

//  This function sends a  mail with volunteers registration details.

function sendmail($Email,$Name,$noofvolunteers,$Task,$Date,$TimeSlot){

  

  $to  = $Email;

  /* subject */

  $subject = "Your Registered Information";

  /* message */

      $message = "

          <style type='text/css'>

<!--

.GrayFont {color: #666666; font-size: 9px}

.style2 {font-family: Verdana, Arial, Helvetica, sans-serif}

.style3 {font-size: 11px; font-family: Verdana, Arial, Helvetica, sans-serif; }

.style5 {font-size: 11px; font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: bold; }

-->

</style>

<TABLE width='80%' border=0 align='center' cellPadding=0 cellSpacing=0>

  <TBODY>

    <TR>

        <TD vAlign=top width='80%'>

        <TABLE cellSpacing=0 cellPadding=0 width='100%' border=0>

          <TBODY>

            <TR>

              <TD bgColor='#006600'>

                <TABLE cellSpacing=0 cellPadding=0 width='100%' border=0>

                  <TBODY>

                    <TR>

                      <TD width=15></TD>

                      <TD height='30'><B><FONT face='Arial, Helvetica, sans-serif' 

                          color=#ffffff size=3>Your Registered Information</FONT></B></TD>

                    </TR>

                  </TBODY>

              </TABLE></TD>

            </TR>

            <TR>

              <TD vAlign=top>

                <TABLE cellSpacing=0 cellPadding=10 width='100%' 

                    bgColor='#339966' border=0>

                  <TBODY>

                    <TR>

                      <TD vAlign=top>

                        <TABLE cellSpacing=0 cellPadding=0 width='100%' 

                          border=0>

                          <TBODY>

                            <TR>

                              <TD>

                                <TABLE width='100%' 

                                border=0 cellPadding=6 cellSpacing=1>

                                  <TBODY>

                                    <TR>

                                      <TD bgColor=#FFFFFF>

                                        <table width='90%' border='0' align='center' cellpadding='1' cellspacing='0'>

                                          <tr class='GrayFont'>

                                            <td height='24'>

                                              <div align='left' class='style3'>Dear ".ucwords($Name).",</div></td>

                                          </tr>

                                          <tr class='GrayFont'>

                                            <td><span class='style2'></span></td>

                                          </tr>

                                          <tr class='GrayFont'>

                                            <td height='14'><div align='left' class='style3'>

                                              <div align='justify'>You have been successfully registered the Volunteers with our Family Giving Tree. </div>

                                            </div></td>

                                          </tr>

                                          <tr class='GrayFont'>

                                            <td><div align='left' class='style3'></div></td>

                                          </tr>

                                          <tr class='GrayFont'>

                                            <td><table width='98%'  border='0' cellspacing='5'>

                                            

                                             <tr class='GrayFont'>

                                               <td>&nbsp;</td>

                                               <td>&nbsp;</td>

                         <td>&nbsp;</td>

                                             </tr>

                                             <tr class='GrayFont'>

                                               <td colspan='3'><span class='style5' >Your Registered Information :</span></td>

                                               

                                             </tr>

                       <tr class='GrayFont'>

                                                <td width='20%' height='21'><span class='style3'>Task Name </span></td>

                        <td width='5%' align='center'>:</td>

                                                <td width='54%'><span class='style3'>".$Task."</span></td>

                                              </tr>

                        <tr class='GrayFont'>

                                                <td width='20%' height='21'><span class='style3'>Date </span></td>

                        <td width='5%' align='center'>:</td>

                                                <td width='54%'><span class='style3'>".$Date."</span></td>

                                              </tr>

                                             <tr class='GrayFont'>

                                                <td width='20%' height='21'><span class='style3'>Time Slot </span></td>

                        <td width='5%' align='center'>:</td>

                                                <td width='54%'><span class='style3'>".$TimeSlot."</span></td>

                                              </tr>

                                             <tr class='GrayFont'>

                                               <td><span class='style3'>No of Volunteers </span></td>

                         <td width='5%' align='center'>:</td>

                                               <td><span class='style3'>".$noofvolunteers."</span></td>

                                             </tr>

                       

                                            </table></td>

                                          </tr>

                      <tr>

                        <td class='GrayFont'><div align='justify' class='style3'><br>We will find our south bay warehouse soon.  We will send you the address as soon as we 

                        know it and it will also be posted on our website.  We welcome your donation of gift wrap 

                        or scotch tape.  If you are a group of 25 or more, please email the name(s) of your 

                        Team Leader(s) to <a href='mailto:tara@familygivingtree.org' class='toplinks'>tara@familygivingtree.org</a> as soon as possible 

                        and have them arrive 15 minutes early.  Please dress warm.  Outside food is welcome...this is the 

                        email address for our in-house caterer 

                        <a href='mailto:goldrushcoffee@sbcglobal.net' class='toplinks'>goldrushcoffee@sbcglobal.net</a>  . 

                        Thank you for your help.<br></div></td>

                      </tr>

                                        </table></TD>

                                    </TR>

                                  </TBODY>

                              </TABLE></TD>

                            </TR>

                          </TBODY>

                      </TABLE></TD>

                    </TR>

                  </TBODY>

              </TABLE></TD>

            </TR>

            <TR>

              <TD bgColor='#006600' height=39>

                <TABLE cellSpacing=0 cellPadding=0 width='100%' border=0>

                  <TBODY>

                    <TR>

                      <TD width=15 height=35></TD>

                      <TD height=35><FONT 

                          face='Verdana, Arial, Helvetica, sans-serif' 

                          color='#CCCCCC' size=2><B>Thank you!</B><BR>-The Family Giving Tree Team</FONT></TD>

                      <TD width=15 height=35></TD>

                    </TR>

                  </TBODY>

              </TABLE></TD>

            </TR>

          </TBODY>

      </TABLE></TD>

      <TD width=10></TD>

    </TR>

    <TR>

      

      <TD vAlign=top width='80%'><FONT 

              face='Verdana, Arial, Helvetica, sans-serif' size=1>&nbsp; 

             </FONT></TD>

      <TD width=10>&nbsp;</TD>

    </TR>

  </TBODY>

</TABLE>

      ";

      

      /* To send HTML mail, you can set the Content-type header. */

      $headers  = "MIME-Version: 1.0\r\n";

      $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

      

      /* additional headers */

      $headers .= "To: $Name <$to>\r\n";

      $headers .= "From: webmaster@familygivingtree.org\r\n";

      

      /* and now mail it */

      mail($to, $subject, $message, $headers);  

} 



//  This function sends a mail to volunteer registration deletion  details.

function senddeletemail($Email,$Name,$noofvolunteers,$Task,$Date,$TimeSlot){

  

  $to  = $Email;

  /* subject */

  $subject = "Registration Cancellation Information";

  /* message */

      $message = "

          <style type='text/css'>

<!--

.GrayFont {color: #666666; font-size: 9px}

.style2 {font-family: Verdana, Arial, Helvetica, sans-serif}

.style3 {font-size: 11px; font-family: Verdana, Arial, Helvetica, sans-serif; }

.style5 {font-size: 11px; font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: bold; }

-->

</style>

<TABLE width='80%' border=0 align='center' cellPadding=0 cellSpacing=0>

  <TBODY>

    <TR>

        <TD vAlign=top width='80%'>

        <TABLE cellSpacing=0 cellPadding=0 width='100%' border=0>

          <TBODY>

            <TR>

              <TD bgColor='#006600'>

                <TABLE cellSpacing=0 cellPadding=0 width='100%' border=0>

                  <TBODY>

                    <TR>

                      <TD width=15></TD>

                      <TD height='30'><B><FONT face='Arial, Helvetica, sans-serif' 

                          color=#ffffff size=3>Registration Cancellation Information</FONT></B></TD>

                    </TR>

                  </TBODY>

              </TABLE></TD>

            </TR>

            <TR>

              <TD vAlign=top>

                <TABLE cellSpacing=0 cellPadding=10 width='100%' 

                    bgColor='#339966' border=0>

                  <TBODY>

                    <TR>

                      <TD vAlign=top>

                        <TABLE cellSpacing=0 cellPadding=0 width='100%' 

                          border=0>

                          <TBODY>

                            <TR>

                              <TD>

                                <TABLE width='100%' 

                                border=0 cellPadding=6 cellSpacing=1>

                                  <TBODY>

                                    <TR>

                                      <TD bgColor=#FFFFFF>

                                        <table width='90%' border='0' align='center' cellpadding='1' cellspacing='0'>

                                          <tr class='GrayFont'>

                                            <td height='24'>

                                              <div align='left' class='style3'>Dear ".ucwords($Name).",</div></td>

                                          </tr>

                                          <tr class='GrayFont'>

                                            <td><span class='style2'></span></td>

                                          </tr>

                                          <tr class='GrayFont'>

                                            <td height='14'><div align='left' class='style3'>

                                              <div align='justify'>Your registration of the Volunteers for the below task is Cancelled. </div>

                                            </div></td>

                                          </tr>

                                          <tr class='GrayFont'>

                                            <td><div align='left' class='style3'></div></td>

                                          </tr>

                                          <tr class='GrayFont'>

                                            <td><table width='98%'  border='0' cellspacing='5'>

                                            

                                             <tr class='GrayFont'>

                                               <td>&nbsp;</td>

                                               <td>&nbsp;</td>

                         <td>&nbsp;</td>

                                             </tr>

                                             <tr class='GrayFont'>

                                               <td colspan='3'><span class='style5' >Your Registered  Information :</span></td>

                                               

                                             </tr>

                       <tr class='GrayFont'>

                                                <td width='20%' height='21'><span class='style3'>Task Name </span></td>

                        <td width='5%' align='center'>:</td>

                                                <td width='54%'><span class='style3'>".$Task."</span></td>

                                              </tr>

                        <tr class='GrayFont'>

                                                <td width='20%' height='21'><span class='style3'>Date </span></td>

                                                <td width='5%' align='center'>:</td>

                        <td width='54%'><span class='style3'>".$Date."</span></td>

                                              </tr>

                                             <tr class='GrayFont'>

                                                <td width='20%' height='21'><span class='style3'>Time Slot</span></td>

                                                <td width='5%' align='center'>:</td>

                        <td width='54%'><span class='style3'>".$TimeSlot."</span></td>

                                              </tr>

                                             <tr class='GrayFont'>

                                               <td><span class='style3'>No of Volunteers </span></td>

                                               <td width='5%' align='center'>:</td>

                         <td><span class='style3'>".$noofvolunteers."</span></td>

                                             </tr>

                                            </table></td>

                                          </tr>

                      

                                        </table></TD>

                                    </TR>

                                  </TBODY>

                              </TABLE></TD>

                            </TR>

                          </TBODY>

                      </TABLE></TD>

                    </TR>

                  </TBODY>

              </TABLE></TD>

            </TR>

            <TR>

              <TD bgColor='#006600' height=39>

                <TABLE cellSpacing=0 cellPadding=0 width='100%' border=0>

                  <TBODY>

                    <TR>

                      <TD width=15 height=35></TD>

                      <TD height=35><FONT 

                          face='Verdana, Arial, Helvetica, sans-serif' 

                          color='#CCCCCC' size=2><B>Thank you!</B><BR>-The Family Giving Tree Team</FONT></TD>

                      <TD width=15 height=35></TD>

                    </TR>

                  </TBODY>

              </TABLE></TD>

            </TR>

          </TBODY>

      </TABLE></TD>

      <TD width=10></TD>

    </TR>

    <TR>

      

      <TD vAlign=top width='80%'><FONT 

              face='Verdana, Arial, Helvetica, sans-serif' size=1> 

             </FONT></TD>

      <TD width=10>&nbsp;</TD>

    </TR>

  </TBODY>

</TABLE>

      ";

      

      /* To send HTML mail, you can set the Content-type header. */

      $headers  = "MIME-Version: 1.0\r\n";

      $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

      

      /* additional headers */

      $headers .= "To: $Name <$to>\r\n";

      $headers .= "From: webmaster@familygivingtree.org\r\n";

      

      /* and now mail it */

      mail($to, $subject, $message, $headers);  

} 

//  This function sends a  mail with volunteers registration details.

function sendmailnew($VolunteerId,$typeId){

  

  

  $mysql = new mysql_obj;

  $sql = "SELECT * FROM taskdetails td, slotdetails sd, volunteers vo

        WHERE td.TaskId = sd.TaskId

        AND sd.SlotId = vo.SlotId

        AND vo.VolunteerId = '".$VolunteerId."'";

  $res = $mysql->fetch_array($sql,MYSQL_ASSOC);

  $sqlcontent = "select *from emailcontent where typeId='".$typeId."'";

  $rc = $mysql->fetch_array($sqlcontent,MYSQL_ASSOC);

  

  

    

  $message = stripslashes($rc[0][Message]);

  $message = str_replace('##Name##',$res[0][Name],$message);

  $message = str_replace('##Task##',$res[0][Task],$message);

  $message = str_replace('##Date##',date("m/d/Y", strtotime($res[0]["Date"])),$message);

  $message = str_replace('##Starttime##',date("H:i ", strtotime($res[0][Starttime])).$res[0][SAMPM],$message);

  $message = str_replace('##Endtime##',date("H:i ", strtotime($res[0][Endtime])).$res[0][EAMPM],$message);

  $message = str_replace('##noofvolunteers##',$res[0][noofvolunteers],$message);

  $message = str_replace('##PhoneNo##',$res[0][phoneNo],$message);

  $message = str_replace('##Email##',$res[0][ Email],$message);

  $message = str_replace('##CompanyName##',$res[0][ companyName],$message);

  

  

  $to  = $res[0][Email];

  /* subject */

  $subject = $rc[0][Subject];

  /* message */

      $message = "

          <style type='text/css'>

<!--

.GrayFont {color: #666666; font-size: 9px}

.style2 {font-family: Verdana, Arial, Helvetica, sans-serif}

.style3 {font-size: 11px; font-family: Verdana, Arial, Helvetica, sans-serif; }

.style5 {font-size: 11px; font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: bold; }

-->

</style>

<TABLE width='80%' border=0 align='center' cellPadding=0 cellSpacing=0>

  <TBODY>

    <TR>

        <TD vAlign=top width='80%'>

        <TABLE cellSpacing=0 cellPadding=0 width='100%' border=0>

          <TBODY>

            <TR>

              <TD bgColor='#006600'>

                <TABLE cellSpacing=0 cellPadding=0 width='100%' border=0>

                  <TBODY>

                    <TR>

                      <TD width=15></TD>

                      <TD height='30'><B><FONT face='Arial, Helvetica, sans-serif' 

                          color=#ffffff size=3>".$rc[0][Subject]."</FONT></B></TD>

                    </TR>

                  </TBODY>

              </TABLE></TD>

            </TR>

            <TR>

              <TD vAlign=top>

                <TABLE cellSpacing=0 cellPadding=10 width='100%' 

                    bgColor='#339966' border=0>

                  <TBODY>

                    <TR>

                      <TD vAlign=top>

                        <TABLE cellSpacing=0 cellPadding=0 width='100%' 

                          border=0>

                          <TBODY>

                            <TR>

                              <TD>

                                <TABLE width='100%' 

                                border=0 cellPadding=6 cellSpacing=1>

                                  <TBODY>

                                    <TR>

                                      <TD bgColor=#FFFFFF>

                                        <table width='90%' border='0' align='center' cellpadding='1' cellspacing='0'>

                                          <tr class='GrayFont'>

                                            <td >&nbsp;</td>

                                          </tr> 

                      <tr class='GrayFont'>

                                            <td height='24'>

                                              <div align='left' class='style3'>".nl2br($message)."</div></td>

                                          </tr>

                                          <tr class='GrayFont'>

                                            <td >&nbsp;</td>

                                          </tr>                       

                                        </table>

                    </TD>

                                    </TR>

                                  </TBODY>

                              </TABLE></TD>

                            </TR>

                          </TBODY>

                      </TABLE></TD>

                    </TR>

                  </TBODY>

              </TABLE></TD>

            </TR>

            <TR>

              <TD bgColor='#006600' height=39>

                <TABLE cellSpacing=0 cellPadding=0 width='100%' border=0>

                  <TBODY>

                    <TR>

                      <TD width=15 height=35></TD>

                      <TD height=35><FONT 

                          face='Verdana, Arial, Helvetica, sans-serif' 

                          color='#CCCCCC' size=2><B>".nl2br($rc[0][Footer])."</FONT></TD>

                      <TD width=15 height=35></TD>

                    </TR>

                  </TBODY>

              </TABLE></TD>

            </TR>

          </TBODY>

      </TABLE></TD>

      <TD width=10></TD>

    </TR>

    <TR>

      

      <TD vAlign=top width='80%'><FONT 

              face='Verdana, Arial, Helvetica, sans-serif' size=1>&nbsp; 

             </FONT></TD>

      <TD width=10>&nbsp;</TD>

    </TR>

  </TBODY>

</TABLE>

      ";

      $FromID = $rc[0][FromID];

      /* To send HTML mail, you can set the Content-type header. */

      $headers  = "MIME-Version: 1.0\r\n";

      $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

      

      /* additional headers */

      $headers .= "To: $Name <$to>\r\n";

      $headers .= "From: <$FromID> \r\n";

      

      /* and now mail it */

      mail($to, $subject, $message, $headers);  

} 

function sendVolunteerEmail($values) {
  $message = "Name: $values[name]\n"
              . "Email: $values[email]\n"
              . "Phone: $values[phone]\n"
              . "Company or School: $values[org]\n"
              . "Under 18: ".$values[under18]."\n"
              . "Grade: $values[grade]\n"
              . "Days available: " . join(", ", $values[weekday]) . "\n"
              . "Times available: " . join(", ", $values[time]) . "\n"
              . "Volunteering for: $values[purpose]\n"
              . "Volunteering for (Other): $values[purpose_other]\n"
              . "Hours for school: $values[schoolhrs]\n"
              . "Company matching program: $values[matching]\n"
              . "Special Skills: $values[skills]\n"
              . "Additional Info: $values[info]\n";
              
  mail(VOLUNTEER_EMAIL_RECIPIENT, "Volunteer Signup: $values[name]", $message);
}


?>