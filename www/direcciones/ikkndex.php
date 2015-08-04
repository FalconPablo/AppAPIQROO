<!DOCTYPE html>
<html>
<head>
    <title>jQM Complex Demo</title>
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0"/>
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
    <style>
        #login-button {
            margin-top: 30px;
        }        
    </style>
    <script src="http://www.dragan-gaic.info/js/jquery-1.8.2.min.js"></script>    
    <script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
    <script src="js/index.js"></script>
</head>
<body>
    <div data-role="page" id="login-card" data-theme="b">
        <div data-role="header" data-theme="a">
            <h3>Login Page</h3>
        </div>

        <div data-role="content">
            <form id="check-user" class="ui-body ui-body-a ui-corner-all" data-ajax="false">
                <fieldset>
                    <div data-role="fieldcontain">
                        <label for="login">Enter your username:</label>
                        <input type="text" value="" name="login" id="login"/>
                    </div>                                  
                    <div data-role="fieldcontain">                                      
                        <label for="password">Enter your password:</label>
                        <input type="password" value="" name="password" id="password"/> 
                    </div>
                    <input type="button" data-theme="b" name="submit" id="submit" value="Submit">
                </fieldset>
            </form>                              
        </div>

        <div data-theme="a" data-role="footer" data-position="fixed">

        </div>
    </div>
    
    <div data-role="page" id="second">
        <div data-theme="a" data-role="header">
            <h3></h3>
        </div>

        <div data-role="content">

        </div>

        <div data-theme="a" data-role="footer" data-position="fixed">
            <h3>Page footer</h3>
        </div>
    </div>
    
    
</body>
</html>