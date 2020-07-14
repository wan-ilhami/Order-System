<html>
<head>
    <title>Login Form Design</title>
    <link rel="stylesheet" type="text/css" href="style.css">
<body>
    <div class="loginbox">
    <img src="zavatar.png" class="avatar"> 
        <h1>Admin's <br> Login</h1>
        <form name="login" method="post" action="plogin.php">
            
            <p>Username</p>
            
            <input type="text" name="adminusername" id="adminusername" placeholder="Enter Username" required>
            <p>Password</p>
            
            <input type="password" name="adminPassword" id="adminPassword" placeholder="Enter Password" required/>
            
            <input type="submit" name="btnsignin" value="Sign in">
            
        </form>
    </div>
    
</body>
</head>
</html>