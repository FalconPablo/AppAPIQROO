/// JavaScript Document

var resultObject = {
    formSubmitionResult : null  
}


$(document).on('pagebeforeshow', '#login-card', function(){  
        $(document).on('click', '#submit', function() { // catch the form's submit event
        if($('#login').val().length > 0 && $('#password').val().length > 0){
            // 1Send data to server through ajax call  // 1Enviar datos al servidor a través de la llamada ajax
            // 2action is functionality we want to call and outputJSON is our data  // 2Acción es la funcionalidad que queremos llamar y outputJSON es nuestros datos
            		$.ajax({
                    url  : 'http://estadistica.apiqroo.com.mx/apis/login/',


                    data: {

                        action   : 'login', 
                        login    : $('#login').val(),
                        password : $('#password').val()
                    }, // Convert a form to a JSON string representation
                    //Convertir un formulario para una representación de cadena JSON


                    type         : 'get',
                    dataType     : 'jsonp',
                    crossDomain  : true,                   
                    async        : true,
                    beforeSend: function() {
                        // This callback function will trigger before data is sent
                        //Esta función de devolución de llamada se activará antes de los datos se envían
                        $.mobile.loading( "show", {
                        text: "Cargando",
                        textVisible: "textVisible",
                        theme: "b",
                        

    					});
                       
                    },
                    complete: function(response) {
						// This callback function will trigger on data sent/received complete
                     // This will hide ajax spinner
                    },
                    success: function (result) {
                        if(result.success == false){
                			localStorage.clear();
                            alert("Datos Incorectos Revise contraseña y/o El Usuario!"); 				
   						 $.mobile.loading( "hide" );
						

                                      
               				
            			}else if (result.success == true){
							
                            resultObject.formSubmitionResult = result;
							$.mobile.changePage("menu.html"); 
							
							var username = $('#login').val();
							var password = $('#password').val();
      						localStorage.setItem("login", username);
							localStorage.setItem("password", password);
						}
			
						
                        
                    },
                    error: function (request,error) {
                        // This callback function will trigger on unsuccessful action                
                        alert('Error Revise contraseña y/o El Usuario!es');
                    }
                });                   
        } else {
            alert(' Datos Incompletos Revise Contraseña y/o Usuario!');
        }           
            return false; // cancel original event to prevent form submitting
        });    
});

$(document).on('pagebeforeshow', '#second', function(){    
$("#login").text('Bienvenido, ' + sessionStorage.getItem("login")); 
    $('#second [data-role="content"]').append('This is a result of form submition: ' + resultObject.formSubmitionResult);  
});




