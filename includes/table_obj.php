<?php

/*

# -------------------------------------------------------------------------------

#      Author: Vivid Orange Limited

#        Date: 28 Apr 2002

#

# Description: Contains common functions and classes.

#

#  Parameters: 

#     Returns: 

#    Includes: mysql_obj.phtml

#      crypto_obj.phtml

#      user_obj.phtml

#      corp_obj.phtml

#      modules_obj.phtml

#      common.phtml

#      func_date_maker.phtml

#      errors.phtml

# Programmers: KP  - Krishna Prasad

#  Amendments: KP_01 - 25-Aug-2005

#        Updated for requirement no :8 

#      KP_02 - 08-SEP-2005

#        Update dfor fixing bugs with ID: 10399,10400

#      JS_01 - 19-SEP-2005

#        Requirement No.67, Created a function get_page_details to fetch the dynamic content for the functional pages.

#      KP_03 - 20-SEP-2005

#        Updates for requirement no : 93

#      KP_04   21-Sep-2005

#                      Changes for requirement no : 102 to allow an option to specify marquee height and width

#      KP_05   23-Sep-2005

#                      Changes for requirement no : 134,139 to fix bugs in the charity donations and achievements tags

#      JS_02 - 04-Oct-2005

#        REQ #229, modified sql statement to check and fetch dynamic content for the functional pages in the order of sub company, general 

# -------------------------------------------------------------------------------

*/

 

$HOME_SERVER_NAME[] = "sc2.netbg.com";

$HOME_SERVER_NAME[] = "home.smartchange.org";

$HOME_SERVER_NAME[] = "home.smartchange.com";

$HOME_SERVER_NAME[] = "home.smartchange.co.uk";

$HOME_SERVER_NAME[] = "home.smartchange.org.uk";

$HOME_SERVER_NAME[] = "dev.smartchange.org";

$HOME_SERVER_NAME[] = "dev.smartchange.com";

$HOME_SERVER_NAME[] = "dev.smartchange.co.uk";

$HOME_SERVER_NAME[] = "dev.smartchange.org.uk";

 

//include ("language_variables.php"); 

 

//include ("xstandardurl.php"); 

 

function is_email ($email) {

   if (eregi("^([_a-z0-9']+([\\._a-z0-9'-]+)*)@([_a-z0-9-]{2,}(\\.[_a-z0-9-]{1,})*\\.[a-z]{2,3})$", $email)) {

     return true;

 } else {

     return false;

 }

}

 

// This function added by venkat on 26-Apr-2006

function phoneValidation($phone_number)

{

 $valid_chars = array("1","2","3","4","5","6","7","8","9","0","+"," ","-","(",")"); 

 $result = true;

 

 for ($pos=0, $tel_arr = array(); $pos < strlen($phone_number); $pos+=1){

    $phone_number_arr[] = substr($phone_number, $pos, 1);

 }

 

 for ($kk = 0; $kk < count($phone_number_arr); $kk++)

 {

  if (in_array($phone_number_arr[$kk],$valid_chars)) 

  {

  }

  else

  {

   $result = false; 

  }

 }

 

 return $result; 

} 

 

function non_cache_headers(){

   // ER - 07 Feb 2003

   // Looked into the possibility of adding password requirement code into this module

   // decided against it because of unknown impact of moving the function call in pages. 

   /* global $PHP_SELF, $usr;

   if ($usr->changepass==1 and !eregi("register.phtml", $PHP_SELF)) {

      header("Location: register.phtml?cmd=2");

   } else {

   */

   if( !headers_sent() ){

      header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");    // Date in the past

      header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified

      //header ("Cache-Control: no-cache, must-revalidate");  // HTTP/1.1

      header ("Pragma: no-cache");                          // HTTP/1.0

   header("Cache-Control: no-store, no-cache, must-revalidate");

   header("Cache-Control: post-check=0, pre-check=0", false);

 

   }else{

      echo "Sorry headers are already sent!";

   }

   // }

} 

 



function is_web_folder($str){

   if( $str == urlencode( $str ) ){

      return true;

   }else{

      return false;

   }

}

 

function protection($usr, $CORP){

 global $REMOTE_ADDR,$destination;

 $sql = new mysql_obj;

  if(($usr->status == "login") and ($usr->company_id==$CORP->corp_id)){

     

 if($CORP->corp_id ==17 )

 {

  if ($usr->user_id >1000 && $usr->pgroup==1) 

  {

   $dets =$sql->fetch_array("select d.employee_number, u.user from users_corp u left join details d on u.user_id=d.user_id where u.user_id='".$usr->user_id ."'");

   if($dets[0]["user"] != $dets[0]["employee_number"])

   {

    header("Location:confirm_srn.php?$destination=".$destination);

    exit;

   }else

   {

    return true; 

   }

  }else{

  return true; 

  }

 }else

 {

   return true;

 }

 

  }else{

   // return true;

  

  // code added by karunakar on 12-12-2004

 

  

   if (!$usr->user_id) {

    $company_dets= $sql->fetch_row("select software_ip_masking,sso_type,sso_key,sso_redirect_url   from company_main where company_id =".$CORP->corp_id);

    $sip_masking_flag =$company_dets["software_ip_masking"];

    $sso_type =$company_dets["sso_type"];

    $sso_key =$company_dets["sso_key"];

    $sso_redirect_url =$company_dets["sso_redirect_url"];

 



    if($sso_type != "" && $sso_key !="")

    {

     if($sso_redirect_url !="")

     {

      header("Location:$sso_redirect_url");

      exit;

     }else

     {

      $submit = "submit";

      $username = "guest";

      $userpass = "guest";

 

     }

    }else

    {

     if($sip_masking_flag=="Y")

     {

      $free_access = $sql->fetch_scalar("select count(*) from company_ip_masking where company_id ='".$CORP->corp_id ."' and ip_address ='".$REMOTE_ADDR."'");

      if($free_access ==0)

      {

       header("Location:userlogin.phtml");

       exit;

      }else

      {

       $submit = "submit";

       $username = "guest";

       $userpass = "guest";

      }

     }else

     {

      $submit = "submit";

      $username = "guest";

      $userpass = "guest";

     }

    }

   }

 

   if($submit)

   {

      if($HTTP_POST_VARS["rem"] == "yes")

      {

      $exp = time() + (3600*$HOURS);    

 

      $usr->login($username,$userpass,$CORP->corp_id, $exp );

      }

    else

      {

      $usr->login($username,$userpass,$CORP->corp_id);

      }

   }

   return true;

  // end of code 

 

         //header("Location:login.phtml");

      //exit(-1);

      //return false;

  }

}

 

// ATS secret functions :)

 

function cut2sent($text,$size) {

 $text = strip_tags($text);

 if (preg_match("/(.*)([?!\.]+)\s+(.+?)$/m",$text,$matched)) {$ret = $matched[1].$matched[2];} elseif (strlen($text) < $size) {$ret = $text;}  else {$ret = $text.'...';}

 return $ret;

}

 



function char_name($regn,$alias,$display=true) {

 if (chop($alias) != "") {

  if (preg_match("/^(.+)\,\s+The/i",$alias,$matched)) {

   if($display){echo "The ".$matched[1];}else{return "The ".$matched[1];}

  } else {

   if($display){echo $alias;}else{return $alias;}

  }

 } else {

  if (preg_match("/^(.+)\,\s+The/i",$regn,$matched)) {

   if($display){echo "The ".$matched[1];}else{return "The ".$matched[1];}

  } else {

   if($display){echo $regn;}else{return $regn;}

  }

 }

}

 

function char_name_var($regn,$alias) {

 if (chop($alias) != "") {

  if (preg_match("/^(.+)\,\s+The/i",$alias,$matched)) {

   return "The ".$matched[1];

  } else {

   return $alias;

  }

 } else {

  if (preg_match("/^(.+)\,\s+The/i",$regn,$matched)) {

   return "The ".$matched[1];

  } else {

   return $regn;

  }

 }

}

 

// KP_05

//function cnv_numb ($input,$dodec="no",$decpoint=2,$disp='show') {

function cnv_numb ($input,$dodec="no",$decpoint=2,$disp='show') {

 //$input=(int)$input;

 

 if ($input < 0) {

  $minus = '-';

  $input = $input * (-1);

 } else {

  $minus = '';

 }

 //print $input;

 preg_match("/^(\d*)(\D\d*)?$/",$input,$parts1);

 //print_r($parts1);

 $int1 = $parts1[1];

 $int = $int1;

 $dec = $parts1[2];

 $ret = '';

 while ($int >= 1) {

  $int = $int / 1000;

//   echo "BI---$int---\n";

  if (preg_match("/^(\d*)\D(\d*)?$/",$int,$parts2)) {

   $int = $parts2[1];

   $put = $parts2[2];

  } else {

   $put =0;

  }

//   echo "--P-$put--I-$int---\n";

  if (strlen($put) == 1) {

   $put = $put.'00';

  } elseif (strlen($put) == 2) {

   $put = $put.'0';

  } elseif ((!isset($put)) or (chop($put) == "") or ($put == 0)) {

   $put = '000';

  }

  if ($int < 1) $put = round($put); 

  if (chop($ret) != "") {

   $ret = $put.','.$ret;

  } else {

   $ret = $put;

  }

 }

 preg_match("/^(\D)(\d+)$/",$dec,$parts3);

 if ($parts3[2] == 0) {$parts3[2] = '';$decx='';} else {$decx = $parts3[1];}

 if ($dodec == "yes") {

  if ($parts3[2] != 0) {

   for ($i=0;$i<($decpoint-strlen($parts3[2]));$i++) {

    $parts3[2] = $parts3[2].'0';

   }

  }

  $ret = $minus.$ret.$parts3[1].$parts3[2];

 } else {

  $ret = $minus.$ret;

 }

 

 $ret=str_replace(",","",$ret);

 if($disp=='show'){

  echo number_format($ret,2,'.','');

 }else{

  return number_format($ret,2,'.','');

 }

}

 

function echo_date ($date_org) {

 $mon = array();

 $mon[] ='Ukn';

 $mon[] ='Jan';

 $mon[] ='Feb';

 $mon[] ='Mar';

 $mon[] ='Apr';

 $mon[] ='May';

 $mon[] ='Jun';

 $mon[] ='Jul';

 $mon[] ='Aug';

 $mon[] ='Sep';

 $mon[] ='Oct';

 $mon[] ='Nov';

 $mon[] ='Dec';

 

 if (preg_match("/^(\d{2,4})-(\d{1,2})-(\d{1,2})\s\d{1,2}\:\d{1,2}\:\d{1,2}/",$date_org,$matched)) {

  if (intval($matched[1]) == 0) {

   echo ' not entered';

  } else {

   echo $matched[3].'-'.$mon[abs($matched[2])].'-'.$matched[1];

  }

 } else {

  if (($date_org == '0000-00-00') or (chop($date_org) == "")) {

   echo ' not entered ';

  } else {

   $dd = preg_split("/\-/",$date_org);

   echo $dd[2].'-'.$mon[abs($dd[1])].'-'.$dd[0];

  }

 }

}

 



function get_formatted_date($input)

{

 if($input)

 {

  return date("d-M-Y",strtotime($input));

 }

 else

 {

  return "";

 }

}

 

function makePassword()

{ 

 $adjectives = array("sizzle","happy","sloppy","glad","sin","funny","summer","loopy","silly","cheezy","blue","red","orange", "pink", "yellow","green","purple","silent","cute","pretty","fuzzy","nice","crazy","salty","sweet","waving","blossoms","life","mirth","express");

 

 $nouns = array("golf","kitten","leaf","bird","swan","lobster","crab","69","rains","sea","flamingo","magic","clay", "wand","fragrance","lovely","forest","monday","tuesday","wednesday","thursday", "friday","saturday","sunday","winter","spring","summer", "fall", "autumn","shimmmers");

 $randomNoun = rand(0,sizeOf($nouns)-1);

 $randomAdj = rand(0,sizeOf($adjectives)-1);

 $password = $adjectives[$randomAdj] . "*" . $nouns[$randomNoun];

 return $password;

}

 

function tep_rand($min = null, $max = null) {

    static $seeded;

 

    if (!isset($seeded)) {

      mt_srand((double)microtime()*1000000);

      $seeded = true;

    }

 

    if (isset($min) && isset($max)) {

      if ($min >= $max) {

        return $min;

      } else {

        return mt_rand($min, $max);

      }

    } else {

      return mt_rand();

    }

  }

 

function create_random_value($length, $type = 'mixed') {

    if ( ($type != 'mixed') && ($type != 'chars') && ($type != 'digits')) return false;

 

    $rand_value = '';

    while (strlen($rand_value) < $length) {

      if ($type == 'digits') {

        $char = tep_rand(0,9);

      } else {

        $char = chr(tep_rand(0,255));

      }

      if ($type == 'mixed') {

        if (eregi('^[a-z0-9]$', $char)) $rand_value .= $char;

      } elseif ($type == 'chars') {

        if (eregi('^[a-z]$', $char)) $rand_value .= $char;

      } elseif ($type == 'digits') {

        if (ereg('^[0-9]$', $char)) $rand_value .= $char;

      }

    }

 

   return $rand_value;

}

 



// Creates the default boxes for a country or subcompany...

function create_blocks($sub_id){

 global $CORP,$sql;

 $sub_company=$sub_id;

 

 $blkcrtd=$sql->fetch_scalar("select count(*) from blocks where company_id='".$CORP->corp_id."' and sub_company_id='".$sub_company."'");

 if($blkcrtd<1){

  $bls=$sql->fetch_array("select * from blocks where company_id='".$CORP->corp_id."' and sub_company_id='0'");

  for($i=0;$i<count($bls);$i++){

   $blkid=$sql->fetch_scalar("select blockfile from blocks where bid='".$bls[$i]['bid']."'");

   $insqry="INSERT into blocks(title,active,blockfile,view,block_type,company_id,sub_company_id, added_by) select title,active,blockfile,view,block_type,company_id,'".$sub_company."' as sub_company_id, added_by from blocks where bid='".$bls[$i]['bid']."'";

   $insres=$sql->query($insqry);

   $bid=mysql_insert_id();

   if($insres){

    $insqry1="INSERT into blocks_to_subcompany(block_id,position,weight,style_id,status,sub_company_id,company_id) select '".$bid."' as block_id,position,weight,style_id,status,'".$sub_company."' as sub_company_id,'".$CORP->corp_id."' as company_id  from blocks_to_subcompany where block_id='".$bls[$i]['bid']."'";

    $insres1=$sql->query($insqry1);

    

    $path=$_SERVER['DOCUMENT_ROOT'].'/allcorp/company/virgin/';

    

    $filename=$path."default_blocks/".$blkid;

    $handle = fopen($filename, "r");

    $txtcontent = fread($handle, filesize($filename));

    fclose($handle);

 

    $txtcontent=replace_back($txtcontent,$bls[$i]['bid']);

    

    $blk2sub=$sql->query("delete from block_images where block_id='".$bid."' and block_style_id =0");

    $blkimgres=$sql->fetch_array("select * from block_images where block_id='".$bls[$i]['bid']."'");

  

    for($im=0;$im<count($blkimgres);$im++){

     $insimgs=$sql->query("insert into block_images(block_id,image_name,block_image,block_imagetype,title_image) values('".$bid."','".$blkimgres[$im]['image_name']."','".addslashes($blkimgres[$im]['block_image'])."','".$blkimgres[$im]['block_imagetype']."','".$blkimgres[$im]['title_image']."')");

    }

 

    $rptxtcontent=replace_img($txtcontent,$bid);

    

    $file=fopen($path."blocks/block_".$bid.".php", 'w'); 

    fwrite($file,$rptxtcontent);

    fclose($file);

    

    $insres=$sql->query("update blocks set blockfile='block_".$bid.".php' where bid='".$bid."'");

    

    $insqry2="INSERT into blocks_ref(def_block_id,block_id,sub_company_id,company_id) values('".$bls[$i]['bid']."','".$bid."','".$sub_company."','".$CORP->corp_id."')";

    $insres2=$sql->query($insqry2);

    

   }

  }

 }

 

}

 

