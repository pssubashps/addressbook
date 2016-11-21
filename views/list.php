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
      <?php
      $message =  $view->getMessage ();
if($message) {
	echo "<div class='alert alert-success'>";
	echo "<p>".$message."</p>";
	echo "</div>";
}
?>
      </div>
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
      <div class="panel-body">
      <ul class="pagination">
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li class="disabled"><a href="#">4</a></li>
    <li><a href="#">5</a></li>
  </ul>
      </div>
    </div>
    <?php require_once 'footer.php' ?>