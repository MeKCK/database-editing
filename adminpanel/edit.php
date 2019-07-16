<?php
require('db.php');
include("auth.php");
$id=$_REQUEST['id'];
$query = "SELECT * from new_record where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error($con));
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> 
| <a href="insert.php">Insert New Record</a> 
| <a href="logout.php">Logout</a></p>
<h1>Update Record</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$extension=$_REQUEST['extension'];
$fname = $_REQUEST['fname'];
$department =$_REQUEST['department'];
$campus =$_REQUEST['campus'];
$submittedby = $_SESSION["username"];
$update="update main set extension='".$extension."',
fname='".$fname."', department='".$department."',
submittedby='".$submittedby."' where id='".$id."'";
mysqli_query($con, $update) or die(mysqli_error($con));
$status = "Record Updated Successfully. </br></br>
<a href='view.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<p><input type="int" name="extension" placeholder="Enter Extension" 
required value="<?php echo $row['extension'];?>" /></p>
<p><input type="text" name="fname" placeholder="Enter Name" 
required value="<?php echo $row['fname'];?>" /></p>
<p><input type="text" name="department" placeholder="Enter Department" 
required value="<?php echo $row['department'];?>" /></p>
<p><input type="text" name="campus" placeholder="Enter Campus" 
required value="<?php echo $row['campus'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>