
<?php

if (isset($_FILES['file'])) {
  $file = $_FILES['file'];

  // File properties
  $file_name = $file['name'];
  $file_size = $file['size'];
  $file_tmp = $file['tmp_name'];

  $file_error = $file['error'];

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

// $directory = "index.php";

// if (isset($_GET["directory"])) {
//   $directory = $_GET["directory"];
// }

// $target_dir = $_GET["directory"] ? $directory : "./root/";
// $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
// $uploadOk = 1;
// $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// // Check if image file is a actual image or fake image
// if (isset($_POST["submit"])) {
//   $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//   if ($check !== false) {
//     echo "File is an image - " . $check["mime"] . ".";
//     $uploadOk = 1;
//   } else {
//     echo "File is not an image.";
//     $uploadOk = 0;
//   }
// }

// // Check if file already exists
// if (file_exists($target_file)) {
//   echo "Sorry, file already exists.";
//   $uploadOk = 0;
// }

// // Check file size
// if ($_FILES["fileToUpload"]["size"] > 5000000) {
//   echo "Sorry, your file is too large.";
//   $uploadOk = 0;
// }

// // Allow certain file formats
// if (
//   $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
//   && $imageFileType != "gif"
// ) {
//   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//   $uploadOk = 0;
// }

// // Check if $uploadOk is set to 0 by an error
// if ($uploadOk == 0) {
//   echo "Sorry, your file was not uploaded.";
//   // if everything is ok, try to upload file
// } else {
//   if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . "/" . $_FILES["fileToUpload"]["name"])) {
//     echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
//   } else {
//     echo "Sorry, there was an error uploading your file.";
//   }
// }

header("Location:  index.php?directory=$directory");


// if (isset($_FILES['file'])) {
//   $file = $_FILES['file'];

//   // File properties
//   $file_name = $file['name'];
//   $file_size = $file['size'];
//   $file_tmp = $file['tmp_name'];

//   $file_error = $file['error'];

//   //Work out the file extension 
//   $file_ext = explode('.', $file_name);
//   $file_ext = strtolower(end($file_ext));

//   // Set allowed extensions 
//   $allowed = array('doc', 'csv', 'jpg', 'png', 'txt', 'ppt', 'odt', 'pdf', 'zip', 'rar', 'exe', 'svg', 'mp3', 'mp4');

//   if (in_array($file_ext, $allowed)) {
//       if ($file_error == 0) {
//           if ($file_size <= 1000000000000000) {
//               $file_name_new = $file_name;
//               $file_dest = $_SESSION["currentPath"] . "/" . $file_name_new;

//               if (move_uploaded_file($file_tmp, $file_dest)) {
//               };
//           }
//       }
//   }
// }
