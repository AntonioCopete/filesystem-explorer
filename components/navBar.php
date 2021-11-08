<?php
if (isset($_GET["directory"])) {
    $strDirectory = $_GET["directory"];
    $arrDirectory = explode("/", $strDirectory);

    $value = "root";
    for ($i =  0; $i < count($arrDirectory); $i++) {
        if (count($arrDirectory) - 1 != $i) {
            if ($i === 0) {
                echo  "<div><a href=index.php?directory=$value>$arrDirectory[$i]</a></div>";
            } else {
                $value = $value . "/" . $arrDirectory[$i];
                echo "<div><a href=index.php?directory=$value>$arrDirectory[$i]</a></div>";
            }
        } else {
            echo "<div>$arrDirectory[$i]</div>";
        }
    }
}
