<?php

declare(strict_types=1);
include __DIR__ . "/../includes/autoloader.php";

# Initialize Classes
$controll = new Controller();
$view = new View();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <main>
        <form action="#" method="post" enctype="multipart/form-data">
            <p>Create Chapter</p>
            <input type="number" name="number" placeholder="chapter number..." required>
            <input type="text" name="name" placeholder="chapter name..." required>
            <select name="series">
                <?php
                for ($i = 0; $i < count($view->listSeries()); $i++) {
                    echo "<option value='" . $view->listSeries()[$i]['seriesTitle'] . "'>" . $view->listSeries()[$i]['seriesTitle'] . "</option>";
                }
                ?>
            </select>
            <input type="submit" name="cChapter">
        </form>

        <form action="#" method="post">
            <p>Searched Chapters</p>
            <select name="series">
                <?php
                for ($i = 0; $i < count($view->listSeries()); $i++) {
                    echo "<option value='" . $view->listSeries()[$i]['seriesTitle'] . "'>" . $view->listSeries()[$i]['seriesTitle'] . "</option>";
                }
                ?>
            </select>
            <button type="submit" name="search">Search</button>
        </form>
    </main>
    <?php
    // Create Chapter
    if (isset($_POST['cChapter'])) {
        $number = $_POST['number'];
        $title = $_POST['name'];
        $series = $_POST['series'];

        $controll->InsertChapter($number, $title, $series);
    }

    // Display From Search
    if (isset($_POST['search'])) {
        $series = $_POST['series'];
        $view->searchChapter($series);
    } else {
        $view->showAllChapters();
    }

    // Update Chapter
    if (isset($_POST['update'])) {
        $seriesUID = $_POST['update'];

        foreach ($view->listChapter() as $row) {
            if ($row['chapterUID'] == $seriesUID) {
                echo "<form action='#' method='post'>
                <input type='text' name='number' placeholder='" . $row['chapterNumber'] . "'>
                <input type='text' name='name' placeholder='" . $row['chapterName'] . "'>
                <input type='hidden' name='id' value='" . $row['chapterUID'] . "'>
                <input type='submit' name='Usubmit'>
                </form>";
            }
        }
    }

    if (isset($_POST['Usubmit'])) {
        $ID = $_POST['id'];
        $number = $_POST['number'] ?? "";
        $name = $_POST['name'] ?? "";

        $controll->UpdateChapter($number, $name, $ID);
    }

    // Delete Series
    if (isset($_POST['delete'])) {
        $id = $_POST['delete'];
        $controll->DeleteChapter($id);
    }

    ?>
</body>

</html>