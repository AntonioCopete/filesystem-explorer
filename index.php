<?php
if (!is_dir("root")) {
    mkdir("root", 0777, true);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FileSystem-Explorer</title>
    <link rel="stylesheet" href="./assets/styles.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css?v=<?php echo time(); ?>" type="text/css" media="all">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

</head>

<body class="text-center">
    <header class="container">
        <div class="container d-flex w-75 my-1">
            <?php require_once("./components/directory.php"); ?>
            <?php require_once("./components/search.php"); ?>
        </div>
        <hr>
    </header>

    <main class="container d-flex">
        <?php require_once("./components/sideBar.php"); ?>
        <section class="file__container">
            <div>
                <?php require_once("./components/navBar.php"); ?>
            </div>
            <div class="container">

                <?php require_once("./components/titlesFiles.php") ?>

                <?php require_once("./components/renderFiles.php") ?>
            </div>
        </section>
    </main>
    <?php require_once("./components/footer.php"); ?>
</body>

</html>