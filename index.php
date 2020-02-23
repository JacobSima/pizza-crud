<?php   
  // connect to SQL DB
  require 'config/dbconnect.php';

  // write query for all pizzas
  $sql = "SELECT title,ingredients,id FROM pizzas   ORDER BY  createdAt";
  
  // make query & get result
  $result = mysqli_query($conn,$sql);

  // fetch the resulting rows as an array
  $pizzas = mysqli_fetch_all($result,MYSQLI_ASSOC);

  // free result from memory
  mysqli_free_result($result);
  //close the connection to DB
  mysqli_close($conn);

  // print_r($pizzas)
 // print_r(explode(',',$pizzas[0]['ingredients'])) 

?>


<!DOCTYPE html>
<html lang="en">
 <?php include 'templates/header.php' ?>

 <h4 class="center grey-text">Pizzas</h4>
 <div class="container">
   <div class="row">
     <?php  foreach($pizzas as $pizza):?>  

        <div class="col s6 md3">
            <div class="card z-depth-0">
              <img src="img/pizza.svg" alt="pizza" class="pizza">
               <div class="card-content center">
                  <h6> <?php echo htmlspecialchars($pizza['title'])  ?> </h6>
                  <ul class="collection">
                     <?php foreach(explode(',',$pizza['ingredients']) as $ing) :?>
                      
                      <li class="collection-item">
                         <?php echo htmlspecialchars($ing)  ?>
                      </li>

                     <?php  endforeach; ?>
                  </ul>
               </div>
               <div class="card-action right-align">
                 <a href="details.php?id=<?php echo  $pizza['id'] ?>   " class="brand-text">More Info</a>
               </div>
            </div>
        </div> 
      <?php endforeach; ?>


      <?php if(count($pizzas) >=3):?>
        <p>There are 3 or more pizzas</p>
      <?php   else : ?>
        <p>There are less than 3 pizzas</p>
      <?php  endif; ?>


   </div>
 </div>

 <?php include 'templates/footer.php' ?>
</html>