<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8">
    <title>Словарь</title>
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/slov.css" rel="stylesheet">
 <link href="../Attachment/icon.ico" rel="shortcut icon" type="image/x-icon"/>
  </head>
 <body>
  <header>
          <div class="divicon clearfix">
           <img class="icon" src="../Attachment/RichPapa.png" alt="RichPapa.png" title="RichPapa" >    
          </div>
  <div class="divtitle clearfix">
  <br> 
              <a href="../html/glavnaya.html"> <img class="seven menu" src="../Attachment/Glavnaya.png" alt="Glavnaya.png, 7,0kB" title="" >   </a>   
              <a href="../php/kot.php" >  <img border=0 class="nine menu " src="../Attachment/Kotirovki.png" alt="Kotirovki.png, 10kB" title="" >  </a>
               <a href="../php/calc.php"> <img border=0 class="eleven menu" src="../Attachment/Kalkulyator.png" alt="Kalkulyator.png, 13kB" title="" > </a>
               <a href="../php/news.php"> <img border=0 class="seven menu"src="../Attachment/Novosti.png" alt="Novosti.png, 7,5kB" title="" >  </a>
               <a href="../php/slovar1.php"> <img border=0 class="seven menu" src="../Attachment/Slovar_aktivnaya.png" alt="Slovar.png, 10kB" title="" >   </a>
               <a href="../html/kontakty.html"> <img border=0 class="eight menu" src="../Attachment/Kontakty.png" alt="Kontakty.png, 8,3kB" title="" >    </a>
          <br><br>
          </div> 
  </header>
  <section class="clearfix"> 
<div class="container clearfix" >
<div id="im">
<img class="image13" src="../Attachment/sl1.jpg" >
<img class="imagee" src="../Attachment/sl3.png" >
<img class="image13" src="../Attachment/sl2.jpg" >

</div> 
<div class="titt">Чтобы посмотреть всю базовую информацию по какой-либо стране, бирже, акции, воспользуйтесь нашим поиском:  </div>
        <form id="form" action="../php/slovar1.php" method="POST">
