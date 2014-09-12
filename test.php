
<?php
$host='localhost';
$database='mybd'; 
$user='root'; 
$pswd='365412'; 

$connect=mysqli_connect($host, $user, $pswd,$database) or die("Не могу соединиться с MySQL.");
//mysqli_select_db($connect,'mysql') or die("Не могу подключиться к базе.");
mysqli_set_charset($connect,'utf8');

//$b=123;
//$a=mysqli_query($connect,"INSERT INTO User (Name, Password,Phone,email) VALUES ('123','12','12','12')");
$quary=mysqli_query($connect,"select id from User where Name='adminawd';");
//$a=mysqli_result($quary);
$result = mysqli_query($connect,"select * from City;");
    while ($row = mysqli_fetch_assoc($result)) {
        printf ("%s \n", $row["Value"]);
    }
?>