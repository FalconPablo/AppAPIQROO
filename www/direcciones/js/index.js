// JavaScript Document

var resultObject = {
    formSubmitionResult : null  
}


$(document).on('pagebeforeshow', '#login-card', function(){  
        $(document).on('click', '#submit', function() { // catch the form's submit event
        if($('#login').val().length > 0 && $('#password').val().length > 0){
            // Send data to server through ajax call
            // action is functionality we want to call and outputJSON is our data
                $.ajax({
					url  : 'http://estadistica.apiqroo.com.mx/apis/login/',
                    data: {
						action   : 'login', 
						login    : $('#login').val(),
						password : $('#password').val()
					}, // Convert a form to a JSON string representation
					type         : 'get',
                    dataType     : 'jsonp',
					crossDomain  : true,                   
                    async        : true,
                    beforeSend: function() {
                        // This callback function will trigger before data is sent
                        $.mobile.showPageLoadingMsg(true); // This will show ajax spinner
                    },
                    complete: function(response) {
						// This callback function will trigger on data sent/received complete
                        $.mobile.hidePageLoadingMsg(); // This will hide ajax spinner
                    },
                    success: function (result) {
						
						alert(result.success);
                        if(result.success == false){
                			localStorage.clear();
							localStorage.setItem('userHandle', result.errors.message);
                			localStorage.setItem('userId'    , result.errors.message);              
               				//$('form#logInForm').append("<div class='inputError'><p>" + logInReturn.message[1] + "</p></div>");
							
            			}else if (result.success == true){
							resultObject.formSubmitionResult = result;
							$.mobile.changePage("#second"); 
						}
			
						
                        
                    },
                    error: function (request,error) {
                        // This callback function will trigger on unsuccessful action                
                        alert('Network error has occurred please try again!');
                    }
                });                   
        } else {
            alert('Please fill all nececery fields');
        }           
            return false; // cancel original event to prevent form submitting
        });    
});

$(document).on('pagebeforeshow', '#second', function(){     
    $('#second [data-role="content"]').append('This is a result of form submition: ' + resultObject.formSubmitionResult);  
});