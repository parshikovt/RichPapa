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
<br> <div class="pred">Рассчитайте, сколько бы Вы заработали дивидендов за указанный срок, если бы купили акции по текущей цене.</div> <br><br>
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
.ramka{
border: 1px solid #294552;
margin-left:25%;
margin-right:25%;
padding:1%;
}
.pred{
font-family:Corbel;
margin-left:25%;
margin-right:25%;
font-size:23px;
color:#3d494f;
}
.curs{
font-style:italic;
font-family:Calibri;
float:right;
margin-right:35%;
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

<br><br>
<br>
 </div>
   </section>
<footer>
<?php
$config =include ('configopros.php');
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