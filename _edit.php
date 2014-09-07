<meta charset="utf-8">
<?php
include_once 'connect_sql.php'; 
include_once 'statususer.php';

if(!$user) { 
header ('Location: index.php'); 
exit(); 
}

$a=$_GET['result'];


if ((!empty($_POST['Price'])) AND (!empty($_POST['Name'])) AND (!empty($_POST['description']) ) )
{ 
  $type=$_POST['Type'];
  // echo $type ."<br>";

  $Price = mysql_real_escape_string(htmlspecialchars($_POST['Price']));
  // echo $Price ."<br>";

	$name = mysql_real_escape_string(htmlspecialchars($_POST['Name']));
  // echo $name ."<br>";

	$description = mysql_real_escape_string(htmlspecialchars($_POST['description']));
  // echo $description ."<br>";

  $_Type_Product=$_POST['Type_Product'];
  $Type_Product=mysql_fetch_assoc(mysql_query("select id from Type where Value='$_Type_Product';"))['id'];
  // echo $Type_Product ."<br>";

  $_user=$_COOKIE['username'];
  $user= mysql_fetch_assoc(mysql_query("select id from User where Name='$_user';"))['id'];
  // echo $user ."<br>";

  $_City=$_POST['City'];
  $City= mysql_fetch_assoc(mysql_query("select id from City where Value='$_City';"))['id'];
  // echo $City ."<br>";
  $file="image/" . mysql_fetch_assoc(mysql_query("select image from Announcement where id_Product = '$a' ;"))['image'];
  unlink($file);
  if (isset($_FILES['image'])) {
    // echo "new image<br>";
    // echo $_FILES["image"]["tmp_name"];
    // echo $_FILES["image"]['error'];
    // echo "<br>";
    if (($_FILES["image"]["type"] == "image/jpg") || ($_FILES["image"]["type"] == "image/jpeg")) {
      // echo "good file format<br>";
      if ($_FILES["image"]["size"] < 10000000) {
        // echo "good size<br>";
        if ($_FILES["image"]["error"] <= 0) {
          // echo "not error<br>";
          
          $track=$_FILES["image"]["name"] .$_COOKIE['username']. ".jpg";
          move_uploaded_file($_FILES["image"]["tmp_name"], "image/" . $track );
        } else{
           // echo "some error<br>";
        }
      } else {
        // echo "bad file size<br>";
        // echo $_FILES["image"]["size"] . "<br>";
      }
    } else {
      // echo "bad format";
    }
  } else {
    // echo "not new image";
  }
  // echo $track;
  
$b=mysql_query("UPDATE  Announcement SET Type='$type', Price=$Price , Name='$name', Description='$description', image='$track' , Type_Product=$Type_Product , User=$user , City=$City WHERE id_Product =$a;");

//echo "UPDATE  Announcement SET Type='$type', Price=$Price , Name='$name', Description='$description', image='$track' , Type_Product=$Type_Product , User=$user , City=$City WHERE id_Product =$a;"."<br>";

// echo "$type"."<br>";
// echo "$Price"."<br>";
// echo "$name"."<br>";
// echo "$description"."<br>";
// echo "$track"."<br>";
// echo "$Type_Product"."<br>";
// echo "$user"."<br>";
// echo "$City"."<br>";
// echo "$a"."<br>";



echo "Редактирование выполнено";
echo "<a href=\"./MyPage.php\">Назад</a><br>";
            // INSERT INTO Announcement (Type, Price,Name,Description,image,Type_Product,User,City) VALUES ('Покупка',123,'фот','описание','трек',1,1,1);



}
	
?>