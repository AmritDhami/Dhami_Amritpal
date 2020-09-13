



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>SCP file </title>
  </head>
     <body class="container">
      <h1 class="page_header">Enter a new product</h1>
      <?php
        
        if($_POST)
        {
            //connect to the database

            include 'connection/database.php';

            try
            {
                  //insert query

                  $query="insert into scp_file set item=:item,class=:class,image=:image,special_procedure=:special_procedure,description=:description,reference=:reference,additional=:additional";

                  //prepare query for execution
                  $statement=$conn->prepare($query);

                  $item=htmlspecialchars(strip_tags($_POST['item']));
                   $class=htmlspecialchars(strip_tags($_POST['class']));
                    $image=htmlspecialchars(strip_tags($_POST['image']));
                     $special_procedure=htmlspecialchars(strip_tags($_POST['special_procedure']));
                      $description=htmlspecialchars(strip_tags($_POST['description']));
                       $reference=htmlspecialchars(strip_tags($_POST['reference']));
                  $additional=htmlspecialchars(strip_tags($_POST['additional']));
              
                  //bind our parameter to our query
                  $statement->bindParam(':item',$item);
                  $statement->bindParam(':class',$class);
                   $statement->bindParam(':image',$image);
                  $statement->bindParam(':special_procedure',$special_procedure);
                  $statement->bindParam(':description',$description);
                  $statement->bindParam(':reference',$reference);
                     $statement->bindParam(':additional',$additional);

                

                  //execute the query
                  if($statement->execute())
                  {
                    echo"<div class='alert alert-success'>Record {id} was created</div>";
                  }
                  else
                  {
                    echo"<div class='alert alert-danger'>Unable to save record.</div>";
                  }

            }
            catch(PDOException $exception)
            {
                 die('ERROR: ' . $exception->getMessage());
            }
        }

    ?>
    <h2>please enter a new SCP file ....</h2>
     <p><a href="index.php" class="btn btn-warning">Back to index page</a></p>
    <form class="form-group" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
    <label>Item:</label>
    <br>
    <input type="text" name="item" class="form-control">
    <br>
    <label>Object class:</label>
    <br>
    <input type="text" name="class" class="form-control">
    <br>
    <label>Image:</label>
    <br>
    <input type="text" name="image" class="form-control">
    <br>
    <label>Special Containment:</label>
    <br>
    <input type="text" name="special_procedure" class="form-control">
    <br>
    <label>Description:</label>
    <br>
    <input type="text" name="description" class="form-control">
    <br>
    <label>Reference:</label>
    <br>
    <input type="text" name="reference" class="form-control">
    <br>
    <label>Additional</label>
    <br>
    <input type="text" name="additional" class="form-control">
    <br>
    <input type="submit" value="Save" class="btn btn-primary">
    </form>
   




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>