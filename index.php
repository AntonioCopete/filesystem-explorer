<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css" type="text/css" media="all">

    <title>File System Explorer</title>

    <link rel="stylesheet" href="./assets/styles.css?v=<?php echo time(); ?>">

</head>

<body>
    <header>
        <?php require_once("./search.php"); ?>
        <?php require_once("./directory.php"); ?>
        <?php require_once("./createFolderForm.php"); ?>
        <?php
        if (isset($_POST["folder"])) {
            if (isset($_GET["directory"]) && $_GET["directory"] !== "" && $_GET["directory"] !== "root") {
                $mkdirRoute = "./" . $_GET["directory"];
            } else {
                $mkdirRoute = "./root/";
            }
            mkdir($mkdirRoute . "/" . $_POST["folder"], 0777);
        }
        ?>

    </header>
    <main>
        <?php require_once("./sideBar.php"); ?>
        <div></div>
        <section class="file__container">


            <?php
            if (isset($_GET["directory"]) && explode("/", $_GET["directory"])[0] == "root" && !str_contains($_GET["directory"], "..")) {
                $directory =  $_GET["directory"];
            } else {
                $directory = 'root';
            }

            scandir($directory, SCANDIR_SORT_ASCENDING);
            if (is_dir($directory)) {
                if ($dh = opendir($directory)) {
                    while (($file = readdir($dh)) !== false) {
                        if ($file === "." || $file === "..") {
                        } else {
                            if (filetype("$directory/$file") == "dir") {
                                echo "<div><a class='folder' href=index.php?directory=" . $directory . "/" . $file . ">$file</a></div>";
                            } else {
                                // echo "<a class='file' href=index.php?directory=" . $directory . "/" . $file . ">$file</a>";
                                echo "<div>$file</div>";
                            }
                        }
                    }
                    closedir($dh);
                }
            }
            ?>
        </section>
    </main>

<!-- <script src="/scripts/bootstrap.min.js"></script> -->
<!-- 
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
</body>

</html>