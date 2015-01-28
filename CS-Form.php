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
.headerrow{
border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000;
background-color:#365F91; color:#FFFFFF;

}
.headerrow-black{
border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000;
background-color:#404040; color:#FFFFFF;
}
.headerrow-blue{
border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000;
background-color:#1F497C; color:#FFFFFF;
}
.headerrow-capital{
border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000;
background-color:#244061; color:#FFFFFF; font-weight:bold;
}
</style>
</head>

<body>

<div id="main_content">
<?php
if($_POST['csform']== 1){
$username="root";
$password="";
$database="form";
$link=mysql_connect("localhost",$username,$password);
@mysql_select_db($database) or die( "Unable to select database");
$assign_form ="describe `csform`";
$result=mysql_query($assign_form);
while($row = mysql_fetch_array($result)){
    $arr_fields[] = $row['Field'];
}
//echo "<pre>";
//print_r($arr_fields);
//echo "</pre>";

$strQuery = "	INSERT INTO csform (";

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
 echo $strQuery .= ");" ;
mysql_query($strQuery) or die("Error in the consult.." . mysql_error($link));
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
				<TD  COLSPAN=4 HEIGHT=17 ALIGN=CENTER VALIGN=MIDDLE class="headerrow" ><B><FONT>CAPITAL STRATEGIES PLAN EVALUATION </FONT></B></TD>
			</TR>
			<TR>
				<TD  COLSPAN=4 HEIGHT=17 ALIGN=CENTER VALIGN=MIDDLE class="headerrow-black" ><B><FONT>Evaluated By </FONT></B></TD>
			</TR>
			<TR>
			    <TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=1 HEIGHT=20 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666"><FONT COLOR="#FFFFFF">NAME</FONT>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=3 HEIGHT=20 ALIGN=LEFT VALIGN=MIDDLE BGCOLOR="#FFFFFF"><FONT COLOR="#FF3333"><input name="EvaluatedName" id="EvaluatedName" type="text" class="input" /></FONT></TD>
			</TR>
			<tr>
			<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=1 HEIGHT=20 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666"><FONT COLOR="#FFFFFF">Title</FONT>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=3 HEIGHT=20 ALIGN=LEFT VALIGN=MIDDLE BGCOLOR="#FFFFFF"><FONT COLOR="#FF3333"><input name="EvaluatedTitle" id="EvaluatedTitle" type="text" class="input" /></FONT></TD>
			</tr>
			<tr>
			<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=1 HEIGHT=20 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666"><FONT COLOR="#FFFFFF">Organization</FONT>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=3 HEIGHT=20 ALIGN=LEFT VALIGN=MIDDLE BGCOLOR="#FFFFFF"><FONT COLOR="#FF3333"><input name="EvaluatedOrganization" id="EvaluatedOrganization" type="text" class="input" /></FONT></TD>
			</tr>
			<tr>
			<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=1 HEIGHT=20 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666"><FONT COLOR="#FFFFFF">Date</FONT>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=3 HEIGHT=20 ALIGN=LEFT VALIGN=MIDDLE BGCOLOR="#FFFFFF"><FONT COLOR="#FF3333"><input name="EvaluatedDate" id="EvaluatedDate" type="date" class="input" /></FONT></TD>
			</tr>
			
			
	<TR>
		<TD  COLSPAN=4 HEIGHT=17 ALIGN=CENTER VALIGN=MIDDLE class="headerrow-blue" ><B><FONT>BUSINESS DETAILS </FONT></B></TD>
	</TR>		
	<tr>
			<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=1 HEIGHT=20 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666"><FONT COLOR="#FFFFFF">Business Name</FONT>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=3 HEIGHT=20 ALIGN=LEFT VALIGN=MIDDLE BGCOLOR="#FFFFFF"><FONT COLOR="#FF3333"><input name="BusinessName" id="BusinessName" type="text" class="input" /></FONT></TD>
			</tr>
	     <TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=34 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666"><B><FONT COLOR="#FFFFFF">Entity Formation<BR><FONT SIZE="2">(Sole Proprietor, LLC, Corp, etc.)</FONT></FONT></B></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666"><FONT COLOR="#FFFFFF">Years In Business </FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666"><FONT COLOR="#FFFFFF">Business SIC/NAICS Code </FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666"><FONT COLOR="#FFFFFF">Business Purpose </FONT></TD>
			</TR>
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE>
					<FONT COLOR="#FF3333">
						<select name="EntityFormation" id="EntityFormation" class="input" validate="required:true" title="Please select entity formation.">
							<option value="" selected="selected"></option>
							<option value="soleprop">Sole Proprietor</option>
							<option value="llc">LLC - Limited Liability Company</option>
							<option value="scorp">S-Corp</option>
							<option value="ccorp">C-Corp</option>
							<option value="nonprofit">NonProfit</option>
							<option value="other">Other</option>
						</select>
					</FONT>				</TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE>
					<FONT COLOR="#FF3333">
						<select name="YearsInBusiness" class="input"  validate="required:true" title="Please select your years in business">
							<option value=""></option>
							<option>Less than 1 year</option>
							<option>1 - 3 years</option>
							<option>3 - 5 years</option>
							<option>5 - 10 years</option>
							<option>10+ years</option>
						</select>
					</FONT>				</TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE><FONT COLOR="#FF3333"><input name="BusinessSICCode" id="BusinessSICCode" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE><FONT COLOR="#FF3333"><input name="BusinessPurpose" id="BusinessPurpose" type="text" class="input" /></FONT></TD>
			</TR>
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ROWSPAN=3 HEIGHT=51 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666"><FONT COLOR="#FFFFFF">BUSINESS ADDRESS</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666"><FONT COLOR="#FFFFFF">Street</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=2 ALIGN=CENTER VALIGN=MIDDLE><FONT COLOR="#FF0000"><input name="Street" id="Street" type="text" class="input" /></FONT></TD>
			</TR>
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666"><FONT COLOR="#FFFFFF">City</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=2 ALIGN=CENTER VALIGN=MIDDLE><FONT COLOR="#FF0000"><input name="City" id="City" type="text" class="input" /></FONT></TD>
			</TR>
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666"><FONT COLOR="#FFFFFF">Zip</FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=2 ALIGN=CENTER VALIGN=MIDDLE><FONT COLOR="#FF0000"><input name="Zip" type="text" class="input" /></FONT></TD>
			</TR>
		<TR>
		<TD  COLSPAN=4 HEIGHT=17 ALIGN=CENTER VALIGN=MIDDLE class="headerrow-capital" ><B><FONT>CAPITAL STRATEGY PLANNING AREAS OF CONSIDERATION  </FONT></B></TD>
	</TR>		
		<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=20 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#404040"><B><FONT COLOR="#FFFFFF"><BR><FONT SIZE="2"></FONT></FONT></B></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#404040"><FONT COLOR="#FFFFFF">Description </FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#404040" colspan="2"><FONT COLOR="#FFFFFF">Comments/Rationale </FONT></TD>
			</TR>
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#404040" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FFFFFF">Working Capital Cash Flow Needs </FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="WorkingCapitalDescription1" id="WorkingCapitalDescription1" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="WorkingCapitalRationale1" id="WorkingCapitalRationale1" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="WorkingCapitalRationale4" id="WorkingCapitalRationale4" type="text" class="input" /></FONT></TD>
			</TR>	
			<TR>
				<TD STYLE="border-top: 0px solid #000000; border-bottom: 1px solid #000000; border-left: 0px solid #000000; border-right: 0px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#404040" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"></TD>
				<TD STYLE="border-top: 0px solid #000000; border-bottom: 0px solid #000000; border-left: 0px solid #000000; border-right: 0px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><font color="#FF0066">
				  <input name="WorkingCapitalDescription2" id="WorkingCapitalDescription2" type="text" class="input" />
				</font></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="WorkingCapitalRationale2" id="WorkingCapitalRationale2" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="WorkingCapitalRationale5" id="WorkingCapitalRationale5" type="text" class="input" /></FONT></TD>
			</TR>	
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#404040" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FFFFFF"> </FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="WorkingCapitalDescription3" id="WorkingCapitalDescription3" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="WorkingCapitalRationale3" id="WorkingCapitalRationale3" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="WorkingCapitalRationale6" id="WorkingCapitalRationale6" type="text" class="input" /></FONT></TD>
			</TR>	
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=20 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#262626"><B><FONT COLOR="#FFFFFF"><FONT SIZE="2">Time-Frame</FONT></FONT></B></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#262626"><FONT COLOR="#FFFFFF">Date </FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#262626" colspan="2"><FONT COLOR="#FFFFFF">Status/Comments  </FONT></TD>
			</TR>
			
		<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#262626" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FFFFFF">Start Date </FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="StartDate" id="StartDate" type="date" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="Status_Comments1" id="Status_Comments1" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="Status_Comments3" id="Status_Comments3" type="text" class="input" /></FONT></TD>
			</TR>
		
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#262626" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FFFFFF">Deadline </FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="Deadline" id="Deadline" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="Status_Comments2" id="Status_Comments2" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="Status_Comments4" id="Status_Comments4" type="text" class="input" /></FONT></TD>
			</TR>
			
			<!-- Retional / comments start-->
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=20 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#404040"><B><FONT COLOR="#FFFFFF"><FONT SIZE="2">CAPITAL SOURCES</FONT></FONT></B></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#404040"><FONT COLOR="#FFFFFF">Description </FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#404040" colspan="2"><FONT COLOR="#FFFFFF">Comments/Rationale </FONT></TD>
			</TR>
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#404040" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FFFFFF">Growth and Capacity Building Capital Needs  </FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="CapitalNeedsDescription1" id="CapitalNeedsDescription1" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="CapitalNeedsComments1" id="CapitalNeedsComments1" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="CapitalNeedsRationale1" id="name_borrower3" type="text" class="input" /></FONT></TD>
			</TR>	
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#404040" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FFFFFF"> </FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="CapitalNeedsDescription2" id="CapitalNeedsDescription2" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="CapitalNeedsComments2" id="CapitalNeedsComments2" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="CapitalNeedsRationale2" id="name_borrower3" type="text" class="input" /></FONT></TD>
			</TR>	
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#404040" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FFFFFF"> </FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="CapitalNeedsDescription3" id="CapitalNeedsDescription3" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="CapitalNeedsComments3" id="CapitalNeedsComments3" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="CapitalNeedsRationale3" id="CapitalNeedsRationale3" type="text" class="input" /></FONT></TD>
			</TR>
			<!-- Rationale / comments end-->
			
			<!-- Status / comments start-->
				
		<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=20 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#262626"><B><FONT COLOR="#FFFFFF"><FONT SIZE="2">Time-Frame</FONT></FONT></B></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#262626"><FONT COLOR="#FFFFFF">Date </FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#262626" colspan="2"><FONT COLOR="#FFFFFF">Status/Comments  </FONT></TD>
			</TR>
			
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#262626" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FFFFFF">Start Date </FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="StartDate2" id="StartDate2" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="StartDateStatus2" id="StartDateStatus2" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="StartDateComments2" id="StartDateComments2" type="text" class="input" /></FONT></TD>
			</TR>
		
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#262626" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FFFFFF">Deadline </FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><font color="#FF0066">
				  <input name="Deadline2" id="Deadline2" type="text" class="input" />
				</font></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="StartDateStatus3" id="StartDateStatus3" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="StartDateComments2" id="StartDateComments2" type="text" class="input" /></FONT></TD>
			</TR>
			<!-- end Status / comments -->	
			<!-- Rationale / comments start-->
						<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=20 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#404040"><B><FONT COLOR="#FFFFFF"><FONT SIZE="2">CAPITAL SOURCES</FONT></FONT></B></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#404040"><FONT COLOR="#FFFFFF">Description </FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#404040" colspan="2"><FONT COLOR="#FFFFFF">Comments/Rationale </FONT></TD>
			</TR>
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#404040" SDNUM="1048;0;#.##0,00 &quot;lei&quot;">&nbsp;</TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><font color="#FF0066">
				  <input name="CapitalSourceDescription1" id="CapitalSourceDescription1" type="text" class="input" />
				</font></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="CapitalSourceComments1" id="CapitalSourceComments1" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="CapitalSourceRationale1" id="CapitalSourceRationale1" type="text" class="input" /></FONT></TD>
			</TR>	
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#404040" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FFFFFF"> </FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="CapitalSourceDescription2" id="CapitalSourceDescription2" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="CapitalSourceComments2" id="CapitalSourceComments2" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="CapitalSourceRationale2" id="CapitalSourceRationale2" type="text" class="input" /></FONT></TD>
			</TR>	
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#404040" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FFFFFF"> </FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="CapitalSourceDescription3" id="CapitalSourceDescription3" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="CapitalSourceComments3" id="CapitalSourceComments3" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="CapitalSourceRationale3" id="CapitalSourceRationale3" type="text" class="input" /></FONT></TD>
			</TR>
			<!-- Rationale / comments end-->
			
			<!-- Status / comments start-->
				
		<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=20 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#262626"><B><FONT COLOR="#FFFFFF"><FONT SIZE="2">Time-Frame</FONT></FONT></B></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#262626"><FONT COLOR="#FFFFFF">Date </FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#262626" colspan="2"><FONT COLOR="#FFFFFF">Status/Comments  </FONT></TD>
			</TR>
			
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#262626" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FFFFFF">Start Date </FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><font color="#FF0066">
				  <input name="StartDate3" id="StartDate3" type="text" class="input" />
				</font></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="StartDate3Status1" id="StartDate3Status1" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="StartDate3Comments1" id="StartDate3Comments1" type="text" class="input" /></FONT></TD>
			</TR>
		
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#262626" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FFFFFF">Deadline </FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="Deadline3" id="Deadline3" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="StartDate3Status2" id="StartDate3Status2" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="StartDate3Comments1" id="StartDate3Comments1" type="text" class="input" /></FONT></TD>
			</TR>
			<!-- end Status / comments-->	
			
			<!-- Rationale / comments start-->
						<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=20 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#404040"><B><FONT COLOR="#FFFFFF"><FONT SIZE="2">CAPITAL GAPS</FONT></FONT></B></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#404040"><FONT COLOR="#FFFFFF">Description </FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#404040" colspan="2"><FONT COLOR="#FFFFFF">Comments/Rationale </FONT></TD>
			</TR>
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#404040" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FFFFFF"> </FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="CapitalGapDescription1" id="CapitalGapDescription1" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="CapitalGapComments1" id="CapitalGapComments1" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="CapitalGapRationale1" id="CapitalGapRationale1" type="text" class="input" /></FONT></TD>
			</TR>	
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#404040" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FFFFFF"> </FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="CapitalGapDescription2" id="CapitalGapDescription2" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="CapitalGapComments2" id="CapitalGapComments2" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="CapitalGapRationale2" id="CapitalGapRationale2" type="text" class="input" /></FONT></TD>
			</TR>	
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#404040" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FFFFFF"> </FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="CapitalGapDescription3" id="CapitalGapDescription3" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="CapitalGapComments3" id="CapitalGapComments3" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="CapitalGapRationale3" id="CapitalGapRationale3" type="text" class="input" /></FONT></TD>
			</TR>
			<!-- Rationale / comments end-->
			
			<!-- Status / comments start-->
				
		<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=20 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#262626"><B><FONT COLOR="#FFFFFF"><FONT SIZE="2">Time-Frame</FONT></FONT></B></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#262626"><FONT COLOR="#FFFFFF">Date </FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#262626" colspan="2"><FONT COLOR="#FFFFFF">Status/Comments  </FONT></TD>
			</TR>
			
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#262626" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FFFFFF">Start Date </FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="StartDate4" id="StartDate4" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="StartDate4Status1" id="StartDate4Status1" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="StartDate4Comments1" id="StartDate4Comments1" type="text" class="input" /></FONT></TD>
			</TR>
		
			<TR>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#262626" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FFFFFF">Deadline </FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="Deadline4" id="Deadline4" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="StartDate4Status2" id="StartDate4Status2" type="text" class="input" /></FONT></TD>
				<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="StartDate4Comments2" id="StartDate4Comments2" type="text" class="input" /></FONT></TD>
			</TR>
			<!-- end Status / comments-->	
		</TBODY>
	</TABLE>
	

	
	<div class='buttonWrapper'>
		<input name="submit" type="submit" value="Submit" class="button" />	
		<input name="csform" type="hidden" value="1" />	
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
