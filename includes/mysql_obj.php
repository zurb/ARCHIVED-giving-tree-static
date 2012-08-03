<?php

session_start();

class mysql_obj

{

   var $debug    = false;

   var $persistent   = true;

   var $local    = false;

   var $auto_off = true;

   

   var $host     = "localhost";

   var $db       = "fg_tree";

   var $user     = "dataelf";

   var $pass     = "connor700";

   

   var $next     = false;

   var $prev     = false;

   

   var $step     = 10;

   var $aid=0;

   var $conn     = 0;

   var $stmt     = 0;

   var $curs     = 0;

   var $row_num = 0;

   

   function connect()

   {

       if($this->local)

    {

         $this->host = "mysql";

      }

    

      if( true )

    {  

       if( $this->debug ){ echo "<b>Debug: </b>Connecting to $this->db...<br>\n"; };

         if( $this->persistent )

     {   

            $this->conn=mysql_pconnect( $this->host, $this->user, $this->pass );

      

         }

    else

     {  

            $this->conn=@mysql_connect( $this->host, $this->user, $this->pass );

         };

     

         if( !$this->conn )

     {

       $this->send_error_report(mysql_errno(),mysql_error(),"CONNECTION ERROR");

            if( $this->debug )

               echo "<b>Debug:ERR:</b> $this->conn=mysql_connect():".mysql_errno($this->conn).": ".mysql_error($this->conn)."<br>\n";

            exit();

        }

    else

     {

        if( $this->debug )

      {

               echo "<b>Debug:OK:</b> $this->conn=mysql_connect():".mysql_errno($this->conn).": ".mysql_error($this->conn)."<br>\n";

            };

            if( mysql_select_db( $this->db, $this->conn ) )

      {

               if( $this->debug )

                  echo "<b>Debug:OK:</b>mysql_select_db($this->db, $this->conn):".mysql_errno($this->conn).": ".mysql_error($this->conn)."<br>\n";

            }

      else

      {

         $this->send_error_report(mysql_errno($this->conn),mysql_error($this->conn),"DATABASE SELECTION ERROR");

               if( $this->debug )

                  echo "<b>Debug:ERR:</b>mysql_select_db($this->db, $this->conn):".mysql_errno($this->conn).": ".mysql_error($this->conn)."<br>\n";

               exit();

            }

        }

      }

     

   }



   // ER_05-May-2002

   function get_field_names($query)

   { 

       $field_names = array();

      $this->connect();

      $res = mysql_query($query);

      for ($f=0; $f<mysql_num_fields($res); $f++) {

          $field_names[] = mysql_field_name($res, $f);

      }

      return $field_names;

   }

   

   function query( $query, $aid = "" )

   { // result <none>

    //echo  $query.'<br>';

      $this->connect();

      $this->stmt = mysql_query($query);

      if( $this->stmt )

    {

         if( $this->debug )

            echo "<b>Debug:OK:</b> $this->stmt=mysql_query($query):".mysql_errno($this->conn).": ".mysql_error($this->conn)."<br>\n";

         $aid = mysql_insert_id(); //$this->conn

     $this->aid=$aid;

      }

  else

    {

       if(mysql_errno($this->conn))

       $this->send_error_report(mysql_errno($this->conn),mysql_error($this->conn),$query);

       

         if( $this->debug )

            echo "<b>Debug:ERR:</b> $this->stmt=mysql_query($query):".mysql_errno($this->conn).": ".mysql_error($this->conn)."<br>\n";

         $this->stmt = false;

      }

      //$this->logoff();

      return $this->stmt;

   //return $aid; 

   }



   function fetch_scalar( $query )

   { // result <none>

      $retr=array();

      $this->connect();

      if( $this->query($query) )

    {

         $retr = mysql_fetch_row( $this->stmt );

         if( $retr )

     {

            if( $this->debug )

               echo "<b>Debug:OK:</b>fetch_scalar($this->stmt, $this->conn):".mysql_errno($this->conn).": ".mysql_error($this->conn)."<br>\n";

         }

    else

    {

         if(mysql_errno($this->conn))

        $this->send_error_report(mysql_errno($this->conn),mysql_error($this->conn),$query);



            if( $this->debug )

               echo "<b>Debug:ERR:</b>fetch_scalar($this->stmt, $this->conn):".mysql_errno($this->conn).": ".mysql_error($this->conn)."<br>\n";

            $retr = array();

         }

      }

      $this->logoff();

      return $retr[0];

   }



   function fetch_row( $query, $ar_type = MYSQL_BOTH )