//end of block creation-->

 

//----KP_01--->

function get_tagattr($content,$tagnm){

 

 $text = $content;

 # find all tags

 preg_match_all('/<[^>]+>/s',$text,$tags);

 

 foreach (array($tagnm) as $starter) {

  foreach ($tags[0] as $link) {

   $gotten = preg_match('/^<\s*'.$starter.'\s*(.*)>/i',$link,$alist);

   if ($gotten) {

    //print "<b>$alist[1]</b><br>";

    $cleaned = preg_replace('/\s+=\s+/','=',$alist[1]);

    preg_match_all('/(?:^|\s)(\w+)="([^">]+)"/',$cleaned,$qatts);

    preg_match_all('/(?:^|\s)(\w+)=([^"\s>]+)/',$cleaned,$patts);

    $allatts = array_merge($patts[1],$qatts[1]);

    $allvals = array_merge($patts[2],$qatts[2]);

      for ($k=0; $k<count($allatts); $k++) {

           $valarr[$allatts[$k]]=$allvals[$k];

      }

      

   }

  }

 }

 return $valarr;

}

 



function replace_img($txtcnt,$bid){

 global $sql;

 preg_match_all('/<img[^>]+>/s',$txtcnt,$tags);

 if(count($tags[0])>0){

  for($t=0;$t<count($tags[0]);$t++){

   $src="";

   $attrb=" ";

   $imgtag=get_tagattr($tags[0][$t],'img');

 

   foreach ($imgtag as $varname => $varvalue) {

    if($varname!="src")$attrb .= $varname.'="'.$varvalue.'" ';

   }

   $src=$imgtag['src'];

   if(strpos($src,"draw_image.php")===false){

    $img=explode("/",$src);

    $id=$sql->fetch_scalar("select block_image_id from block_images where image_name like'".$img[count($img)-1]."' and block_id='".$bid."'");

    $srcstr="/company_admin/draw_image.php?bid=".$id;

    $rpstr='<img src="'.$srcstr.'" '.$attrb.'>';

    $txtcnt=str_replace($tags[0][$t],$rpstr,$txtcnt);

 

   }

  }

 }

 return $txtcnt;

}

 



function replace_back($txtcnt,$bid){

 global $sql;

 preg_match_all('/<img[^>]+>/s',$txtcnt,$tags);

 if(count($tags[0])>0){
  for($t=0;$t<count($tags[0]);$t++){

   $src="";

   $attrb=" ";

   $imgtag=get_tagattr($tags[0][$t],'img');

   

   foreach ($imgtag as $varname => $varvalue) {

    if($varname!="src")$attrb .= $varname.'="'.$varvalue.'" ';

   }

   $src=$imgtag['src'];

   if(strpos($src,"content_images")===false){

    $img=strpos($src,"bid=");

    $imgnm=$sql->fetch_scalar("select image_name from block_images where block_image_id='".substr($src,$img+4)."' and block_id='".$bid."'");

    $srcstr="content_images/".$imgnm;

    $rpstr='<img src="'.$srcstr.'" '.$attrb.'>';

    $txtcnt=str_replace($tags[0][$t],$rpstr,$txtcnt);

   }

  }

 }

 return $txtcnt;

}

 



//----KP_01---->

 

///This function replaces the smartTags in a content

function replace_tags($replacetxt,$flag=1,$print_flag=true,$link_id=0){  

// parameters

// $flag -- if $flag value '1' then only parsing will be done for "payroll giviing" and "country flag" smart tags. 

// $print_flag -- right now this function not returning any value. At the time of inserting data in "display_content" field in database (in company_data_27 table) we need to store all the data in a variable. In that situation set $print_flag to false. Then this function retunrn some value. It is useful to store data in database.

 global $CORP,$sql,$usr,$ucorp, $rt_flag;

    if(!is_object($sql))$sql=new mysql_obj;

 if(!is_object($CORP))$CORP = new corp_obj;

 if(!is_object($usr))$usr = new user_obj;

 $charitydet = new charity_profile;

 

 $rt_flag = 0;

 

 $currentpath =realpath(".");

 if(strpos($currentpath,'company_admin')){

  $path="../";

  $sub_company_id=$_SESSION['selected_sub_country'];

 }else{

  $path="";

  

   if($usr->user_id<1000){

   $sub_company_id=$_SESSION['sess_cnt_id'];

   }else{

     $sub_company_id=$usr->pdetails['sess_cnt_id'];

   }

   $url=str_replace("/","",str_replace("?".$_SERVER['QUERY_STRING'],"",$_SERVER['REQUEST_URI']));

   if($url=='virgin_ho.php'){

   if($_SESSION['sess_usr_type'] == 'public') 

   {

    $is_country = "P";

   }else{

    $is_country = "S";

   }

 

   $country = $sql->fetch_scalar("select country_id from sub_company_main where sub_company_id='".$sub_company_id."'");

   $sub_company_id = $sql->fetch_scalar("select sub_company_id from sub_company_main where country_id = '$country' and is_country='$is_country'");

   } 

 }

 

 

 //Code to replace payroll calculator tag 

 //KP_01

 

 

 $freetextstr =stripslashes($replacetxt);

 

 $pcpos = preg_match("/<payrollcalculator(.*)\/>/", $freetextstr, $pcmatches);   

 if($pcpos == false){

 }else{

  // KP_02

  //$pcmatches[0]=substr($pcmatches[0],0,strpos($pcmatches[0],"/>"));

  $pcmatches[0]=substr($pcmatches[0],0,strpos($pcmatches[0],"/>") + 2 );

  // KP_02

  $filename=$path."payrollcalc.php";

  if($CORP->corp_id ==24 ) $filename = $path."payrollcalc_24.php";

  if($CORP->corp_id ==29 ) $filename = $path."payrollcalc_29.php";

 

  $handle = fopen($filename, "r");

  $calccontent = fread($handle, filesize($filename));

  fclose($handle);

 }

 

 $freetextstr=str_replace($pcmatches[0],$calccontent,$freetextstr);

 $freetextstr=str_replace("&pound;",$ucorp['currency_symbol'],$freetextstr);

 

 //This is to replace the tags used in the older version of the content pages

 $pos=strpos($freetextstr,"{content.payroll_calculator}");    

 if($pos === false){

 }else{

  $filename = $path."payrollcalc.php";

  if($CORP->corp_id ==24 ) $filename = $path."payrollcalc_24.php";

  if($CORP->corp_id ==29 ) $filename = $path."payrollcalc_29.php";

 

  $handle = fopen($filename, "r");

  $calccontent = fread($handle, filesize($filename));

  fclose($handle);

  

 }

 $freetextstr=str_replace("{content.payroll_calculator}",$calccontent,$freetextstr); 

 $freetextstr=str_replace("&pound;",$ucorp['currency_symbol'],$freetextstr); 

 //End of payroll calculator tag-->

 //KP_01

 

 //Code to replace Gift Aid tag

 $pos=strpos($freetextstr,"{giftaid}");    

 

 if($pos === false){

 }else{

  $filename=$path."giftaid.php";

  $handle = fopen($filename, "r");

  $txtcontent = fread($handle, filesize($filename));

  fclose($handle);

  

 }

 $freetextstr=str_replace("{giftaid}",$txtcontent,$freetextstr);

 //End of Gift Aid tag-->

 

 //Start of charity profile tags 

 $snpactive = issnippets_active($CORP->corp_id,'0');

 if($snpactive == 'Y')$freetextstr = replace_snippets($freetextstr,$flag,$print_flag,$link_id);

 

 //KP_01

 $vpos = preg_match("/<vision(.*)\/>/", $freetextstr, $vmatches);   

 if($vpos == false){

 }else{

  $vmatches[0]=substr($vmatches[0],0,strpos($vmatches[0],"/>") + 2 );

  $char_id=get_tagattr($vmatches[0],"vision");

  $vistxt=$charitydet->get_vision($char_id['charity']);

 }

 $freetextstr=str_replace($vmatches[0],$vistxt,$freetextstr);

 

 $wpos = preg_match("/<wishlist(.*)\/>/", $freetextstr, $wmatches);   

 if($wpos == false){

 }else{

  $wmatches[0]=substr($wmatches[0],0,strpos($wmatches[0],"/>") + 2 );

  $char_id=get_tagattr($wmatches[0],"wishlist");

  $wstxt=$charitydet->get_wishlist($char_id['charity']);

 }

 $freetextstr=str_replace($wmatches[0],$wstxt,$freetextstr);

 



 $dpos = preg_match("/<description(.*)\/>/", $freetextstr, $dmatches);   

 if($dpos == false){

 }else{

  $dmatches[0]=substr($dmatches[0],0,strpos($dmatches[0],"/>") + 2 );

  $char_id=get_tagattr($dmatches[0],"description");

  $desctxt=$charitydet->get_description($char_id['charity']);

 }

 $freetextstr=str_replace($dmatches[0],$desctxt,$freetextstr);

 

 $ppos = preg_match("/<projects(.*)\/>/", $freetextstr, $pmatches);   

 if($ppos == false){

 }else{

  $pmatches[0]=substr($pmatches[0],0,strpos($pmatches[0],"/>") + 2 );

  $char_id=get_tagattr($pmatches[0],"projects");

  $prjtxt=$charitydet->get_projects($char_id['charity']);

 }

 $freetextstr=str_replace($pmatches[0],$prjtxt,$freetextstr);

 

 $prpos = preg_match("/<programmes(.*)\/>/", $freetextstr, $prmatches);   

 if($prpos == false){

 }else{

  $prmatches[0]=substr($prmatches[0],0,strpos($prmatches[0],"/>")+ 2 );

  $char_id=get_tagattr($prmatches[0],"programmes");

  $progtxt=$charitydet->get_programmes($char_id['charity']);

 }

 $freetextstr=str_replace($prmatches[0],$progtxt,$freetextstr);

 



 $apos = preg_match("/<achievements(.*)\/>/", $freetextstr, $amatches);   

 if($apos == false){

 }else{

  $amatches[0]=substr($amatches[0],0,strpos($amatches[0],"/>")+ 2 );

  $char_id=get_tagattr($amatches[0],"achievements");

  $achtxt=$charitydet->get_achievements($char_id['charity']);

 }

 $freetextstr=str_replace($amatches[0],$achtxt,$freetextstr);

 



 $dnpos = preg_match("/<donations(.*)\/>/", $freetextstr, $dnmatches);   

 if($dnpos == false){

 }else{

  $dnmatches[0]=substr($dnmatches[0],0,strpos($dnmatches[0],"/>")+ 2 );

  $char_id=get_tagattr($dnmatches[0],"donations");

  $dontxt=$charitydet->get_donations($char_id['charity']);

 }

 $freetextstr=str_replace($dnmatches[0],$dontxt,$freetextstr);

 

 $npos = preg_match("/<name(.*)\/>/", $freetextstr, $nmatches);   

 if($npos == false){

 }else{

  $nmatches[0]=substr($nmatches[0],0,strpos($nmatches[0],"/>")+ 2 );

  $char_id=get_tagattr($nmatches[0],"name");

  $ntxt=$charitydet->get_name($char_id['charity']);

 }

 $freetextstr=str_replace($nmatches[0],$ntxt,$freetextstr);

 

 $rpos = preg_match("/<regnumber(.*)\/>/", $freetextstr, $rmatches);   

 if($rpos == false){

 }else{

  $rmatches[0]=substr($rmatches[0],0,strpos($rmatches[0],"/>")+ 2 );

  $char_id=get_tagattr($rmatches[0],"regnumber");

  $rtxt=$charitydet->get_number($char_id['charity']);

 }

 $freetextstr=str_replace($rmatches[0],$rtxt,$freetextstr);

 

 

 $adpos = preg_match("/<charityaddress(.*)\/>/", $freetextstr, $admatches);   

 if($adpos == false){

 }else{

  $rmatches[0]=substr($admatches[0],0,strpos($admatches[0],"/>")+ 2 );

  $char_id=get_tagattr($admatches[0],"charityaddress");

  $adtxt=$charitydet->get_address($char_id['charity']);

 }

 $freetextstr=str_replace($admatches[0],$adtxt,$freetextstr);

 

 

 $ppos = preg_match("/<phone(.*)\/>/", $freetextstr, $pmatches);   

 if($ppos == false){

 }else{

  $pmatches[0]=substr($pmatches[0],0,strpos($pmatches[0],"/>")+ 2 );

  $char_id=get_tagattr($pmatches[0],"phone");

  $ptxt=$charitydet->get_phone($char_id['charity']);

 }

 $freetextstr=str_replace($pmatches[0],$ptxt,$freetextstr);

 

 

 $wbpos = preg_match("/<weburl(.*)\/>/", $freetextstr, $wbmatches);   

 if($wbpos == false){

 }else{

  $wbmatches[0]=substr($wbmatches[0],0,strpos($wbmatches[0],"/>")+ 2 );

  $char_id=get_tagattr($wbmatches[0],"weburl");

  $wbtxt=$charitydet->get_url($char_id['charity']);

 }

 $freetextstr=str_replace($wbmatches[0],$wbtxt,$freetextstr);

 

 

 $lpos = preg_match("/<logo(.*)\/>/", $freetextstr, $lmatches); 

 //echo htmlentities($freetextstr);  

 if($lpos == false){

 }else{

  $lmatches[0]=substr($lmatches[0],0,strpos($lmatches[0],"/>")+ 2 ); 

  

  $char_id=get_tagattr($lmatches[0],"logo");

  $ltxt=$charitydet->get_logo($char_id['charity']);

 }

 $freetextstr=str_replace($lmatches[0],$ltxt,$freetextstr);

 //End of charity profile tags 

 

 //Login link display

 $lnpos = preg_match("/<login(.*)\/>/", $freetextstr, $lnmatches); 

 if($lnpos == false){

 }else{

  $lnmatches[0]=substr($lnmatches[0],0,strpos($lnmatches[0],"/>")+ 2 );

  $link_attr=get_tagattr($lnmatches[0],"login");

  if($usr->user_id < 1000 || $usr->pgroup >= 2){

   if($CORP->corp_id !=29 ){

   $lntxt='<a href="/user_login.phtml">'.$link_attr['linktext'].'</a>';

   }else{

   $lntxt='<a href="/user_login.phtml"><img src="/images/loginorregister.gif" alt="'.$link_attr['linktext'].'" border="0"/></a>';

   }

  }else{

   $lntxt='';

  }

 }

 $freetextstr=str_replace($lnmatches[0],$lntxt,$freetextstr);

 //End of login link display  

 

 // Country flag display with link 

  $cfpos = preg_match("/<cflag(.*)\/>/", $freetextstr, $cfmatches);    

  if($cfpos == false){

  }else{ 

   $rt_flag = 1; 

   if ($flag == 1)

   {

    $cfmatches[0]=substr($cfmatches[0],0,strpos($cfmatches[0],"/>")+ 2 ); 

    $wlnk=get_tagattr($cfmatches[0],"cflag"); 

    $flag_image = $sql->fetch_scalar("select c.flag_image from sub_company_main s left join company_countries c on s.country_id=c.country_id where s.sub_company_id='".$sub_company_id."'"); 

    $cflag=""; 

    if($flag_image!="")

    {

     $flagimage = "/country_flags/".$CORP->corp_dir."/".$flag_image;  

     

     //if(file_exists($flagimage)){ 

      $cflag= "<img src=\"".$flagimage."\" alt=\"".$wlnk['alt']."\" border=\"0\">";

     //}else{

      //$cflag="";

     //}

    }

    else

    {

     $flagimage = "/country_flags/".$CORP->corp_dir."/row_flag.gif";

     $cflag= "<img src=\"".$flagimage."\" alt=\"".$wlnk['alt']."\" border=\"0\">";

    }

    

    if(trim($wlnk['weblink']))$cflag="<a href=\"".$wlnk['weblink']."\">".$cflag."</a>";

     

   } // // if ($flag == 1)

  } // else

  

  if ($flag == 1)

  {

   $freetextstr=str_replace($cfmatches[0],$cflag,$freetextstr);

  } 

 

 

  $cntpos=strpos($freetextstr,"{countryflag}");

  if( $cntpos!==false)

  {

   if ($flag == 1)

   {

    $flag_image = $sql->fetch_array("select s.sub_company_name,c.flag_image from sub_company_main s left join company_countries c on s.country_id=c.country_id where s.sub_company_id='".$sub_company_id."'"); 

    $cflag="";

    if($flag_image[0]['flag_image']!="")

    {

     $flagimage = "/country_flags/".$CORP->corp_dir."/".$flag_image[0]['flag_image'];  

     

     //if(file_exists($flagimage)){ 

      $cflag= "<img src=\"".$flagimage."\" alt=\"Change Country\" border=\"0\">";

     //}else{

      //$cflag="";

     //}

    }

    else

    {

     $flagimage = "/country_flags/".$CORP->corp_dir."/row_flag.gif";

     $cflag= "<img src=\"".$flagimage."\" alt=\"Change Country\" border=\"0\">";

    }

    $freetextstr=str_replace("{countryflag}",$cflag,$freetextstr);

   } // if ($flag == 1)

  }  // if( $cntpos!==false)

 //End of Country flag display with link 

 

 //Code to replace marquee tag

 $mqpos = preg_match("/<marquee(.*)\/>/", $freetextstr, $mqmatches);   

 if($mqpos == false){

 }else{

  $mqmatches[0]=substr($mqmatches[0],0,strpos($mqmatches[0],"/>")+ 2 );

  $char_id=get_tagattr($mqmatches[0],"marquee");

  $secs=$char_id['speed'];

  $ty=strtolower($char_id['type']);

  // KP_04

  $ht=$char_id['height'];

  $wd=$char_id['width'];

  // KP_04  

 }

 

 $mqpos = preg_match("/<textscroller(.*)\/>/", $freetextstr, $mqmatches);   

 if($mqpos == false){

 }else{

  $mqmatches[0]=substr($mqmatches[0],0,strpos($mqmatches[0],"/>")+ 2 );

  $char_id=get_tagattr($mqmatches[0],"textscroller");

  $secs=$char_id['speed'];

  $ty=strtolower($char_id['type']);

  // KP_04

  $ht=$char_id['height'];

  $wd=$char_id['width'];

  // KP_04  

 }

 //KP_01 end of changes

 

 

 //

 $npos = preg_match("/<voting(.*)\/>/", $freetextstr, $nmatches);   

 if($npos == false){

 }else{

  $nmatches[0]=substr($nmatches[0],0,strpos($nmatches[0],"/>")+ 2 );

  $question_id=get_tagattr($nmatches[0],"voting");

  $ntxt=get_voting($question_id['question'], $question_id['headerbgcolor'], $question_id['headerfontcolor'], $question_id['answers_display']);  

 }

 $freetextstr=str_replace($nmatches[0],$ntxt,$freetextstr); 

 //

 $marqstr="";

 if($ty && $mqpos!==false){

   

   if(!strpos($currentpath,'company_admin')){

    if ($usr->user_id<1000){$aqry=" and public=1";}     

   }

   

   $marqueesqry="SELECT * FROM company_marquee WHERE company_id='".$CORP->corp_id."' and sub_company_id='".$sub_company_id."' and display_from <=curdate() and display_to >=curdate() and status='Y' $aqry ORDER BY display_from";

   $marquees=$sql->fetch_array($marqueesqry);

   if(count($marquees)>0){

    if($ty=='v')$p="<p>";

    for($marq=0;$marq<count($marquees);$marq++){

    $newwin="";

    if($marquees[$marq]['target']=='Y')$newwin="target=_blank";

    $marqtxt.="$p<a href=".$marquees[$marq]['marquee_url']." $newwin>".$marquees[$marq]['marquee_text']."<a>&nbsp;&nbsp;";

    }

    

    if( $secs=="" || !is_numeric($secs)){

     $secs=1;

    }

    if( is_numeric($secs) && ($secs < 0 || $secs > 10) ){

     $secs=1;

    }

      // KP_04

    $marqstr= "

    <script language='javascript'>

    var marqtype='$ty';

    var marqueespeed=$secs;

    var marqueecontent='$marqtxt';

    var marqueewidth='$wd';

    var marqueeheight='$ht';        

    </script>

    <script type='text/javascript' src='".$path."marquee.js'></script>

    ";

      // KP_04

    }

    

 }

 $freetextstr=str_replace($mqmatches[0],$marqstr,$freetextstr);

 //End of marquee tag-->

 

 //start of mail form tag

 $mfrmpos=strpos($freetextstr,"{form}");

 $eposmfrm=strpos($freetextstr,"{#form}");

 if( $mfrmpos!==false && $eposmfrm!==false){

  $mfrmtxt="<form name=\"frmmail\" method=\"post\" action=\"mailform.phtml\" enctype=\"multipart/form-data\">";

  $freetextstr=str_replace("{form}",$mfrmtxt,$freetextstr);

  $freetextstr=str_replace("{#form}","</form>",$freetextstr);

 }

 

 

 //End of mail form tag

 

 //Code to replace payroll giving tag

 



  $paypos = preg_match("/<payroll(.*)\/>/", $freetextstr, $paymatches);   

  if($paypos == false){

   if ($print_flag) {

    echo $freetextstr; 

   } else {

    return $freetextstr;  

   } 

  }else{

   $rt_flag = 1;

   if ($flag == 1)

   { 

    $paymatches[0]=substr($paymatches[0],0,strpos($paymatches[0],"/>")+ 2 );

    $char_id=get_tagattr($paymatches[0],"payroll");

    $p_amts=explode(",",$char_id['amounts']);

    $charity_id=$char_id['charity'];

    $project_id=$char_id['project']; 

    $ty=strtolower($char_id['type']);

  

    $stpos=strpos($freetextstr, $paymatches[0]);

    $freetextbefore = substr($freetextstr,0,$stpos);

    $freetextafter =substr($freetextstr,( $stpos + strlen($paymatches[0]) ),strlen($freetextstr));

    echo ($freetextbefore);

    include $path."payrollmeta.php";

    echo ($freetextafter);

   }  // if ($flag == 1)

   else

   {

    if ($print_flag) {

     echo $freetextstr; 

    } else {

     return $freetextstr;  

    }  

   } 

  }

 

 //End of payroll giving tag-->

 

}

 



