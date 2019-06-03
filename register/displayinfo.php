<?php
include_once("server.php");

$id = isset($_GET['id']) ? $_GET['id'] : '';       // Collecting data from query string

$info = "SELECT * FROM users where id=$id";

$resultset = mysqli_query($db, $info) ;
while( $record = mysqli_fetch_array($resultset) ) 
{
?>

<table>
<img alt="" height="200px" width="200px" src="<?php echo $record['profilepic']; ?>">
<tr bgcolor='#f1f1f1'><td><b>Name</b></td><td><?php echo $record['name'];?></td></tr>
<tr><td><b>Username</b></td><td><?php echo $record['username'];?></td></tr>
<tr bgcolor='#f1f1f1'><td><b>Email</b></td><td><?php echo $record['email'];?></td></tr>
<tr><td><b>Mobile Number</b></td><td><?php echo $record['mobilenumber'];?></td></tr>
<tr bgcolor='#f1f1f1'><td><b>Team</b></td><td><?php echo $record['team'];?></td></tr>
<tr><td><b>Status</b></td><td><?php echo $record['status'];?></td></tr>
</table>
<br>
<br>
<a href="http://localhost/register/Newmembers.php"> GO BACK </a>
<?php }?>