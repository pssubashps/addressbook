<?php require_once 'header.php'?>
<div class="panel panel-default">
	<div class="panel-heading">Add Contact</div>
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
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
			<div class="form-group">
				<label for="email">Name:</label> <input type="text"
					class="form-control" id="fullname" name="fullname"
					placeholder="Enter name">
			</div>
			<div class="form-group">
				<label for="pwd">Street:</label> <input type="text"
					class="form-control" id="street" name="street"
					placeholder="Enter Street">
			</div>

			<div class="form-group">
				<label for="pwd">Zipcode:</label> <input type="text"
					pattern="[0-9]{6}" class="form-control" id="zipcode" name="zipcode"
					placeholder="Enter Zipcode">
			</div>

			<div class="form-group">
				<label for="pwd">City:</label> <select class="form-control"
					name="city" id="city">
            <?php
												foreach ( $data ['cities'] as $c ) {
													echo "<option value='" . $c ['id'] . "'>" . $c ['city_name'] . "</option>";
												}
												?>
            </select>
			</div>


			<button type="submit" class="btn btn-default">Submit</button>

			<a href="<?php echo $view->getSiteUrl()."index.php/address/index";?>">Cancel</a>
		</form>
	</div>
</div>

<?php require_once 'footer.php' ?>