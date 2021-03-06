<?php
include_once("config/config.php");
//include "../../header.php";

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


<style type="text/css">
<!--
.style2 {font-size: 24}
-->
</style>
</head>

<body>

<div id="main_content">
<?php
if($_POST['authorize_form']== 1){
 
	$username="tglomo_wfqt1";
	$password="63oNprssnOpxqI";
	$database="tglomo_wfqt1_db";
	$link=mysql_connect("localhost",$username,$password);
	@mysql_select_db($database) or die( "Unable to select database");
	$assign_form ="describe `programauthorization`";
	$result=mysql_query($assign_form);
	while($row = mysql_fetch_array($result)){
		$arr_fields[] = $row['Field'];
	}
	//echo "<pre>";
	//print_r($arr_fields);
	//echo "</pre>";
	
	$strQuery = " INSERT INTO programauthorization (";
	
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
	header("Location:form_staff_auth.php?message=success");
	}
	 
?>
<style type="text/css">
.headrow{
    border-top: 1px solid #000000; 
    border-bottom: 1px solid #000000; 
    border-left: 1px solid #000000; 
    border-right: 1px solid #000000;
    background-color: #0084D1;
    color: #FFF; 
    font-weight: bold;
}
table {
    border: 1px solid #000;
}
td {
    border-top: 1px solid #000000; 
    border-bottom: 1px solid #000000; 
    border-left: 1px solid #000000; 
    border-right: 0px solid #000000;
    color:#FFF;
}

.message{
background-color:#006600; color:#fff; text-align:center; font-family:Arial, Helvetica, sans-serif; font-size:14px; font-weight:bold;
}

