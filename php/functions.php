<?php


function Connect ($dbhost, $dbuser, $dbpass, $dbname){
$conn=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if ($conn->connect_error){
   die("Connection failed: " . $conn->connect_error);
}
return $conn;
}
function getin ($conn,$stock){
$sql="Select * from stock_ticker WHERE stock= \"" . $stock ."\"";
$result=$conn->query($sql);
if ($result->num_rows >0){
while ($row = $result->fetch_assoc()){
$out[]=$row;
  }
return $out;
  }
 }
function getc ($conn,$country){
$sql="SELECT country_exchange.country, exchange_stock.exchange, stock_ticker.stock, stock_ticker.ticker
FROM (country_exchange INNER JOIN exchange_stock ON country_exchange.exchange = exchange_stock.exchange) INNER JOIN stock_ticker ON exchange_stock.stock = stock_ticker.stock
WHERE (((country_exchange.country)=\"" . $country ."\"))";
$result=$conn->query($sql);
if ($result->num_rows >0){
while ($row = $result->fetch_assoc()){
$out[]=$row;
  }
return $out;
  }
  }
function getst ($conn,$st){
$sql="SELECT tick FROM st_tick where st=\"" . $st ."\"))";
$resl = $conn->query($sql);
return $resl;
  }
function getce ($conn,$country,$exchange){
$sql="SELECT country_exchange.country, exchange_stock.exchange, stock_ticker.stock, stock_ticker.ticker
FROM (country_exchange INNER JOIN exchange_stock ON country_exchange.exchange = exchange_stock.exchange) INNER JOIN stock_ticker ON exchange_stock.stock = stock_ticker.stock
GROUP BY country_exchange.country, exchange_stock.exchange, stock_ticker.stock, stock_ticker.ticker
HAVING (((country_exchange.country)=\"".$country."\") AND ((exchange_stock.exchange)=\"".$exchange."\"))";
$result=$conn->query($sql);
if ($result->num_rows >0){
while ($row = $result->fetch_assoc()){
$out[]=$row;
  }
return $out;
  }
}
function getcs ($conn,$country,$stock){
$sql="SELECT country_exchange.country, exchange_stock.exchange, stock_ticker.stock, stock_ticker.ticker
FROM (country_exchange INNER JOIN exchange_stock ON country_exchange.exchange = exchange_stock.exchange) INNER JOIN stock_ticker ON exchange_stock.stock = stock_ticker.stock
WHERE (((country_exchange.country)=\"".$country."\") AND ((stock_ticker.stock)=\"".$stock."\"))";
$result=$conn->query($sql);
if ($result->num_rows >0){
while ($row = $result->fetch_assoc()){
$out[]=$row;
  }
return $out;
  }
}
function gete ($conn,$exchange){
$sql="SELECT country_exchange.country, exchange_stock.exchange, stock_ticker.stock, stock_ticker.ticker
FROM (country_exchange INNER JOIN exchange_stock ON country_exchange.exchange = exchange_stock.exchange) INNER JOIN stock_ticker ON exchange_stock.stock = stock_ticker.stock
WHERE (((exchange_stock.exchange)=\"".$exchange."\"))";
$result=$conn->query($sql);
if ($result->num_rows >0){
while ($row = $result->fetch_assoc()){
$out[]=$row;
  }
return $out;
  }
}
function gets ($conn,$stock){
$sql="SELECT country_exchange.country, exchange_stock.exchange, stock_ticker.stock, stock_ticker.ticker
FROM (country_exchange INNER JOIN exchange_stock ON country_exchange.exchange = exchange_stock.exchange) INNER JOIN stock_ticker ON exchange_stock.stock = stock_ticker.stock
WHERE (((exchange_stock.stock)=\"".$stock."\"))";
$result=$conn->query($sql);
if ($result->num_rows >0){
while ($row = $result->fetch_assoc()){
$out[]=$row;
  }
return $out;
  }
}
function gett ($conn,$ticker){
$sql="SELECT country_exchange.country, country_exchange.exchange, exchange_stock.stock, stock_ticker.ticker
FROM country_exchange INNER JOIN (exchange_stock INNER JOIN stock_ticker ON exchange_stock.stock = stock_ticker.stock) ON country_exchange.exchange = exchange_stock.exchange
WHERE (((stock_ticker.ticker)=\"".$ticker."\"))";
$result=$conn->query($sql);
if ($result->num_rows >0){
while ($row = $result->fetch_assoc()){
$out[]=$row;
  }
return $out;
  }
}
function getces ($conn,$country,$exchange,$stock){
$sql="SELECT country_exchange.country, country_exchange.exchange, exchange_stock.stock, stock_ticker.ticker
FROM (country_exchange INNER JOIN exchange_stock ON country_exchange.exchange = exchange_stock.exchange) INNER JOIN stock_ticker ON exchange_stock.stock = stock_ticker.stock
WHERE (((country_exchange.country)=\"".$country."\") AND ((country_exchange.exchange)=\"".$exchange."\") AND ((exchange_stock.stock)=\"".$stock."\"))";
$result=$conn->query($sql);
if ($result->num_rows >0){
while ($row = $result->fetch_assoc()){
$out[]=$row;
  }
return $out;
  }
}
function input($data){
$data = trim($data);
$data = htmlspecialchars ($data);
return $data;
}

?>