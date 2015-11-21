<!DOCTYPE html>
<html>
	<head>
    <?php require 'headerTags.php' ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/userInput.css">
	</head>
	<body class="container">
		<form id="main-user-form">
      <div class="form-group">
        <input type="file" name="cameraImage" accept="image/*" id="cameraButton" capture>
        <canvas></canvas>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
      </div>
      <div class="form-group">
        <label for="exampleInputFile">File input</label>
        <input type="file" id="exampleInputFile">
        <p class="help-block">Example block-level help text here.</p>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox"> Check me out
        </label>
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
	</body>
</html>