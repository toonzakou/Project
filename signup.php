

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form </title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form" action ="save_signup.php">
                                <?php if(!empty($success_message)) { ?>	
                                <div class="success-message"><?php if(isset($success_message)) echo $success_message; ?></div>
                                <?php } ?>
                                <?php if(!empty($error_message)) { ?>	
                                <div class="error-message"><?php if(isset($error_message)) echo $error_message; ?></div>
                                <?php } ?>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="id"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="id" id="id" placeholder="Your ID"/>
                            </div>
                            <div class="form-group">
                                <label for="dep"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="dep" id="dep" placeholder="Your Department"/>
                            </div>
                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account"></i></label>
                                <input type="text" name="username" id="username" placeholder="Your Username"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="index.html" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>



    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>