<?php  

require 'config/dbconnect.php';

 if(isset($_POST['delete'])){


   $id_to_delete = mysqli_real_escape_string($conn,$_POST['id_to_delete']);

   $sql = "DELETE FROM pizzas WHERE id = $id_to_delete";
   if(mysqli_query($conn,$sql)){
     // success
     header('Location: index.php');
   }else{
     //failure
     echo 'query error: '. mysqli_error($conn);
   }

 }



// check GET request id param
 if(isset($_GET['id'])){
   // protect DB from sql injection
   $id = mysqli_real_escape_string($conn,$_GET['id']);

   // make the sql
   $sql = "SELECT * FROM pizzas WHERE id = $id";
   
   // get the query result
   $result = mysqli_query($conn,$sql);

   // fetch result in array format
   $pizza = mysqli_fetch_assoc($result);

   // free memory and close connection
   mysqli_free_result($result);
   mysqli_close($conn);

  //  print_r($pizza);
 }


?>

<!DOCTYPE html>
<html lang="en">
 
  <?php include 'templates/header.php' ?>
 
    <div class="container center grey-text">
       <?php if($pizza):?>
          <h4><?php echo htmlspecialchars($pizza['title']) ?></h4>
          <p>Create by: <?php echo htmlspecialchars($pizza['email'])  ?></p>
          <p> <?php  echo date($pizza['createdAt'])  ?> </p>
          <h5>Ingredients</h5>
          <p><?php echo htmlspecialchars($pizza['ingredients']) ?></p>

          <!-- DELETE FORM -->
          <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <input type="hidden" name="id_to_delete" value ="<?php echo $pizza['id'] ?>">
            <input type="submit" value="Delete" name="delete" class="btn brand z-depth-0">
          </form>
        <?php else: ?>
          <h5>No Such Pizza exists</h5>
       <?php  endif; ?>

    </div>

  <?php  include 'templates/footer.php'?>
</html>