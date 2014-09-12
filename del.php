<meta charset="utf-8">
<?php 

include_once 'connect_sql.php'; 
include_once 'statususer.php';

if(!$user) { 
header ('Location: index.php'); 
exit(); 
}
$a=$_GET['result'];

$_user=$_COOKIE['username'];
$user= mysqli_fetch_assoc(mysqli_query($connect,"select id from User where Name='$_user';"))['id'];

//$search_user = mysqli_result(mysqli_query($connect,"SELECT COUNT(*) FROM Announcement WHERE User = '$user' AND id_Product = '$a'"), 0);
//if($search_user == 0) 
//{ 
//	echo 'Введенные данные неправильные';
//	exit(); 
//} 
$row = mysqli_fetch_array(mysqli_query($connect,"SELECT COUNT(*) FROM Announcement WHERE User = '$user' AND id_Product = '$a'"), MYSQLI_NUM);
if (count($row)==0)
{
    echo 'Введенные данные неправильные'; 
    exit(); 
}
else
{
	$file="image/" . mysqli_fetch_assoc(mysqli_query($connect,"select image from Announcement where id_Product = '$a' ;"))['image'];
	unlink($file);
	//echo "$file";
	$query=mysqli_query($connect,"DELETE FROM Announcement WHERE id_Product = $a");
	echo "Запись удалена<br>";
	echo "<a href=\"./MyPage.php\">Назад</a><br>";
}
?>
