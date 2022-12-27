<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8">
  </head>
  <body>
<?php
$config =include ('config.php');
include ('functions.php');
$conn=Connect($config['dbhost'],$config['dbuser'],$config['dbpass'],$config['dbname']);
//загрузка данных из массива POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $ticker = input($_POST["ticker"]);
   $stock = input($_POST["stock"]);
   #$country =input($_POST["country"]);
   #$exchange =input($_POST["exchange"]);
   $country ='USA';
   $exchange ='New York';
}
 $sql="INSERT INTO country_exchange (country, exchange) VALUES ('$country','$exchange')";
if ($conn->query($sql) == TRUE) {
    echo "New record created successfuly";
} else {
       echo "Error: " .$sql ."<br>" . $conn->error;
} 
$sql="INSERT INTO exchange_stock (exchange,stock) VALUES ('$exchange','$stock')";
if ($conn->query($sql) == TRUE) {
    echo "New record created successfuly";
} else {
       echo "Error: " .$sql ."<br>" . $conn->error;
} 
$sql="INSERT INTO stock_ticker (stock, ticker) VALUES ('$stock','$ticker')";
if ($conn->query($sql) == TRUE) {
    echo "New record created successfuly";
} else {
       echo "Error: " .$sql ."<br>" . $conn->error;
} 

/*$data=getin($conn,$stockfind);
foreach ($data as $Item)
{
echo $Item['stock'];
echo $Item['ticker'];
Название страны: <input type="text" name="country">   <br>
Название биржи:  <input type="text" name="exchange">   <br>
} */
$conn->close();
?>
<form id="form" action="../php/bd.php" method="post">
                       <fieldset>
                       <legend>Заполнение:</legend>

Название акции: <input type="text" name="stock">   <br>
Название тикера: <input type="text" name="ticker"><br>

<input type="submit" value="Внести" >
                       </fieldset>                     
</form>

</body>
</html>