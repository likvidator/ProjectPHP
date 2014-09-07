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
$user= mysql_fetch_assoc(mysql_query("select id from User where Name='$_user';"))['id'];

$search_user = mysql_result(mysql_query("SELECT COUNT(*) FROM Announcement WHERE User = '$user' AND id_Product = '$a'"), 0);
if($search_user == 0) 
{ 
	echo 'Введенные данные неправильные';
	exit(); 
} 
else
{
	$file="image/" . mysql_fetch_assoc(mysql_query("select image from Announcement where id_Product = '$a' ;"))['image'];
	unlink($file);
	//echo "$file";
	$query=mysql_query("DELETE FROM Announcement WHERE id_Product = $a");
	echo "Запись удалена<br>";
	echo "<a href=\"./MyPage.php\">Назад</a><br>";
}
?>
