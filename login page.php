
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h2 class="logo"><a href="#" class="logo1">AssignmentKaro.com</a></h2>
        <nav class="navigation">
            <a href="#" class="logo1">HOME</a>
            <a href="#" class="logo1">SERVICES</a>
            <a href="#" class="logo1">CONTACT</a>
            <button class="btnLogin-popup">Join us</button>
        </nav> 
    </header>
    <section>
    <div class="head">
        <span class="auto-type"></span>
        </div>
    <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
        <script>
          var typed =new Typed(".auto-type",{
            strings: ["Tired of doing assignments ?","We have come up with an amazing solution !!"],
            typeSpeed:50,
            backSpeed:50,
            loop: true
          })
          </script>
    <p class="p">We have come up with an expert solution to get rid of loads of assignments given to you!!.<br>Get it done by someone in your locality or do his/her assignment and earn money for the deed!!<br> The platform is open to all and easy to use just login enter your location find a match and get your assignment done at minimal cost!!
    </p>
    <img src="assign.png" class="img1">
    </section>
    <section>
    <div class="head1">Save time or earn easy money!</div>
    <p class="p1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis ea quidem animi. Magni obcaecati provident, reprehenderit, quisquam, vel voluptates modi asperiores commodi ullam facere sequi! Ipsam dolorem distinctio a pariatur.</p>
    <img src="assign1.png" class="img2">
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.2.0/socket.io.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="wrapper">
        <span class="icon-close"><ion-icon name="close-outline"></ion-icon></span>
        <div class="form-box login">
            <h2><centre>Login</centre></h2>
            <form action ="server2.php"method="post" id="loginForm">
                <div class="input-box">
                    <input type="text" required name="username1" id="userId">
                    <label>Username</label>
                </div> 
                <div class ="input-box">
                    <input type="password" required name="password_11" id="password">
                    <label>Password</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox">
                    Remember me</label>
                    <a href="#">Forgot password?</a>
                    </div>
                        <button type="submit" class="btn" name="login_Btn">Login</button>
                    <div class="login-register">
                        <p>Don't have an account ?
                            <a href="#"  class="register-link">Sign Up</a></p>
                </div>
            </form>
           
        </div>
        <div class="form-box register">
            <h2><centre>Register</centre></h2>
            <form action="server.php" method="post">
                 <div class="input-box">
                    <input type="text" required  id="username1" name="username1">
                    <label>Username</label>
                </div>
                <div class ="input-box">
                    <input type="Mail" required name="email1" id="email1">
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <input type="password" required name="password_11" id="password_11">
                    <label>Password</label>
                </div>
                <div class="input-box">
                    <input type="password" required name="password_22" id="password_22">
                    <label>Confirm Password</label>
                </div>
                    <button type="submit" class="btn">Sign up</button>
                <div class="login-register">
                    <p>Already have an account ? <a href="#" 
                    class="login-link">Log in</a></p>
                </div>
            </form>
        </div>
    </div>
    <button id="initiateChat" style="display: none;">Initiate Chat</button>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.2.0/socket.io.js"></script>
    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>

