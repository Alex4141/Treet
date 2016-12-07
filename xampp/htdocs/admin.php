<?php
	session_start();
	include 'NavBar.php';
	
	if(!$_SESSION["isAdmin"])
		header("Location: ./index.php");
	function fillArea()
	{
		if(isset($_POST['myText']))
			echo $_POST['myText'];
		else
			echo 'Welcome to the Treet CLI';
	}
	
?>
<div class="container">
	<form action="admin.php" method="post">
		<div class="row">
			<textarea rows="20" cols="100" style="background-color:black; color:LawnGreen; font-family:courier new" name="myText"><?php fillArea() ?></textarea>
		</div>
		<div class="row">
			<input type="submit" class="btn btn-primary" value="Submit">
		</div>
	</form>

<?php
	if(isset($_POST['myText']))
	{
		if(1 == preg_match("/\bDROP\b/i", $_POST['myText']))
		{
			//BAD
			echo "Bad admin!";
		}
		else
		{
			include("connect-db.php");
			$query = $_POST['myText'];
			$result = pg_query($dbc, $query);
			
			echo "<table class=\"table table-inverse table-bordered\">";
			for($i = 0; $i < pg_num_rows($result); $i++)
			{
				echo "<tr>";
				$row = pg_fetch_row($result, $i);
				
				for($j = 0; $j < sizeof($row); $j++)
				{
					echo "<td>";
					
					echo $row[$j];
					
					echo "</td>";
				}
				
				echo "</tr>";
			}
			echo "</table>";
		}
	}
?>
</div>