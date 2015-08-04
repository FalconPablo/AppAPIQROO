<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Multi-page template</title>
	
    <link rel="stylesheet" type="text/css" href="../../js/jquery-mobile/jquery.mobile.theme-1.4.4.css">
    <link rel="stylesheet" type="text/css" href="../../js/jquery-mobile/jquery.mobile.structure-1.4.4.css">
    <link rel="stylesheet" type="text/css" href="../../js/jquery-mobile/css/themes/default/jquery.mobile.theme-1.4.4.min.css">
    
    
	<script src="../../js/jquery-mobile/demos/js/jquery.js"></script>
    <script src="../../js/jquery-mobile/demos/_assets/js/index.js"></script>
	<script src="../../js/jquery-mobile/jquery.mobile-1.4.4.min.js"></script>
</head>

<body>

<div data-role="page" id="home">
	
    <div data-role="header" data-position="fixed" >
        <h1>Puertos y Terminales</h1>
    </div>
	

	<div role="main" class="ui-content">
		<ul data-role="listview" data-inset="true" id="port-list">
           
        </ul>
	</div><!-- /content -->

	<div data-role="footer" data-position="fixed">
		<h4>APIQROO</h4>
	</div><!-- /footer -->

</div><!-- /page -->


<div data-role="page" id="port-detail">
	<div data-role="header">...</div>
	<div role="main" class="ui-content">...</div>
	<div data-role="footer">...</div>
</div>


<script>



$( document ).bind( 'mobileinit', function(){
  $.mobile.loader.prototype.options.text = "loading";
  $.mobile.loader.prototype.options.textVisible = false;
  $.mobile.loader.prototype.options.theme = "a";
  $.mobile.loader.prototype.options.html = "";
});


	
$(document).on('pageinit', '#home', function(){      
     
	$.mobile.loading('show');     
	
});

$("#home").on('pagebeforeshow', function(event) {
	$.mobile.loading('show');
    ports.getPorts();
	

});

$(document).on('vclick', '#port-list li a', function(){  
    var id = $(this).attr('data-id');
    $.mobile.changePage( "#port-detail", { transition: "slide", changeHash: false });
});

var ports = function(){
	
	
	
	return {
		
		portList : null,
		
		init : function(){
			this.getPorts();			
			
		},
		
		makeList : function(data){
			$.each(data, function(i, row) {
            		$('#listview1').append('<li><a href="" data-id="' + row.id + '"><h3>' + row.name + '</h3></a></li>');
         	});
        	$('#listview1').listview('refresh');
			
			
		},		
		getPorts : function(){
			
			
			
			
			
		}
		
	}

}();



	
	
	

</script>

</body>
</html>