function display_banner(){

 global $CORP,$sql,$usr,$_SESSION;   

    if(!is_object($sql))$sql=new mysql_obj;

 if(!is_object($CORP))$CORP = new corp_obj;

 

 $currentpath =realpath(".");

 if(strpos($currentpath,'company_admin')){

  $sub_company_id=$_SESSION['selected_sub_country'];

 }else{

   if($usr->user_id<1000){

    $sub_company_id=$_SESSION['sess_cnt_id'];

    }else{

     $sub_company_id=$usr->pdetails['sess_cnt_id'];

    }

 }

    $url=str_replace("/","",str_replace("?".$_SERVER['QUERY_STRING'],"",$_SERVER['REQUEST_URI']));

    $vcnt_id='0';

 if($url=='view_content.phtml')$vcnt_id=$_GET['id'];

 

 if($url =="virgin_ho.php"){

  if($_SESSION['sess_usr_type'] == 'public'){

   $is_country = "P";

  }else{

   $is_country = "S";

  }

  $country = $sql->fetch_scalar("select country_id from sub_company_main where sub_company_id='".$sub_company_id."'");

  $sub_company_id = $sql->fetch_scalar("select sub_company_id from sub_company_main where country_id = '$country' and is_country='$is_country'");

 

 }

 

 $cnt=0;

 $pageid=$sql->fetch_scalar("select page_id from user_pages where page_link='".$url."'");

 if($pageid){

  $bqry=" and banner_id in(select banner_id from banner_config where page_id='".$pageid."' and content_id='".$vcnt_id."')";

  $getbanner=$sql->fetch_array("select banner_id, banner_link, target from banners_per_page where company_id='".$CORP->corp_id."' and sub_company_id='".$sub_company_id."' $bqry  and status='Y'");

  $cnt=count($getbanner);

 }

 if($cnt==0){

  $getbanner=$sql->fetch_array("select banner_id, banner_link, target from banners_per_page where company_id='".$CORP->corp_id."' and sub_company_id='0' and status='Y'");

 }

 

   //$sql->debug=false;

   if(count($getbanner)>0){

 if($getbanner[0]['banner_link']){

  if($getbanner[0]['target'])$tg=" target='_blank'";

  return "<a href='".$getbanner[0]['banner_link']."'".$tg."><img src='/company_admin/draw_image.php?ban_id=".$getbanner[0]['banner_id']."' border='0'></a>";

 }else{

  return "<img src='/company_admin/draw_image.php?ban_id=".$getbanner[0]['banner_id']."'>";

 }

  }else{

   return "";

  }

 

}

 



function create_url($exclude_array = '') {

  //print_r($exclude_array);

    global $HTTP_GET_VARS;

 

    if (!is_array($exclude_array)) $exclude_array = array();

 

    $get_url = '';

  

    if (is_array($HTTP_GET_VARS) && (sizeof($HTTP_GET_VARS) > 0)) {

       reset($HTTP_GET_VARS);

  while (list($key, $value) = each($HTTP_GET_VARS)) {

    if ( (strlen($value) > 0) && ($key != 'error') && (!in_array($key, $exclude_array)) && ($key != 'x') && ($key != 'y') ) {

          $get_url .= $key . '=' . rawurlencode(stripslashes($value)) . '&';

      //echo $get_url;

        }

      }

    }

     return $get_url;

  }

 

 

 

class boxes

{

   var $dbobj;

   var $userinfo;

   var $sub_company_id; 

   var $company_id;

   var $block_path;

   var $box_width='170';

   var $company;

   var $pageid;

   var $vcnt_id;

   

   function boxes(){

    global $CORP,$sql,$usr;

       $this->dbobj = new mysql_obj;

    $this->company = new corp_obj;

    $this->userinfo = new user_obj;

    $this->company_id = $this->company->corp_id;

    $this->corp_dir = $this->company->corp_dir;

    

   $currentpath =realpath(".");

   if(strpos($currentpath,'company_admin')){

  $this->sub_company_id=$_SESSION['selected_sub_country'];

   }else{

    if($usr->user_id<1000)

   {

    $this->sub_company_id=$_SESSION['sess_cnt_id'];

    }else

    {

     $this->sub_company_id=$usr->pdetails['sess_cnt_id'];

    }

   }    

   

     

    $url=str_replace("/","",str_replace("?".$_SERVER['QUERY_STRING'],"",$_SERVER['REQUEST_URI']));

 

 

 

    $this->vcnt_id='0';

    if($url=='view_content.phtml')$this->vcnt_id=$_GET['id'];    

    if(($this->sub_company_id == 0) && ($this->company_id == 27)){

     $this->block_path=$_SERVER['DOCUMENT_ROOT'].'/allcorp/company/'.$this->corp_dir.'/default_blocks/';

    }else{

     $this->block_path=$_SERVER['DOCUMENT_ROOT'].'/allcorp/company/'.$this->corp_dir.'/blocks/';

    }

    

 

    if(strpos($_SERVER['REQUEST_URI'],"/funds/")=== false )

    {

  $this->pageid=$this->dbobj->fetch_scalar("Select page_id from user_pages where page_link='".$url."' and ( company_id ='".$this->company_id."' or company_id='0')");

    }else

    {

  $this->pageid=$this->dbobj->fetch_scalar("Select page_id from user_pages where page_link = '/funds/' ");

    }

  if($url=='view_content.phtml')$this->pageid='57';

   }

   

