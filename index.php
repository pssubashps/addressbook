<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
</head>

<body>
<br/><br/>
  <div class="container">
    <div class="panel panel-default">
      <div class="panel-heading">Panel Heading</div>
      <div class="panel-body">
        <form>
          <div class="form-group">
            <label for="email">Firstname:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="pwd">Lastname:</label>
            <input type="text" class="form-control" id="pwd" placeholder="Enter password">
          </div>

          <div class="form-group">
            <label for="pwd">Street:</label>
            <input type="text" class="form-control" id="pwd" placeholder="Enter password">
          </div>

          <div class="form-group">
            <label for="pwd">Zipcode:</label>
            <input type="text" class="form-control" id="pwd" placeholder="Enter password">
          </div>

          <div class="form-group">
            <label for="pwd">City:</label>
            <input type="text" class="form-control" id="pwd" placeholder="Enter password">
          </div>


          <div class="checkbox">
            <label>
              <input type="checkbox"> Remember me</label>
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>