
<!DOCTYPE html>
<html>
<head>
    <title>Ajax Index</title>

</head>
<body>
<?php include("header.php");
?>

  <div class="form-signin">
    <div class="text-center">
        <img src="assets/img/logo.png" alt="Metis Logo">
    </div>

    <hr>
    <div class="tab-content">
        <div id="login" class="tab-pane active">
            <form>
                <p class="text-muted text-center">
                    Enter your username and password
                </p>
                <input type="text" name="username" placeholder="Username" class="form-control top">
                <input type="password" name="password" placeholder="Password" class="form-control bottom">
                <div class="checkbox">
		  <label>
		    <input type="checkbox"> Remember Me
		  </label>
		</div>
                <input name="submitlogin" class="btn btn-lg btn-primary btn-block" type="submit" value="Sign in">
            </form>
        </div>
        <div id="forgot" class="tab-pane">
            <form action="index.html">
                <p class="text-muted text-center">Enter your valid e-mail</p>
                <input type="email" placeholder="mail@domain.com" class="form-control">
                <br>
                <button class="btn btn-lg btn-danger btn-block" type="submit">Recover Password</button>
            </form>
        </div>


        <div id="signup" class="tab-pane">
            <form>
                <input type="text" name="username"  class="username" placeholder="username" class="form-control top">
                <input type="email" name="email"  class="email "placeholder="mail@domain.com" class="form-control middle">
                <input type="password"  name="password" class="password" placeholder="password" class="form-control middle">
                <button class="btn btn-lg btn-success btn-block" class = "saveuser"  type="submit">Register</button>
                <label style="color:red;" class="error"></label>
                <label style="color:green;" class="success"></label>
            </form>
        </div>

    </div>
    <hr>
    <div class="text-center">
        <ul class="list-inline">
            <li><a class="text-muted" href="#login" data-toggle="tab">Login</a></li>
            <li><a class="text-muted" href="#forgot" data-toggle="tab">Forgot Password</a></li>
            <li><a class="text-muted" href="#signup" data-toggle="tab">Signup</a></li>
        </ul>
    </div>
  </div>


<?php include "footer.php";?>


<script type="text/javascript">


    $('.submit').click(function ()
    {

        var name = $('.username').val();
        var email = $('.email').val();
        var password = $('.password').val();

        $.ajax({


            url: "register.php",
            data: {'name':name,'email':email,'password':password},
            type: "POST",




        })

    })









</script>



