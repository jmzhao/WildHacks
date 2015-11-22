<!DOCTYPE html>
<html>
	<head>
    <?php require 'headerTags.php' ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/userInput.css">
	</head>
	<body class="container">
    <h2>Free Stuff Upload</h2>
		<form id="main-user-form" method="POST" action="userInput.php">
      <div class="form-group">
        <label for="Name">Name</label>
        <input type="text" class="form-control" id="Name" placeholder="Name">
      </div>
      <!--<div class="form-group">
          <input id="filebutton" name="filebutton" class="input-file" type="file">
      </div>-->
      <div class="form-group">
        <label for="ProductDescription">Product Description</label>
        <input type="text" class="form-control" id="productDescription" placeholder="Product Description">
      </div>
      <div class="form-group">
        <label for="Address">Address</label>
        <input type="text" class="form-control" id="Address" placeholder="Address">
      </div>
      <div class="form-group">
        <label for="AdditionalNotes">Additional Notes</label>
        <input type="text" class="form-control" id="AdditionalNotes" placeholder="Room No, Floor No, etc">
      </div>
      <input type="submit" value="Submit" />
    </form>
	</body>
</html>