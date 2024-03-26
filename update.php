<?php
    session_start();
    if(!isset($_SESSION['name'])){
		header("Location: login.php");
	}
    include 'connection.php';
    $id = $_GET['id'];
    $title = $_GET['ititle'];
    $amount = $_GET['iamount'];
    $unitcost = $_GET['iunitcost'];
    $nid = $id;
    $ntitle = @$_POST['title'];
    $namount = @$_POST['amount'];
    $nunitcost = @$_POST['unitcost'];
    $totalcost = intval($namount) * intval($nunitcost);
    $date = date('Y-m-d H:i:s');
    $submit = @$_POST['submit'];
    echo $submit;
    if($submit){
        $query = "UPDATE `items` SET `title`='$ntitle',`amount`='$namount',`datemodified`='$date',`unitcost`='$nunitcost',`totalcost`='$totalcost' WHERE titleid = '$id';";
        $run = mysqli_query($conn,$query);
        if($run){
            header("Location: index.php");
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargo | Update</title>
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
    <div class='container' style="dispaly: flex;justify-content:center;place-item:center;">
        
        <div class="form" style="border-radius: 6px;">
        
            <form action="#" method="POST">
                
                <table>
                <caption>Update item</caption>
                <tr>
                        <td><span>Title:</span></td>
                        <td>
                            <input type="text"  style="font-size: 24px; color: green; font-family: 'Signika Negative';" name="title" value='<?php echo $title;?>'>
                        </td>
                    </tr>
                    <tr>
                    <td><span>Amount:</span></td>
                        <td>
                            
                            <input type="number"  style="font-size: 24px; color: green; font-family: 'Signika Negative';" name="amount" value='<?php echo $amount;?>'>
                        </td>
                    </tr>
                    <br>
                    <tr>
                    <td><span>Unit cost:</span></td>
                        <td>
                            
                            <input style="font-size: 24px; font-family: 'Signika negative'; color: green; " type="number" name="unitcost" value='<?php echo $unitcost;?>'>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='2'>
                            <button class='btn' type='submit' name="submit" value = 'send'>
                               Update
                            </button>
                        </td>
                    </tr>
                    <br>
                </table>
            </form>
        </div>