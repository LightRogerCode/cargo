<?php
session_start();
include 'connection.php';
$submit  = @$_POST['submit'];
$email = @$_POST['email'];
$password = @$_POST['password'];
if($submit){
    $query = "SELECT * FROM `users` WHERE email = '$email' AND password = '$password';";
    $run = mysqli_query($conn,$query);
    $row = mysqli_num_rows($run);
    $res = mysqli_fetch_assoc($run);
    if($res > 0){
        $_SESSION['name'] = $res['Name'];
        
    }
    else{
        echo '
         <div style = "background-color:red; display: brock;left: 17%; top: 56%; position: absolute; width: 200px; border-radius: 4px;"> Invalid email Or password</div >

        ';
    }

    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargo | Log in</title>
    <link rel='stylesheet' href='login.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style type="text/css">
        #error{
            display: none;
        }
    </style>
</head>

<body>
    <center>
    <div class='container'>
        
        <div class="form">
        
            <form action="login.php" method="POST">
                
                <table>
                <caption>Log In</caption>
                <tr>
                        <td>
                                <h5 id="error">Incorrect email<bt>Or password</h5>
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
                            <button class='btn' value="send" type='submit' name="submit" onclick="showElement('error')">
                                log in
                            </button>
                        </td>
                    </tr>
                    <br>

                    <tr>
                        <td>
                            <h6>
                                <a href="signup.php">Don't have account</a>
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
<?php
    if(isset($_SESSION['name'])){
        header("Location: index.php");
    }
?>