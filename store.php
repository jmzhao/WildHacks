<!DOCTYPE html>
<html>
<body>
    
<?php 

require_once 'vendor\autoload.php';
use WindowsAzure\Common\ServicesBuilder;
use WindowsAzure\Common\ServiceException;

$connectionString = "DefaultEndpointsProtocol=https;AccountName=freemiumphoto;AccountKey=+X5qll+ucDDYx+HkNOptkylqUzsjsCAItwhquUEf5IM69xzVdkW1FodM3bDooCnR8Kz20REKVD+16Xs1mqXCRg==";
$blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);
echo $_FILES["my_files"]["name"];
echo 'asdasdasd';
$content = fopen($_FILES["my_files"]["tmp_name"],'r');
$blob_name = time().'_'.uniqid('free-mium', true).'_'.$_FILES["my_files"]["name"];

try {
    //Upload blob
    $blobRestProxy->createBlockBlob("mycontainer", $blob_name, $content);
}
catch(ServiceException $e){
    // Handle exception based on error codes and messages.
    // Error codes and messages are here:
    // http://msdn.microsoft.com/library/azure/dd179439.aspx
    $code = $e->getCode();
    $error_message = $e->getMessage();
    echo $code.": ".$error_message."<br />";
}
echo $_FILES["my_files"]["name"];
// try {
//     // List blobs.
//     $blob_list = $blobRestProxy->listBlobs("mycontainer");
//     $blobs = $blob_list->getBlobs();

//     foreach($blobs as $blob)
//     {
//         echo $blob->getName().": ".$blob->getUrl()."<br />";
//     }
// }
// catch(ServiceException $e){
//     // Handle exception based on error codes and messages.
//     // Error codes and messages are here:
//     // http://msdn.microsoft.com/library/azure/dd179439.aspx
//     $code = $e->getCode();
//     $error_message = $e->getMessage();
//     echo $code.": ".$error_message."<br />";
// }
?>

</body>

</html>