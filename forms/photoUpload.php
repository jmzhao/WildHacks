<!DOCTYPE html>
<html>
	<head>
    <?php require 'headerTags.php' ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/userInput.css">
	</head>
	<body class="container">
    <h2>Upload the image!</h2>
		<form id="main-user-form" method="POST" action="userInput.php">
      <div class="form-group" style="height:50px">
          <input id="photoFileUpload" name="filebutton" class="input-file" type="file">
      </div>
      <input type="submit" value="Submit" />
    </form>
	</body>
</html>