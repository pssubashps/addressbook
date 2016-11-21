<?php require_once 'header.php'?>
<div class="panel panel-default">
	<div class="panel-heading">
		Address List<span style="float: right"><a
			href="<?php echo $view->getSiteUrl().'index.php/address/xml'?>"
			target="__blank">Export to Xml</a></span>
	</div>
	<div class="panel-body">
      <?php
						$errors = $view->getErrors ();
						if ($errors) {
							echo "<div class='alert alert-danger'>";
							
							foreach ( $errors as $err ) {
								echo "<p>" . $err . "</p>";
							}
							echo "</div>";
						}
						?>
</div>
	<div class="panel-body">
      <?php
						$message = $view->getMessage ();
						if ($message) {
							echo "<div class='alert alert-success'>";
							echo "<p>" . $message . "</p>";
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
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
     <?php
					if (count ( $data ['address_list'] ) > 0) {
						
						foreach ( $data ['address_list'] as $ad ) {
							echo "<tr>";
							echo "<td>";
							echo $ad ['fullname'];
							echo "</td>";
							
							echo "<td>";
							echo $ad ['street'];
							echo "</td>";
							
							echo "<td>";
							echo $ad ['zipcode'];
							echo "</td>";
							
							echo "<td>";
							echo $ad ['city_name'];
							echo "</td>";
							
							echo "<td>";
							echo "<a href='" . $view->getSiteUrl () . "index.php/address/edit/?id=" . $ad ['id'] . "'>Edit</a>";
							echo "</td>";
							
							echo "</tr>";
						}
					}
					?>
    </tbody>
		</table>
	</div>
	<div class="panel-body">
      <?php
						if ($pagination) {
							echo '<ul class="pagination">';
							for($p = 1; $p <= $pagination->getTotalPages (); $p ++) {
								echo '<li><a href="' . $view->getSiteUrl () . 'index.php/address/index/?page=' . $p . '">' . $p . '</a></li>';
							}
							echo '</ul>';
						}
						?>
     
      </div>
</div>
<?php require_once 'footer.php' ?>