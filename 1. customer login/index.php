<html>
<head>
    <title>Login Form Design</title>
    <link rel="stylesheet" type="text/css" href="style.css">
<body>
    <div class="loginbox">
    <img src="zavatar.png" class="avatar">
        <h1>Customer's <br> Login</h1>
        <form name="login" method="post" action="plogin.php">

            <p>Username</p>

            <input type="text" name="username" id="username" placeholder="Enter Username" required>
            <p>Password</p>

            <input type="password" name="password" id="password" placeholder="Enter Password" required/>

            <input type="submit" name="btnsignin" value="Sign in">

            
            <button><a href="index1.php">Create new account?</a></button>
          
        </form>

    </div>

</body>
</head>
</html>
