
<?php 
            session_start();
            include('connect.php');
            include ('AutoID.php');

            if (isset($_POST['btnsave']))
            {
            $fname=$_POST['txtfname'];
            $lname=$_POST['txtlname'];
            $gender=$_POST['rdogender'];
            $phone=$_POST['txtphone'];
            $dob=date("y-m-d ", strtotime($_POST['txtdate']));
            $email=$_POST['txtemail'];
            $password=$_POST['txtpassword'];
            $address=$_POST['txtaddress'];

            $check="SELECT * FROM User WHERE Email = '$email'";
            $checkret=mysqli_query($connection, $check);
            $count=mysqli_num_rows($checkret);
            if($count>0)
            {
                echo "<script> window.alert('User Email is Already Exits');</script>";
            }
            else
            {
                $insert="INSERT INTO User(UserID,FirstName, LastName,Phone, Email, Password, Address, DOB, Gender)
                VALUES('$txtuserid','$fname','$lname', '$phone', '$email', '$password', '$address', '$dob', '$gender')";

                $insertret=mysqli_query($connection, $insert);

                if($insertret)
                {
                    echo "<script>window.alert('User Account Created!');</script>";
                    echo "<script>window.location='UserLogin.php';</script>";
                }

                else
                {
                    echo "<p>Error in User Registration Page: " . mysqli_error($connection)."</p>";
                }
            }
        }


 ?>






<!DOCTYPE html>
<html>
<head>
      <title>Sky Blue Hotel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
  <link href="css/style.css"rel="stylesheet"/>
    <style type="text/css"> 

            legend
            {
                font-family: Elephant Impact ;
                text-align: center;
                font-size: 30px;

            }
    </style>
</head>
<body style="background-color:blueviolet; border:solid white;">
    <fieldset style="width:800px;margin-left: 250px; border:solid silver;background-image: url(images/Cover/registration.png);background-size: cover;">
        <form action="UserRegistration.php" method="POST" >
            <legend>Enter User Information</legend>
            <table align="center">

                <tr hidden>
                    <td >User ID</td>
                    <td><input type="text" name="txtuserid" readonly="readonly" value="<?php echo AutoID
                    ('User','UserID','U-',6); ?>"  readonly="readonly"> </td>
                </tr>
                <tr>
                   
                    <td width="200px">
                         FirstName <i class='fas fa-user-alt' style='font-size:24px'></i>
                    </td>
                    <td>
                        <input type="text" name="txtfname" placeholder="Type First Name!" required >
                    </td>
                </tr>
                <tr>
                   
                    <td width="200px">
                         LastName <i class='fas fa-user-alt' style='font-size:24px'></i>
                    </td>
                    <td>
                        <input type="text" name="txtlname" placeholder="Type Last Name!" required >
                    </td>
                </tr>
                  <tr>

                    <td width="200px">
                     Phone No <i class='fas fa-phone-square-alt' style='font-size:24px'></i>
                    </td>
                    <td>
                      <input type="text" name="txtphone" placeholder="09-#########" required >
                    </td>
                </tr>
                  <tr>
                    <td width="200px">
                       UserEmail<i class="fa fa-envelope" style="font-size:24px"></i>

                    </td>
                    <td>
                        <input type="email" name="txtemail" placeholder="abc@gmail.com" required="@">
                    </td>
                </tr>
                  <tr>
                    <td width="200px">
                        Password<i class="material-icons" style="font-size:34px">lock</i>
                    </td>
                    <td>
                        <input type="password" name="txtpassword" minlength="6" maxlength="8"  placeholder="********" required>
                    </td>
                </tr>
                <tr width="200px">
                    <td>Address<i class="material-icons" style="font-size:36px">place</i></td>
                    <td><input type="text" name="txtaddress" placeholder="N0,Street,Town,City,Country" required></td>
                </tr>
                <tr>
                    <td width="200px">
                        DateOfBirth<i class='far fa-calendar-alt' style='font-size:24px'></i>
                    </td>
                    <td>
                        <input type="date" name="txtdate" placeholder="01-11-1995" required>
                    </td>
                </tr>
                <tr>
                    <td width="200px">
                        Gender<i class='fas fa-venus-double' style='font-size:24px'></i>
                    </td>
                    <td>
                        <input type="radio" name="rdogender" value="M">Male
                        <input type="radio" name="rdogender" value="F">Female
                    </td>
                </tr>
                <tr>
                    <td>
                        
                    </td>
                    <td>
                        <button style='font-size:15px; background-color:green;' name="btnsave">Save <i class='far fa-paper-plane'></i></button>
                        <button style='font-size:15px; background-color:red' name="btncancel">Cancel <i class='fas fa-trash'></i></button>
                        <a href="UserLogin.php" style="color:white">Already Have Account </a>

                    </td>
                </tr>

            </table>
        </form>
        </fieldset>
      <div style="margin-left:85px">
<?php
  include('footer.php')
?>
</div>
</body>
</html>