<?php  
  //  ******************** SESSION ********************
  // access session variable
  session_start();
   //$_SESSION['name'] = 'yoshi' ;  // change the name value

   // example: http://localhost/pizaproject/index.php?noname
   if($_SERVER['QUERY_STRING'] == 'noname'){  
     unset($_SESSION['name']);   // remove the session variable of name when a query string of noname if provide in the link

    //session_unset();    // clear all the session
   }
   $name = $_SESSION['name'] ?? 'GUEST';  // it is set or put it guest as value



 //  ******************** COOKIE ********************
  $gender = $_COOKIE['gender'] ?? 'unknown';



 

?>



<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <style>
    .brand{ background: #cbb09c!important}
    .brand-text{ color:#cbb09c!important}

     form{
       max-width: 430px;
       margin:20px auto;
       padding:20px;
     }

    .pizza{
     width: 100px;
     margin:40px auto -30px;
     display: block;
     position: relative;
     top:-30px;
    }
  </style>
  <title>Ninja Pizza</title>
</head>
<body class="grey lighten-4">
  <nav class="white z-depth-0">
    <div class="container">
      <a href="index.php" class="brand-logo brand-text">Ninja Pizza</a>
      <ul id="nav-mobile" class="right hide-on-small-and-down">

         <li class="grey-text">
           Hello <?php echo htmlspecialchars($name) ?>   
         </li>

         <li class="grey-text">
          (<?php echo htmlspecialchars($gender) ?>  ) 
         </li>

          <li>
            <a href="add.php" class="btn brand z-depth-0">Add Pizza</a>
          </li>

      </ul>
    </div>
  </nav>