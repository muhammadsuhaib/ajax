<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
</head>
<title> Ajax Data Insert Form</title>
<body bgcolor="#faebd7">

<?php
include 'config.php';

$select = "select * from users";
$select_result  =  $conn->query($select);
//
//"<pre>" print_r($select_result); "<pre/>";
?>



    <h3>SignUp</h3>
    <form id="myform">
        <input class="name" name='username'  type='text'><br>
<!--        <input  class="email" name='email'   type='text'> <div class="email_feedback"></div>-->
        <input class="password" name='password'  type='password'><br>


        <input class="email" id="field" name="field"><br>
            </form>
<input  type="button"  class="submit" value="Submit"  >


    <div class="success"></div>
    <div class="error"></div>




<h3>Please Click Here for Display All Data</h3>



<a href="javascript:void(0)" id="data" class="click  displayName displayuser">Display Users</a>


<!--<a href ="javascript:void (0)" id="data" class="click" > Display User </a>-->




<h3>Select Data from Database</h3>

<select class="myselect">
    <?php foreach ($select_result as $result) { $result =(object)$result; ?>
        <option value="<?php echo $result->id ?>"> <?php echo $result->user_name?></option>
    <?php }?>
</select>






<div class="displaydata"></div>




<div align="center">

    <h3>SignIn</h3>
    <form>

        <input type="email" placeholder="Enter Your email" required class="login_email"><br>
        <input type="password" placeholder="Enter Your Password" required class="login_password"><br><br>
        <input type="button" class="login" value="Login">
    </form>
</div>



</body>
</html>

<script type="text/javascript">


    jQuery.validator.setDefaults({
        debug: true,
        success: "valid"
    });
    $( "#myform" ).validate({
        rules: {
            field: {
                required: true,
                email: true
            }
        }
    });


    function checkForm() {
        var name = $('.name').val();
        var email = $('.email').val();
        var password = $('.password').val();
//Check input Fields Should not be blanks.
        if (name == '' || password == '' || email == '' || website == '') {
            name.innerHTML == 'Must be 3+ letters' || password.innerHTML == 'Password too short' || email.innerHTML == 'Invalid email'
        } else {
//Notifying error fields
            var name = $('.name').val();
            var email = $('.email').val();
            var password = $('.password').val();

//Check All Values/Informations Filled by User are Valid Or Not.If All Fields Are invalid Then Generate alert.

        }
    }



    function validate_email(email) {

        $.post('validationss.php',{email:email},function (data) {
            $('.email_feedback').text(data);



        });

    }
    $('.email').click   (function () {

        if($('.email').val() === ""){

            $('.email_feedback').text('Please Enter Email Address');
        }

        else {
            validate_email($('.email').val())

        }


    }).blur(function () {
        $('.email_feedback').text('');

    }).keyup(function () {
        validate_email($('.email').val())

    });




    $('.displayuser').click(function () {
        $.ajax({
            url:"selectall.php",
            success:function (data) {
                $(".displayData").html(data);
            }
        })
    });


    $('.myselect').change(function ()
    {

        var id = $(this).val();
//        alert(id);

        $.ajax({

            url: "select.php",
            data: {'id':id},
            type: "POST",
            success:function (data) {
                $(".displaydata").html(data);

            }
        })

    });














    $('.submit').click(function ()
    {

        var name = $('.name').val();
        var email = $('.email').val();
        var password = $('.password').val();

        if(name !="" && email !="" && password !="")

        {

            $.ajax({
                url: "register.php",
                data: {'name':name,'email':email,'password':password},
                type: "POST",
                success:function (data) {
                    $(".success").html(data);
                    $(".error").html(" ");
                }
            })

        }

        else
        {

            $(".error").html('Please Fill The Value');
        }
    })






</script>





