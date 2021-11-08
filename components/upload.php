
<?php

if (isset($_FILES['file'])) {
  $file = $_FILES['file'];

if (isset($_GET["directory"])) {
  $directory = '../' . $_GET["directory"];
}

$target_dir = $_GET["directory"] ? $directory : "../root/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if ($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

  //Work out the file extension 
  $file_ext = explode('.', $file_name);
  $file_ext = strtolower(end($file_ext));

  // Set allowed extensions 
  $allowed = array('doc', 'csv', 'jpg', 'png', 'txt', 'ppt', 'odt', 'pdf', 'zip', 'rar', 'exe', 'svg', 'mp3', 'mp4');

  if (in_array($file_ext, $allowed)) {
      if ($file_error == 0) {
          if ($file_size <= 1000000000000000) {
              $file_name_new = $file_name;
              $file_dest = $_SESSION["currentPath"] . "/" . $file_name_new;

              if (move_uploaded_file($file_tmp, $file_dest)) {
              };
          }
      }
  }
}
    $path = explode("/", $directory);

    array_shift($path);
    $path = implode("/", $path);

header("Location:  ../index.php?directory=$path");
