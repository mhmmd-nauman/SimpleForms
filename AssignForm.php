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

<style>
.message{
background-color:#006600; color:#fff; text-align:center; font-family:Arial, Helvetica, sans-serif; font-size:14px; font-weight:bold;
}
</style>
</head>

<body>

<div id="main_content">
<?php
if($_POST['submitvalue']== 1){
$username="tglomo_wfqt1";
$password="63oNprssnOpxqI";
$database="tglomo_wfqt1_db";
$link=mysql_connect("localhost",$username,$password);
@mysql_select_db($database) or die( "Unable to select database");
$assign_form ="describe `assignment_form`";
$result=mysql_query($assign_form);
while($row = mysql_fetch_array($result)){
    $arr_fields[] = $row['Field'];
}
//echo "<pre>";
//print_r($arr_fields);
//echo "</pre>";

$strQuery = "	INSERT INTO assignment_form (";

reset($arr_fields);
while(list ($strKey, $strVal) = each($arr_fields))
{
    $strQuery .= $strVal . ",";
}

// remove last comma
$strQuery = substr($strQuery, 0, strlen($strQuery) - 1);

$strQuery .= ") VALUES (";

reset($arr_fields);
while(list ($strKey, $strVal) = each($arr_fields))
{
    $strQuery .= "'" . $_POST[$strVal] . "',";
}

// remove last comma
 $strQuery = substr($strQuery, 0, strlen($strQuery) - 1);
  $strQuery .= ");" ;
mysql_query($strQuery) or die("Error in the consult.." . mysql_error($link));
header("Location:AssignForm.php?message=success");
}
?>
    <form name="form" id="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form" method="post">
	<?php 
	if($_REQUEST['message']=='success'){?>
	<TABLE FRAME=VOID CELLSPACING=0 COLS=4 RULES=NONE BORDER=0>
	<tr>
		<td colspan="4" class="message">Record Added Successfully!</td>
	</tr>
	</TABLE>
	<?php } ?>
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
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=3 HEIGHT=30 ALIGN=LEFT VALIGN=MIDDLE BGCOLOR="#FFFFFF"><FONT COLOR="#FF3333"><input name="BUSINESSNAME" id="business_name" type="text" class="input" validate="required:true"/></FONT></TD>
			</TR>
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=34 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666"><B><FONT COLOR="#FFFFFF">Entity Formation<BR><FONT SIZE="2">(Sole Proprietor, LLC, Corp, etc.)</FONT></FONT></B></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666"><FONT COLOR="#FFFFFF">Month In Business </FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666"><FONT COLOR="#FFFFFF">Business SIC/NAICS Code </FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666"><FONT COLOR="#FFFFFF">Business Purpose </FONT></TD>
			</TR>
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE>
					<FONT COLOR="#FF3333">
						<select name="EntityFormation" id="entity_formation" class="input" validate="required:true" title="Please select entity formation.">
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
						<select name="MonthsInBusiness" class="input"  validate="required:true" title="Please select your Months in business">
							<option value="Lessthan1Month">Less than 1 Month</option>
							<option value="1-3Month">1 - 3 Month</option>
							<option value="3-5Month">3 - 5 Month</option>
							<option value="5-10Month">5 - 10 Month</option>
							<option value="10+Month">10+ Month</option>
						</select>
					</FONT>
				</TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE><FONT COLOR="#FF3333"><input name="BusinessSICCode" id="business_code" type="text" class="input" validate="required:true" title="Please Enter business Code"/></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE><FONT COLOR="#FF3333"><input name="BusinessPurpose" id="business_description" type="text" class="input" /></FONT></TD>
			</TR>
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ROWSPAN=3 HEIGHT=51 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666"><FONT COLOR="#FFFFFF">BUSINESS ADDRESS</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666"><FONT COLOR="#FFFFFF">Street</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=2 ALIGN=CENTER VALIGN=MIDDLE><FONT COLOR="#FF0000"><input name="Street" id="street" type="text" class="input" /></FONT></TD>
			</TR>
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666"><FONT COLOR="#FFFFFF">City</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=2 ALIGN=CENTER VALIGN=MIDDLE><FONT COLOR="#FF0000"><input name="City" id="city" type="text" class="input" /></FONT></TD>
			</TR>
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666"><FONT COLOR="#FFFFFF">Zip</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=2 ALIGN=CENTER VALIGN=MIDDLE><FONT COLOR="#FF0000"><input name="Zip" type="text" class="input" /></FONT></TD>
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
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FFFFFF">Owner #1</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FFFFFF">Owner #2</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FFFFFF">Owner #3</FONT></TD>
			</TR>
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FFFFFF">Name</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="Owner1Name" id="name_borrower1" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="Owner2Name" id="name_borrower2" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="Owner3Name" id="name_borrower3" type="text" class="input" /></FONT></TD>
			</TR>
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FFFFFF">Phone Number</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="Owner1Phone" id="name_borrower1" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="Owner2Phone" id="name_borrower2" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="Owner3Phone" id="name_borrower3" type="text" class="input" /></FONT></TD>
			</TR>
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FFFFFF">eMail Address</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="Owner1Email" id="email_borrower1" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="Owner2Email" id="email_borrower2" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="Owner3Email" id="email_borrower3" type="text" class="input" /></FONT></TD>
			</TR>
		</TBODY>
		<TR>
			  <TD   HEIGHT=18 colspan="4" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586" style=" color:#FFFFFF;">PROGRAM REQUEST  </TD>
		  </TR>
		 <TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FFFFFF">Requested By</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="" SDNUM="1048;0;#.##0,00 &quot;lei&quot;" colspan="3"><input name="RequestedBy" id="email_borrower3" type="text" class="input" /></TD>
				
			</TR> 
			 <TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FFFFFF">Title</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="" SDNUM="1048;0;#.##0,00 &quot;lei&quot;" colspan="3"><input name="RequestedByTitle" id="email_borrower3" type="text" class="input" /></TD>
				
			</TR> 
			 <TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FFFFFF">Signature</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="" SDNUM="1048;0;#.##0,00 &quot;lei&quot;" colspan="3"><input name="RequestedBySignature" id="email_borrower3" type="text" class="input" /></TD>
				
			</TR> 
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FFFFFF">Request Date</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="" SDNUM="1048;0;#.##0,00 &quot;lei&quot;" colspan="3">
				<input name="RequestDate" id="RequestDate" type="text" class="datepicker input" /></TD>
				
			</TR>
			
			
	</TABLE>
	<br/><br/>
	<TABLE FRAME=VOID CELLSPACING=0 COLS=4 RULES=NONE BORDER=0>
		<TR>
			  <TD   HEIGHT=18 colspan="4" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586" style=" color:#FFFFFF;">ASSIGNMENT AUTHORIZATION   </TD>
		  </TR>
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FFFFFF">Name</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FFFFFF">Address</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"colspan="2"><FONT COLOR="#FFFFFF">Assignment Request Date</FONT></TD>
				
			</TR>
		 <TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><input name="AssignmentAthorName" id="email_borrower3" type="text" class="input" /></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><input name="AssignmentAthorAddress" id="email_borrower3" type="text" class=" input" /></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"colspan="2"><input name="AssignmentDate" id="email_borrower3" type="text" class="datepicker input" /></TD>
				
			</TR>
		<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FFFFFF">Primary Contact Name</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FFFFFF">Primary Contact eMail</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"colspan="2"><FONT COLOR="#FFFFFF">Primary Contact Phone </FONT></TD>
				
			</TR>
		 <TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><input name="contact_name" id="" type="text"validate="required:true" title="Please Enter the Contact Name" /></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><input name="contact_email" id="" type="text" validate="required:true" title="Please Enter the Contact Email" /></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"colspan="2"><input name="contactPhone" id="email_borrower3" type="text" class="datepicker input" /></TD>
				
			</TR>
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FFFFFF">Assigned Name</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FFFFFF">Assigned eMail</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"colspan="2"><FONT COLOR="#FFFFFF">Assigned Phone </FONT></TD>
				
			</TR>
		 <TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><input name="AssignedName" id="email_borrower3" type="text" class="input" /></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><input name="AssignedeMail" id="email_borrower3" type="text" class=" input" /></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"colspan="2"><input name="AssignedPhone" id="email_borrower3" type="text" class="datepicker input" /></TD>
				
			</TR>
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FFFFFF">Assigned By</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="" SDNUM="1048;0;#.##0,00 &quot;lei&quot;" colspan="3"><input name="AssignedBy" id="email_borrower3" type="text" class="input" /></TD>
				
			</TR> 
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FFFFFF">Title</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="" SDNUM="1048;0;#.##0,00 &quot;lei&quot;" colspan="3"><input name="AssignedTitle" id="email_borrower3" type="text" class="input" /></TD>
				
			</TR> 
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FFFFFF">Signature</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="" SDNUM="1048;0;#.##0,00 &quot;lei&quot;" colspan="3"><input name="AssignedSignature" id="email_borrower3" type="text" class="input" /></TD>
				
			</TR> 
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FFFFFF">Assignment Date</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="" SDNUM="1048;0;#.##0,00 &quot;lei&quot;" colspan="3"><input name="AssignmenedDate" id="email_borrower3" type="text" class=" datepicker input" /></TD>
				
			</TR> 
	</TABLE>
	
	<div class='buttonWrapper'>
		<input name="submit" type="submit" value="Submit" class="button" />
                <input name="submitvalue" type="hidden" value="1" />
                	
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
