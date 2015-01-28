<?php
include_once("config/config.php");
include "../../header.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Form</title>
<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
<script src="js/jquery.metadata.js" type="text/javascript"></script>

<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css" />

<script src="js/jquery.validate.js" type="text/javascript"></script>
<script src="js/jquery-ui.js" type="text/javascript"></script>
<script type="text/javascript">
var HTTP_SITE='<?php echo HTTP_SITE; ?>';
function duplicateEmail(str){

jQuery.ajax({
		type: "GET",
		url: HTTP_SITE+"ajax.php",
		data: "email="+str,
		success: function(msg){
			$("#duplicateEmailError").html(msg);
				
		}
	});	
}



function cityByZip(str){
	jQuery.ajax({
		type: "GET",
		url: HTTP_SITE+"ajax.php",
		data: "zip="+str,
		success: function(msg){
			$("#getCity").val(msg);
				
		}
	});	

}



function ZipValidity(str){
	jQuery.ajax({
		type: "GET",
		url: HTTP_SITE+"zip_validity.php",
		data: "zip="+str,
		success: function(msg){
			$("#errorzip").html(msg);
				
		}
	});	
}


 $(document).ready(function(){
 	 $(function() {
    	$('.onlyYear').datepicker( {
	        
	        changeYear: true,
	        showButtonPanel: true,
	        dateFormat: 'yy',
	        yearRange: 'c-3:c+0',
	        onClose: function(dateText, inst) { 
	            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
	            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
	            $(this).datepicker('setDate', new Date(year, month, 1));
	        }
    	});
	});

 	 $('.datepicker').datepicker({
 	 	dateFormat: 'mm.dd.yy'
 	 });


	/*Conditional Hide & Show*/
    $("#ia_no").click(function () {
      $("#how_ia").hide("slow");
      $("#used_bi").hide("slow");
	  $("#where_used_bi").hide("slow");
	  $("#bi_assistance").hide("slow");
    });

    $("#ia_yes").click(function () {
      $("#how_ia").show("slow");
      $("#used_bi").show("slow");
	  $("#where_used_bi").show("slow");
	  $("#bi_assistance").show("slow");
    });
	
	$("#ubi_no").click(function () {
	  $("#where_used_bi").hide("slow");
    });

    $("#ubi_yes").click(function () {
	  $("#where_used_bi").show("slow");
    });
	
	$("#employment_status").change(function () {
          if($("#employment_status").val()=="not_employed")
		  {
			  $("#business_type").hide("slow");
			  $("#num_of_emp").hide("slow");
			  $("#how_many").hide("slow");
			  $("#num_of_business").hide("slow");
			  $("#gross").hide("slow");
			  $("#business_stage").hide("slow");
			  
		  }
		  else
		  {
			  $("#business_type").show("slow");
			  $("#num_of_emp").show("slow");
			  $("#how_many").show("slow");
			  $("#num_of_business").show("slow");
			  $("#gross").show("slow");
			  $("#business_stage").show("slow");
		  }
        });
		
	$("#meonly").change(function(){
		if($("#meonly").val()=='me_only')
		{
			$("#how_many").hide("slow");
		}
		else
		{
			$("#how_many").show("slow");
		}
	});
	/*End ofConditional Hide & Show*/
	
	/*Validation*/

$.metadata.setType("attr", "validate");

$().ready(function() {

	// validate signup form on keyup and submit

	$("#form").validate({
		rules: {
			//cf_name: "required",
			//lastname: "required",
			business_code: {
				required: true,
				minlength: 2
			},
			lname: {
				required: true,
				minlength: 2
			},
			password: {
				required: true,
				minlength: 5
			},
			confirm_password: {
				required: true,
				minlength: 5,
				equalTo: "#password"
			},
			telnumber: {
				required: true,
				minlength: 10
			},
			business_name: {
				required: true,
				minlength: 3
			},
			email: {
				required: true,
				minlength: 6
			},
			city: {
				required: true,
				minlength: 2
			},
			street: {
				required: true,
				minlength: 2
			},
			zip: {
				required: true
			},
			business_description: {
				required: true
			},
			TYRdate1: {
				required: true
			},
			TYRdate2: {
				required: true
			},
			TYRdate3: {
				required: true
			},
			request_amount:{
				required: true
			},
			// name_borrower1:{
			// 	required: true
			// },
			// name_borrower2:{
			// 	required: true
			// },
			// name_borrower3:{
			// 	required: true
			// },
			request_amount:{
				required: true
			},
			request_date:{
				required: true
			},
			request_description:{
				required: true
			},
			contract_name:{
				required: true
			},
			contract_date:{
				required: true
			},
			contract_number:{
				required: true
			},
			project_name:{
				required: true
			},
			project_date:{
				required: true
			},
			project_compl_date:{
				required: true
			},
			contact_name:{
				required: true
			},
			contact_title:{
				required: true
			},
			contact_email:{
				required: true
			},
			project_description:{
				required: true,
				minlength:10
			}

			
		}
		// messages: {
		// 	fname: {
		// 	    required: "Please enter your first name",
		// 		minlength: "Enter your FULL first name"
		// 	},
		// 	lname: {
		// 	    required: "Please enter your last name",
		// 		minlength: "Enter your FULL last name"
		// 	},
		// 	cf_pwd: "Please enter your lastname",
		// 	name: {
		// 		required: "Please enter a username",
		// 		minlength: "Your username must consist of at least 2 characters"
		// 	},
		// 	password: {
		// 		required: "Please provide a password",
		// 		minlength: "Your password must be at least 5 characters long"
		// 	},
		// 	confirm_password: {
		// 		required: "Please confirm your password",
		// 		minlength: "Your password must be at least 5 characters long",
		// 		equalTo: "Please enter the same password as above"
		// 	},
		// 	telnumber: {
		// 		required: "Please enter your Phone Number",
		// 		minlength: "Enter your 3-digit Area Code and your 7-digit Phone Number"
		// 	},
		// 	business_name: {
		// 		required: "Please enter a business name",
		// 		minlength: "Enter your FULL business name"
		// 	},
		// 	city: {
		// 		required: "Please enter your city name"
		// 	},
		// 	street: {
		// 		required: "Please enter a street",
		// 		minlength: "Enter your FULL street name"
		// 	},
		// 	zip: {
		// 		required: "Please enter a ZIP code"
		// 	},
		// 	business_description: {
		// 		required: "Please enter the business description"
		// 	},
		// 	TYRdate1: {
		// 		required: "This field is required"
		// 	},
		// 	TYRdate2: {
		// 		required: "This field is required"
		// 	},
		// 	TYRdate3: {
		// 		required: "This field is required"
		// 	},
		// 	email: {
		// 	    required: "Please enter a valid email address",
		// 		minlength: "Enter your FULL email address"
		// 	}
		// }
		
	});
	 
});
	
	/*End of Validation*/

  });
