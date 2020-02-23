<?php   

  // connect to SQL DB
  require 'config/dbconnect.php';
 
 $title = $email = $ingredients ='';
 $errors =  ['email'=>'','title'=>'','ingredients'=>''];

 // check if there is any data from the form
 // check inside the $_GET array if submit is set
 if(isset($_POST['submit'])){
      //check email
      if(empty($_POST['email'])){
        $errors['email'] =  'An Email is require';
      }else{
        // echo htmlspecialchars($_POST['email']) ;
         $email = $_POST['email'];
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            // $errors['email'] = 'email must be a valid email address';
        }

      }
      //check title
      if(empty($_POST['title'])){
        $errors['title'] = 'Title is require';
      }else{
        // echo htmlspecialchars($_POST['title']);
        $title = $_POST['title'];
        if(!preg_match('/^[a-zA-Z\s]+$/',$title)){
          // $errors['title'] ='Title must be letters and spaces only';
        }

      }
      //check ingredients
      if(empty($_POST['ingredients'])){
        $errors['ingredients'] = 'An Ingredients is require <br/>';
      }else{
        // echo htmlspecialchars($_POST['ingredients']);
        $ingredients = $_POST['ingredients'];
        if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/',$ingredients)){
          // $errors['ingredients'] = 'Ingredients must be a comma separated list';
        }
      }


  if(array_filter($errors)){
    echo 'errors in the form';
  }else{
    //  echo 'form is valid';
    // save data o database first
    
    //protect fromsql injection
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

    // create sql
    $sql = "INSERT INTO pizzas(title,email,ingredients) values('$title','$email','$ingredients')";

    // save to DB and check
    if(mysqli_query($conn,$sql)){
       // success
       // redirect to index
      header('location:index.php'); 
    }else{
      // error
      echo 'query error: '.mysqli_error($conn);
    }

      
  }

    
 } // End of the POST Checking




?>


<!DOCTYPE html>
<html lang="en">
 <?php include 'templates/header.php' ?>
  <section class="container grey-text">
   <h4 class="center">Add a Pizza</h4>
   <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" class="white">

     <label for="email">Your Email</label>
     <input type="text" name="email" value = "<?php echo $email ?> ">
     <div class="red-text"><?php echo $errors['email']  ?></div>

     <label for="title">Pizza Title</label>
     <input type="text" name="title" value = "<?php echo $title ?>">
     <div class="red-text"><?php echo $errors['title']  ?></div>

     <label for="ingredients">Ingredients (Comma separated)</label>
     <input type="text" name="ingredients" value = "<?php echo $ingredients ?> " >
     <div class="red-text"><?php echo $errors['ingredients']  ?></div>

     <div class="center">
       <input type="submit" value="Submit" name="submit" class="btn brand z-depth-0">
     </div>
   </form>
  </section>
  
 
 <?php include 'templates/footer.php' ?>
</html>