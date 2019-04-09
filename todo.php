<?php 
session_start();
//session_destroy();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <script src="jquery-3.3.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <title>TO DO APP</title>
</head>
<body>
  <div class="app">
   <h1>LETS GET THINGS DONE</h1>
    
  <form method="POST" action="todo.php">
      
  <input type="text" name="list">
      
  <input type="submit" value="Add List">
  </div>
  
  
  </form>
   
<?php
if($_POST){
    $any = $_POST['list'];
    if(isset($_SESSION['items'])){
        $_SESSION['items'][] = $any;
        
    }else{
        $_SESSION['items'] = [];
    }

displaylist();
    
}
// this function populate the  $_SESSION//
$time = time();    
function displaylist(){
 $time = time();
 //$date = date('Y-m-d',$item);

 
  echo "<ul>";
  foreach($_SESSION['items'] as $item){
      echo "<li id=\"do\">".$item."</li><br>";
  };
  echo "</ul>";
  
}



       
?>
   
</body>

    <script>
 // jquery start here
$(document).ready(function(){
   var item = 0;
   $("li").each(function(c){
       $(this).click(function(){
       checked = c;
        if(item == 0){
           $(this).css("text-decoration", "line-through");
           item = 1;
           sessionStorage.setItem(checked, item);

          }else{
              $(this).css("text-decoration", "none");
              item = 0;
              sessionStorage.setItem(checked, item);
           }
       });
   });
$("li").each(function(c){
   if(sessionStorage.getItem(c)==1){
       $(this).css("text-decoration", "line-through");
   }
});
});


    </script>
 
</html>