</style>
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
			    <TD  COLSPAN=2 WIDTH=238 HEIGHT=69 ALIGN=LEFT VALIGN=MIDDLE><img src="images/Nor-Cal_MLP_Logo.png" alt="MLP-Logo" height="100" width="180"></TD>
			    <TD  COLSPAN=2 WIDTH=238 HEIGHT=69 ALIGN=RIGHT VALIGN=MIDDLE><img src="images/cap_logo_clear-02.png" alt="CAP-Logo" height="100" width="180"> </TD>
			</TR>
			<TR>				
				<TD  COLSPAN=4 WIDTH=238 ALIGN=CENTER VALIGN=MIDDLE><B>PROGRAM ADMINISTRATOR</B></TD>
			</TR>
			<TR>
				<TD  class="headrow" COLSPAN=4 HEIGHT=17 ALIGN=CENTER VALIGN=MIDDLE > DETAILS</TD>
			</TR>
			<TR>
			    <TD  COLSPAN=1 HEIGHT=30 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666"> BUSINESS NAME  
				<TD  COLSPAN=3 HEIGHT=30 ALIGN=LEFT VALIGN=MIDDLE BGCOLOR="#FFFFFF">  <input name="BusinessName" id="EntityFormation" type="text" class="input"validate="required:true" title="Please Enter business Name" />  </TD>
			</TR>
			<TR>
				<TD   HEIGHT=34 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666"><B> Entity Formation<BR><FONT SIZE="2">(Sole Proprietor, LLC, Corp, etc.)    </B></TD>
				<TD   ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666"> Months In Business    </TD>
				<TD   ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666">  Code   </TD>
				<TD   ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666">Purpose</TD>
			</TR>
			<TR>
				<TD   HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE>
					  
						<select name="EntityFormation" id="EntityFormation" class="input" validate="required:true" title="Please select entity formation.">
							<option value="" selected="selected"></option>
							<option value="soleprop">Sole Proprietor</option>
							<option value="llc">LLC - Limited Liability Company</option>
							<option value="scorp">S-Corp</option>
							<option value="ccorp">C-Corp</option>
							<option value="nonprofit">NonProfit</option>
							<option value="other">Other</option>
				  </select>				</TD>
				<TD   ALIGN=CENTER VALIGN=MIDDLE>
					  
						<select name="MonthsInBusiness" class="input" id="MonthsInBusiness" title="Please select your Months in business"  validate="required:true">
							<option value="Lessthan1Month">Less than 1 Month</option>
							<option value="1-3Month">1 - 3 Month</option>
							<option value="3-5Month">3 - 5 Month</option>
							<option value="5-10Month">5 - 10 Month</option>
							<option value="10+Month">10+ Month</option>
				  </select>				</TD>
				<TD   ALIGN=CENTER VALIGN=MIDDLE>  <input name="Code" id="Code" type="text" class="input" validate="required:true" title="Please Enter business Code"/>  </TD>
				<TD   ALIGN=CENTER VALIGN=MIDDLE>  <input name="Purpose" id="Purpose" type="text" class="input" />  </TD>
			</TR>
			<TR>
				<TD   ROWSPAN=3 HEIGHT=51 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666"> BUSINESS ADDRESS  </TD>
				<TD   ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666"> Street  </TD>
				<TD   COLSPAN=2 ALIGN=CENTER VALIGN=MIDDLE><FONT COLOR="#FF0000"><input name="Street" id="Street" type="text" class="input" />  </TD>
			</TR>
			<TR>
				<TD   ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666"> City  </TD>
				<TD   COLSPAN=2 ALIGN=CENTER VALIGN=MIDDLE><FONT COLOR="#FF0000"><input name="City" id="City" type="text" class="input" />  </TD>
			</TR>
			<TR>
				<TD   ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666"> Zip  </TD>
				<TD   COLSPAN=2 ALIGN=CENTER VALIGN=MIDDLE><FONT COLOR="#FF0000"><input name="Zip" type="text" class="input" id="Zip" />  </TD>
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
				<TD  class="headrow"  COLSPAN=4 WIDTH=951 HEIGHT=17 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#0084D1" SDNUM="1048;0;#.##0,00 &quot;lei&quot;">OWNER DETAILS </TD>
			</TR>
			<TR>
				<TD   HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"> Category  </TD>
				<TD   ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"> Owner 1   </TD>
				<TD   ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"> Owner 2   </TD>
				<TD   ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"> Owner 3   </TD>
			</TR>
			<TR>
				<TD   HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"> Name  </TD>
				<TD   ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="Owner1Name" id="Owner1Name" type="text" class="input" />  </TD>
				<TD   ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="Owner2Name" id="Owner2Name" type="text" class="input" />  </TD>
				<TD   ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="Owner3Name" id="Owner3Name" type="text" class="input" />  </TD>
			</TR>
			<TR>
				<TD   HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"> Phone Number  </TD>
				<TD   ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="Owner1Phone" id="name_borrower1" type="text" class="input" />  </TD>
				<TD   ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="Owner2Phone" id="name_borrower2" type="text" class="input" />  </TD>
				<TD   ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="Owner3Phone" id="name_borrower3" type="text" class="input" />  </TD>
			</TR>
			<TR>
				<TD   HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#666666" SDNUM="1048;0;#.##0,00 &quot;lei&quot;"> eMail Address  </TD>
				<TD   ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="Owner1Email" id="Owner1Email" type="text" class="input" />  </TD>
				<TD   ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="Owner2Email" id="Owner2Email" type="text" class="input" />  </TD>
				<TD   ALIGN=CENTER VALIGN=MIDDLE SDNUM="1048;0;#.##0,00 &quot;lei&quot;"><FONT COLOR="#FF0066"><input name="Owner3Email" id="Owner3Email" type="text" class="input" />  </TD>
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
				<TD   COLSPAN=3 WIDTH=951 HEIGHT=17 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#0084D1"><B>  DETAILS  </B></TD>
			</TR>
			<TR>
				<TD   HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586"> Name  </TD>
				<TD   ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586"> Contract/Project Ref. No.   </TD>
				<TD   ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586"> Contract Date   </TD>
			</TR>
			<TR>
				<TD   HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE><FONT COLOR="#FF0066"><input name="ContractName" type="text" class="input" id="ContractName" />  </TD>
				<TD   ALIGN=CENTER VALIGN=MIDDLE><FONT COLOR="#FF0066"><input name="ContractProjectRefNo" type="text" class="input" id="ContractProjectRefNo" />  </TD>
				<TD   ALIGN=CENTER VALIGN=MIDDLE><FONT COLOR="#FF0066"><input name="ContractDate" type="text" class='datepicker input' id="ContractDate"  />  </TD>
			</TR>
			<TR>
				<TD   HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586"> Project Name  </TD>
				<TD   ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586"> Project Start Date  </TD>
				<TD   ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586"> Project Estimation Completion Date  </TD>
			</TR>
			<TR>
				<TD   HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE><FONT COLOR="#FF0066"><input name="ProjectName" type="text" class="input" id="ProjectName" />  </TD>
				<TD   ALIGN=CENTER VALIGN=MIDDLE><FONT COLOR="#FF0066"><input name="StartDate" type="text" class='datepicker input' id="StartDate" />  </TD>
				<TD   ALIGN=CENTER VALIGN=MIDDLE><FONT COLOR="#FF0066"><input name="ProjectCompletionDate" type="text" class='datepicker input' id="ProjectCompletionDate" />  </TD>
			</TR>
			<TR>
				<TD   HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586"> Partner Name   </TD>
				<TD   ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586"> Partner Contact Name   </TD>
				<TD   ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586"> Partner Contact Title   </TD>
			</TR>
			<TR>
				<TD   HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE><FONT COLOR="#FF0066"><input name="PartnerName" type="text" class="input" id="PartnerName" />  </TD>
				<TD   ALIGN=CENTER VALIGN=MIDDLE><FONT COLOR="#FF0066"><input name="PartnerContactName" type="text" class="input" id="PartnerContactName" />  </TD>
				<TD   ALIGN=CENTER VALIGN=MIDDLE><FONT COLOR="#FF0066"><input name="PartnerContactTitle" type="text" class="input" id="PartnerContactTitle" />  </TD>
			</TR>
			<TR>
				<TD   HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586"> Partner Address</TD>
				<TD   ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586"> Partner Contact eMail    </TD>
				<TD   ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586"> Partner Contact Phone    </TD>
			</TR>
			<TR>
				<TD   HEIGHT=18 ALIGN=CENTER VALIGN=MIDDLE><FONT COLOR="#FF0066"><input name="PartnerAddress" type="text" class="input" id="PartnerAddress" />  </TD>
				<TD   ALIGN=CENTER VALIGN=MIDDLE><FONT COLOR="#FF0066"><input name="PartnerContacteMail" type="text" class="input" id="PartnerContacteMail" />  </TD>
				<TD   ALIGN=CENTER VALIGN=MIDDLE><FONT COLOR="#FF0066"><input name="PartnerContactPhone" type="text" class="input" id="PartnerContactPhone" />  </TD>
			</TR>
			
			<TR>
			  <TD   HEIGHT=36 colspan="3" ALIGN=CENTER VALIGN=MIDDLE >&nbsp;</TD>
		  </TR>
			<TR>
			  <TD   HEIGHT=36 colspan="3" ALIGN=CENTER VALIGN=MIDDLE style="color:#000000;" >The staff has reviewed the request and hereby approves the Partner’s request. </TD>
		  </TR>
			<TR>
			  <TD   HEIGHT=36 colspan="3" ALIGN=CENTER VALIGN=MIDDLE  >&nbsp;</TD>
		  </TR>
			<TR>
			  <TD   HEIGHT=18 colspan="3" ALIGN=CENTER VALIGN=MIDDLE BGCOLOR="#004586">PROGRAM AUTHORIZATION </TD>
		  </TR>
			<TR>
			  <TD   HEIGHT=36 colspan="3" ALIGN=CENTER VALIGN=MIDDLE >
			  <table width="100%" border="0" style="border:none;" cellpadding="0" cellspacing="0">
                <tr style="border:none;">
                  <td align="center" style="background-color:rgb(102, 102, 102)" >Approved By </td>
                  <td align="center" style="background-color:rgb(102, 102, 102)">PROGRAM NAME </td>
                </tr>
                <tr>
                  <td style="background-color:rgb(102, 102, 102)">NAME</td>
                  <td ><input name="ApprovedByName" id="ApprovedByName" type="text" class="input" /></td>
                </tr>
                <tr>
                  <td style="background-color:rgb(102, 102, 102)">TITLE </td>
                  <td ><input name="ApprovedByTitle" id="ApprovedByTitle" type="text" class="input" /></td>
                </tr>
                <tr>
                  <td style="background-color:rgb(102, 102, 102)">SIGNATURE</td>
                  <td ><input name="ApprovedBySignature" id="ApprovedBySignature" type="text" class="input" /></td>
                </tr>
                <tr>
                  <td style="background-color:rgb(102, 102, 102)">DATE</td>
                  <td ><input name="ApprovedByDate" type="text" class='datepicker input' id="ApprovedByDate" /></td>
                </tr>
                <tr style="border:none;">
                  <td width="25%" style="border:none;">&nbsp;</td>
                  <td style="border:none;"><textarea name="ApprovedDescription" class="input textarea" rows="4" cols="50"></textarea></td>
                </tr>
              </table></TD>
		  </TR>
		</TBODY>
	</TABLE>
	<div class='buttonWrapper'>
		<input name="submit" type="submit" value="Submit" class="button" />	
		<input name="authorize_form" type="hidden" value="1" />
		
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
