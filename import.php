<?php
	session_start();
	include 'connection.php';
	if(!isset($_SESSION['name'])){
		header("Location: login.php");
	}

	//get valiable from link
	$iamount = $_GET['iamount'];
	$iunitcost = $_GET['iunitcost'];
	$ititle = $_GET['ititle'];
	$datemodified = date('Y-m-d');
	$titleid = $_GET['id'];
	$id = $titleid;
	$namount = intval($iamount) + @$_POST['amount'];
	$amount = @$_POST['amount'];
	$unitcost = $iunitcost;
	$totalcost = $namount * intval($unitcost);
	$add = @$_POST['add'];
	$title = $ititle;
	//valiable to be submitted
	

	// Items insertion
	if($add){
		$query = "UPDATE `items` SET `amount`='$namount',`datemodified`='$datemodified',`totalcost`='$totalcost' WHERE titleid = $id;";
		$run = mysqli_query($conn,$query);
		$query1 = "UPDATE `import` SET `amount`='$amount',`importdate`='$datemodified' WHERE title = '$title';";
		$run1 = mysqli_query($conn,$query1);
		if($run1){
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
    <title>Cargo | Import</title>
    <link rel='stylesheet' href='index.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<style>
	.adddisp{
		height: 100vh;
        background-color: transparent;
        opacity: 1;
        justify-content: center;
        place-items: center;
        display: flex;
    }
	</style>
</head>
	<body>

	<div class="adddisp"  id="imprt">
		
			<center>
				<div class="items">
					<fieldset>
						<legend>Import <?php echo $ititle; ?></legend>
						<form action="#" method='POST'>
						<a href="index.php"><img src="download.png" alt="" style="top: 40%;"></a>
							<div class="input">
								<div class="name">Amount</div>
								<input type="number" name="amount" id="" placeholder='Enter Amount to be exported' class="add" >
								<br>
								<button type='submit' name="add" value='submit'>Import</button>
								<button type='reset'>Clean</button>
							</div>
						</form>
					</fieldset>
				</div>
			</center>
		</div>	
	</body>
</html>