</script>


</head>

<body>

<div id="main_content">
<?php
  if(isset($_POST['submit']))
    {
	$fname             = $_POST['fname'];
	$lname             = $_POST['lname'];
	$email             = $_POST['email'];
	$telephone         = $_POST['telnumber'];
	$url               = $_POST['url'];
	$password          = $_POST['password'];
	$con_password      = $_POST['confirm_password'];
	$business_name     = $_POST['business_name'];
	$city              = $_POST['city'];
	$country           = $_POST['county'];
	$employment_status = $_POST['employment_status'];
	$business_type     = $_POST['business_type'];
	$num_of_emp        = $_POST['num_of_emp'];
	$how_many          = $_POST['how_many'];
	$grossrevenue      = $_POST['grossrevenue'];
	$business_stage    = $_POST['business_stage'];
	$num_of_years      = $_POST['num_of_years'];
	$how_hear          = $_POST['how_hear'];
	$internet_access   = $_POST['internet_access'];
	$how_access        = $_POST['how_access'];
	$used_broadband    = $_POST['used_broadband'];
	$broadband         = $_POST['broadband'];
	$broadband_services= $_POST['broadband_services'];
	$course            = $_POST['course'];
	$gender            = $_POST['gender'];
	$ethnicity         = $_POST['ethnicity'];
	$disabled          = $_POST['disabled'];
	$us_armed          = $_POST['us_armed'];
    
	foreach($course as $entry){
		$topics .= $entry.", ";
	}
    
    $sql = mysql_query("SELECT `user_email` FROM se_bizconnect_page_video_registration WHERE `user_email` = '$_GET[email]'");
      $num = mysql_num_rows($sql);
      
      if($num>0)
      {
           echo "<p style='color: red; font-weight: bold;'>Sorry - This email address is already in our system.</p>";
           die;
      } 
       
      
	    //first get correct date format for the MySQL insert
		$phpdate = date("YmdHis");
		$curr_phpdate = date("Y-m-d H:i:s",strtotime($phpdate));  

		// now set all form variables for MySQL insert
        $data = array(
                'registration_date'         =>  $curr_phpdate,
                'registration_page_id'      =>  $_SESSION['page_id'], 
                'fname'                     =>  $fname,
                'lname'                     =>  $lname,
                'user_email'                =>  $email,
                'user_password'             =>  $password,
                'user_city'                 =>  $city,
                'user_zip'                  =>  $_POST['zip'],
                'user_phone'                =>  $telephone,
				'business_name'             =>  $business_name,
                'user_county'               =>  $county,
                'user_employment_status'    =>  $employment_status,
                'business_stage'            =>  $business_stage,
                'business_type'             =>  $business_type,
                'years_in_business'         =>  $num_of_years,
                'number_of_employees'       =>  $num_of_emp,
                'employees_signup_count'    =>  $how_many,
                'company_gross_revenues'    =>  $grossrevenue,
                'how_did_you_hear'          =>  $how_hear,
                'internet_access'           =>  $internet_access,
                'internet_access_type'      =>  $how_access,
                'internet_access_location'  =>  $broadband,
                'course_topics'             =>  $topics,
                'user_gender'               =>  $gender,
                'user_ethnicity'            =>  $ethnicity,
                'user_disabled'             =>  $disabled,
                'user_veteran'              =>  $us_armed,
                'referral_organization'     =>  ''
                );
                
        $sql = insert('se_bizconnect_page_video_registration', $data); 
            $id = mysql_insert_id();   
 			$new_user  = new se_user();
		 $password1 = $new_user->user_password_crypt($password);
		 $signup_code = $user_salt = $new_user->user_salt;
		 $data1 = array(
                'user_fname'         =>  $fname,
                'user_lname'         =>  $lname,
				'user_username'      =>  $email,
                'business_name'      =>  $bname,
                'user_email'         =>  $email,
                'user_password'      =>  $password1,
				'user_code'			 =>  $signup_code,
			 'user_password_method'  =>'1',
				'user_verified'      =>'1',
				'user_enabled'       =>'1'
			 );
		 $sql = insert('se_users', $data1); 
		 
		 
		 $_SESSION['USEREMAIL']= $email;
		 $_SESSION['USERPASS']= $password;
		
	    if($sql == true)
        {
			 $sql = mysql_query("SELECT page_name,page_website FROM se_bizconnect_page WHERE `page_id` = '$page_id'");
      		if(mysql_num_rows($sql)>0)
			{
				$row		=	mysql_fetch_assoc($sql);
				$page_name	=	htmlspecialchars_decode(strip_tags(stripslashes($row['page_name'])));
				$page_web	=	$row['page_website'];	
			}
		   //Dispatch Confirmation Email
		    //First Setup eMail Components
			$subject = "OnDemand Webinar Video Registration Confirmation";
			$message = "Hello ".$fname.", \n\nThis email confirms your successful registration for the OnDemand Webinar Video Small Business Technology Series. \n Login eMail: [".$email."]\n Login Password: [".$password."]\n\nCARAT OnDemand Webinar Video Team"; 
			
			//$message = "Hello ".$fname.", \n\nThis email confirms your successful registration for the OnDemand Webinar Video Small Business Technology Series. \n Login eMail: [".$email."]\n Login Password: [".$password."]\n\nCARAT OnDemand Webinar Video Team"; 
 		    $recipient = $email;
			$sender = "OnDemandVideo@caratnet.org";
			
			$subject = htmlspecialchars_decode($subject, ENT_QUOTES);
			$message = htmlspecialchars_decode($message, ENT_QUOTES);

		    // REPLACE VARIABLES IN SUBJECT AND MESSAGE
			//$subject = str_replace($search, $replace, $subject);
	        //$message = str_replace($search, $replace, $message);

	        // ENCODE SUBJECT FOR UTF8
	        $subject="=?UTF-8?B?".base64_encode($subject)."?=";

	        // REPLACE CARRIAGE RETURNS WITH BREAKS
	        $message = str_replace("\n", "<br>", $message);

	        // SET HEADERS
	        $headers = "MIME-Version: 1.0"."\n";
	        $headers .= "Content-type: text/html; charset=utf-8"."\n";
	        $headers .= "Content-Transfer-Encoding: 8bit"."\n";
	        $headers .= "From: $sender"."\n";
	        $headers .= "Return-Path: $sender"."\n";
	        $headers .= "Reply-To: $sender\n";

	        // IF BCC, SET TO AND BCC
	        //if($bcc){
	        //   $headers .= "Bcc: $recipient\n";
	        //   $recipient = "noreply@domain.com";
	        //}

	        // SEND MAIL
	        mail($recipient, $subject, $message, $headers);
           
		    //NOW REDIRECT TO THANK YOU NOTIFICATION
		    header("location: ".HTTP_SITE."thanks.php");
        }
        else
        {
            echo '<p style="color: red; font-weight: bold;">Registration Process Failed. Please, Try Again Later.</p>';
        }
    }
	