   function draw_left_boxes(){

 //$sqlstr="SELECT a.bid, a.blockfile, a.title,a.content,a.block_type, b.style_content FROM blocks a, block_styles b WHERE a.style_id = b.style_id and position='l' AND a.active = '1' AND a.sub_company_id ='".$this->sub_company_id."' ORDER BY a.weight";   

 

 $sql_str="SELECT rating_id,question_text, section,display_from,display_to,display_public,block_style,c.style_content , rds.variable_in_page from company_ratings_main crm left join rating_display_scheme rds on rds.section_id=crm.section left join

 display_scheme_files dsf on  crm.section =dsf.section_id left join block_styles c on crm.block_style = c.style_id

 where crm.status='Y' and crm.company_id='".$this->company_id."' and dsf.user_page_id ='".$this->pageid."' and crm.position='L' ";

 $voting_arr = $this->dbobj->fetch_array($sql_str);

 

 for($sn=0;$sn<count($voting_arr);$sn++)

 { 

  $show_voting=true; 

  if($voting_arr[$sn]["display_public"] =="N" and $this->userinfo->user_id < 1000)

  {

   $show_voting=false; 

  }

 

  if($voting_arr[$sn]["display_from"] != "0000-00-00")

  {

   if(date("Y-m-d") < date("Y-m-d",strtotime($voting_arr[$sn]["display_from"])) )

   {

    $show_voting=false; 

   }

  }

 

  if($voting_arr[$sn]["display_to"] != "0000-00-00")

  {

   if(date("Y-m-d") > date("Y-m-d",strtotime($voting_arr[$sn]["display_to"])) )

   {

    $show_voting=false; 

   }

  }

 

  if($show_voting)

  {   

   $style=stripslashes($voting_arr[$sn]['style_content']);   

   $content=str_replace("<#title#>",'',$style); // replacing title with empty as there will no title for voting.

   $tmp=explode("<#content#>",$content);

   print $tmp[0];

   //$variable_in_page =$voting_arr[$sn]['variable_in_page'];

   //global $$variable_in_page; 

   

   $page_variables=explode(",",$voting_arr[$sn]['variable_in_page']);

   $variable_in_page = $page_variables[0]; 

   $variable_in_page2 = $page_variables[1];

   global $$variable_in_page,$$variable_in_page2; 

   

   $ntxt=get_voting($voting_arr[$sn]['rating_id'], '', '','V',$$variable_in_page,$$variable_in_page2);  

   print $ntxt; 

   print $tmp[1];

  }

 }

 

 if ($this->userinfo->user_id<1000){$aqry=" and view in(0,2) ";}else{$aqry=" and view in(1,2) ";}

 if($this->pageid)$pgqry=" and a.bid not in(select block_id from block_config where page_id='".$this->pageid."' and content_id='". $this->vcnt_id."')";

 

 $sqlstr="SELECT a.bid, a.blockfile, a.title,a.content,a.block_type, c.style_content  FROM blocks a, blocks_to_subcompany b, block_styles c WHERE a.bid = b.block_id AND b.style_id = c.style_id and position='l' and a.active='1' and b.status='Y' and a.company_id='".$this->company_id."'  AND b.sub_company_id ='".$this->sub_company_id."' ".$aqry.$pgqry." ORDER BY b.weight";

 $sqlres=$this->dbobj->fetch_array($sqlstr);

 for($bx=0;$bx<count($sqlres);$bx++){

  $style=stripslashes($sqlres[$bx]['style_content']);

 

  //--- KP_01 --->

  $title=$sqlres[$bx]['title'];

  if(trim($title)==""){

   $titleimg=$this->dbobj->fetch_scalar("select block_image_id from block_images where block_id='".$sqlres[$bx]['bid']."' and block_style_id=0 and title_image='1'");  

   $title='<img src="/company_admin/draw_image.php?bid='.$titleimg.'">';

  }

  $content=str_replace("<#title#>",$title,$style);

  //--- KP_01 --->

  

  $tmp=explode("<#content#>",$content);

  print $tmp[0];

  if($sqlres[$bx]['block_type']=='c'){

   include $this->block_path.$sqlres[$bx]['blockfile'];

  }else{

   $linksqry="select * from functional_links where link_id in(".$sqlres[$bx]['content'].") ORDER BY link_name";   

   $links=$this->dbobj->fetch_array($linksqry);

 

   $imgqry="select * from block_images where block_id='".$sqlres[$bx]['bid']."' and block_style_id=0";

   $imgres=$this->dbobj->fetch_array($imgqry);

   if(count($imgres)>0)$img= '<img alt="" src="'.$this->block_path.'content_images/'.$imgres[0]['image_name'].'" border="0" align="absmiddle">';

   

   echo '<table width="100%" cellspacing="0" cellpadding="0">';

   for($l=0;$l<count($links);$l++){

    echo '<tr><td width="16">'.$img.'</td><td><a href="'.$links[$l]['link_page'].'"><b>'.$links[$l]['link_name'].'</b></a><br>';

   }

   echo '</table>'; 

  }

  print $tmp[1];

  print '<br>';

 }

  }

  

  

   function draw_right_boxes(){

 //$sqlstr="SELECT a.bid,a.blockfile, a.title,a.content,a.block_type, b.style_content FROM blocks a, block_styles b WHERE a.style_id = b.style_id and position='r' AND a.active = '1' AND a.sub_company_id ='".$this->sub_company_id."' ORDER BY a.weight";

 

  $sql_str="SELECT rating_id,question_text, section,display_from,display_to,display_public,block_style,c.style_content , rds.variable_in_page from company_ratings_main crm left join rating_display_scheme rds on rds.section_id=crm.section left join

 display_scheme_files dsf on  crm.section =dsf.section_id left join block_styles c on crm.block_style = c.style_id

 where crm.status='Y' and crm.company_id='".$this->company_id."' and dsf.user_page_id ='".$this->pageid."' and crm.position='R' ";

 $voting_arr = $this->dbobj->fetch_array($sql_str);

 

 for($sn=0;$sn<count($voting_arr);$sn++)

 { 

  $show_voting=true; 

  if($voting_arr[$sn]["display_public"] =="N" and $this->userinfo->user_id < 1000)

  {

   $show_voting=false; 

  }

 

  if($voting_arr[$sn]["display_from"] != "0000-00-00")

  {

   if(date("Y-m-d") < date("Y-m-d",strtotime($voting_arr[$sn]["display_from"])) )

   {

    $show_voting=false; 

   }

  }

 

  if($voting_arr[$sn]["display_to"] != "0000-00-00")

  {

   if(date("Y-m-d") > date("Y-m-d",strtotime($voting_arr[$sn]["display_to"])) )

   {

    $show_voting=false; 

   }

  }

 

  if($show_voting)

  {   

   $style=stripslashes($voting_arr[$sn]['style_content']);   

   $content=str_replace("<#title#>",'',$style); // replacing title with empty as there will no title for voting.

   $tmp=explode("<#content#>",$content);

   print $tmp[0];

   

   $page_variables=explode(",",$voting_arr[$sn]['variable_in_page']);

   $variable_in_page = $page_variables[0]; 

   $variable_in_page2 = $page_variables[1];

   global $$variable_in_page,$$variable_in_page2; 

   

   //$variable_in_page =$voting_arr[$sn]['variable_in_page'];

   //global $$variable_in_page; 

   

   $ntxt=get_voting($voting_arr[$sn]['rating_id'], '', '','V',$$variable_in_page,$$variable_in_page2);  

   print $ntxt; 

   print $tmp[1];

  }

 }

 



 if ($this->userinfo->user_id<1000){$aqry=" and view in(0,2)";}else{$aqry=" and view in(1,2)";}

 if($this->pageid)$pgqry=" and a.bid not in(select block_id from block_config where page_id='".$this->pageid."')";

 

 $sqlstr="SELECT a.bid, a.blockfile, a.title,a.content,a.block_type, c.style_content  FROM blocks a, blocks_to_subcompany b, block_styles c WHERE a.bid = b.block_id AND b.style_id = c.style_id and position='r' and a.active='1' and b.status='Y' and a.company_id='".$this->company_id."'  AND a.sub_company_id ='".$this->sub_company_id."' ".$aqry.$pgqry." ORDER BY b.weight";

 $sqlres=$this->dbobj->fetch_array($sqlstr);

 for($bx=0;$bx<count($sqlres);$bx++){

 if($sqlres[$bx]['bid']==26){

  if($this->userinfo->user_id > 10000 && $this->userinfo->pgroup == 1)

  {

   $useremaildet = $this->dbobj->fetch_array("SELECT e,ownemail FROM details WHERE user_id='".$this->userinfo->user_id."'");

   $useremail = $useremaildet[0][0];

   $ownemailid = $useremaildet[0][1];

   

   if(trim($ownemailid) == "Y"){

   $query="select count(*) from vops_applications a left join vops_main vm on a.vop_id=vm.vop_id  where a.lm_email='$useremail' and vm.company_id='".$this->company->corp_id."'";

   $lmappscount = $this->dbobj->fetch_scalar($query);

   

    if($lmappscount > 0){

     $style=stripslashes($sqlres[$bx]['style_content']);

     

     //--- KP_01 --->

     $title=$sqlres[$bx]['title'];

     if(trim($title)==""){

      $titleimg=$this->dbobj->fetch_scalar("select block_image_id from block_images where block_id='".$sqlres[$bx]['bid']."' and block_style_id=0 and title_image='1'");  

      $title='<img src="/company_admin/draw_image.php?bid='.$titleimg.'">';

     }

     $content=str_replace("<#title#>",$title,$style);

     //$content=str_replace("<#title#>",$sqlres[$bx]['title'],$style);

     //--- KP_01 --->

     

     $tmp=explode("<#content#>",$content);

     print $tmp[0];       

     include $this->block_path.$sqlres[$bx]['blockfile'];  

     print $tmp[1];

     print '<br>';

    }

   }

  }

    

 }else{ 

 

  $style=stripslashes($sqlres[$bx]['style_content']);

  

  //--- KP_01 --->

  $title=$sqlres[$bx]['title'];

  if(trim($title)==""){

   $titleimg=$this->dbobj->fetch_scalar("select block_image_id from block_images where block_id='".$sqlres[$bx]['bid']."' and block_style_id=0 and title_image='1'");  

   $title='<img src="/company_admin/draw_image.php?bid='.$titleimg.'">';

  }

  $content=str_replace("<#title#>",$title,$style);

  //$content=str_replace("<#title#>",$sqlres[$bx]['title'],$style);

  //--- KP_01 --->

  

  $tmp=explode("<#content#>",$content);

  print $tmp[0];

  if($sqlres[$bx]['block_type']=='c'){

   include $this->block_path.$sqlres[$bx]['blockfile'];

  }else{

   $linksqry="select * from functional_links where link_id in(".$sqlres[$bx]['content'].") ORDER BY link_name";   

   $links=$this->dbobj->fetch_array($linksqry);

   

   $imgqry="select * from block_images where block_id='".$sqlres[$bx]['bid']."' and block_style_id=0";

   $imgres=$this->dbobj->fetch_array($imgqry);

   if(count($imgres)>0)$img= '<td width="16"><img alt="" src="'.$this->block_path.'content_images/'.$imgres[0]['image_name'].'" border="0" align="absmiddle"></td>';

   

   echo '<table width="100%" cellspacing="0" cellpadding="0">';

   for($l=0;$l<count($links);$l++){

    echo '<tr>'.$img.'<td><a href="'.$links[$l]['link_page'].'"><b>'.$links[$l]['link_name'].'</b></a><br>';

   }

   echo '</table>'; 

  }  

  print $tmp[1];

  print '<br>';

 }

 

 }

  }

  

  

}

///<----- End of boxes class--->

 

class admin_obj{

 



   function admin_obj(){

 

  $this->db = new mysql_obj;

  $this->db->debug = false;

  $this->pics[afav] = 'images/add_to_favs.gif';

  $this->pics[qinf] = 'images/infotab.gif';

  $this->pics[star] = 'images/star.gif';

  $this->pics[desc] = 'images/block.gif';

   }

 

 function Display_tree($user_id) {

  global $ucorp,$CORP,$_POST,$_SESSION,$company_id,$usr;

?>

  <script type="text/javascript">

  

  var persistmenu="yes" //"yes" or "no". Make sure each SPAN content contains an incrementing ID starting at 1 (id="sub1", id="sub2", etc)

  var persisttype="sitewide" //enter "sitewide" for menu to persist across site, "local" for this page only

  

  if (document.getElementById){ //DynamicDrive.com change

   document.write('<style type="text/css">\n')

   document.write('.submenu{display: none;}\n')

   document.write('</style>\n')

  }

  

  function SwitchMenu(obj){

   if(document.getElementById){

   var el = document.getElementById(obj);

   var ar = document.getElementById("masterdiv").getElementsByTagName("span"); //DynamicDrive.com change

    if(el.style.display != "block"){ //DynamicDrive.com change

     for (var i=0; i<ar.length; i++){

      if (ar[i].className=="submenu") //DynamicDrive.com change

      ar[i].style.display = "none";

     }

     el.style.display = "block";

    }else{

     el.style.display = "none";

    }

   }

  }

  

  function get_cookie(Name) { 

  var search = Name + "="

  var returnvalue = "";

  if (document.cookie.length > 0) {

  offset = document.cookie.indexOf(search)

  if (offset != -1) { 

  offset += search.length

  end = document.cookie.indexOf(";", offset);

  if (end == -1) end = document.cookie.length;

  returnvalue=unescape(document.cookie.substring(offset, end))

  }

  }

  return returnvalue;

  }

  

  function onloadfunction(){

  if (persistmenu=="yes"){

  var cookiename=(persisttype=="sitewide")? "switchmenu" : window.location.pathname

  var cookievalue=get_cookie(cookiename)

  if (cookievalue!="" && document.getElementById(cookievalue))

  document.getElementById(cookievalue).style.display="block"

  }

  }

  

  function savemenustate(){

  var inc=1, blockid=""

  while (document.getElementById("sub"+inc)){

  if (document.getElementById("sub"+inc).style.display=="block"){

  blockid="sub"+inc

  break

  }

  inc++

  }

  var cookiename=(persisttype=="sitewide")? "switchmenu" : window.location.pathname

  var cookievalue=(persisttype=="sitewide")? blockid+";path=/" : blockid

  document.cookie=cookiename+"="+cookievalue

  }

  

  if (window.addEventListener)

  window.addEventListener("load", onloadfunction, false)

  else if (window.attachEvent)

  window.attachEvent("onload", onloadfunction)

  else if (document.getElementById)

  window.onload=onloadfunction

  

  if (persistmenu=="yes" && document.getElementById)

  window.onunload=savemenustate

  

  </script>

  <div style="height:450px;">

  <div id="masterdiv">

  <? 

   $sub_company_id = $_SESSION['selected_sub_country'];

   if($_SESSION['selected_sub_country']=="")$sub_company_id = 0;

      

   $subtype=$this->db->fetch_scalar("select is_country from sub_company_main where sub_company_id='".$sub_company_id ."'");

   $pr_user=$this->db->fetch_scalar("SELECT primary_user FROM users_corp where user_id='".$user_id."'");

   $is_current_admin_champ_dets=$this->db->fetch_row("select is_local_champ,user_id from users_corp where user_id='".str_replace("_admin","",$usr->user)."'");

   if($is_current_admin_champ_dets)

   {

    $is_current_admin_champ = $is_current_admin_champ_dets["is_local_champ"];

    $is_current_admin_users_id= $is_current_admin_champ_dets["user_id"];

   }

 

   $div_dets= $this->db->fetch_array("select hierarchy_id from users_corp_admin_permissions where user_id='$user_id'");

 

  if($company_id == 27) { ?>

   <div class="menutitle" onclick="Javascript:location.href='choose_countries.php';">Choose Location</div>

  <? } else if($company_id == 17 && $pr_user == 0 && $is_current_admin_champ !="Y" && count($div_dets)>1) {?>

 

   <div class="menutitle" onclick="Javascript:location.href='choose_division.php';">Choose Division</div>

  <? }?>

  <? //$this->db->debug=true;

   if(!$pr_user){

    if($subtype == 'P' || $subtype == 'S')$adqry = " and b.functional_area ='Content'";   

    $hid = $_SESSION['hierarchy_id'];

    if($_SESSION['hierarchy_id']=="")$hid = 0;

    $funcarea=$this->db->fetch_array("SELECT DISTINCT b.functional_area FROM users_corp_permissions a, functional_links b WHERE a.user_id =".$user_id." AND a.sub_company_id ='".$sub_company_id."' and a.hierarchy_id ='".$hid."' AND a.link_id = b.link_id  ".$adqry." ORDER BY b.functional_area ");    

   }else{

    if($subtype=='P' || $subtype=='S')$adqry=" and functional_area ='Content'";   

    $funcarea=$this->db->fetch_array("SELECT DISTINCT functional_area FROM functional_links where corp_id='".$CORP->corp_id."'  ".$adqry." ORDER BY functional_area ");

   }   

   for($fa=0;$fa<count($funcarea);$fa++){

    $skip=false;

    if($subtype!='N' && $funcarea[$fa]["functional_area"]=='Payroll'){$skip=true;}else{$skip=false;}

    if($funcarea[$fa]["functional_area"] != "Choose Location" && $skip==false)

    {

 

     if(!$pr_user ){

      $flinks=$this->db->fetch_array("SELECT b.link_id, b.link_name, b.link_page, b.functional_area FROM users_corp_permissions a, functional_links b WHERE a.user_id =".$user_id." AND a.sub_company_id = '".$sub_company_id."' and a.hierarchy_id ='".$hid."' AND a.link_id = b.link_id and functional_area='".$funcarea[$fa]['functional_area']."' ORDER BY b.displayorder ");

     }else{

      $flinks=$this->db->fetch_array("SELECT link_id, link_name, link_page, functional_area FROM functional_links where functional_area='".$funcarea[$fa]['functional_area']."' and corp_id='".$CORP->corp_id."'  ORDER BY displayorder ");

     }

  

     if(count($flinks)<1){?>

     

      <div class="menutitle" onclick="Javascript:location.href='<?=$flinks[$fa]['link_page']?>';"><?=$funcarea[$fa]['functional_area']?></div>

     

     <? }else{?>

      <div class="menutitle" onclick="SwitchMenu('sub<?=$fa+1?>')"><?=$flinks[0]['functional_area']?></div>

      <span class="submenu" id="sub<?=$fa+1?>">

     

     <? for($fl=0;$fl<count($flinks);$fl++){

      $submenu_skip=false;

      if($company_id == 27 && $subtype!='N' && ($flinks[$fl]['link_name']=='Report Options' || $flinks[$fl]['link_name']=='Weekly Report')){$submenu_skip=true;}else{$submenu_skip=false;}

      if($submenu_skip==false){

     ?>

      <class="leftmenu">-</><a href="<?=$flinks[$fl]['link_page']?>" class="leftmenu"><?=$flinks[$fl]['link_name']?></a><br>

     <? 

     }

     // The fallowing block is added by venkat.. for displaying Manage content type lists..

       if ($flinks[$fl]['link_page'] == "content_type_list.php")

       {

       ?>

        <!--<class="leftmenu">-</><a href="content_type_list.php" class="leftmenu">Manage content links</a><br>-->

       <?php  

           $content_types = " SELECT cct.cct_id, cct.text_name, cct.display_name, cct.status FROM `company_content_types`  cct

              LEFT JOIN corp_demo_text cdt ON cct.text_name = cdt.text_name WHERE cct.company_id = '".$CORP->corp_id."' AND cdt.sub_company_id = 0 ";

           $rs_content_types=$this->db->fetch_array($content_types); 

          if(count($rs_content_types)>0)

          {

           for($k=0;$k<count($rs_content_types);$k++)

           {

       ?>

            <class="leftmenu">-</><a href="edit_content_type.php?st=edit&mode=sc&cct_id=<?=$rs_content_types[$k]["cct_id"]?>" class="leftmenu"><?=$rs_content_types[$k]["display_name"]?></a><br>

       <?php     

           }

          } 

       } 

      // venkat added code end here... 

 

      }

     ?>

      </span>

     <? }

    }

   

   }

   ?>

   <div class="menutitle" onclick="Javascript:location.href='/login.phtml?logout=yes';">Logout</div>

  </div>

  </div>

 

<? }

 

}