   { // result <none>

      $retr=array();

      $this->connect();

      if( $this->query($query) )

    {

         $retr=mysql_fetch_array($this->stmt, $ar_type);

   //$retr=mysql_fetch_row($this->stmt);

         if( $retr )

     {

            if( $this->debug )

               echo "<b>Debug:OK:</b>fetch_row($this->stmt, $this->conn):".mysql_errno($this->conn).": ".mysql_error($this->conn)."<br>\n";

         }

    else

     {

         if(mysql_errno($this->conn))

        $this->send_error_report(mysql_errno($this->conn),mysql_error($this->conn),$query);



            if( $this->debug )

               echo "<b>Debug:ERR:</b>fetch_row($this->stmt, $this->conn):".mysql_errno($this->conn).": ".mysql_error($this->conn)."<br>\n";

            $retr = false;

         }

      }

      $this->logoff();

      return $retr;

   }



   function fetch_next_row($ar_type){

      if( $this->stmt ){

         $retr=mysql_fetch_array($this->stmt, $ar_type);

   //$retr=mysql_fetch_row($this->stmt);

         if( $retr ){

            if( $this->debug )

               echo "<b>Debug:OK:</b>fetch_row($this->stmt, $this->conn):".mysql_errno($this->conn).": ".mysql_error($this->conn)."<br>\n";

         }else{

            if( $this->debug )

               echo "<b>Debug:ERR:</b>fetch_row($this->stmt, $this->conn):".mysql_errno($this->conn).": ".mysql_error($this->conn)."<br>\n";

            $retr = false;

            if($this->auto_off)

               $this->logoff();

         }

      }

      return $retr;

   }



   function fetch_array( $query, $ar_type = MYSQL_BOTH )

   { // result <none>

      $this->retr=array();

      $this->row_num = 0;

      $this->connect();

      if( $this->query($query) )

    {

         while( $this->tmp=mysql_fetch_array($this->stmt, $ar_type) ) 

     {

            $this->retr[]=$this->tmp; // creating indexed array containing hashes

         if( $this->debug )

         {

                 var_dump($this->tmp); 

               }

        }

         if( $this->retr )

     {

            $this->row_num = mysql_num_rows($this->stmt);

            if( $this->debug )

               echo "<b>Debug:OK:</b>mysql_fetch_array($this->stmt, $this->conn):".mysql_errno($this->conn).": ".mysql_error($this->conn)."<br>\n";

         }

    else

    {

         if(mysql_errno($this->conn))

        $this->send_error_report(mysql_errno($this->conn),mysql_error($this->conn),$query);



      $this->retr = array();

            if( $this->debug )

      {

               echo "<b>Debug:ERR:</b>mysql_fetch_array($this->stmt, $this->conn):".mysql_errno($this->conn).": ".mysql_error($this->conn)."<br>\n";

               var_dump($this->retr);

         }

         }

      }

      $this->logoff();

      //echo "<hr>\n";

      //var_dump($this->retr);

      if(!is_array($this->retr)) $this->retr = array();

      return $this->retr;

   }



   function fetch_array_assoc( $query ){ // result <none>

      $this->retr=array();

      $this->row_num = 0;

      $this->connect();

      if( $this->query($query) ){

         while( $this->tmp=mysql_fetch_array($this->stmt, MYSQL_NUM) ){

            $this->retr[$this->tmp[0]]=$this->tmp[1]; // creating indexed array containing hashes

         if( $this->debug ){

                 var_dump($this->tmp); 

               }

       }

         if( $this->retr ){

            $this->row_num = mysql_num_rows($this->stmt);

            if( $this->debug )

               echo "<b>Debug:OK:</b>mysql_fetch_array($this->stmt, $this->conn):".mysql_errno($this->conn).": ".mysql_error($this->conn)."<br>\n";

         }

      }

    else

    {

    if(mysql_errno($this->conn))

      $this->send_error_report(mysql_errno($this->conn),mysql_error($this->conn),$query);

    }

      if($this->auto_off)

            $this->logoff();

      //echo "<hr>\n";

      //var_dump($this->retr);

     // if(!is_array($this->retr)) $this->retr = array();

    if(!is_array($this->retr)) $this->retr = '0';

      return $this->retr;

   }



   function fetch_array_sp( $query, $start,$ar_type = MYSQL_BOTH )

