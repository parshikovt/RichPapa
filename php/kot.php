<!DOCTYPE html>
<html lang="en">
  <head>
   <meta charset="UTF-8">
   <link href="../css/main.css" rel="stylesheet">
   <link href="../css/kot.css" rel="stylesheet">
 <link href="../Attachment/icon.ico" rel="shortcut icon" type="image/x-icon"/>
    <title>Котировки</title>
  </head>
 <body>
   <header >
          <div class="divicon clearfix">
               <img class="icon" src="../Attachment/RichPapa.png" alt="RichPapa.png" title="RichPapa" >    
          </div>
            <div class="divtitle clearfix">
  <br> 
              <a href="../html/glavnaya.html"> <img class="seven menu" src="../Attachment/Glavnaya.png" alt="Glavnaya.png, 7,0kB" title="" >   </a>   
              <a href="../php/kot.php" class="rollover">  <img border=0 class="nine menu " src="../Attachment/Kotirovki_aktivnaya.png" alt="Kotirovki.png, 10kB" title="" >  </a>
               <a href="../php/calc.php"> <img border=0 class="eleven menu" src="../Attachment/Kalkulyator.png" alt="Kalkulyator.png, 13kB" title="" > </a>
               <a href="../php/news.php"> <img border=0 class="seven menu"src="../Attachment/Novosti.png" alt="Novosti.png, 7,5kB" title="" >  </a>
               <a href="../php/slovar1.php"> <img border=0 class="seven menu" src="../Attachment/Slovar.png" alt="Slovar.png, 10kB" title="" >   </a>
               <a href="../html/kontakty.html"> <img border=0 class="eight menu" src="../Attachment/Kontakty.png" alt="Kontakty.png, 8,3kB" title="" >    </a>
          <br><br>
          </div> 
   </header>
<section class="container clearfix"> 
<br>
<div class="exxx">Московская межбанковская валютная биржа</div>
<br>
<div class="mmmm">
<?php
echo("<style type=\"text/css\">");
echo(".mmmm a{
   pointer-events: none;
   cursor: default;
}
.exxx{
font-size:25px;
margin-left:25%;
color:#294552;
font-family:Corbel;
text-decoration:underline;
}
.opros{
color:#e4e4e4;
font-family:Corbel;
font-size:25px;
margin-left:30%;
}
.opros{
color:#e4e4e4;
font-family:Corbel;
font-size:25px;
margin-left:30%;
}
.var{
padding-left:23%;
font-family:'Times New Roman';
font-size:20px;
}
#send{
padding-left:6%;
}
table td:first-child {text-align: left;}
table tr{text-align:left;}
table td{text-align: center;font-family:Calibri;color:#294552; }");
echo("</style>");
$homepage = file_get_contents('http://tikr.ru/stock/');
$table='<table width="100%" cellpadding="4" class="tablest"';
$tableend='</table>';
$replace='Название';
$search='название';
$homepage=str_replace($search,$replace,$homepage);
$replace='Тикер';
$search='тикер';
$homepage=str_replace($search,$replace,$homepage);
$replace='Курс';
$search='курс';
$homepage=str_replace($search,$replace,$homepage);
$replace='Изменение';
$search='изменение';
$homepage=str_replace($search,$replace,$homepage);
$replace='Объём';
$search='объём';
$homepage=str_replace($search,$replace,$homepage);
$pos=stripos($homepage,$table);
$res=substr($homepage,$pos);
$footer='<footer>';
$posf=stripos($res,$footer);
$len=$posf-1;
$result=substr($res,0,$len);
echo($result);
?>
 </div>
   </section>
   <footer>
  <br>
  <div class="opros">
   Пожалуйста, оцените вашу удовлетворенность от использования данного ресурса:   <br>   <br>
  <form action="../php/kotopr.php" method="POST" class="var">
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