// JavaScript Document
(function() {
	var $j;
    // Localize jQuery variable
  	var domainurl	=	'http://www.mydomain.com/webform/';  /* place location of web form here */

  /******** Load jQuery if not present *********/
    if (window.jQuery === undefined) {
       
        var script_tag = document.createElement('script');
        script_tag.setAttribute("type","text/javascript");
        script_tag.setAttribute("src","http://code.jquery.com/jquery-latest.min.js");
        if (script_tag.readyState) {
          script_tag.onreadystatechange = function () { // For old versions of IE
              if (this.readyState == 'complete' || this.readyState == 'loaded') {
                  scriptLoadHandler();
              }
          };
        } else { // Other browsers
          script_tag.onload = scriptLoadHandler;
        }
        // Try to find the head, otherwise default to the documentElement
        (document.getElementsByTagName("head")[0] || document.documentElement).appendChild(script_tag);
		
       
    } else {
       
        scriptLoadHandler();
    }

    /******** Called once jQuery has loaded ******/
    function scriptLoadHandler() {
         loadjscssfile(domainurl+'js/colorbox/jquery.colorbox.js' ,'js');
		 loadjscssfile(domainurl+'js/colorbox/colorbox.css' ,'css');
		  $j = jQuery.noConflict();

		 $j(document).ready(function($)
		  {
			  $("#LanuchWidgetButtonDiv").css('cursor','pointer');
			  $("#LanuchWidgetButtonDiv").css('width','200px');
			  $("#LanuchWidgetButtonDiv").css('height','70px');
			  $("#LanuchWidgetButtonDiv").click(function()
			  {
				  var id	= $(this).find('img').attr('id');
		   		$.colorbox({href:domainurl+'index.php?page_id='+id, scrolling:false, iframe: true, scrolling: false, width:"1000px", height:"1230px"});
			  });
	
});
}
	
	function loadjscssfile(filename, filetype){
		if (filetype=="js")
		{
			//if filename is a external JavaScript file
  			var fileref=document.createElement('script')
  			fileref.setAttribute("type","text/javascript")
  			fileref.setAttribute("src", filename)
 		}
 	else if (filetype=="css")
	{ //if filename is an external CSS file
 		 var fileref=document.createElement("link")
  		fileref.setAttribute("rel", "stylesheet")
  		fileref.setAttribute("type", "text/css")
 		 fileref.setAttribute("href", filename)
	}
 	if (typeof fileref!="undefined")
	{
  		document.getElementsByTagName("head")[0].appendChild(fileref);
	}
}

    })(); 
	 setTimeout(function(){
		
          }, 1000);