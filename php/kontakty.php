<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8">
   <link href="../css/main.css" rel="stylesheet">
   <link href="../css/kont.css" rel="stylesheet">
 <link href="../Attachment/icon.ico" rel="shortcut icon" type="image/x-icon"/>
    <title>Контакты</title>
  </head>
 <body>
   <header >
          <div class="divicon clearfix">
               <img class="icon" src="../Attachment/RichPapa.png" alt="RichPapa.png" title="RichPapa" >    
          </div>
            <div class="divtitle clearfix">
  <br> 
              <a href="../html/glavnaya.html"> <img class="seven menu" src="../Attachment/Glavnaya.png" alt="Glavnaya.png, 7,0kB" title="" >   </a>   
              <a href="../php/kot.php">  <img border=0 class="nine menu " src="../Attachment/Kotirovki.png" alt="Kotirovki.png, 10kB" title="" >  </a>
               <a href="../php/calc.php"> <img border=0 class="eleven menu" src="../Attachment/Kalkulyator.png" alt="Kalkulyator.png, 13kB" title="" > </a>
               <a href="../php/news.php"> <img border=0 class="seven menu"src="../Attachment/Novosti.png" alt="Novosti.png, 7,5kB" title="" >  </a>
               <a href="../php/slovar1.php"> <img border=0 class="seven menu" src="../Attachment/Slovar.png" alt="Slovar.png, 10kB" title="" >   </a>
               <a href="../html/kontakty.html"> <img border=0 class="eight menu" src="../Attachment/Kontakty_aktivnaya.png" alt="Kontakty.png, 8,3kB" title="" >    </a>
          <br><br>
          </div> 
          </div>  
   </header>
   <section class="clearfix"> 
           <div class="containerk clearfix"> 
                  <p id="thanx">Спасибо, что воспользовались нашим ресурсом!</p><br> <p id="propose">Если у Вас остались какие-то вопросы или предложения, касающиеся данного сайта, пожалуйста напишите нам: </p>
                  <br>
                  <div id="form">
                       <form action="../php/send.php" method="post">
                       <fieldset>
                       <legend>Letter:</legend>
                       <div id="cent">
                       Name:<br>
                        <input type="text" name="name" placeholder="Name" size="10" required>
                        <br>
                        E-mail:<br>
                        <input type="text" name="email" placeholder="example@mail.ru" size="30" required>  <br>
                        Text:<br>
                        <textarea name="text" cols="40" rows="5" required></textarea>
                        <br>
                        <input type="submit" value="Send" >
                        </div>
                        </fieldset>
                       </form> 
                       <br>
                       <br>
                       </div>
     </div>
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