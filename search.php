<?php
	session_start();
	include 'connection.php';
	if(!isset($_SESSION['name'])){
		header("Location: login.php");
	}
    $search = $_GET['search'];
    $query = " SELECT * FROM items WHERE title LIKE'%$search%' OR amount LIKE'%$search%'  OR unitcost LIKE'%$search%' OR totalcost LIKE'%$search%'  OR datemodified LIKE'%$search%';";
    $run = mysqli_query($conn,$query);
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
					<a href="index.php">
						<button>
							home
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
				
				<div class="disp">
					<center>
					<table>
						<caption>
							Result for "<?php echo $search;?>"
							
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
									<td class="lp"  style= "display: flex; justify-content: center; " >
										<button onclick='showImprt()'>
											<a href="import.php?id=<?php echo $res['titleid'];?>&&ititle=<?php echo $res['title'];?>&&iamount=<?php echo $res['amount'];?>&&iunitcost=<?php echo $res["unitcost"];?>">Import</a>
										</button>
										
										<button onclick='showImprt()'>
											<a href="export.php?id=<?php echo $res['titleid'];?>&&ititle=<?php echo $res['title'];?>&&iamount=<?php echo $res['amount'];?>&&iunitcost=<?php echo $res["unitcost"];?>">Export</a>
										</button>
										<button>
											<a href="Update.php?id=<?php echo $res['titleid'];?>&&ititle=<?php echo $res['title'];?>&&iamount=<?php echo $res['amount'];?>&&iunitcost=<?php echo $res["unitcost"];?>">Update</a>
										</button>
										
										<button>
											<a href="export.php?id=<?php echo $res['titleid'];?>">Delete</a>
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
					</center>
				</div>
			</div>
		</div>
		</center>
	</body>
</html>