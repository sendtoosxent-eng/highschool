<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chat.me</title>

    <!-- Style CSS -->
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700|Poppins:400,500&display=swap');

        * {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            padding: 0;
            box-sizing: border-box;
        }
        .bg-img {
            position: relative;
            background: url('1.png') no-repeat center;
            background-size: cover;
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .bg-img::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
         
            z-index: 1;
        }

        .content {
            position: relative;
            z-index: 2;
            background: rgba(0, 0, 0, 0.5);
            border-radius: 8px;
            padding: 50px 40px;
            text-align: center;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(9px);
            max-width: 400px;
            width: 100%;
        }

        .content header {
            color: #fff;
            font-size: 32px;
            font-weight: 600;
            margin-bottom: 25px;
            font-family: 'Montserrat', sans-serif;
        }

        .field {
            position: relative;
            margin-top: 20px;
        }

        .field input {
            width: 100%;
            padding: 12px 45px 12px 15px;
            font-size: 16px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 6px;
            outline: none;
            background: rgb(158, 155, 155);
            color: #fff;
        }

        .field span {
            position: absolute;
            top: 12px;
            right: 15px;
            color: #bbb;
            font-size: 14px;
            cursor: pointer;
        }

        .field input[type="submit"] {
            background: #3498db;
            color: #fff;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
            padding: 12px;
        }

        .field input[type="submit"]:hover {
            background: #2980b9;
        }

        .pass {
            text-align: left;
            margin: 10px 0;
        }

        .pass a {
            color: #fff;
            font-size: 14px;
            text-decoration: none;
        }

        .pass a:hover {
            text-decoration: underline;
        }

        .signup {
            color: #fff;
            font-size: 14px;
            margin-top: 20px;
        }

        .signup a {
            color: #3498db;
            text-decoration: none;
        }

        .signup a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>
<body>
    
    <div class="bg-img">
        <div class="content">
            <div class="login-form">
                <header>Login Here</header>
                <form action="home.php" method="POST">
                
                    <div class="field">
                        <input type="email" name="email" required placeholder="Email address">
                    </div>
                    <div class="field">
                        <input type="password" class="pass-key" name="password" required placeholder="Password">
                        <span class="show">SHOW</span>
                    </div>
                    <div class="pass">
                        <a href="" onclick="showResetPassword(event)">Forgot Password?</a>
                    </div>
                    <div class="field">
                        <input type="submit" value="LOGIN TO CHAT">
                    </div>
                    <div class="signup">Don't have an account?
                        <a href="" onclick="showRegistration(event)">Signup Now</a>
                    </div>
                </form>
            </div>


    <script>
        // Password visibility toggle
        const showBtns = document.querySelectorAll('.show');
        
        showBtns.forEach(showBtn => {
            showBtn.addEventListener('click', function () {
                const passField = this.previousElementSibling; // Target the associated input field
                if (passField.type === "password") {
                    passField.type = "text";
                    this.textContent = "HIDE";
                } else {
                    passField.type = "password";
                    this.textContent = "SHOW";
                }
            });
        });

        // Toggle between forms
        function showLogin(event) {
            event.preventDefault();
            document.querySelector('.login-form').style.display = 'block';
            document.querySelector('.registration-form').style.display = 'none';
            document.querySelector('.reset-password-form').style.display = 'none';
        }

        function showRegistration(event) {
            event.preventDefault();
            document.querySelector('.login-form').style.display = 'none';
            document.querySelector('.registration-form').style.display = 'block';
            document.querySelector('.reset-password-form').style.display = 'none';
        }

        function showResetPassword(event) {
            event.preventDefault();
            document.querySelector('.login-form').style.display = 'none';
            document.querySelector('.registration-form').style.display = 'none';
            document.querySelector('.reset-password-form').style.display = 'block';
        }
    </script>

</body>

</html>
