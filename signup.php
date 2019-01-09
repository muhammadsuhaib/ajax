<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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

<div align="center">

    <h3>SignUp</h3>
    <form>
    <input type="text" placeholder="Enter Your Name" class="name"><br>
    <input type="email" placeholder="Enter Your email"  class="email"> <div class="email_feedback"></div>
    <input type="password" placeholder="Enter Your Password"  class="password"><br><br>
    <input type="button" class="submit" value="Submit">
    </form>



<div class="success"></div>
    <div class="error"></div>
</div>



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