<?php
echo("<style type=\"text/css\">");
   echo(".tabl { margin-left:5%; 
   color: #333366; font-family:Corbel;}
   .tabl2 {margin-left:6.1%; width:85%;font-family:Corbel;}
   .tabl2 th {font-size:30px; color:black;padding-left:2%;padding-right:2%;font-family:Corbel;}
   .tabl2 td {width:20%;padding-left:5%;padding-right:5%;font-family:Corbel;}
   .ctry{padding-left:5%; font-size:35px; width:10%;font-family:Corbel;}
   .zag{ font-size:30px; color:#294552;font-family:Corbel;}
   .zag th{ padding-right:15%; padding-left:4.1%; font-family:Corbel;}
   select{padding:5%; font-size:20px;font-family:Corbel;}
   .warn{margin-left:28.5%; font-size:25px;color:#294552;font-family:Corbel;}
   select option{padding:8%;margin:8%; font-size:20px;}
  
   .tabl td{ font-size:25px; color:#294552;padding-right:4%;padding-left:4%; width:30%;font-family:Corbel; }");
echo("</style>");
$config =include ('config.php');
   include ('functions.php'); 
$conn=Connect($config['dbhost'],$config['dbuser'],$config['dbpass'],$config['dbname']);
 echo("<table class=\"tabl2\">");
echo("<tr>");
echo("<th>Выберите страну:</th>");
echo("<th>Выберите биржу: </th>");
echo("<th>Выберите акцию:</th>");
echo("<th>Выберите тикер: </th>");
echo("</tr>");
echo("<tr><td>");
echo("</td><td>");
echo("</td><td>");
echo("</td><td>");
echo("</td></tr>");
echo("<tr><td>");
echo("</td><td>");
echo("</td><td>");
echo("</td><td>");
echo("</td></tr>");
echo("<tr><td>");
echo("</td><td>");
echo("</td><td>");
echo("</td><td>");
echo("</td></tr>");
 $result = $conn->query("Select DISTINCT country from country_exchange");
    echo("<tr><td>");
    echo "<select style='width:100%' name=\"country\">";
    while ($row = $result->fetch_assoc()) {
                  unset($country);
                  $country = $row['country'];
                  echo '<option name="country">'.$country.'</option>';}
   echo "</select>";
   echo("</td><td>");
$result = $conn->query("Select DISTINCT exchange from country_exchange ");
    echo "<select style='width:100%'  name=\"exchange\">";
    while ($row = $result->fetch_assoc()) {
                  unset($exchange);
                  $exchange = $row['exchange'];
                  echo '<option name="exchange">'.$exchange.'</option>';}
   echo "</select>";
   echo("</td><td>");
$result = $conn->query("Select DISTINCT stock from exchange_stock ");
    echo "<select style='width:100%' name=\"stock\">";
    while ($row = $result->fetch_assoc()) {
                  unset($stock);
                  $stock = $row['stock'];
                  echo '<option name="stock">'.$stock.'</option>';}
    echo "</select>";
    echo("</td><td>");
    
$result = $conn->query("Select DISTINCT ticker from stock_ticker");
    echo "<select style='width:100%' name=\"ticker\">";
    while ($row = $result->fetch_assoc()) {
                  unset($ticker);
                  $ticker = $row['ticker'];
                  echo '<option name="ticker">'.$ticker.'</option>';}
   echo "</select>";
   echo("</td></tr>");
 echo("</table>");
 ?>
 <br> <input class='button' type='submit' value='Найти' > <br><br>
 </form>
 <?php
 if (isset($_POST)) {
   $country =($_POST["country"]);
   $exchange =($_POST["exchange"]);
   $stock = ($_POST["stock"]);
   $ticker = ($_POST["ticker"]);
}


if (($exchange=='')&&($stock=='')&&($country!='')&&($ticker=='')){
if($d=getc($conn,$country)){
echo("<div class='resultpoiska'>Результаты поиска:</div><br>");
echo("<table class=\"tabl\">");
echo("<tr class=\"zag\">");
echo("<th>Страна</th>");
echo("<th>Биржа</th>");
echo("<th>Акция</th>");
echo("<th>Тикер</th>");
echo("</tr>");
foreach ($d as $Item)
{
echo("<tr><td>");
echo $Item['country'];
echo("</td><td>");
echo $Item['exchange'];
echo("</td><td>");
echo $Item['stock'];
echo("</td><td>");
echo $Item['ticker'];
echo("</td></tr>");
}
echo("</table>");
}

else{$warning='Введены некорректные данные,повторите ввод'; echo("<div class=\"warn\">".$warning."</div>");}
}
else
if (($exchange=='')&&($stock=='')&&($country=='')&&($ticker!='')){
if($d=gett($conn,$ticker)){
echo("<div class='resultpoiska'>Результаты поиска:</div><br>");
echo("<table class=\"tabl\">");
echo("<tr class=\"zag\">");
echo("<th>Страна</th>");
echo("<th>Биржа</th>");
echo("<th>Акция</th>");
echo("<th>Тикер</th>");
echo("</tr>");
foreach ($d as $Item)
{
echo("<tr><td>");
echo $Item['country'];
echo("</td><td>");
echo $Item['exchange'];
echo("</td><td>");
echo $Item['stock'];
echo("</td><td>");
echo $Item['ticker'];
echo("</td></tr>");
}
echo("</table>");
}
else{$warning='Введены некорректные данные,повторите ввод'; echo("<div class=\"warn\">".$warning."</div>");}
}
else
if (($exchange!='')&&($stock!='')&&($country!='')&&($ticker=='')){
if($d=getces($conn,$country,$exchange,$stock)){
echo("<div class='resultpoiska'>Результаты поиска:</div><br>");
echo("<table class=\"tabl\">");
echo("<tr class=\"zag\">");
echo("<th>Страна</th>");
echo("<th>Биржа</th>");
echo("<th>Акция</th>");
echo("<th>Тикер</th>");
echo("</tr>");
foreach ($d as $Item)
{
echo("<tr><td>");
echo $Item['country'];
echo("</td><td>");
echo $Item['exchange'];
echo("</td><td>");
echo $Item['stock'];
echo("</td><td>");
echo $Item['ticker'];
echo("</td></tr>");
}
echo("</table>");
}
else{$warning='Введены некорректные данные,повторите ввод'; echo("<div class=\"warn\">".$warning."</div>");}
}
else
if (($exchange!='')&&($stock=='')&&($country!='')&&($ticker=='')){
if($d=getce($conn,$country,$exchange)){
echo("<div class='resultpoiska'>Результаты поиска:</div><br>");
echo("<table class=\"tabl\">");
echo("<tr class=\"zag\">");
echo("<th>Страна</th>");
echo("<th>Биржа</th>");
echo("<th>Акция</th>");
echo("<th>Тикер</th>");
echo("</tr>");
foreach ($d as $Item)
{
echo("<tr><td>");
echo $Item['country'];
echo("</td><td>");
echo $Item['exchange'];
echo("</td><td>");
echo $Item['stock'];
echo("</td><td>");
echo $Item['ticker'];
echo("</td></tr>");
}
echo("</table>");
}
else{$warning='Введены некорректные данные,повторите ввод'; echo("<div class=\"warn\">".$warning."</div>");}
}
else
if (($exchange=='')&&($stock!='')&&($country!='')&&($ticker=='')){
if($d=getcs($conn,$country,$stock)){
echo("<div class='resultpoiska'>Результаты поиска:</div><br>");
echo("<table class=\"tabl\">");
echo("<tr class=\"zag\">");
echo("<th>Страна</th>");
echo("<th>Биржа</th>");
echo("<th>Акция</th>");
echo("<th>Тикер</th>");
echo("</tr>");
foreach ($d as $Item)
{
echo("<tr><td>");
echo $Item['country'];
echo("</td><td>");
echo $Item['exchange'];
echo("</td><td>");
echo $Item['stock'];
echo("</td><td>");
echo $Item['ticker'];
echo("</td></tr>");
}
echo("</table>");
}
else{$warning='Введены некорректные данные,повторите ввод'; echo("<div class=\"warn\">".$warning."</div>");}
}
else
if (($exchange!='')&&($stock=='')&&($country=='')&&($ticker=='')){
if($d=gete($conn,$exchange)){
echo("<div class='resultpoiska'>Результаты поиска:</div><br>");
echo("<table class=\"tabl\">");
echo("<tr class=\"zag\">");
echo("<th>Страна</th>");
echo("<th>Биржа</th>");
echo("<th>Акция</th>");
echo("<th>Тикер</th>");
echo("</tr>");
foreach ($d as $Item)
{
echo("<tr><td>");
echo $Item['country'];
echo("</td><td>");
echo $Item['exchange'];
echo("</td><td>");
echo $Item['stock'];
echo("</td><td>");
echo $Item['ticker'];
echo("</td></tr>");
}
echo("</table>");
}
else{echo("<div class=\"warn\">Warning</div>");}
}
else
if (($exchange=='')&&($stock!='')&&($country=='')&&($ticker=='')){
if($d=gets($conn,$stock)){
echo("<div class='resultpoiska'>Результаты поиска:</div><br>");
echo("<table class=\"tabl\">");
echo("<tr class=\"zag\">");
echo("<th>Страна</th>");
echo("<th>Биржа</th>");
echo("<th>Акция</th>");
echo("<th>Тикер</th>");
echo("</tr>");
foreach ($d as $Item)
{
echo("<tr><td>");
echo $Item['country'];
echo("</td><td>");
echo $Item['exchange'];
echo("</td><td>");
echo $Item['stock'];
echo("</td><td>");
echo $Item['ticker'];
echo("</td></tr>");
}
echo("</table>");
}
else{$warning='Введены некорректные данные,повторите ввод'; echo("<div class=\"warn\">".$warning."</div>");}

}
 
$conn->close();
?>                                                              
 <form action="../php/input.php" method="POST">

<div class="titt">Если Вы не нашли в нашей базе интересующую информацию и хотите внести эту информацию, воспользуйтесь нашей формой ввода:</div>
<div id="inp">
<p>Название страны: <input id="t" type="text" name="countr"></p>
<p>Название биржи:  <input id="fo" type="text" name="exchang">  </p>
<p>Название акции: <input id="s" type="text" name="stoc"></p> 
<p>Название тикера: <input id="f" type="text" name="ticke"></p>


 
              </div><br>
  <input class="button" type="submit" value="Добавить" >             
        </form><br>
</div> 
</section>
  <footer>
  <br>
  <div class="opros">
   Пожалуйста, оцените вашу удовлетворенность от использования данного ресурса:   <br>   <br>
  <form action="../php/slovar.php" method="POST" class="var" >
  <input  type="radio" name="radio" value="1" checked> 1
  <input  type="radio" name="radio" value="2" > 2
  <input  type="radio" name="radio" value="3"> 3
  <input  type="radio" name="radio" value="4"> 4
  <input  type="radio" name="radio" value="5"> 5
  <br>  <br>
  <div id="send">
  <input  type="submit" value="Отправить" >  
  </div>
  </form> <br>
  </div>
  </footer>
 </body>
</html>