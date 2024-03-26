<?php

	session_start();
	include 'connection.php';
	$query = "SELECT * FROM `items`";
	$run = mysqli_query($conn,$query);
	if(!isset($_SESSION['name'])){
		header("Location: login.php");
	}

	//variables decraration
	
	$add = @$_GET['add'];
	$title = @$_GET['title'];
	$amount = @$_GET['amount'];
	$unitcost = @$_GET['unitcost'];
	$datemodified = date('Y-m-d H:i:s');
	$amount = intval($amount);
	$unitcost= intval($unitcost);
	$totalcost = $amount * $unitcost;
	$iamount = @$_GET['iamount'];
	$iunitcost = @$_GET['iunitcost'];
	$iadd = @$_GET['iadd'];
	$ititle = @$_GET['ititle'];

	// Items insertion
	if($add){
		$query = "INSERT INTO `items`(`title`, `amount`, `datemodified`,`unitcost`, `totalcost`) VALUES ('$title','$amount','$datemodified','$unitcost','$totalcost');";
		$query1="INSERT INTO `import`(`title`, `amount`, `importdate`) VALUES ('$title','$amount','$datemodified')";
		$run1 = mysqli_query($conn,$query1);
		$query2="INSERT INTO `export`(`title`) VALUES ('$title')";
		$run2 = mysqli_query($conn,$query2);
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
    <title>Cargo | Home</title>
    <link rel='stylesheet' href='index.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<style>
		 .import table {
        width: 90vw;
    }
	</style>
</head>
	<body>
		<center>
		<div class="header" id="header">
			<div class="head">
				<div class="name">
				<i class="fa-solid fa-user"></i>
					<?php
					echo($_SESSION['name']);?>
				</div>	
				<div class="logout">
					<a href="logout.php">
						<button>
							log out
						</button>
					</a>
				</div>
				
			</div>
			<div class="title">
					<h2>
						Cargo investement Group
					</h2>
				</div>
				<div class="src">
				<form action="search.php" class='search'>
						<input type="text" name="search" placeholder="Search an item">
						<button type='submit' name = "searchbtn" value="send">
						<i class="fa-solid fa-magnifying-glass"></i>
						</button>
					</form>
				</div>
				
			<div class="body">
				<div class="nav">
					<nav>
						<button  onclick='showElement()'> Add item</button>
						<br>
						<button  onclick='importTable()'> Imported </button>
						<br>
						<button  onclick='exportTable()'> exported</button>
						<br>
						<button  onclick='modify()'> Modify </button>
					</nav>
				</div>
				<div class="disp">
					<center>
					<table>
						<caption>
							Current item
							
						</caption>
						<tr class='hd'>
							<th>Title</th>
							<th>amount</th>
							<th>cost | unit</th>
							<th>total cost</th>
							<th>date modified</th>
							<th>actions</th>
						</tr>
						<?php
							while($res = mysqli_fetch_assoc($run)){
								?>
								<tr>
									<td><?php echo $res["title"];?></td>
									<td><?php echo $res["amount"];?></td>
									<td><?php echo $res["unitcost"];?></td>
									<td><?php echo $res["totalcost"];?></td>
									<td><?php echo $res["datemodified"];?></td>
									<td class="lp"  style= "display: flex; justify-content: center; place-items: center;" >
										<button onclick='showImprt()'>
											<a href="import.php?id=<?php echo $res['titleid'];?>&&ititle=<?php echo $res['title'];?>&&iamount=<?php echo $res['amount'];?>&&iunitcost=<?php echo $res["unitcost"];?>">Import</a>
										</button>
										
										<button onclick='showImprt()'>
											<a href="export.php?id=<?php echo $res['titleid'];?>&&ititle=<?php echo $res['title'];?>&&iamount=<?php echo $res['amount'];?>&&iunitcost=<?php echo $res["unitcost"];?>">Export</a>
										</button>
									</td>
								</tr>
								<?php
							}
						?>
					</table>
					</center>
					
				</div>
			</div>
			
		</div>
		</center>
		<div class="adddisplay"  id="adddisp" >
				<center>
				<div class="items" >
					<fieldset>
						<legend>Add Item</legend>
						<form action="index.php" method='GET'>
							<a href="index.php"><img src="download.png" alt=""></a>
							
							<div class="input">
							<input type="text" name="title" id="" placeholder='Item Name' class="add">
							<br>
							<input type="number" name="amount" id="" placeholder='Enter Amount' class="add">
							<br>
							<input type="number"  name='unitcost' placeholder=' Cost | Unit' class="add">
							<br>
							<button type='submit' name="add" value='submit'>Add</button>
							<button type='reset'>Clean</button>
							</div>
						</form>
					</fieldset>
				</div>
				</center>
		</div>
		<!-- Table for displaying imports-->
		<div class="import" id="importtable">
		<a href="index.php"><img src="download.png" alt="" style="top: 3%; left: 90%;"></a>
			<center>
				<table>
					<caption>imported item</caption>
					<tr class='hd'>
						<th>Title</th>
						<th>amount</th>
						<th>Import date</th>
					</tr>
					<?php
						$query = "SELECT * FROM `import`";
						$run = mysqli_query($conn,$query);
						while($res = mysqli_fetch_assoc($run)){
							?>
							<tr>
								<td><?php echo $res["title"];?></td>
								<td><?php echo $res["amount"];?></td>
								<td><?php echo $res["importdate"];?></td>
							</tr>
								
							<?php
						}
					
					?>
				</table>
			</center>
		</div>
		<!--table to display export-->
		<div class="import" id="exporttable">
		<a href="index.php"><img src="download.png" alt="" style="top: 3%; left: 90%;"></a>
			<center>
				<table>
					<caption>Exported item</caption>
					<tr class='hd'>
						<th>Title</th>
						<th>amount</th>
						<th>Import date</th>
					</tr>
					<?php
						$query = "SELECT * FROM `export`";
						$run = mysqli_query($conn,$query);
						while($res = mysqli_fetch_assoc($run)){
							?>
								<tr>
									<td><?php echo $res["title"];?></td>
									<td><?php echo $res["amount"];?></td>
									<td><?php echo $res["exportdate"];?></td>
								</tr>
									
							<?php
						}
					
					?>
				</table>
			</center>
		</div>
		<!--modify an item-->
		<div class="adddisplay"  id="modify">
		<a href="index.php"><img src="download.png" alt="" style="top: 4%; left: 90%;"></a>
				<center>
				<div class="items">
					
						
						<table style="width: 90vw;">
						<caption>
							Current item
							
						</caption>
						<tr class='hd'>
							<th>Title</th>
							<th>amount</th>
							<th>cost | unit</th>
							<th>total cost</th>
							<th>date modified</th>
							<th>actions</th>
						</tr>
						<?php
							$query = "SELECT * FROM `items`";
							$run = mysqli_query($conn,$query);
							while($res = mysqli_fetch_assoc($run)){
								?>
								<tr>
									<td><?php echo $res["title"];?></td>
									<td><?php echo $res["amount"];?></td>
									<td><?php echo $res["unitcost"];?></td>
									<td><?php echo $res["totalcost"];?></td>
									<td><?php echo $res["datemodified"];?></td>
									<td class="lp"  style= "display: flex; justify-content: center; place-items: center;" >
										<button>
											<a href="Update.php?id=<?php echo $res['titleid'];?>&&ititle=<?php echo $res['title'];?>&&iamount=<?php echo $res['amount'];?>&&iunitcost=<?php echo $res["unitcost"];?>">Update</a>
										</button>
										
										<button>
											<a href="delete.php?ititle=<?php echo $res['title'];?>">Delete</a>
										</button>
									</td>
								</tr>
								<?php
							}
						?>
					</table>
					
				</div>
		<!--scripting divisions-->
		<script>
            function showElement() {
				var disp = document.getElementById('adddisp');
					disp.style.display = "flex";
					disp.style.top = 0;
					var hide = document.getElementById('header');
				     hide.style.opacity = 0.3;
			}
			function importTable() {
				var disp = document.getElementById('importtable');
					disp.style.display = "flex";
					disp.style.top = 0;
					var hide = document.getElementById('header');
				     hide.style.opacity = 0.1;
			}
			function exportTable() {
				var disp = document.getElementById('exporttable');
					disp.style.display = "flex";
					disp.style.top = 0;
					var hide = document.getElementById('header');
				     hide.style.opacity = 0.1;
			}
			function modify() {
				var disp = document.getElementById('modify');
					disp.style.display = "flex";
					disp.style.top = 0;
					var hide = document.getElementById('header');
				     hide.style.opacity = 0.1;
			}
    	</script>
		
	</body>
</html>