//<---  End of admin_obj class ---->

 



// Charity Profile class

 

class charity_profile{

  var $dbobj;

  var $userinfo;

  var $company_id;

  var $company;

  var $mod;

 

  function charity_profile(){

    $this->dbobj = new mysql_obj;

    $this->company = new corp_obj;

    $this->mod = new modules_obj;

    $this->userinfo = new user_obj;

    $this->company_id=$this->company->corp_id;

  }

 

  function get_vision($charity_id){

 $vision = $this->dbobj->fetch_scalar("select c_vision from charity_main where charity_id='".$charity_id."'");  

    return nl2br($vision);

  }

  

  function get_wishlist($charity_id){

 $wish_list = $this->dbobj->fetch_array("select c_alias,c_w1,c_w2,c_w3,c_w4,c_w5 from charity_main where charity_id='".$charity_id."'");

  $wishlists="";

 if (chop($wish_list[0]["c_w1"]) != "") {$wishlists.= '<img alt=""  src="images/star.gif">'. nl2br($wish_list[0]["c_w1"]).'<br><br>'; } 

    if (chop($wish_list[0]["c_w2"]) != "") {$wishlists.= '<img alt=""  src="images/star.gif">'. nl2br($wish_list[0]["c_w2"]).'<br><br>'; }    

 if (chop($wish_list[0]["c_w3"]) != "") {$wishlists.= '<img alt=""  src="images/star.gif">'. nl2br($wish_list[0]["c_w3"]).'<br><br>'; }       

 if (chop($wish_list[0]["c_w4"]) != "") {$wishlists.= '<img alt=""  src="images/star.gif">'. nl2br($wish_list[0]["c_w4"]).'<br><br>'; }    

 if (chop($wish_list[0]["c_w5"]) != "") {$wishlists.= '<img alt=""  src="images/star.gif">'. nl2br($wish_list[0]["c_w5"]).'<br><br>'; }     

  

   return $wishlists;

  }

 



  function get_description($charity_id){

 $desc = $this->dbobj->fetch_scalar("select c_desc from charity_main where charity_id='".$charity_id."'");  

   return nl2br($desc);

  

  }

  

  function get_projects($charity_id){

  

      $proj_list = $this->dbobj->fetch_array("select project_id,p_title,town,tpcode,left(p_desc,200) as p_desc from projects where charity_id = '".$charity_id."'");

   $prjs="";  

      for ($pi=0;$pi<count($proj_list);$pi++) {

       $prjs.= '<p>

       <span class="breadcrumb">

     <img alt=""  src="images/star.gif"><b><a href="show_proj_det.phtml?who='.$charity_id.'&proj_id='.$proj_list[$pi]["project_id"].'">'.$proj_list[$pi]["p_title"] .'</a> - </b>'. 

     $proj_list[$pi]["town"].'&nbsp;'.$proj_list[$pi]["tpcode"].'<br></span>

     <span class="breadcrumb">'. $proj_list[$pi]["p_desc"] .'&nbsp;<a href="show_proj_det.phtml?who='.$charity_id.'&proj_id='.$proj_list[$pi]["project_id"].'">Read more</a></span>';

          

   }

   return $prjs;

  }

  

  function get_programmes($charity_id){

 $desc = $this->dbobj->fetch_scalar("select c_pa from charity_main where charity_id='".$charity_id."'");  

   return nl2br($desc);

  

  }

  

  function get_achievements($charity_id){

 $the_data = $this->dbobj->fetch_array("select c_alias,c_ma1,c_ma2,c_ma3,c_ma4,c_ma5,c_regname,c_hmany_ppl,c_hmany_org from charity_main,charity_fin where charity_main.charity_id = charity_fin.charity_id and charity_main.charity_id='".$charity_id."'");

 // KP_05

 $desc='<br>';

     if (chop($the_data[0]["c_ma1"]) != "") { 

      $desc.='<img alt=""  src="images/star.gif">'. nl2br($the_data[0]["c_ma1"]).'<br><br>';

     }

     if (chop($the_data[0]["c_ma2"]) != "") { 

      $desc.='<img alt=""  src="images/star.gif">'.nl2br($the_data[0]["c_ma2"]).'<br><br>';

  }  

  if (chop($the_data[0]["c_ma3"]) != "") { 

   $desc.='<img alt=""  src="images/star.gif">'.nl2br($the_data[0]["c_ma3"]).'<br><br>';

  } 

  if (chop($the_data[0]["c_ma4"]) != "") { 

   $desc.='<img alt=""  src="images/star.gif">'.nl2br($the_data[0]["c_ma4"]).'<br><br>';

  } 

  if (chop($the_data[0]["c_ma5"]) != "") { 

   $desc.='<img alt=""  src="images/star.gif">'. nl2br($the_data[0]["c_ma5"]).'<br><br>';

  } 

  $desc.='<br>';

   if ($the_data[0]["c_hmany_ppl"] > 0) { 

    $desc.='<b><img alt=""  src="images/star.gif">'. $the_data[0]["c_hmany_ppl"] .' 

  people benefit</b> from '.char_name_var($the_data[0]["c_regname"],$the_data[0]["c_alias"]).' every year.<br>';

   } 

  if ($the_data[0]["c_hmany_org"] > 0) { 

   $desc.='<br><b><img alt=""  src="images/star.gif">'. $the_data[0]["c_hmany_org"].' organisations benefit </b>from '.char_name_var($the_data[0]["c_regname"],$the_data[0]["c_alias"]) .' 

  every year.';

 } 

 $desc.='<br>';

 

   //return $desc;

 return $desc;

 // KP_05

  

  }

 

  function get_donations($charity_id){

 global $ucorp;

 $the_data = $this->dbobj->fetch_array("select c_diff_n1,c_diff_n2,c_diff_n3,c_diff_n4,c_diff_n5,c_diff_t1,c_diff_t2,c_diff_t3,c_diff_t4,c_diff_t5 

 from charity_main,charity_fin where charity_main.charity_id = charity_fin.charity_id and charity_main.charity_id='".$charity_id."'");

 // KP_05

 $tot=$the_data[0]["c_diff_n1"]+$the_data[0]["c_diff_n2"]+$the_data[0]["c_diff_n3"]+$the_data[0]["c_diff_n4"]+$the_data[0]["c_diff_n5"];

   // KP_05

   if ($tot > 0 ) {

  $dontn='<table summary="" border="0" cellspacing="0" cellpadding="4" width="100%">

  <tr>

    <td>

            <br>

              <table summary="" width="90%" border="0" cellspacing="0" cellpadding="1">';

     // KP_05

    

    if ($the_data[0]["c_diff_n1"] > 0) {

                $dontn.='<tr> 

                  <td width="20%" valign="top" align="right"><b>'.number_format(cnv_numb($the_data[0]["c_diff_n1"],"no",2,'hide')).$ucorp['currency_symbol'].'</b></td>

                  <td width="80%">'.htmlentities($the_data[0]["c_diff_t1"]).'</td>

                </tr>';

         } 

         if ($the_data[0]["c_diff_n2"] > 0) {

                $dontn.='<tr> 

                  <td width="20%" valign="top" align="right"><b>'.number_format(cnv_numb($the_data[0]["c_diff_n2"],"no",2,'hide')).$ucorp['currency_symbol'].' </b></td>

                  <td width="80%">'.htmlentities($the_data[0]["c_diff_t2"]).'</td>

                </tr>';

         } 

         if ($the_data[0]["c_diff_n3"] > 0) {

                $dontn.='<tr> 

                  <td width="20%" valign="top" align="right"><b>'.number_format(cnv_numb($the_data[0]["c_diff_n3"],"no",2,'hide')).$ucorp['currency_symbol'].'</b></td>

                  <td width="80%">'.htmlentities($the_data[0]["c_diff_t3"]).'</td>

                </tr>';

         }

     

         if ($the_data[0]["c_diff_n4"] > 0) {

                $dontn.='<tr> 

                  <td width="20%" valign="top" align="right"><b>'.number_format(cnv_numb($the_data[0]["c_diff_n4"],"no",2,'hide')).$ucorp['currency_symbol'].'</b></td>

                  <td width="80%">'.htmlentities($the_data[0]["c_diff_t4"]).'</td>

                </tr>';

         }

     

         if ($the_data[0]["c_diff_n5"] > 0) {

                $dontn.='<tr> 

                  <td width="20%" valign="top" align="right"><b>'.number_format(cnv_numb($the_data[0]["c_diff_n5"],"no",2,'hide')).$ucorp['currency_symbol'].'</b></td>

                  <td width="80%">'.htmlentities($the_data[0]["c_diff_t5"]).'</td>

                </tr>';

         } 

    // KP_05

              $dontn.='</table>

            </td>

        </tr>

      </table>';

      } 

 return $dontn;

  

  }

 

 

  function get_name($charity_id){

  

   $the_data = $this->dbobj->fetch_array("select c_alias,c_regname from charity_main where charity_id='".$charity_id."'");  

  

   if (chop($the_data[0]["c_alias"]) != "") { 

  return '<span class="breadcrumb"><b>'. $the_data[0]["c_alias"] .'</b>  </span><br><span class="breadcrumb"><i>'. $the_data[0]["c_regname"] .'</i></span><br>'; 

 } else { 

  return '<b>'.$the_data[0]["c_regname"].'</b><BR>';

 }

  }

  

  function get_number($charity_id){

     $the_data = $this->dbobj->fetch_array("select c_newtype,assoc_fld,c_regnumber from charity_main where charity_id='".$charity_id."'");  

  if ($the_data[0]["c_newtype"] == '0') {

   return "Unregistered organisation affiliated with ".$the_data[0]["assoc_fld"];

  } else {

   return $the_data[0]["c_regnumber"];

  } 

  }

  

  function get_address($charity_id){

    $the_data = $this->dbobj->fetch_array("select c_adr,c_city,c_pcode from charity_main where charity_id='".$charity_id."'");  

 return '<p>'.nl2br($the_data[0]["c_adr"]).'<br>'.$the_data[0]["c_city"] .'<br>'. $the_data[0]["c_pcode"] .'</p>';

  }

  

  function get_phone($charity_id){

    $phoneno = $this->dbobj->fetch_scalar("select c_tel2 from charity_main where charity_id='".$charity_id."'");  

 return $phoneno;

  }

  

  function get_url($charity_id){

    $web = $this->dbobj->fetch_scalar("select c_web from charity_main where charity_id='".$charity_id."'");  

 return $web;

  }

  function get_logo($charity_id){

 

 $rs_pic_path = $this->dbobj->fetch_scalar("select c_logo_path from charity_main where charity_id = '".$charity_id."'");

 preg_match("/.*\/logos\/(.*?)$/", $rs_pic_path, $matched);

 $pic_path = $matched[1];

 if (chop($pic_path)!="" and file_exists($PHP_SELF."logos/".$pic_path) and filesize($PHP_SELF."logos/".$pic_path)>0) {

   $imageInfo = getimagesize($PHP_SELF."logos/".$pic_path); 

   if ($imageInfo[1]>100) {

    $pc = 100 / $imageInfo[1];

    $imageInfo[0] = (int)$imageInfo[0]*$pc;

    $imageInfo[1] = (int)$imageInfo[1]*$pc;

   }

   if ($imageInfo[0]>130) {

    $pc = 130 / $imageInfo[0];

    $imageInfo[0] = (int)$imageInfo[0]*$pc;

    $imageInfo[1] = (int)$imageInfo[1]*$pc;

   }

 

   $img= "<img alt=\"\"  src=\"".$PHP_SELF."logos/".$pic_path."\" height=\"".$imageInfo[1]."\" width=\"".$imageInfo[0]."\" border=\"0\">";

    }else{

   $img="";

 }

 return $img;

  }  

   

} 

 

//End of charity profile class

 



function pollResultCount($rat_id, $voting_for_id=0, $voting_for_id2=0)