   { // result <none>

//       $this->debug=true;

      $this->retr=array();

      $this->row_num = 0;

      $this->connect();

      if( $this->query($query))

    {

       @mysql_data_seek($this->stmt,$start);

     for ($i=0;(($i<$this->step) and ($i<mysql_num_rows($this->stmt)-$start));$i++)

     {

       $this->tmp=mysql_fetch_array($this->stmt, $ar_type);

            $this->retr[]=$this->tmp; // creating indexed array containing hashes

         if( $this->debug )

         {

                 var_dump($this->tmp); 

               }

     }

         if( $this->retr )

     {

            $this->row_num = mysql_num_rows($this->stmt);

      if ($this->row_num>($start+$this->step)) {$this->next=true;}

      if (($start-$this->step)>=0) {$this->prev=true;}

            if( $this->debug )

               echo "<b>Debug:OK:</b>mysql_fetch_array($this->stmt, $this->conn):".mysql_errno($this->conn).": ".mysql_error($this->conn)."<br>\n";

         }

    else

    {

      $this->retr = array();

            if( $this->debug )

      {

               echo "<b>Debug:ERR:</b>mysql_fetch_array($this->stmt, $this->conn):".mysql_errno($this->conn).": ".mysql_error($this->conn)."<br>\n";

               var_dump($this->retr);

         }

         }

      }

    else

    {

         if(mysql_errno($this->conn))

        $this->send_error_report(mysql_errno($this->conn),mysql_error($this->conn),$query);

    }

      @mysql_free_result ($this->stmt);

      $this->logoff();

      //echo "<hr>\n";

      //var_dump($this->retr);

      if(!is_array($this->retr)) $this->retr = array();

      return $this->retr;

   }



   function fetch_column( $query, $column = 0, $ar_type = MYSQL_BOTH )

   { // result <none>

      $this->retr=array();

      $this->row_num = 0;

      $this->connect();

      if( $this->query($query) )

    {

         while( $this->tmp=mysql_fetch_array($this->stmt, $ar_type) ) 

     {

            $this->retr[]=$this->tmp["$column"]; // creating indexed array containing hashes

         if( $this->debug )

         {

                 var_dump($this->tmp); 

               }

        }

         if( $this->retr )

     {

            $this->row_num = mysql_num_rows($this->stmt);

            if( $this->debug )

               echo "<b>Debug:OK:</b>mysql_fetch_array($this->stmt, $this->conn):".mysql_errno($this->conn).": ".mysql_error($this->conn)."<br>\n";

         }

    else

    {

            if( $this->debug )

               echo "<b>Debug:ERR:</b>mysql_fetch_array($this->stmt, $this->conn):".mysql_errno($this->conn).": ".mysql_error($this->conn)."<br>\n";

            $this->retr = false;

         }

      }

    else

    {

         if(mysql_errno($this->conn))

        $this->send_error_report(mysql_errno($this->conn),mysql_error($this->conn),$query);

    }

      $this->logoff();

      return $this->retr;

   }





   function logoff()

   {

      @mysql_free_result($this->stmt); 

      @mysql_close($this->conn);

      $this->conn = 0;

      $this->stmt = 0;

      $this->curs = 0;   

      if($this->debug)
      {

         echo "<b>Debug:</b> Log out ...<br>\n";

      };

   }

   

   function send_error_report($myerrorno, $myerrordesc, $mystatement)

   {



  //uncommented as the new functionality is under development and generating un-necessary email messages.     

//  global $CORP, $usr;

    //mail to owner of the page

//    $to = "prabhakarp@navayuga.co.in";

//    $subject = "MySQL ERROR " . $myerrorno . " - " . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . " (" . date("d M Y  H:i") . ")";

//    $fromemail = "ErrorReporter <info@smartchange.org>";

    

    // headers need to be in the correct order... 

//    $headers = "From: $fromemail  \r\n"; 

//    $headers .= "Date: " . date("r") . "\n"; 

//    $headers .= "MIME-Version: 1.0\n"; 

//    $headers .= "X-Priority: 3\n"; //1 UrgentMessage, 3 Normal 

//    $headers .= "X-Mailer: PHP4\n"; //mailer 

//    $headers .= "Content-Type: text/plain; charset=\"iso-8859-1\"\n"; 



    $message = "MySQL ERROR REPORT

" . date("d F Y, h:i a") . "



DOMAIN : " . $_SERVER['HTTP_HOST'] . " 

SCRIPT FILE NAME : " . $_SERVER['PHP_SELF'] . "

PHYSICAL PATH : " . $_SERVER['PATH_TRANSLATED'] . "



SQL STATEMENT : 

" . $mystatement . "



MySQL ERROR NO : " . $myerrorno . "



MySQL ERROR DESCRIPTIOM :

" .  $myerrordesc . "





"; 

$rvar = "";

if(count($_REQUEST) >0) {

  $rvar .= "\nREQUEST VARIBLES:\n";

  foreach($_REQUEST as $k => $v)

  {

    if(is_array($v))

      $rvar .= $k . " => " . var_export($v,true) ."\n";

    else

      $rvar .= $k . " => " . $v ."\n";

  }

}



if(count($_SESSION) >0) {

  $rvar .= "\nSESSION VARIBLES:\n";

  foreach($_SESSION as $k => $v)

  {

    if(is_array($v))

      $rvar .= $k . " => " . var_export($v,true) ."\n";

    else

      $rvar .= $k . " => " . $v ."\n";

  }

}

$message = $message . $rvar;

    

  print $message; 

    

   }

};

?>

