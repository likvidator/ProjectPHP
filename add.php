    <meta charset="utf-8">
<?php 

include_once 'connect_sql.php'; 
include_once 'statususer.php';

if(!$user) { 
header ('Location: index.php'); 
exit(); 
} 
$city = mysql_query("select * from City;");
$type = mysql_query("select * from Type;");

?>

<form action="_add.php" method="POST" enctype="multipart/form-data"> 
Тип объявления:
 

<div>
        <select name="Type" >
          <option value="sale">Продам</option>
          <option value="buy">Куплю</option>
        </select>
       
</div>
 
Название объявения:
 
<div>
        <input id="Name" name="Name" type="text" required>
       
</div>
Описание:
 

 <div>
        <input id="description" name="description" type="text" required>
        
</div>
Цена
 <div>
        <input id="Price" name="Price" type="number"  step="0.01" min ="0" required>
        
</div>


Картинка:
 
 <div>
        <input type="file" name="image" id="image"><br> 
      
        
</div> 
Город:
<?php
   echo "<select name ='City'>";
  while ($row = mysql_fetch_assoc($city)) {
    echo "<option>" . $row['Value'] . "</option>";
  }
  echo "</select>";
?>
<br>
Категория:
 
<?php
   echo "<select name ='Type_Product'>";
  while ($row = mysql_fetch_assoc($type)) {
    echo "<option>" . $row['Value'] . "</option>";
  }
  echo "</select>";
?><br>
<input type="submit" value="Разместить" /><br> 
<a href="./index.php">На главную</a><br>
</form>

