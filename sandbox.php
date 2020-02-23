<?php  
   
   //*************** Tenary operators ************
   $score = 20;
  //  if($score >40){
  //    echo 'high score';
  //  }else{
  //    echo 'low score';
  //  }
   
    // $val =  $score > 40 ? 'high score':'low score';
    // echo $val;

  //  echo $score > 40 ? 'high score':'low score';



  //*************** Superglobals ************
  // $_GET['name] , $_POST['name']

  // print_r ($_SERVER);
  // echo $_SERVER['SERVER_NAME']. '<br/>';
  // echo $_SERVER['REQUEST_METHOD']. '<br/>';
  // echo $_SERVER['SCRIPT_FILENAME']. '<br/>';
  // echo $_SERVER['PHP_SELF']. '<br/>';


  // Sessions
  if(isset($_POST['submit'])){
    session_start();
    $_SESSION['name'] = $_POST['name'];
    


    // Cookie for gender
    setcookie('gender',$_POST['gender'],time()+ 86400);   // last a day , from now until tomorrow in seconds



    header('location: index.php');
  }
  



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <!-- ***  Tenary operators  *** -->
   <!-- <p>
     <?php echo $score > 40 ? 'high score':'low score'; ?>
   </p> -->


   <!-- Sessions  and cookies = select added -->
   <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
     <input type="text" name="name">
    <select name="gender" >
      <option value="male">Male</option>
      <option value="female">Female</option>
    </select>
     <input type="submit" value="Submit" name="submit"> 
   </form>

</body>
</html>