 {

  $sql_obj = new mysql_obj;

  $selectPollResultCount = "SELECT count(*) as noofvotes FROM company_ratings_values WHERE rating_id = '".$rat_id."' and voting_for_id ='".$voting_for_id."' and voting_for_id2 ='".$voting_for_id2."'";   

  print "<!--DD $selectPollResultCount -->"; 

  //$noofvotes=$sql_obj->fetch_scalar($selectPollResultCount);

  //return $noofvotes;

  $noofvotes=$sql_obj->fetch_row($selectPollResultCount);

  echo "<!--NOOF $noofvotes[0] -->";

  return $noofvotes[0];

 }

 

function pollResults($rat_id, $voting_for_id=0, $voting_for_id2=0)

{

 $sql_obj = new mysql_obj;

 $selectPollResults = "SELECT  calc_value, the_id

        FROM (

        `company_ratings_values` crv

        LEFT JOIN company_ratings_answers cra ON crv.rating_id = cra.rating_id

        )

        WHERE crv.`rating_id` = '".$rat_id."' AND crv.voting_for_id = '".$voting_for_id."' AND crv.voting_for_id2 = '".$voting_for_id2."' AND crv.`answer_id` = cra.`answer_id` ";   

 $votesResults=$sql_obj->fetch_array($selectPollResults);

 if(count($votesResults)>0)

 {

  for($i=0;$i<count($votesResults);$i++)

  {

   $cnt_votes+=$votesResults[$i]["calc_value"];

  }

  return  round($cnt_votes/($i),1);

 }

 return 0;

}

 

function get_voting($question_id, $headbg='', $headfont='', $answers_display='H', $voting_for_id='0', $voting_for_id2='0') {

   global $MOD,$ucorp,$usr;

  $sql_obj = new mysql_obj;

 

 $question_arr = $sql_obj->fetch_array("SELECT question_text,display_from,display_to,display_public,display_ratings   FROM company_ratings_main WHERE rating_id = '" . $question_id . "' and status='Y' ");

 

 if(count($question_arr)==0)

 {

  return "";

 }

 

 if($question_arr[0]["display_public"] =="N" and $usr->user_id < 1000)

 {

  return "";

 }

 

 if($question_arr[0]["display_from"] != "0000-00-00")

 {

  if(date("Y-m-d") < date("Y-m-d",strtotime($question_arr[0]["display_from"])) )

  {

   return "";

  }

 }

 

 if($question_arr[0]["display_to"] != "0000-00-00")

 {

  if(date("Y-m-d") > date("Y-m-d",strtotime($question_arr[0]["display_to"])) )

  {

   return "";

  }

 }

 



 $question=$question_arr[0]["question_text"];

 



  if ($headbg == '')

   $headbg = $MOD->all_hex["main"]["subheadingbgcolor"];

  

  if ($headfont == '')

   $headfont = $MOD->all_hex["main"]["subheadingfontcolor"]; 

     

   $vote_template = '<script language="javascript">

  function doThis(id)

  {

   var frm = eval("document.frmpoll"+id)

   

   var j = -1;

   for( i=0; i < frm.rat_answer.length; i++ )

   {

    if( frm.rat_answer[i].checked )

    {

     j = i;

    }

   }

   

   if (j == -1) 

   { 

    alert("Please select option!!") 

    return false;

   } 

   else

   {

    frm.target = "pollresults";

    window.open(\'\',\'pollresults\',\'resizable=1,scrollbars=1,width=510,height=400\');  

   } 

  }

</script><table width="100%" border="1" cellspacing="0" cellpadding="0" summary="">

  <tr>

    <td>

 <form name="frmpoll{--HIDDENID--}" method="POST" action="/poll_results.php" onsubmit="return doThis({--HIDDENID--});">

 <input type="hidden" name="voting_for_id" value="' . $voting_for_id . '"/>

 <input type="hidden" name="voting_for_id2" value="' . $voting_for_id2 . '"/>

 <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0" summary="">

            <tr bgcolor="' . $headbg . '">

     <td><font color="' . $headfont . '"> 

        {--QUESTION--}<input type="hidden" name="who" value="{--HIDDENID--}">

     </font></td>

   </tr>

   {--AVGVOTRESULT--}

                <tr>

                  <td nowrap>

                    {--RADIOBUTTONS--}  

                    </td>  

                 

                </tr>

     <tr>

                  <td height="35" align="center"><input type="submit" name="Submit" value="Vote Now"></td>

          </tr>

  </table>

 </form></td>  

  </tr>

</table>'; 

  

 

 $options = '<table width="100%"  border="0" cellspacing="0" cellpadding="2">';

  $SqlPollOptions = " SELECT cra.* from company_ratings_answers cra

         where cra.rating_id = '" . $question_id . "' order by cra.answer_id ";  

  $resultPollOptions = $sql_obj->fetch_array($SqlPollOptions);

  if ($answers_display == "H")

  {

   $cols = count($resultPollOptions);

   $rows = 1;

   $incr=0;

   for($row_count=0;$row_count < $rows; $row_count++)

   {

    $options .='<tr>';

    for($col_count=0; $col_count < $cols; $col_count++)

    {

     $options .= '<td align="right"><input type="radio" name="rat_answer" value="' . $resultPollOptions[$incr][answer_id] . '"></td>';

     $options .= '<td valign="middle">';

     if ($resultPollOptions[$incr][display_image] != "")

     {

      $options .= '<img src="images/' . $resultPollOptions[$incr][display_image] . '" border="0"> ';

     }

     if ($resultPollOptions[$incr][display_label] != "")

     { 

      $options .= stripslashes($resultPollOptions[$incr][display_label]);

     }  

     $options .= '</td>';

     $incr++;

    }

    $options .='</tr>'; 

   }   

  }else

  {

   $rows = count($resultPollOptions);

 



   for($row_count=0;$row_count < $rows; $row_count++)

   {

    $options .='<tr>';

    $options .= '<td valign="top" width="1%"><input type="radio" name="rat_answer" value="' . $resultPollOptions[$row_count][answer_id] . '"></td>';

    $options .= '<td valign="middle" align="left">';

    if ($resultPollOptions[$row_count][display_image] != "")

    {

     $options .= '<img src="images/' . $resultPollOptions[$row_count][display_image] . '" border="0"> ';

    }

    if ($resultPollOptions[$row_count][display_label] != "")

    { 

     $options .= stripslashes($resultPollOptions[$row_count][display_label]);

    }  

    $options .= '</td>';

    $options .='</tr>';

   }

 



  }

  $options .= '</table>';

 

 $vot_avg_result="";

 

 if($question_arr[0]["display_ratings"]=="Y")

 { 

  $vot_avg_result = pollResults($question_id,$voting_for_id,$voting_for_id2);

  if($vot_avg_result)

  {

   //$vot_avg_result="<TR><TD><B>Average Vote Value is ".$vot_avg_result."</B><TD><TR>";

   $tot_votes=pollResultCount($question_id,$voting_for_id,$voting_for_id2);

   $vot_avg_result="<TR><TD align='center'><B>Rating : ".$vot_avg_result." (#".$tot_votes.")</B><TD><TR>";

  }

  else 

  {

   $vot_avg_result="";  

  } 

 }

 

 $vote_template = str_replace("{--QUESTION--}", $question, $vote_template);

 $vote_template = str_replace("{--HIDDENID--}", $question_id, $vote_template);

 $vote_template = str_replace("{--RADIOBUTTONS--}", $options, $vote_template);

 $vote_template = str_replace("{--AVGVOTRESULT--}", $vot_avg_result, $vote_template);

 

 return $vote_template; 

  }

 

 

 

//JS_01 - Start

function get_page_details($page_name, $company_id, $sub_company_id=0, $language_id =0)

{

 $sql_obj = new mysql_obj;

 $rec_details = $sql_obj->fetch_array("SELECT title_text, title_intro_text, list_item_template from corp_page_content WHERE company_id='" . $company_id . "' and page_name='" . $page_name . "' and language_id='" . $language_id . "' and sub_company_id='" . $sub_company_id . "'");

 //JS_02 - Start

 $rec_detailsg = $sql_obj->fetch_array("SELECT title_text, title_intro_text, list_item_template from corp_page_content WHERE company_id='" . $company_id . "' and page_name='" . $page_name . "' and language_id='" . $language_id . "' ");

 

 if($rec_details[0]["title_text"])

  $page_details["title_text"] = $rec_details[0]["title_text"];

 elseif($rec_detailsg[0]["title_text"])

  $page_details["title_text"] = $rec_detailsg[0]["title_text"];

 else

  $page_details["title_text"] = "";

 

 if($rec_details[0]["title_intro_text"])

  $page_details["title_intro_text"] = $rec_details[0]["title_intro_text"];

 elseif($rec_detailsg[0]["title_intro_text"])

  $page_details["title_intro_text"] = $rec_detailsg[0]["title_intro_text"];

 else

  $page_details["title_intro_text"] = "";

 

 if($rec_details[0]["list_item_template"])

  $page_details["list_item_template"] = $rec_details[0]["list_item_template"];

 elseif($rec_detailsg[0]["list_item_template"])

  $page_details["list_item_template"] = $rec_detailsg[0]["list_item_template"];

 else

  $page_details["list_item_template"] = "";

 //JS_02 - end

 

 return $page_details;

}

//JS_01 -  End

 

// KP_03

 

function checkNINO($ssn) {

 if(strlen($ssn) == 9)

 {

  // remove spaces and uppercase it

  $ssn = strtoupper(str_replace(' ', '', $ssn));

  $preg = "/^[A-CEGHJ-NOPR-TW-Z][A-CEGHJ-NPR-TW-Z][0-9]{6}[ABCD]?$/";

  if (preg_match($preg, $ssn)) {

   $bad_prefixes = array('GB', 'BG', 'NK', 'KN', 'TN', 'NT', 'ZZ');

   return (array_search(substr($ssn, 0, 2), $bad_prefixes) === false);

  }

 }

  return false;

}

 

// KP_03

 



function file_exists_db($file_name,$foldername )

{

 $sql_obj = new mysql_obj;

 

 $res=$sql_obj->fetch_array("select * from allimages where folder_name = '$foldername' and bin_name ='$file_name'");

 if($res)

 {

 return $res[0]["bin_size"];

 }else

 {

 return 0;

 }

}

 

function validate_weburl($link)

{

 $str=true;

 if(!preg_match("/^(http|https|ftp)+[:\/\/]+[A-Za-z0-9\.\/%&=\?\-_]+$/i",$link))   

  $str = false;

 return $str;

}

 



class draw_table

{

 //var $MOD;

    var $dbobj;

    var $userinfo;

 var $hdfontcolor;

 var $hdcolor;

 var $hdclass;

 var $dtcolor;

 var $dtclass;

 var $linecolor;

 var $tot=array();

 var $altcolor;

 var $altcolor1;

 var $altcolor2;

 var $alltot=array();

 

 function draw_table(){

   global $MOD;

      $this->dbobj = new mysql_obj;

   $this->hdfontcolor="#FFFFFF" ;

   $this->hdcolor="#".$MOD->all_hex["mod_spreadsheet"]["spreadbg"];

   $this->hdclass="bodyfontbgheading";

   $this->dtcolor="#FFFFFF";

   $this->dtclass="texts";

   $this->linecolor="#".$MOD->all_hex["mod_spreadsheet"]["cellbrd"];

   $this->altcolor=true;

   $this->altcolor1="#".$MOD->all_hex["mod_spreadsheet"]["cellalt1"];

   $this->altcolor2="#".$MOD->all_hex["mod_spreadsheet"]["cellalt2"];

 }

 

 function get_pages($myrec_count, $myperpage, $myoffset)

 {

  $varRecLimit = $myperpage;

  $varRecOffset = $myoffset;

  

  $varNoofRecords = $myrec_count;

  

  if($varNoofRecords >0)

  {

   $varNoofPages = ceil($varNoofRecords / $varRecLimit);

   $varCurrentPage = floor($varRecOffset / $varRecLimit);

   $varCurrentPage++;

   if($varCurrentPage <= 5 )

   {

    $varStartPage = 1;

    $varEndPage = 10;

   }

   else

   {

    $varStartPage = $varCurrentPage - 5 ;

    $varEndPage = $varStartPage + 9;

   }

   if($varEndPage >= $varNoofPages)

   {

    $varEndPage = $varNoofPages;

    $varStartPage = $varEndPage - 9;

    if($varStartPage < 1){$varStartPage = 1;}

   }

   $varStartPoint = ($varCurrentPage * $varRecLimit) - $varRecLimit +1;

   $varEndPoint = $varStartPoint + $varRecLimit - 1;

   if($varEndPoint > $varNoofRecords){$varEndPoint = $varNoofRecords;}

        

          

   $varPages = "<table border=0 cellpadding=0 cellspacing=0><tr><td height=\"20\" class=\"toplinks\">";

        

   if($varCurrentPage > 1)

   {

    $varRPtr = $varCurrentPage -1;

    if($varRPtr > 1) $varhtmlpage = $mypagename. ($varRPtr-1) . "." . $mypageext;

    else $varhtmlpage = $mypagename ;

    

    $varPages .= "<a href=\"" . basename($PHP_SELF)."?page=$varhtmlpage&".create_url(array('page','msg')) . "\" class=links><font class=\"\" >< Previous</font></a><font class=\"toplinks\">&nbsp;|&nbsp;";

   }

          

   for($i = $varStartPage; $i<=$varEndPage; $i++)

   {

    //$varRPtr = ($i * $varRecLimit) - $varRecLimit;

        

    if($i != $varStartPage){$varPages .= "&nbsp;&nbsp;";}

           

    if($i == $varCurrentPage)

    {

     $varPages .= "<font class = 'toplinks'>$i</font>";

    } 

    else

    {

     if($i > 1) $varhtmlpage = $mypagename . ($i-1) ;

     else $varhtmlpage = $mypagename ;

     $varPages .= "<a href=\"" . basename($PHP_SELF)."?page=$varhtmlpage&".create_url(array('page','msg')) . "\" class=links><font class=\"\">$i</font></a>";

    }

   }

          

   if($varCurrentPage < $varNoofPages)

   {

    $varRPtr = $varCurrentPage;

    $varhtmlpage = $mypagename . $varRPtr ;

 

    $varPages .= "<font class=\"toplinks\">&nbsp;|&nbsp;</font><a class=links href=\"" . basename($PHP_SELF)."?page=$varhtmlpage&".create_url(array('page','msg')) . "\"><font class=\"\">Next ></font></a>";

   }

   $varPages .= " </td></tr></table>";

   

   return $varPages;       

  }         

 

 } 

 

 function draw_table_data($qry,$hdarray,$noofrec=10,$funclst=array(),$totarr=array(),$pref='N',$sortarr=array()){

  

  if($_GET['srtord'] != "" && is_array($sortarr) && count($sortarr) > 0){

   if ($_GET['srtord']=='desc') {

    $orderby = " order by ".$sortarr[$_REQUEST['sortcol']]." desc ";

   } else if ($_GET['srtord']=='asc') { 

    $orderby = " order by ".$sortarr[$_REQUEST['sortcol']]." asc ";

   }

  }

  

  $qry = $qry . $orderby;

 

  $rs = $this->dbobj->query($qry);

  $total_rows = mysql_num_rows($rs);

  

  //get the user_prefernces 

  if(isset($_SESSION['prefarray']) && $pref=='Y'){

   $ins=0;

   $fields_arr=$_SESSION['prefarray'];

   foreach ($hdarray as $varname => $varvalue) {

    if(in_array($varname,$fields_arr)){

     $newarray[$fields_arr[$ins]]=$hdarray[$fields_arr[$ins]];

     $ins++;

    }else{

     $newarray[$varname]=$varvalue;

    }

   }

   $hdarray=$newarray;

   if(isset($_SESSION['prefrpp']))$noofrec=$_SESSION['prefrpp'];

  }else{

   session_unregister('prefarray');

   session_unregister('prefrpp');

  }

  

  //user preferences

 

  //create sort list

  if(is_array($sortarr) && count($sortarr) > 0 && $total_rows > 0){

   foreach ($hdarray as $varname => $varvalue) {

    if (in_array($varname, $sortarr)) {

     $keyno = array_search($varname, $sortarr); 

     if ($_GET['srtord']=='desc' && $varname == $sortarr[$_REQUEST['sortcol']]) {

      $sortstr[$varname] ="<a href='".basename($PHP_SELF)."?srtord=asc&sortcol=".$keyno. "&".create_url(array('srtord','sortcol'))."'><img src='images/btnSortUp1.gif' border='0'></a> ";

     } else if ($_GET['srtord']=='asc' && $varname == $sortarr[$_REQUEST['sortcol']]) { 

      $sortstr[$varname] = "<a href='".basename($PHP_SELF)."?srtord=desc&sortcol=".$keyno."&".create_url(array('srtord','sortcol'))."'><img src='images/btnSortDown1.gif' border='0'></a>";

     } else {

      $sortstr[$varname] = "<a href='".basename($PHP_SELF)."?srtord=desc&sortcol=".$keyno. "&".create_url(array('srtord','sortcol'))."'><img src='images/btnSortable1.gif' border='0'></a>" ; 

     }

    }else{

     $sortstr[$varname] = "";

    }

   }  

  }

  //sortlist

  

  $perpage = $noofrec;

  if($_REQUEST['page']=='all')$perpage = $total_rows;

  $page=addslashes($_REQUEST['page']);

  if($total_rows)$num_pages = ceil($total_rows/$perpage);

  

  if($page == ""){

   $start = 0;

  }else{

   $start = $page * $perpage ;

  }

  

  $records = ($page +1 ) * $perpage;

  if($records > $total_rows ) { $records = $total_rows; }

  $sql_paging = $qry." limit $start , $perpage ";

  $paging_rs = $this->dbobj->query($sql_paging);

  $paging_num = mysql_num_rows($paging_rs); 

  

  foreach ($hdarray as $varname => $varvalue) {

   $param=explode(",",$varvalue);

   $cols[$varname]['label']=$param[0];

   $cols[$varname]['width']=isset($param[1])?" width=".$param[1]:"";

   $cols[$varname]['align']=isset($param[2])?" align=".$param[2]:"";

   $cols[$varname]['class']=isset($param[3])?" class=".$param[3]:"";

   $cols[$varname]['prefix']=isset($param[4])?$param[4]:"";

   $cols[$varname]['postfix']=isset($param[5])?$param[5]:"";

   $cols[$varname]['attr']=isset($param[6])?$param[6]:"";

  }

  

?>

  <table summary="" width="100%" border="0" cellspacing="2" cellpadding="2">

    <tr> 

   <td><table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF">

     <tr>

       <td class="bodyfontbgrep"><? if($records>0){?>Showing <? if($records>0){print ($perpage * $page) +1 ; }else{ print "0 ";}?>-<?=$records?> of <?=$total_rows?>&nbsp; <?php if($total_rows > $perpage ){ ?>(<a href="<?=$_SERVER[PHP_SELF].'?page=all&'.create_url(array('page','msg'))?>">show all</a>)<? }?><?}?></td> 

       <?php if($total_rows > $perpage ){ ?>

       <td nowrap align="right" class=""><?=$this->get_pages($total_rows,$noofrec, $start)?></td>

       <?php } ?>

     </tr>

    </table>

    <table summary="" width="100%" border="0" cellspacing="0" cellpadding="0"  bgcolor="#006633">

      <tr> 

     <td> <table summary="" width="100%" border="0" cellpadding="3" cellspacing="1">

      <tr bgcolor="#006633">

      <? foreach ($hdarray as $varname => $varvalue) {?> 

        <td nowrap height="20" <?=$cols[$varname]['width'].$cols[$varname]['align']?> class="<?=$this->hdclass?>" <?=$cols[$varname]['attr']?> ><b><font color="<?=$this->hdfontcolor;?>"><?=$cols[$varname]['label']?></font></b>&nbsp;<?=$sortstr[$varname]?></td>

      <? }?>

      </tr>

     <?php

     if($paging_num > 0){

      $paging_rec = $this->dbobj->fetch_array($sql_paging,MYSQL_ASSOC);

      $all_rec = $this->dbobj->fetch_array($qry,MYSQL_ASSOC);

      

      //Total the fields given in the totals array

      $this->page_total($totarr,$paging_rec);

      $this->all_pages_total($totarr,$all_rec);

 

      $bgcolor = $this->altcolor2;

      for($i=0;$i< count($paging_rec);$i++){ 

           if($this->altcolor){

        if ($bgcolor == $this->altcolor2) {

         $bgcolor = $this->altcolor1;

        } else {

         $bgcolor = $this->altcolor2;

        }      

      ?>

      <tr bgcolor="<?=$bgcolor?>"> 

        <? foreach ($hdarray as $varname => $varvalue) {

          $prefix=$cols[$varname]['prefix'];

          $postfix=$cols[$varname]['postfix'];

          if (array_key_exists($varname, $funclst)) {$prefix='';$postfix='';}

        ?> 

        <td nowrap height="22" <?=$cols[$varname]['width'].$cols[$varname]['align']?> class="<?=$this->dtclass?>" <?=$cols[$varname]['attr']?> ><?=$prefix?><?=stripslashes($this->display_field($paging_rec[$i],$varname,$funclst))?><?=$postfix?></td>

        <? }?>

      </tr>

      <? }else{?>

      <tr bgcolor="<?=$this->dtcolor?>"> 

        <? foreach ($hdarray as $varname => $varvalue) {

      //print_r($paging_rec[$i]);

          $prefix=$cols[$varname]['prefix'];

          $postfix=$cols[$varname]['postfix'];

          if (array_key_exists($varname, $funclst)) {$prefix='';$postfix='';}

        ?> 

        <td nowrap height="22"<?=$cols[$varname]['width'].$cols[$varname]['align']?> class="<?=$this->dtclass?>" <?=$cols[$varname]['attr']?> ><?=$prefix?><?=stripslashes($this->display_field($paging_rec[$i],$varname,$funclst,$totarr))?><?=$postfix?></td>

        <? }?>

      </tr>

      <? }?>

      <?php }?>

      <!-- <tr bgcolor="<?=$this->hdcolor?>">

       <td colspan="<?=count($hdarray)?>" height="5"></td>

      </tr> -->

      <? if(count($this->tot)){?>

      <tr bgcolor="<?=$this->dtcolor?>"> 

       <? $cs=false;$cl=0;$disp=0;

         foreach ($hdarray as $varname => $varvalue) {

          if (array_key_exists($varname, $this->tot))$cs=true;

        if($cs && $disp !=1) {?>

         <td class="<?=$this->dtclass?>" colspan="<?=$cl?>" align="right"><? if($total_rows > $perpage){?>This page (Sub Total)<? }else{?>This page (Total)  <? }?></td>        

        <? $disp=1;

        }?>

       <? if($cs && $disp == 1){?>

        <td height="20"<?=$cols[$varname]['width'].$cols[$varname]['align']?> class="<?=$this->dtclass?>"><? if (array_key_exists($varname, $this->tot)) {echo $cols[$varname]['prefix'].number_format($this->tot[$varname], 2,".","").$cols[$varname]['postfix'];}else{echo '&nbsp;';}?></td>

        <?  }?>

        <? $cl++;

        }?>

      </tr>      

      <?}?>

      <? 

      if(count($this->alltot) && $total_rows > $perpage){

      ?>

      <tr bgcolor="<?=$this->dtcolor?>"> 

       <? $cs=false;$cl=0;$disp=0;

         foreach ($hdarray as $varname => $varvalue) {

          if (array_key_exists($varname, $this->alltot))$cs=true;

        if($cs && $disp !=1) {?>

         <td class="<?=$this->dtclass?>" colspan="<?=$cl?>" align="right">All pages  (Total)</td>        

        <? $disp=1;

        }?>

       <? if($cs && $disp == 1){?>

        <td height="20"<?=$cols[$varname]['width'].$cols[$varname]['align']?> class="<?=$this->dtclass?>"><? if (array_key_exists($varname, $this->alltot)) {echo $cols[$varname]['prefix'].number_format($this->alltot[$varname], 2,".","").$cols[$varname]['postfix'];}else{echo '&nbsp;';}?></td>

        <?  }?>

        <? $cl++;

        }?>

      </tr>

      <? }?>        

     <? }else{?>

      <tr bgcolor="<?=$this->dtcolor?>"> 

        <td colspan="<?=count($hdarray)?>" class="bodyfontbgrep" height="30"><div align="center">No results found</DIV></td>

      </tr>

     <?php } ?>

       </table>

     <?php if($total_rows > $perpage ){ ?>

       <table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF">

      <tr> 

        <td width="25%" nowrap align="center" class="<?=$this->dtclass?>"> 

       <font size="-1"><?=$this->get_pages($total_rows,$noofrec, $start)?></font></td>

      </tr>

       </table>

     <?php } ?>

        </td>

      </tr>

    </table>

    </td>

    </tr>

  </table>

<?  

 }

 

 

 function export2excel($qry,$hdarray,$noofrec=10,$funclst=array(),$totarr=array(),$pref='N'){

  global $title;

  $rs = $this->dbobj->query($qry);

  $total_rows = mysql_num_rows($rs);

  

  $alplist=array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");

  //get the user_prefernces 

  if(isset($_SESSION['prefarray']) && $pref=='Y'){

   $ins=0;

   $fields_arr=$_SESSION['prefarray'];

   foreach ($hdarray as $varname => $varvalue) {

    if(in_array($varname,$fields_arr)){

     $newarray[$fields_arr[$ins]]=$hdarray[$fields_arr[$ins]];

     $ins++;

    }else{

     $newarray[$varname]=$varvalue;

    }

   }

   $hdarray=$newarray;

   if(isset($_SESSION['prefrpp']))$noofrec=$_SESSION['prefrpp'];

  }

  

  //user preferences

 

  $perpage = $total_rows;

  $page=addslashes($_REQUEST['page']);

  if($total_rows)$num_pages = ceil($total_rows/$perpage);

  

  if($page == ""){

   $start = 0;

  }else{

   $start = $page * $perpage ;

  }

  

  $records = ($page +1 ) * $perpage;

  if($records > $total_rows ) { $records = $total_rows; }

  $sql_paging = $qry." limit $start , $perpage ";

  $paging_rs = $this->dbobj->query($sql_paging);

  $paging_num = mysql_num_rows($paging_rs); 

  

  foreach ($hdarray as $varname => $varvalue) {

   $param=explode(",",$varvalue);

   $cols[$varname]['label']=$param[0];

   $cols[$varname]['width']=isset($param[1])?" width=".$param[1]:"";

   $cols[$varname]['align']=isset($param[2])?" align=".$param[2]:"";

   $cols[$varname]['class']=isset($param[3])?" class=".$param[3]:"";

   $cols[$varname]['prefix']=isset($param[4])?$param[4]:"";

   $cols[$varname]['postfix']=isset($param[5])?$param[5]:"";

  }

  

?>

  <table summary="" width="100%" border="1" cellspacing="2" cellpadding="2">

    <tr> 

   <td>

    <table summary="" width="100%" border="1" cellspacing="0" cellpadding="0"  bgcolor="">

      <tr> 

     <td> <table summary="" width="100%" border="1" cellpadding="3" cellspacing="1">

      <tr>

        <td height="50" align="center" bgcolor="#FFFFFF" style="vertical-align:middle" colspan="<?php echo count($hdarray);?>"><h3><?=$title?></h3></td>

    </tr>



    <tr bgcolor="#000000">

      <? foreach ($hdarray as $varname => $varvalue) {?> 

        <td nowrap height="22"<?=$cols[$varname]['width'].$cols[$varname]['align']?> class="<?=$this->hdclass?>"><b><font color="<?=$this->hdfontcolor;?>"><?=str_replace("<br>","",$cols[$varname]['label'])?></font></b></td>

      <? }?>

      </tr>

     <?php

     if($paging_num > 0){

      $paging_rec = $this->dbobj->fetch_array($sql_paging,MYSQL_ASSOC);

      $all_rec = $this->dbobj->fetch_array($qry,MYSQL_ASSOC);

      $bgcolor = $this->altcolor2;

      

      for($i=0;$i< count($paging_rec);$i++){ 

           if($this->altcolor){

        if ($bgcolor == $this->altcolor2) {

         $bgcolor = $this->altcolor1;

        } else {

         $bgcolor = $this->altcolor2;

        }      

      ?>

      <tr bgcolor="<?=$bgcolor?>"> 

        <? foreach ($hdarray as $varname => $varvalue) {

          $prefix=$cols[$varname]['prefix'];

          $postfix=$cols[$varname]['postfix'];

          $cl="class=\"".$this->dtclass."\"";

          if (in_array($varname, $totarr)) {$cl='style="mso-style-parent:style0; mso-number-format:Fixed;background:white;mso-pattern:auto none; white-space:normal;"';}

 

        ?> 

        <td nowrap height="20"<?=$cols[$varname]['width'].$cols[$varname]['align']?> <?=$cl?>><?=$prefix?><?=str_replace("<br>","",stripslashes($this->display_field($paging_rec[$i],$varname,$funclst)))?><?=$postfix?></td>

        <? }?>

      </tr>

      <? }else{?>

      <tr bgcolor="<?=$this->dtcolor?>"> 

        <? foreach ($hdarray as $varname => $varvalue) {

          $prefix=$cols[$varname]['prefix'];

          $postfix=$cols[$varname]['postfix'];

          if (array_key_exists($varname, $funclst)) {$prefix='';$postfix='';}

          $cl="class=\"".$this->dtclass."\"";

          if (in_array($varname, $totarr)) {$cl='style="mso-style-parent:style0; mso-number-format:Fixed;background:white;mso-pattern:auto none; white-space:normal;"';}

        

        ?> 

        <td nowrap height="20"<?=$cols[$varname]['width'].$cols[$varname]['align']?> <?=$cl?>><?=$prefix?><?=str_replace("<br>","",stripslashes($this->display_field($paging_rec[$i],$varname,$funclst,$totarr)))?><?=$postfix?></td>

        <? }?>

      </tr>

      <? }?>

      <?php }?>

      <tr bgcolor="<?=$this->hdcolor?>">

       <td colspan="<?=count($hdarray)?>" height="20"></td>

      </tr>

      <?if(count($totarr)){?>

      <tr bgcolor="<?=$this->dtcolor?>"> 

        <? 

 

         $iv=0;

        foreach ($hdarray as $varname => $varvalue) {

          $prefix=$cols[$varname]['prefix'];

          $postfix=$cols[$varname]['postfix'];

        ?>

        <td height="20"<?=$cols[$varname]['width'].$cols[$varname]['align']?> style="mso-style-parent:style0; mso-number-format:Fixed;background:white;mso-pattern:auto none; white-space:normal;">

         <? if (in_array($varname, $totarr)) {echo $prefix."=SUM(".$alplist[$iv]."2:".$alplist[$iv].(1+$total_rows).")".$postfix;}else{echo '&nbsp;';}?>

        </td>

        <? $iv++;

        }?>

      </tr>

      <?}?>        

     <? }else{?>

      <tr bgcolor="<?=$this->dtcolor?>"> 

        <td colspan="<?=count($hdarray)?>" class="bodyfontbgrep" height="30"><div align="center">No results found</DIV></td>

      </tr>

     <?php } ?>

       </table>

        </td>

      </tr>

    </table>

     </td>

    </tr>

  </table>

<?  

 }

 

 function display_field($recs,$key,$funcs){

  // echo  $key;

 //print_r($recs);

 

  if(count($funcs)>0){

   if (array_key_exists($key, $funcs)) {

   

    $temp=$funcs[$key];

    return call_user_func($temp, $recs);

   }else{ 

     if($key == 'Slot') 

  {   $sdate = explode(":",$recs[Starttime]);

    $edate = explode(":",$recs[Endtime]);

    return $sdate[0].':'.$sdate[1].' '.$recs[SAMPM].' - '.$edate[0].':'.$edate[1].' '.$recs[EAMPM];

    //return $recs[Starttime].' '.$recs[SAMPM].' - '.$recs[Endtime].' '.$recs[EAMPM];

    

  }elseif($key == 'Options'){

      return $varPages .= "<a href=\"addtask.php?TaskId=$recs[TaskId]&edit=edit&".create_url(array('page','msg')) . "\"><img src='../images/nit_edit.gif' width='21' height='17' border='0' title='Edit Task Details'></a>&nbsp;<a href=\"javascript:del_resident($recs[TaskId])\"><img src='../images/delete.gif' width='21' height='17' border='0' title='Delete Task'></a>";

  }elseif($key == 'Date' || $key == 'Register_date'){

    $date1 = explode("-",$recs[$key]);

      return $date1[1].'/'.$date1[2].'/'.$date1[0];

  }elseif($key == 'Option'){

      return $varPages .= "<a href=\"javascript:del_resident($recs[VolunteerId])\"><img src='../images/delete.gif' width='21' height='17' border='0' title='Delete Volunteer Details'></a>";

  }else{

    return $recs[$key];

  }  

   }

  }else{

   return $recs[$key];

  }

 } 

 

 function page_total($tot_fields,$sqlres){

  for($i=0;$i< count($sqlres);$i++){

   for($f=0;$f<count($tot_fields);$f++){

    $this->tot[$tot_fields[$f]]=$this->tot[$tot_fields[$f]]+$sqlres[$i][$tot_fields[$f]];

   }

  }

 }

 

 function all_pages_total($tot_fields,$sqlres){

  for($i=0;$i< count($sqlres);$i++){

   for($f=0;$f<count($tot_fields);$f++){

    $this->alltot[$tot_fields[$f]]=$this->alltot[$tot_fields[$f]]+$sqlres[$i][$tot_fields[$f]];

   }

  }

 }

 

 function make_totals($key,$val){

  $this->tot[$key]=$this->tot[$key]+$val;

 }

 

}

// end of draw_table class

 



//functions to scan the files using the f-prot antivirus installed on the server

 

function scan_file($file)

{

 global  $code;

 $ret_value =array();

 

 // f-prot may return any of the following summary codes in its XML report.Array indexes are the codes returned by the daemon scanner.

 $ret_value[1] = " The uploaded file was not scanned due to an I/O error. ";

 $ret_value[2] = " The uploaded file was not scanned, out of memory. ";

 $ret_value[3] = " The uploaded file is invalid. This may either mean it was misidentified or that it is corrupted.";

 $ret_value[4] = " The uploaded file was valid, but encrypted and could not be scanned.";

 $ret_value[5] = " Scanning of the uploaded file was interrupted.";

 $ret_value[9] = " The uploaded file is clean, i.e. was successfully scanned and nothing was found.";

 $ret_value[10] = " Heuristics found the uploaded file to be higly suspicious. It should be quarantined.";

 $ret_value[11] = " The uploaded file is infected and could not be uploaded ";

 $ret_value[13] = " The uploaded file was disinfected.";

 $ret_value[30] = " The uploaded file was not scanned; maximum recursion level was reached.";

 

 //When the fullreport startup switch is used in the daemon scanner, the following additional codes may be returned 

 $ret_value[6] = " Known archive file was scanned and nothing was found.";

 $ret_value[7] = " The uploaded file is of a known, innocent format and cannot contain malware.";

 $ret_value[8] = " The uploaded file is clean.";

 $ret_value[18] = " The uploaded file is infected, and disinfection failed.";

 $ret_value[22] = " Infection found in the uploaded file inside archive object.";

 $ret_value[31] = " The uploaded file not scanned, suspicious decompression ratio found in archive, possible archive bomb.";

 

 if($file != "" && strpos($_SERVER['HTTP_HOST'],"navayuga")===false){

  $fp = @fopen("http://127.0.0.1:10201".$file,"r");

  $xml_parser = xml_parser_create();

  xml_set_element_handler($xml_parser, "startxml", "endxml");

  xml_set_character_data_handler($xml_parser, "xmldata");

 

  while ($data = @fread($fp, 4096)) {

   if (!xml_parse($xml_parser, $data, @feof($fp))) {

    die(sprintf("XML error: %s at line %d",  xml_error_string(xml_get_error_code($xml_parser)), xml_get_current_line_number($xml_parser)));

   }

  }

  xml_parser_free($xml_parser);

  if($code == 6 || $code == 7 || $code == 8 || $code == 9 || $code == 13){

   $res['status'] = "false";

  }else{

 

   $res['status'] = "true";

   @unlink($file);

  }

  

  $res['msg'] = $ret_value[$code];

  return $res;

 }else{

  $res['status'] = "false";

  return $res;

 }

}

 

function xmldata($parser, $data) {

 global $currentElement,$attr,$code;

 

 switch($currentElement){

  case 'SUMMARY';

   $code = $attr['CODE'];

   break; 

    default:

       break;

 }

}

 

function startxml($parser, $name, $attrib) {

 global $currentElement,$attr; 

 $currentElement = $name;

 $attr = $attrib;

}

 

function endxml($parser, $name) {

 global $currentElement,$attr;

 $currentElement = "";

 $attr = "";

}

 

//End of the virus scan activity

 

// Function to get the number of rows in a CSV file

 

function get_no_lines_in_csv($csv_file)

{

 $no_lines =0;

 

 $handle = fopen ($csv_file,"r"); 

 

 while ($data = fgetcsv($handle, 5000, ","))  

 {

  if(count($data)>0) $no_lines ++;

 }

 return $no_lines;

 

}

 

// End of the function 

 

function add_leading_zeroes($company_id, $total_len_prayroll_id, $id)

{ 

 global $sql;

 //$total_len_prayroll_id = '8';

 $len = strlen($id);

 $temp = $id;

 if($len<$total_len_prayroll_id){

  $leading_zeros_str = "";

  $num_of_leading_zeros_required = $total_len_prayroll_id - $len;

  for ($i=0; $i < $num_of_leading_zeros_required; $i++){

     $leading_zeros_str .= '0'; 

  }

  $id = $leading_zeros_str.$id;

 }

 

 if($company_id=='17'){

  $query = "select * from users_corp u, details d where u.user_id = d.user_id and d.employee_number = u.user and d.employee_number='".$id."'";  

  $rs = $sql->fetch_row($query);

  if ($rs=="")

  {//if no rows then employee number & user both are different

   $id=$temp;

  }

 }

 

 return $id; 

}

 

function get_parent_sub_company_id($sub_company_id)

{

 global $CORP,$sql,$usr,$_SESSION;   

    if(!is_object($sql))$sql=new mysql_obj;

 if(!is_object($CORP))$CORP = new corp_obj;

 

 if($sub_company_id==0 or $sub_company_id=="") return 0;

 

 $country_info = $sql->fetch_array("SELECT is_country, country_id FROM sub_company_main WHERE sub_company_id = '" .  $sub_company_id . "'"); 

  if (($country_info) > 0 )   

  {

   $parent_country = $country_info[0]["country_id"];   

   $parent_country = $sql->fetch_scalar("SELECT sub_company_id from sub_company_main WHERE country_id = '" . $parent_country . "' AND is_country = 'Y'"); 

   

  }     

  

  if (count($country_info) > 0 and $parent_country != $sub_company_id and $country_info[0]["is_country"] == "N")

  {

   $parent_country_str_content = $parent_country;  

  }

  else

  {

   $parent_country_str_content = 0;     

  }

 return $parent_country_str_content;

 

}

 

function replace_snippets($str,$flag=1,$print_flag=true,$link_id=0){

 global $rt_flag;

 

 preg_match_all('/<tagstart_[^>]+>/s', $str, $tags);

 if(count($tags[0]) > 0){

  $rt_flag=1;

  if($flag==1)

  {

   

   for($t = 0;$t < count($tags[0]);$t++){

    $currtag = $tags[0][$t];

    $tagnm = substr($currtag, 1 ,strpos($currtag, " snippet_id") );

    $endtag = str_replace("tagstart", "tagend", $tagnm);

    $enpos = preg_match("/<$endtag(.*)\/>/", $str, $enmatches);

    $enmatches[0] = substr($enmatches[0],0,strpos($enmatches[0],"/>") + 2 ); 

    $txtcnt = substr($str,( strpos($str,$currtag) + strlen($currtag)), strpos($str,$enmatches[0]) - ( strpos($str,$currtag) + strlen($currtag)));

    if($txtcnt){

     $char_id = get_tagattr($currtag, $tagnm);  

     $repcnt = replace_snippetfileds($txtcnt, $char_id['snippet_id'],$link_id);

     $str = str_replace($txtcnt, $repcnt, $str);

    }

    $str = str_replace($enmatches[0], "", str_replace($currtag, "", $str));         

   }

 

  }

 }

 

 return $str;

}

 



function replace_snippetfileds($txtcnt, $snpid,$link_id=0){

 global $sql;

 preg_match_all('/<tag_[^>]+>/s', $txtcnt, $tags);

 if(count($tags[0]) > 0){

  if($link_id==0){

  $link_id = $sql->fetch_scalar("select link_id from snippets_data_rel where snippet_id = '".$snpid."' and status = 1 order by rand() limit 1");

  }

  $data = $sql->fetch_array("select sd.field_value, sf.snippet_field_id from snippets_data sd LEFT JOIN snippets_fields sf ON sd.snippet_field_id = sf.snippet_field_id where sd.link_id ='".$link_id."'");

 

  for($d = 0; $d < count($data); $d++){

   $fields[$data[$d]['snippet_field_id']] = stripslashes(nl2br($data[$d]['field_value']));

  }

 

  for($t = 0;$t < count($tags[0]);$t++){

   $tagnm = substr($tags[0][$t], 1, strpos($tags[0][$t], " field_id") );

   $fieldtag = get_tagattr($tags[0][$t], $tagnm);

   $fieldid = $fieldtag['field_id'];

   if($fieldid){    

    $txtcnt = str_replace($tags[0][$t], $fields[$fieldid], $txtcnt);

   }else{

    $txtcnt = str_replace($tags[0][$t], "", $txtcnt);

   }

  }

  // replacing voting tag in snippets

  

  $npos = preg_match("/<snpvoting(.*)\/>/", $txtcnt, $nmatches);   

  if($npos == false){

  }else{   

   $nmatches[0]=substr($nmatches[0],0,strpos($nmatches[0],"/>")+ 2 );

   $question_id=get_tagattr($nmatches[0],"snpvoting");

   $ntxt=get_voting($question_id['question'], $question_id['headerbgcolor'], $question_id['headerfontcolor'], $question_id['answers_display'],$link_id);  

  }

  $txtcnt=str_replace($nmatches[0],$ntxt,$txtcnt); 

  // end of replacement for voting tag

 

 }

 



 return $txtcnt;

}

 

function issnippets_active($company_id,$sub_company_id){

 global $sql;

 $status = $sql->fetch_scalar("select setting_value  from company_misc_settings where setting_name = 'snippets_active' and company_id = '$company_id' and sub_company_id = '$sub_company_id'");

 if($status == "")$status = 'N';

 return $status;

}

 

function sendmail_log()

{

 global $frommail, $tomail, $subject, $message, $reference_table, $reference_id, $user_id, $headers, $company_id, $sub_company_id, $mail_setup_ref, $site, $notes,$debug;

 $sqlmail = new mysql_obj;

 $sqlmail->db = "smartchange_log";

 $sqlmail->debug = $debug;

 if(strpos($frommail, "<")){ 

  $temp = explode("<", $frommail);

  $from = str_replace(">", "", $temp[1]);

 }else{

  $from = $frommail;

 }

 //echo "Subject:".$subject;

 //echo "tomail:".$tomail;

 //echo "headers:".$headers;

 //echo mail($tomail, $subject, $message, $headers, "-f $from");exit;

 if(trim($message)!="")

 {

  

  $res = mail($tomail, stripslashes($subject), stripslashes($message), $headers, "-f $from");

  //echo "res:".$res;exit;

  

  if($res)

   $status = 1;

  else

   $status = 0;

 

  

  $sqlstr = "INSERT INTO sent_emails_log ( company_id , sub_company_id , from_emailid , to_emailid , subject , message , addl_headers, date_sent , reference_table , reference_id , user_id , notes , mail_setup_ref , status, site ) 

  VALUES ( '".$company_id."', '".$sub_company_id."', '".$frommail."', '".$tomail."', '".addslashes($subject)."', '".addslashes($message)."', '".$headers."', Now(), '".$reference_table."', '".$reference_id."', '".$user_id."', '".$notes."', '".$mail_setup_ref."', '".$status."','company')";

  $ins_log = $sqlmail->query($sqlstr);

  $sqlmail = "";

 }else

 {

  $status = 0;

 }

 return $status;

}

 



function check_Lottery_won()

{

global $sql,$usr;

$query = "select lottery_id,lottery_name from lottery_main where user_id ='".$usr->user_id."' and charity_date>now() ";

//echo '<!--'.$query.'-->';

$lot_res = $sql->fetch_array($query,MYSQL_ASSOC);

if(is_array($lot_res) && count($lot_res)>0){ 

 return array($lot_res[0]["lottery_id"],$lot_res[0]["lottery_name"]);

}else{

 return false;

}

}

 

function has_sub_companies($company_id)

{

 global $sql;

 

 $query="select count(*) as cnt from sub_company_main where status='Y' and company_id='$company_id'";

 $cnt= $sql->fetch_scalar($query);

 if($cnt==0)

  return false;

 return true;

}

// VT_01 -- Start

function magic_quotes_check($str) 

{

 if(!get_magic_quotes_gpc()) 

 {

  $str = addslashes($str);

 }

 return $str;

}

// VT_01 -- End

 

// VT_02 -- Start

function regfields_query($field_name='')

{

 global $company_id, $sub_company_id ;

 if ($field_name != '')

 {

  $str = " AND field_name='" . $field_name . "' ";

 }

 else

 {

  $str = "";

 }

 

 if ($sub_company_id == 0)

 {

  $query = " SELECT * 

   FROM company_regfields

   WHERE company_id='" . $company_id . "' " . $str . " AND sub_company_id = '0'";

 }

 else

 {

  $query = " SELECT * 

   FROM company_regfields

   WHERE company_id='" . $company_id . "' " . $str . " AND sub_company_id = '" . $sub_company_id . "' 

   UNION 

   SELECT * 

   FROM company_regfields

   WHERE company_id='".$company_id."' " . $str . "

   AND sub_company_id = '0' AND 

   field_id NOT IN ( SELECT field_id 

    FROM company_regfields

    WHERE company_id='".$company_id."' " . $str . " 

    AND sub_company_id = '" . $sub_company_id . "') 

   ";

 }   

 return $query;    

}

// VT_02 -- End

 



?>