<!DOCTYPE html>
<html lang="en">
  <head>
   <meta charset="UTF-8">
   <link href="../css/main.css" rel="stylesheet">
   <link href="../css/new.css" rel="stylesheet">
 <link href="../Attachment/icon.ico" rel="shortcut icon" type="image/x-icon"/>
    <title>Новости</title>
  </head>
 <body>
   <header >
          <div class="divicon clearfix">
               <img class="icon" src="../Attachment/RichPapa.png" alt="RichPapa.png" title="RichPapa" >    
          </div>
            <div class="divtitle clearfix">
  <br> 
              <a href="../html/glavnaya.html"> <img class="seven menu" src="../Attachment/Glavnaya.png" alt="Glavnaya.png, 7,0kB" title="" >   </a>   
              <a href="../php/kot.php" >  <img border=0 class="nine menu " src="../Attachment/Kotirovki.png" alt="Kotirovki.png, 10kB" title="" >  </a>
               <a href="../php/calc.php"> <img border=0 class="eleven menu" src="../Attachment/Kalkulyator.png" alt="Kalkulyator.png, 13kB" title="" > </a>
               <a href="../php/news.php"> <img border=0 class="seven menu"src="../Attachment/Novosti_aktivnaya.png" alt="Novosti.png, 7,5kB" title="" >  </a>
               <a href="../php/slovar1.php"> <img border=0 class="seven menu" src="../Attachment/Slovar.png" alt="Slovar.png, 10kB" title="" >   </a>
               <a href="../html/kontakty.html"> <img border=0 class="eight menu" src="../Attachment/Kontakty.png" alt="Kontakty.png, 8,3kB" title="" >    </a>
          <br><br>
          </div> 
   </header>
<section class="container clearfix"> 
<br>
<p>В данном разделе вы сможете найти последние новости в сфере экономики, финансов и инвестиций</p>
<hr size="5px" color="black" width="80%">
<br>
<div id="im">
<img class="imagee" src="../Attachment/1.jpg" >
<img class="imagee" src="../Attachment/2.jpg" >
<img class="imagee" src="../Attachment/3.jpg" >
<img class="imagee" src="../Attachment/4.jpg" >
<img class="imagee" src="../Attachment/5.jpg" >
</div>
<div>
<ul>
<br>
<li >
<a class="aa"
<?php
$homepage = file_get_contents('https://www.finanz.ru/novosti/sortirovka/aktsii');
$divs='/<div class=\"instrumental_header instrumental_color_blue">(.*?)<\/div>/s';
$count=preg_match_all($divs,$homepage,$result);
$a='<a';
$posa=stripos($result[1][0],$a);
$posa=$posa+2;
for($i=0;$i<$posa;$i++){
		$res=$res .$result[1][0][$i];
	}
 $res=$res ."class=\"aa\"";
 $len=strlen($result[1][0]);
 for($i=$posa;$i<=$len;$i++){
		$res=$res .$result[1][0][$i];
	}
 echo $res;
/*if($count>0) {
	for($i=0;$i<$count;$i++){
		echo($result[1][$i]);
	}
} else {
	echo ('problem');
} */
?> 
 </a>
</li>
<h4 class="source">finanz.ru</h4>
<li>
<a class="aa"
<?php
$homepage = file_get_contents('https://www.vedomosti.ru/rubrics/finance');
$links='/<a class=\"b-lifestyle__bg"(.*)<\/a>/iU';
$count=preg_match_all($links,$homepage,$result);
$img='img';
$href='href';
$title='title';
$post=stripos($result[1][0],$title);
$post=$post+7;
$posh=stripos($result[1][0],$href);
$posh=$posh-2; 
for($i=$post;$i<$posh;$i++){
		$name=$name.($result[1][0][$i]);
	};
$posi=stripos($result[1][0],$img);
$posh=stripos($result[1][0],$href);
$posh=$posh+6;
$posi=$posi-1;
for($i=$posh;$i<$posi;$i++){
		$hr=$hr.($result[1][0][$i]);
	}
$hr="href=\"https://www.vedomosti.ru/".$hr;
echo $hr,$name;
?>
</a>
</li>
<h4 class="source">Ведомости</h4>
<li>
<a class="aa"
<?php
$homepage = file_get_contents('https://www.vedomosti.ru/rubrics/economics');
$links='/<a class=\"b-lifestyle__bg"(.*)<\/a>/iU';
$count=preg_match_all($links,$homepage,$result);
$img='img';
$href='href';
$title='title';
$name="";
$hr="";
$post=stripos($result[1][0],$title);
$post=$post+7;
$posh=stripos($result[1][0],$href);
$posh=$posh-2; 
for($i=$post;$i<$posh;$i++){
		$name=$name.($result[1][0][$i]);
	};
$posi=stripos($result[1][0],$img);
$posh=stripos($result[1][0],$href);
$posh=$posh+6;
$posi=$posi-1;
for($i=$posh;$i<$posi;$i++){
		$hr=$hr.($result[1][0][$i]);
	}
$hr="href=\"https://www.vedomosti.ru/".$hr;
echo $hr,$name;
?>
</a>
</li>
<h4 class="source">Ведомости</h4>
<li>
<a class="aa"
<?
$homepage = file_get_contents('https://www.forbes.ru/finansy');
$links='/<a class=\"business-article-title"(.*)<\/a>/iU';
$count=preg_match_all($links,$homepage,$result);
$len=strlen($result[1][0]);
echo("href=\"https://www.forbes.ru");
for($i=7;$i<$len;$i++){
		echo($result[1][0][$i]);
	}
?>
</a>
</li>
<h4 class="source">Forbes</h4>
<li>
<a  class="aa"
<?
$homepage = file_get_contents('https://www.forbes.ru/finansy');
$links='/<a class=\"title-news"(.*)<\/a>/iU';
$count=preg_match_all($links,$homepage,$result);
echo("href=\"https://www.forbes.ru");
$len=strlen($result[1][0]);
for($i=7;$i<$len;$i++){
		echo($result[1][0][$i]);
	}
?>
</a>
</li>
<h4 class="source">Forbes</h4>
<li>
<a class="aa"
<?php
$homepage = file_get_contents('https://lenta.ru/rubrics/economics/companies/');
$links='/<a class=\"js-dh"(.*)<\/a>/iU';
$count=preg_match_all($links,$homepage,$result);
echo $result[1][0][1],$result[1][0][2],$result[1][0][3],$result[1][0][4],$result[1][0][5],$result[1][0][6],"https://lenta.ru";
$len=strlen($result[1][0]);
for($i=7;$i<$len;$i++){
		echo($result[1][0][$i]);
	}
?>
</a>
</li>
<h4 class="source">lenta.ru</h4>


 </ul>
 </div>
<br><br>



<br><br>


   </section>
   <footer>
  <br>
  <div class="opros">
   Пожалуйста, оцените вашу удовлетворенность от использования данного ресурса:   <br>   <br>
  <form action="../php/news2.php" method="POST" class="var" >
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