<!DOCTYPE html>
<html>
<head>
  <?php require 'headerTags.php' ?>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../css/userInput.css">
  <script type="text/javascript">
    $("form#photoUploadForm").submit(function(event){

    console.log("Came here");
  //disable the default form submission
  event.preventDefault();

  //grab all form data  
  var formData = new FormData($(this)[0]);

  jQuery.ajax({
    url: 'http://api.cloudsightapi.com/image_requests/',
    type: 'POST',
    Authorization: 'Cloudsight [39misieZRhSB59INsX8Qnw]',
    data: formData,
    async: false,
    cache: false,
    contentType: false,
    processData: false,
    success: function (returndata) {
      alert(returndata);
    },
    error: function(data) {
      alert(data);
    },
    complete: function(data){
      alert('nothing happened');
    }
  });

  return false;
});


  </script>
</head>
<body class="container">
  <h2>Upload the image!</h2>
  <form id="photoUploadForm" method="POST" enctype="multipart/form-data">
    <div class="form-group" style="height:50px">
      <input id="photoFileUpload" name="filebutton" class="input-file" type="file">
    </div>
    <input type="submit" value="Submit" />
  </form>
</body>
</html>