?>
    <form name="form" id="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form" method="post">
	<TABLE FRAME=VOID CELLSPACING=0 COLS=4 RULES=NONE BORDER=0>
		<COLGROUP>
			<COL WIDTH=238>
			<COL WIDTH=238>
			<COL WIDTH=238>
			<COL WIDTH=238>
		</COLGROUP>
		<TBODY>
		    <TR>
			    <TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 0px solid #000000" COLSPAN=2 WIDTH=238 HEIGHT=69 ALIGN=LEFT VALIGN=MIDDLE><img src="images/Nor-Cal_MLP_Logo.png" alt="MLP-Logo" height="100" width="180"></TD>
			    <TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 0px solid #000000; border-right: 1px solid #000000" COLSPAN=2 WIDTH=238 HEIGHT=69 ALIGN=RIGHT VALIGN=MIDDLE><img src="images/cap_logo_clear-02.png" alt="CAP-Logo" height="100" width="180"> </TD>
			</TR>
			<TR>				
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=4 WIDTH=100% ALIGN=CENTER VALIGN=MIDDLE><B>LENNAR<br>HUNTER'S POINT - CANDLESTICK POINT<br>MOBILIZATION LOAN PROGRAM</B></TD>
			</TR>
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=4 HEIGHT=17 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#0084D1"><B><FONT COLOR="#FFFFFF">BUSINESS DETAILS</FONT></B></TD>
			</TR>
			<TR>
			    <TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=1 HEIGHT=30 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666"><FONT COLOR="#FFFFFF">BUSINESS NAME</FONT>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=3 HEIGHT=30 ALIGN=LEFT VALIGN=MIDDLE BGCOLOR="#FFFFFF"><FONT COLOR="#FF3333"><input name="business_name" id="business_name" type="text" class="input" /></FONT></TD>
			</TR>
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=34 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666"><B><FONT COLOR="#FFFFFF">Entity Formation<BR><FONT SIZE="2">(Sole Proprietor, LLC, Corp, etc.)</FONT></FONT></B></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666"><FONT COLOR="#FFFFFF">Years In Business </FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666"><FONT COLOR="#FFFFFF">Business SIC/NAICS Code </FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666"><FONT COLOR="#FFFFFF">Business Description </FONT></TD>
			</TR>
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE>
					<FONT COLOR="#FF3333">
						<select name="entity_formation" id="entity_formation" class="input" validate="required:true" title="Please select entity formation.">
							<option value="" selected="selected"></option>
							<option value="soleprop">Sole Proprietor</option>
							<option value="llc">LLC - Limited Liability Company</option>
							<option value="scorp">S-Corp</option>
							<option value="ccorp">C-Corp</option>
							<option value="nonprofit">NonProfit</option>
							<option value="other">Other</option>
						</select>
					</FONT>
				</TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE>
					<FONT COLOR="#FF3333">
						<select name="num_of_years" class="input"  validate="required:true" title="Please select your years in business">
							<option value=""></option>
							<option>Less than 1 year</option>
							<option>1 - 3 years</option>
							<option>3 - 5 years</option>
							<option>5 - 10 years</option>
							<option>10+ years</option>
						</select>
					</FONT>
				</TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE><FONT COLOR="#FF3333"><input name="business_code" id="business_code" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE><FONT COLOR="#FF3333"><input name="business_description" id="business_description" type="text" class="input" /></FONT></TD>
			</TR>
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ROWSPAN=3 HEIGHT=51 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666"><FONT COLOR="#FFFFFF">BUSINESS ADDRESS</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666"><FONT COLOR="#FFFFFF">Street</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=2 ALIGN=CENTER VALIGN=MIDDLE><FONT COLOR="#FF0000"><input name="street" id="street" type="text" class="input" /></FONT></TD>
			</TR>
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666"><FONT COLOR="#FFFFFF">City</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=2 ALIGN=CENTER VALIGN=MIDDLE><FONT COLOR="#FF0000"><input name="city" id="city" type="text" class="input" /></FONT></TD>
			</TR>
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666"><FONT COLOR="#FFFFFF">Zip</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=2 ALIGN=CENTER VALIGN=MIDDLE><FONT COLOR="#FF0000"><input name="zip" type="text" class="input" /></FONT></TD>
			</TR>
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=53 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666"><FONT COLOR="#FFFFFF">Number of Employees</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666"><FONT COLOR="#FFFFFF">Bonding Capacity (if any)</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666"><FONT COLOR="#FFFFFF">Last 3 Years Revenues </TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666"><FONT COLOR="#FFFFFF">Business Management <FONT SIZE="1">(Click Checkbox for each item that you have)</FONT></TD>
			</TR>
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=17 ALIGN=CENTER VALIGN=MIDDLE>
					<FONT COLOR="#FF3333">
						<select name="num_of_employees" class="input"  validate="required:true" title="Please select your number of employees">
							<option value=""></option>
							<option>1 - 5</option>
							<option>6 - 10</option>
							<option>10-50</option>
							<option>50+</option>
						</select>
					</FONT>
				</TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE>
					<FONT COLOR="#FF3333">
						<select name="bonding_capacity" class="input"  validate="required:true" title="Please select your Bonding Capacity">
							<option value=""></option>
							<option>I Have No Bonding</option>
							<option>$0 - $10,000</option>
							<option>$10,000 - $25,000</option>
							<option>$25,000 - $50,000</option>
							<option>$50,000 - $100,000</option>
							<option>$100,000 - $250,000</option>
							<option>$250,000 - $500,000</option>
							<option>$500,000 - $1M</option>
							<option>$1M+</option>
						</select>
					</FONT>
				</TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ROWSPAN=2 WIDTH=100 ALIGN=CENTER VALIGN=MIDDLE>
				<FONT COLOR="#000000">			
                    <label class="">Year</label><input name="" id="TYRdate1" type="text" class="withBorder" style="width:40px" />
					<label class="">Amount</label><input name="" id="TYRamount1" type="text" class="withBorder" style="width:80px" />
					<br />
					<label class="">Year</label><input name="" id="TYRdate2" type="text" class="withBorder" style="width:40px" />
					<label class="">Amount</label><input name="" id="TYRamount2" class="withBorder" type="text" class="withBorder" style="width:80px" />
					<br />
					<label class="">Year</label><input name="" id="TYRdate2" type="text" class="withBorder" style="width:40px" />
					<label class="">Amount</label><input name="" id="TYRamount2" class="withBorder" type="text" class="withBorder" style="width:80px" /></FONT>
				</TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ROWSPAN=2 ALIGN=LEFT VALIGN=MIDDLE><FONT COLOR="#000000">			
					<input type="checkbox" name="BookkeeperAccountant" value="BookkeeperAccountant" />
					<label class="rowlabel" style='align:LEFT width:60%'>Bookkeeper/Accountant </label>
					<br />
					<input type="checkbox" name="AuditedFinancialStatement" value="AuditedFinancialStatement" />
					<label class="rowlabel" style='align:LEFT width:60%'>Audited Financials </label>
					<br />
					<input type="checkbox" name="DUNSNumber" value="DUNSNumber" /></FONT>
					<label class="rowlabel" style='align:LEFT width:60%'>DUNS Number </label>
				</TD>
			</TR>
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=2 HEIGHT=35 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666"><BR></TD>
			</TR>
		</TBODY>
	</TABLE>
	<TABLE FRAME=VOID CELLSPACING=0 COLS=4 RULES=NONE BORDER=0>
		<COLGROUP>
			<COL WIDTH=238>
			<COL WIDTH=238>
			<COL WIDTH=238>
			<COL WIDTH=238>
		</COLGROUP>
		<TBODY>
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=4 WIDTH=951 HEIGHT=17 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#0084D1" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><B><FONT COLOR="#FFFFFF">BUSINESS OWNER(S) DETAILS</FONT></B></TD>
			</TR>
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FFFFFF">Category</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FFFFFF">Borrower</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FFFFFF">Co-Borrower #2</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FFFFFF">Co-Borrower #3</FONT></TD>
			</TR>
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FFFFFF">Name</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="name_borrower1" id="name_borrower1" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="name_borrower2" id="name_borrower2" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="name_borrower3" id="name_borrower3" type="text" class="input" /></FONT></TD>
			</TR>
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FFFFFF">Phone Number</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="phone_borrower1" id="name_borrower1" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="phone_borrower2" id="name_borrower2" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="phone_borrower3" id="name_borrower3" type="text" class="input" /></FONT></TD>
			</TR>
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FFFFFF">eMail Address</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="email_borrower1" id="email_borrower1" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="email_borrower2" id="email_borrower2" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="email_borrower3" id="email_borrower3" type="text" class="input" /></FONT></TD>
			</TR>
		</TBODY>
	</TABLE>
	<TABLE FRAME=VOID CELLSPACING=0 COLS=3 RULES=NONE BORDER=0>
		<COLGROUP>
			<COL WIDTH=317>
			<COL WIDTH=317>
			<COL WIDTH=317>
		</COLGROUP>
		<TBODY>
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=3 WIDTH=951 HEIGHT=17 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#0084D1"><B><FONT COLOR="#FFFFFF">LOAN DETAILS</FONT></B></TD>
			</TR>
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666"><FONT COLOR="#FFFFFF">Request Amount</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666"><FONT COLOR="#FFFFFF">Request Date</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666"><FONT COLOR="#FFFFFF">Planned Use of Funds</FONT></TD>
			</TR>
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE><FONT COLOR="#FF0066"><input name="request_amount" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE><FONT COLOR="#FF0066"><input type="date" value="<?php echo date('Y-m-d'); ?>" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE><FONT COLOR="#FF0066"><input name="request_description" type="text" class="input" /></FONT></TD>
			</TR>
		</TBODY>
	</TABLE>
	<TABLE FRAME=VOID CELLSPACING=0 COLS=3 RULES=NONE BORDER=0>
		<COLGROUP>
			<COL WIDTH=317>
			<COL WIDTH=317>
			<COL WIDTH=317>
		</COLGROUP>
		<TBODY>
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=3 WIDTH=951 HEIGHT=17 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#0084D1"><B><FONT COLOR="#FFFFFF">CONTRACT/PROJECT DETAILS</FONT></B></TD>
			</TR>
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586"><FONT COLOR="#FFFFFF">Contract name</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586"><FONT COLOR="#FFFFFF">Contract Number</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586"><FONT COLOR="#FFFFFF">Contract Date</FONT></TD>
			</TR>
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE><FONT COLOR="#FF0066"><input name="contract_name" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE><FONT COLOR="#FF0066"><input name="contract_number" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE><FONT COLOR="#FF0066"><input name="contract_date" class='datepicker' type="text" class="input" /></FONT></TD>
			</TR>
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586"><FONT COLOR="#FFFFFF">Project Name</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586"><FONT COLOR="#FFFFFF">Project Start Date</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586"><FONT COLOR="#FFFFFF">Project Estimation Completion Date</FONT></TD>
			</TR>
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE><FONT COLOR="#FF0066"><input name="project_name" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE><FONT COLOR="#FF0066"><input name="project_date" class='datepicker' type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE><FONT COLOR="#FF0066"><input name="project_compl_date" class='datepicker' type="text" class="input" /></FONT></TD>
			</TR>
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586"><FONT COLOR="#FFFFFF">Contact name</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586"><FONT COLOR="#FFFFFF">Contact Title</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586"><FONT COLOR="#FFFFFF">Contact eMail</FONT></TD>
			</TR>
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE><FONT COLOR="#FF0066"><input name="contact_name" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE><FONT COLOR="#FF0066"><input name="contact_title" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE><FONT COLOR="#FF0066"><input name="contact_email" type="text" class="input" /></FONT></TD>
			</TR>
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=36 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586"><FONT COLOR="#FFFFFF">Work/Project Description</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=2 ALIGN=CENTER VALIGN=MIDDLE><FONT COLOR="#FF3333"><textarea name="project_description" class="input textarea" rows="4" cols="50"></textarea></FONT></TD>
			</TR>
		</TBODY>
	</TABLE>
	<div class='buttonWrapper'>
		<input name="submit" type="submit" value="Submit" class="button" />	
	</div>
