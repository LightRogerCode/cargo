
<?php
include 'connection.php';
$submit  = @$_POST['submit'];
$email = @$_POST['email'];
$password = @$_POST['password'];
$name = @$_POST['name'];
if($submit){
    $query = "INSERT INTO `users`(`Name`, `email`, `password`) VALUES ('$name','$email','$password');";
    $run = mysqli_query($conn,$query);
    if($run){
        header("location: login.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargo | Sign up</title>
    <link rel='stylesheet' href='login.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .fa-signature{
            font-size: 24px;
        position: absolute;
        left: 330px;
        padding-top: 0.7%;
        }
        input{
            height: 50px;
    width: 80%;
    margin-left: 10px;
    padding-left: 40px;
    background-color: transparent;
    border-radius: 12px;
    border: 1px solid black;
    font-family: Signika;
    font-size: 34px;
        }
    </style>
</head>
<body>
    <center>
    <div class='container'>
        
        <div class="form">
        
            <form action="#" method="POST">
                
                <table>
                <caption>Sign up</caption>
                <tr>
                        <td>
                        <i class="fa-solid fa-signature"></i>
                            <input type="text"  style="font-size: 24px; color: green; font-family: 'Signika Negative';" name="name" placeholder='Enter your Name'>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <i class="fa-solid fa-envelope"></i>
                            <input type="email"  style="font-size: 24px; color: green; font-family: 'Signika Negative';" name="email" placeholder='Enter your E-mail'>
                        </td>
                    </tr>
                    <br>
                    <tr>
                        <td>
                            <i class="fa-solid fa-key"></i>
                            <input style="font-size: 24px; font-family: 'Signika negative'; color: green; " type="password" name="password" placeholder='...........'>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button class='btn' type='submit' name="submit" value="send">
                                Sign up
                            </button>
                        </td>
                    </tr>
                    <br>
                    <tr>
                        <td>
                            <h6>
                                <a href="login.php">Do have account</a>
                            </h6>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="content">
            
                <h5>
                
                  <span>cargo investment group</span>
                  <br>
                  <br>
                  <br>
                  
                  

            
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, porro laudantium ab fuga recusandae esse similique incidunt iusto maxime deleniti, quasi architecto ratione accusantium ipsa dicta ea quia quaerat unde!
                </h5>
            
        </div>
    </div>
    </center>
    
</body>
</html>
