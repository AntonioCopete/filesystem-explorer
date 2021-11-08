<?php
$directory = './components/upload.php';
if (isset($_GET["directory"])) {
  $directory = "./components/upload.php?directory=" . $_GET['directory'];
}
?>

<section class="container d-flex flex-column text-center">
  <?php require_once("./components/createFolderForm.php"); ?>
  <form class="d-flex flex-column custom-file"<?php echo "action=$directory" ?> method="post" enctype="multipart/form-data">
    <input class="custom-file-input d-none" type="file" name="fileToUpload" id="fileToUpload">
    <label class="btn btn-outline-secondary my-2 mx-4" for="fileToUpload">Select a File</label>
    <input class="btn btn-outline-secondary my-2 mx-4" type="submit" value="Upload File" name="submit">
  </form>
    <button class="btn btn-outline-secondary my-5 mx-4"><i class='fas fa-trash-alt'></i> Trash Bin</button>
  <hr>
  
</section>