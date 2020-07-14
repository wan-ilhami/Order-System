<html>
<head>
    <title>Login Form Design</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
    <script language="javascript">
        function checkPasswords()
        {
            var passmatch = true;
            var p1 = document.getElementById("pass1").value;
            var p2 = document.getElementById("pass2").value;

            if(p1 != p2)
                {
                    alert("Passwords do not match!");
                    passmatch=false;
                }

            return passmatch;
        }
    </script>
<body>
    <div class="loginbox">
    <img src="zavatar.png" class="avatar">
        <h1>Register</h1>
        <form name="register" method="post" action="pregister.php">

            <p>Username</p>
            <input type="text" name="username" id="username" placeholder="Enter Username" required>

            <p>Email</p>
            <input type="text" name="email" id="email" placeholder="Enter Email" required>

            <p>Password</p>
            <input type="password" name="pass1" id="pass1" placeholder="Enter Password" required>

            <p>Confirm Password</p>
            <input type="password" name="pass2" id="pass2" placeholder="Enter Confirm Password" required>


            <tr>
                <td colspan="2"><input type="submit" name="btnsignin" id="btnsignin" value="Register" class="btn btn-info" onclick="return checkPasswords()" /></td>
            </tr>

        </form>
    </div>

</body>
</head>
</html>
