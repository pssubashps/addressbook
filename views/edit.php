<?php require_once 'header.php' ?>
<div class="panel panel-default">
      <div class="panel-heading">Panel Heading </div>
      <div class="panel-body">
      <?php
      $errors =  $view->getErrors ();
      if($errors) {
        echo "<div class='alert alert-danger'>";
        
        foreach($errors as $err) {
          echo "<p>".$err."</p>";
        }
        echo "</div>";
      }
      ?>
      </div>
      <div class="panel-body">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']?>">
          <div class="form-group">
            <label for="email">Name:</label>
            <input type="text" value="<?php echo $data['address']['fullname'];?>" class="form-control" id="fullname" name ="fullname" placeholder="Enter name">
          </div>
          <div class="form-group">
            <label for="pwd">Street:</label>
            <input type="text"  value="<?php echo $data['address']['street'];?>" class="form-control" id="street" name="street" placeholder="Enter Street">
          </div>

          <div class="form-group">
            <label for="pwd">Zipcode:</label>
            <input type="text"  value="<?php echo $data['address']['zipcode'];?>" pattern="[0-9]{6}" class="form-control" id="zipcode" name="zipcode" placeholder="Enter Zipcode">
          </div>

          <div class="form-group">
            <label for="pwd">City:</label>
            <select class="form-control" name="city" id="city">
            <?php
              foreach($data['cities'] as $c) {
                echo "<option value='".$c['id']."'>".$c['city_name']."</option>";
              }
            ?>
            </select>
          </div>
          <input type="hidden" name="id" value= "<?php echo $data['address']['id'];?>"/>
          
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
      </div>
    </div>

    <?php require_once 'footer.php' ?>