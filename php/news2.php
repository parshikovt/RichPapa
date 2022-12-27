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
<?php
$config =include ('configopros.php');
include ('functions.php');

$conn=Connect($config['dbhost'],$config['dbuser'],$config['dbpass'],$config['dbname']);
//загрузка данных из массива POST
if(isset($_POST['radio'])) {
  $result=$_POST['radio'];
}

$sql="INSERT INTO result (Answer) VALUES ('$result')";
if ($conn->query($sql) == TRUE) {
} else {
       echo "Error: " .$sql ."<br>" . $conn->error;
}

?>
<br>
<div class="opr">
Ваш ответ записан <br>
Спасибо за участие!</div>
<?php
echo("<style type=\"text/css\">");
   echo(".itog{margin-left:4%;font-family:Calibri;}
   .diagram{margin-left:34.3%;color:#e4e4e4; }");
echo("</style>");
$result1 = $conn->query("SELECT Count(result.Number) FROM result GROUP BY result.Answer HAVING (((result.Answer)=1));");
$result2 = $conn->query("SELECT Count(result.Number) FROM result GROUP BY result.Answer HAVING (((result.Answer)=2));");
$result3 = $conn->query("SELECT Count(result.Number) FROM result GROUP BY result.Answer HAVING (((result.Answer)=3));");
$result4 = $conn->query("SELECT Count(result.Number) FROM result GROUP BY result.Answer HAVING (((result.Answer)=4));");
$result5 = $conn->query("SELECT Count(result.Number) FROM result GROUP BY result.Answer HAVING (((result.Answer)=5));");
$count = $conn->query("SELECT Count(result.Number) FROM result;");
while ($row = $count->fetch_assoc()) {
                  unset($all);
                  $all = $row['Count(result.Number)'];
                  }
while ($row = $result1->fetch_assoc()) {
                  unset($one);
                  $one = $row['Count(result.Number)'];
                  }

while ($row = $result2->fetch_assoc()) {
                  unset($two);
                  $two = $row['Count(result.Number)'];
                  }

while ($row = $result3->fetch_assoc()) {
                  unset($three);
                  $three = $row['Count(result.Number)'];
                  }

while ($row = $result4->fetch_assoc()) {
                  unset($four);
                  $four = $row['Count(result.Number)'];
                  }

while ($row = $result5->fetch_assoc()) {
                  unset($five);
                  $five = $row['Count(result.Number)'];
                  }

                  echo("<script src='https://www.google.com/jsapi'></script>
  <script>
   google.load('visualization', '1', {packages:['corechart']});
   google.setOnLoadCallback(drawChart);
   function drawChart() {
    var data = google.visualization.arrayToDataTable([
     ['Оценка', 'Количество'],
     ['1',$one],
     ['2',$two],
     ['3',$three],
     ['4',$four],
     ['5',$five]
    ]);
    var options = {
      pieSliceTextStyle: {bold:true},
     title: 'Результаты опроса:',
     backgroundColor: '#3d494f',
      titleTextStyle:{color: '#e4e4e4',fontSize:25,fontName:'Corbel'},
     is3D: true,
      legend: {textStyle: {color: '#e4e4e4',fontSize:15,bold:true}},
     pieResidueSliceLabel: 'Остальное'
    };
    
    var chart = new google.visualization.PieChart(document.getElementById('air'));
     chart.draw(data, options);
   }
  </script>");
  echo('<div class="diagram" id="air" style="width: 500px;height:300px; "></div>');
#echo("<div class='itog'>1:".$one." человек<br>");
#echo("2:".$two." человек<br>");
#echo("3:".$three." человек<br>");
#echo("4:".$four." человек<br>");
#echo("5:".$five." человек</div>");
          
$conn->close();
?>
<br>
</footer>
 </body>
</html>