</form>
</div>

</body>
</html>

<?php
    function insert($table, $data)
    {       
        $count = count($data);
        $sql = "INSERT INTO `".$table."` (";
        
        $start = 0;     
        foreach ($data as $k => $v)
        {
            $start = $start + 1;
            
            if($start == $count)
            {
                $sql .= "`".$k."`";
            } else {
                $sql .= "`".$k."`, ";
            }
        }
        
        $sql .= ") value (";
        
        $number = 0;
        foreach ($data as $k => $v)
        {
            $number = $number + 1;
            
            if($number == $count)
            {
                $sql .= "'".$v."'"; 
            } else {
                $sql .= "'".$v."', ";   
            }
        }
        $sql .= ")";
        
        $insert = mysql_query($sql);
        //echo $sql;
        if($insert)
        return true;
        else 
        return false;
    }
    
    function update($table, $data, $where)
    {       
        $count = count($data);
        $where_count = count($where);  
    
        $sql = "UPDATE `".$table."` SET";
        
        $start = 0;     
        foreach ($data as $k => $v)
        {
            $start = $start + 1;
            
            if($start == $count)
            {
                $sql .= " `".$k."` = '".$v."'";
            } else {
                $sql .= " `".$k."` = '".$v."', ";
            }
        }
        $sql .= " WHERE ";
    
        if($where_count == 1)
        {
            foreach($where as $m => $n)
            {
                $sql .= "`".$m."` = '".$n."'";
            }
        }
        else 
        {
            $x = 0;
            foreach($where as $m => $n)
            {
                $x = $x + 1;
                if($x == $where_count)
                {
                    $sql .= "`".$m."` = '".$n."'";
                } else {
                   $sql .= "`".$m."` = '".$n."' and ";
                }
            }
        }
        //echo $sql;
        $update = mysql_query($sql);
    
        if($update)
        return true;
        else 
        return false;
    }
?>

<?php
    ob_flush();
?>
