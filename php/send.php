<!DOCTYPE html>
<html lang="ru">
  <head>
  <meta charset="UTF-8">
   <link href="../css/main.css" rel="stylesheet">
   <link href="../css/kont.css" rel="stylesheet">
 <link href="../Attachment/icon.ico" rel="shortcut icon" type="image/x-icon"/>
   <script type="text/javascript">
  function viewDiv(){
  document.getElementById("div1").style.display = "block";};
</script>
    <title>Контакты</title>
  </head>
 <body>
   <header >
          <div class="divicon clearfix">
               <img class="icon" src="../Attachment/RichPapa.png" alt="RichPapa.png" title="RichPapa" >    
          </div>
          <div class="divtitle clearfix"> 
               <p><a href="../html/glavnaya.html"> <img class="seven menu" src="../Attachment/Glavnaya.png" alt="Glavnaya_aktivnaya.png, 7,0kB" title="" >   </a>   
               <a href="..php/kot.php" >  <img border=0 class="nine menu " src="../Attachment/Kotirovki.png" alt="Kotirovki.png, 10kB" title="" >  </a>
               <a href="../php/calc.php"> <img border=0 class="eleven menu" src="../Attachment/Kalkulyator.png" alt="Kalkulyator.png, 13kB" title="" > </a>
               <a href="../php/news.php"> <img border=0 class="seven menu"src="../Attachment/Novosti.png" alt="Novosti.png, 7,5kB" title="" >  </a>
               <a href="../php/slovar1.php"> <img border=0 class="seven menu" src="../Attachment/Slovar.png" alt="Slovar.png, 10kB" title="" >   </a>
               <a href="../html/kontakty.html"> <img border=0 class="eight menu" src="../Attachment/Kontakty_aktivnaya.png" alt="Kontakty.png, 8,3kB" title="" > </p>    </a>
          </div> 
   </header>
   <section class="clearfix"> 
           <div class="containerk clearfix"> 
                  <p id="thanx">Спасибо, что воспользовались нашим ресурсом!</p><br> 
                  <br>
                  <div id="php">
 <?php
 $config =include ('configopros.php');
include ('functions.php');
$conn=Connect($config['dbhost'],$config['dbuser'],$config['dbpass'],$config['dbname']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$name = $_POST['name'];
$email = $_POST['email'];
$text = $_POST['text'];
$name = htmlspecialchars($name); #преобразование в текст
$email = htmlspecialchars($email);
$text = htmlspecialchars($text);
$name = trim($name);  #удаление пробелов
$email = trim($email);
$text = trim($text);
}  
$sql="INSERT INTO mail (Name, Email,Text) VALUES ('$name','$email','$text')";
if ($conn->query($sql) == TRUE) {
} else {
       echo "Error: " .$sql ."<br>" . $conn->error;
}
if (mail('tihon662@gmail.com', 'Отзыв с сайта', 'Имя: '.$name.'
E-mail:  '.$email.'
Text:  '.$text ,'From: agrogreencompany@gmail.com \r\n'))
 { 
    echo "Сообщение успешно отправлено."; 
} else { 
    echo "При отправке сообщения возникли ошибки."; 
} 
?>
                       </div>
     </div>
   <footer >
   <br>
  <div class="opros">
   Пожалуйста, оцените вашу удовлетворенность от использования данного ресурса:   <br>   <br>
  <form action="../php/kontakty.php" method="POST" class="var" >
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
           
   </section>
 </body>
</html>


