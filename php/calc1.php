<!DOCTYPE html>
<html lang="en">
  <head>
   <meta charset="UTF-8">
   <link href="../css/main.css" rel="stylesheet">
   <link href="../css/calc.css" rel="stylesheet">
 <link href="../Attachment/icon.ico" rel="shortcut icon" type="image/x-icon"/>
    <title>Калькулятор</title>
  </head>
 <body>
   <header >
          <div class="divicon clearfix">
               <img class="icon" src="../Attachment/RichPapa.png" alt="RichPapa.png" title="RichPapa" >    
          </div>
            <div class="divtitle clearfix">
  <br> 
              <a href="../html/glavnaya.html"> <img class="seven menu" src="../Attachment/Glavnaya.png" alt="Glavnaya.png, 7,0kB" title="" >   </a>   
              <a href="../php/kot.php" class="rollover">  <img border=0 class="nine menu " src="../Attachment/Kotirovki.png" alt="Kotirovki.png, 10kB" title="" >  </a>
               <a href="../php/calc.php"> <img border=0 class="eleven menu" src="../Attachment/Kalkulyator_aktivnaya.png" alt="Kalkulyator.png, 13kB" title="" > </a>
               <a href="../php/news.php"> <img border=0 class="seven menu"src="../Attachment/Novosti.png" alt="Novosti.png, 7,5kB" title="" >  </a>
               <a href="../php/slovar1.php"> <img border=0 class="seven menu" src="../Attachment/Slovar.png" alt="Slovar.png, 10kB" title="" >   </a>
               <a href="../html/kontakty.html"> <img border=0 class="eight menu" src="../Attachment/Kontakty.png" alt="Kontakty.png, 8,3kB" title="" >    </a>
          <br><br>
          </div> 
   </header>
<section class="container clearfix"> 
<br> 
<div class="pred">Рассчитайте, сколько бы Вы заработали дивидендов за указанный срок, если бы купили акции по текущей цене.</div> <br><br>
<form action="../php/calc1.php" method="POST" class="raschet">
<div class='ramka'>
<label for="start">Введите дату покупки</label><br><input type="date" id="start" name="start" required ><br> <br>
<label for="end">Введите дату продажи</label><br><input type="date" id="end" name="end" required> <br>  <br>
<label for="have">Введите сумму, которую Вы хотите вложить</label><br><input size="15" type="text" id="have" name="have" required>     рублей <br><br> 
<?php
echo("<style type=\"text/css\">");
echo(" .res{
font-family:Corbel;
color:#294552;
font-weight:bold;
margin-left:25%;
font-size:25px;
}
.raschet{
font-family:Corbel;
color:#294552;
font-weight:bold;
margin-left:0%;
font-size:25px;
}
.do{
margin-left:5%;

}
.pred{
font-family:Corbel;
margin-left:25%;
margin-right:25%;
font-size:23px;
color:#3d494f;
}
.ramka{
border: 1px solid #294552;
margin-left:25%;
margin-right:25%;
padding:1%;
}
.curs{
font-style:italic;
font-family:Calibri;
float:right;
margin-right:20%;
}
.curs3{
font-style:italic;
font-family:Calibri;
float:right;
margin-right:40%;
}");
echo("</style>");
$config =include ('configcalc.php');
   include ('functions.php'); 
$conn=Connect($config['dbhost'],$config['dbuser'],$config['dbpass'],$config['dbname']);
 $result = $conn->query("Select DISTINCT st from st_tick");
 echo("Выберите акцию <br>");
    echo "<select style='width:30%' name=\"st\" required>";
    while ($row = $result->fetch_assoc()) {
                  unset($st);
                  $st = $row['st'];
                  echo '<option>'.$st.'</option>';}
   echo "</select>";
?>

<br><br> <input  type='submit' value='Рассчитать' > <br><br>
</div>
</form>

<?php

 if (isset($_POST)) {
   $st =($_POST["st"]);
   $start=($_POST["start"]);
   $end=($_POST["end"]);
   $dout = strtotime($end); 
   $din = strtotime($start); 
   $datediff = $dout - $din; 
   $srok = round($datediff / (60 * 60 * 24));
   $have= ($_POST["have"]);
   
}
if ($srok<0){
echo("<br><br><div class='res'>Введены некорректные даты. Повторите ввод<br><br></div>");
}
else
if (!(is_numeric($have))){
echo("<br><br><div class='res'>Введена некорректная сумма. Повторите ввод<br><br></div>");
}
else{
$have=(float)$have;
if (($have<0)){
echo("<br><br><div class='res'>Введена некорректная сумма. Повторите ввод<br><br></div>");
}
else {
$homepage = file_get_contents('https://smart-lab.ru/dividends');
$table='<table class="simple-little-table trades-table events moex_bonds_inline" cellspacing="0">';
$postable=stripos($homepage,$table);
$tab=substr($homepage,$postable);
$tableend='</table>';
$postableend=stripos($tab,$tableend);
$postableend=$postableend+8;
$tab=substr($tab,0,$postableend);
$posst=stripos($tab,$st);
$strongend='</strong>';
$tab=substr($tab,$posst);
$posstrongend=stripos($tab,$strongend);
$tab=substr($tab,$posstrongend);
$copy=$tab;
$td='<td>';
$postd=stripos($tab,$td);
$tab=substr($tab,$postd);
$tdend='</td>';
$postdend=stripos($tab,$tdend);
$end='>';
$posend=stripos($tab,$end);
$posend=$posend+1;
$len=$postdend-$posend;
$tab=substr($tab,$posend,$len);
$replace='.';
$search=',';
$tab=str_replace($search,$replace,$tab); 
$cost = (float)$tab;
#echo($cost);
$strong='<strong>';
$posstrong=stripos($copy,$strong);
$copy=substr($copy,$posstrong);
$posend=stripos($copy,$end);
$posend=$posend+1;
$posstrongend=stripos($copy,$strongend);
$len=($posstrongend-$posend)-1;
$copy=substr($copy,8,$len);
$replace='.';
$search=',';
$copy=str_replace($search,$replace,$copy); 
$dived = (float)$copy;
#echo($dived);
$can=floor($have/$cost);
echo('<br><div class="res">');
echo("Цена одной акции составляет: <div class='curs'>".round($cost,2)." рублей</div><br>");
echo ("Вы можете приобрести <div class='curs'>".$can." акций</div><br>");
echo("Тогда вы задействуете <div class='curs'>".round($can*$cost,2)." рублей</div><br>");
$plus=$can*$cost*$dived*$srok/365/100;
echo("Ваша прибыль от дивидендов составит: <div class='curs'>".round($plus,2)."   рублей</div>");
echo('</div>');
}
}
$conn->close();

?>
<br> <br>
 </div>
   </section>
   <footer>
  <br>
  <div class="opros">
   Пожалуйста, оцените вашу удовлетворенность от использования данного ресурса:   <br>   <br>
  <form action="../php/calcopros.php" method="POST" class="var">
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