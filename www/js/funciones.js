/// JavaScript Document

var resultObject = {
    formSubmitionResult : null  
}


$(document).on('pagebeforeshow', '#login-card', function(){  
        $(document).on('click', '#submit', function() { // catch the form's submit event
        if($('#login').val().length > 0 && $('#password').val().length > 0){
           
			
			var auth = sigin($('#login').val(), $('#password').val() );
			
            		           
        } else {


        	$( "#popupDialog" ).popup( "open" );
            
        }           
            return false; 
        });    
});

function sigin(login, password){
	
	var autentificado = false;
	
	$.ajax({
		
		
		url  : 'http://estadistica.apiqroo.com.mx/apis/login/',
		data: {
	
			action   : 'login', 
			login    : login,
			password : password
		}, 
		//Convertir un formulario para una representación de cadena JSON
		 xhrFields: {
        	withCredentials: true
    	},
		crossDomain: true,
		type         : 'get',	
		dataType     : 'jsonp',	                   
		async        : true,
		beforeSend: function() {
			// This callback function will trigger before data is sent
			//Esta función de devolución de llamada se activará antes de los datos se envían
			$.mobile.loading( "show", {
			text: "Autentificando..",
			textVisible: "textVisible",
			theme: "b",
			
	
			});
		   
		},
		complete: function(response) {
			// This callback function will trigger on data sent/received complete
		    // This will hide ajax spinner
			$.mobile.loading( "hide" );
		},
		success: function (result) {
			 if (result.success == true){
				 $.jStorage.set("login", $('#login').val());
				 $.jStorage.set("password" , $('#password').val());
				 $.mobile.changePage("menu.html"); 
				 
			 }
			 
			 return false;
			 
			
		},
		error: function (request,error) {
			// This callback function will trigger on unsuccessful action                
			alert('Error Revise contraseña y/o El Usuario!es');

		}
		
		
		
		
	});        	
	
	
	
	$(document).ready('#panel-responsive-page1',function(){
			$("#username").html( $.jStorage.get("#login"));
			
			});
	}

