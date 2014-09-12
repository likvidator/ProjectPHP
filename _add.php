<meta charset="utf-8">
<?php 

include_once 'connect_sql.php'; 
include_once 'statususer.php';

if(!$user) { 
header ('Location: index.php'); 
exit(); 
}

$track='';

if ((!empty($_POST['Price'])) AND (!empty($_POST['Name'])) AND (!empty($_POST['description']) ) )
{ 
  $type=$_POST['Type'];
  // echo $type ."<br>";

  $Price = mysqli_real_escape_string($connect,htmlspecialchars($_POST['Price']));
  // echo $Price ."<br>";

	$name = mysqli_real_escape_string($connect,htmlspecialchars($_POST['Name']));
  // echo $name ."<br>";

	$description = mysqli_real_escape_string($connect,htmlspecialchars($_POST['description']));
  // echo $description ."<br>";

  $_Type_Product=$_POST['Type_Product'];
  $Type_Product=mysqli_fetch_assoc(mysqli_query($connect,"select id from Type where Value='$_Type_Product';"))['id'];
  // echo $Type_Product ."<br>";

  $_user=$_COOKIE['username'];
  $user= mysqli_fetch_assoc(mysqli_query($connect,"select id from User where Name='$_user';"))['id'];
  // echo $user ."<br>";

  $_City=$_POST['City'];
  $City= mysqli_fetch_assoc(mysqli_query($connect,"select id from City where Value='$_City';"))['id'];
  // echo $City ."<br>";

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
          if (file_exists("image/" . $_FILES["image"]["name"]  .$_COOKIE['username']. ".jpg")) {
            // echo "updating<br>";
            unlink("image/" . $_FILES["image"]["name"]  .$_COOKIE['username']. ".jpg");
          }
          $track=md5($_SERVER['REQUEST_TIME'] .$_COOKIE['username']) . ".jpg";
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
  
mysqli_query($connect,"INSERT INTO Announcement (Type, Price,Name,Description,image,Type_Product,User,City) VALUES ('$type',$Price,'$name','$description', '$track',$Type_Product,$user,$City)");
echo "Объявление успешно добавлено"."<br>";
echo "<a href=\"./index.php\">На главную</a><br>";


}

?>