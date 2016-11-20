<?php require_once 'header.php' ?>
<div class="panel panel-default">
      <div class="panel-heading">Panel Heading </div>
      <div class="panel-body">
       <table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Street</th>
        <th>Zipcode</th>
        <th>City</th>
      </tr>
    </thead>
    <tbody>
     <?php
     if(count($data['address_list']) > 0) {
         foreach($data['address_list'] as $ad) {
             echo "<tr>";
                 echo "<td>";
                    echo $ad['fullname'];
                 echo "</td>";

                  echo "<td>";
                    echo $ad['street'];
                 echo "</td>";

                  echo "<td>";
                    echo $ad['zipcode'];
                 echo "</td>";

                  echo "<td>";
                    echo $ad['city_name'];
                 echo "</td>";

             echo "</tr>";
         }
     } 
     ?>
   
    </tbody>
  </table>
      </div>
    </div>
    <?php require_once 'footer.php' ?>