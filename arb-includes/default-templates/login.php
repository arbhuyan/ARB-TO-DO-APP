<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php site_info('name'); ?> | <?php site_info('description'); ?></title>
    <link rel="stylesheet" href="arb-includes/default-templates/asset/style.css">
    <link rel="stylesheet" href="arb-includes/default-templates/asset/css/icofont.css">
    <link rel="stylesheet" href="arb-includes/default-templates/asset/css/cutegrids.css">
</head>
<body>
    
    <main class="main-content">
        <div class="login-box text-center">
            <form action="index.php?login" method="post">
                <header id="header">
                    <h3><i class="icofont icofont-polygonal"></i> <?php site_info('name'); ?></h3>
                </header> <!-- /.form-group -->

                <?php
                    if(get_message()){
                        echo show_message();
                    } else {
                        echo"<p class=\"text-center\">Please, Login with your Username and Password</p>";
                    }
                ?>

                <div class="form-group">
                    <label for="name"><i class="icofont icofont-user"></i> Username</label>
                    <input class="form-input" type="text" name="name" placeholder="your username">
                </div> <!-- /.form-group -->

                <div class="form-group">
                    <label for="pass"><i class="icofont icofont-key"></i> Password</label>
                    <input class="form-input" type="password" name="pass" placeholder="your password">
                </div> <!-- /.form-group -->

                <div class="form-group-submit">
                    <input class="form-input submit-btn" type="submit" name="submit" value="sign in">
                </div> <!-- /.form-group -->

                <p class="text-center">
                    Need an account? <a href="register.php">Click here to register</a>
                </p> <!-- /.text-center -->

                <footer id="footer">
                    <span class="text-center">&copy; <?php echo date('Y. '); site_info('name'); ?></span>
                </footer> <!-- /.form-group -->
            </form> <!-- /form -->
        </div> <!-- /.login-box -->
    </main> <!-- /.main-content -->
</body>
</html>