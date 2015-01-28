<?php
  include_once("config/config.php");
  if(isset($_GET['email']))
  {
      $sql = mysql_query("SELECT `user_email` FROM se_bizconnect_page_video_registration WHERE `user_email` = '$_GET[email]'");
      $num = mysql_num_rows($sql);
      
      if($num>0)
      {
           echo "Sorry - This email address is already in our system.";
      }
      else
      {
        
      }
  }
  
  
  if(isset($_GET['zip'])){
      $zipsql="SELECT * FROM se_bizconnect_page_video_registration_city WHERE zip = '".$_GET['zip']."'";
	  $res = mysql_query($zipsql);
      $zipnum = mysql_num_rows($res);
      $row = mysql_fetch_array($res);
      if($zipnum > 0){
          echo $row['city'];
      }
  }
?>