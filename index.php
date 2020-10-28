<?php

declare(strict_types=1);
include __DIR__ . "/includes/autoloader.php";

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
    <header>

    </header>

    <main>
        <form action="#" method="post" enctype="multipart/form-data">
            <p>Series Information</p>
            <input type="text" name="title" placeholder="Series Title..." required>
            <textarea name="description" cols="30" rows="10" placeholder="Series Description..."></textarea>
            <input type="file" name="image">
            <button type="submit" name="submit">Submit</button>
        </form>

        <form action="#" method="post">
            <p>Searched Series</p>
            <input type="text" name="title" placeholder="Search Title..." required>
            <button type="submit" name="search">Search</button>
        </form>


        <form action="#" method="post">
            <p>Delete Series</p>
            <input type="number" name="id" required>
            <input type="text" name="title" placeholder="Search Title..." required>
            <button type="submit" name="delete">Delete</button>
        </form>

        <form action="#" method="post" enctype="multipart/form-data">
            <p>Create Chapter</p>
            <input type="number" name="number" placeholder="chapter number..." required>

            <input type="text" name="name" placeholder="chapter name..." required>

            <select name="series">
                <?php
                for ($i = 0; $i < count($view->listSeries()); $i++) {
                    echo "<option value='" . $view->listSeries()[$i]['seriesUID'] . "'>" . $view->listSeries()[$i]['seriesTitle'] . "</option>";
                }
                ?>
            </select>

            <input type="submit" name="cChapter">
        </form>

        <?php

        // Display From Search
        if (isset($_POST['search'])) {
            $title = $_POST['title'];
            $view->showSeries($title);
            unset($title);
        } else {
            $view->showAllSeries();
        }

        // Create Chapter
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $image = $_FILES['image']['name'];
            $controll->InsertSeries($title, $description, $image);
        }

        // Delete Series
        if (isset($_POST['delete'])) {
            $id = $_POST['delete'];
            $controll->DeleteSeries($id);
        }

        // Create Chapter
        if (isset($_POST['cCreate'])) {
            $number = $_POST['number'];
            $title = $_POST['name'];
            $series = $_POST['series'];

            $controll->InsertChapter($numer, $title, $series);
        }

        ?>
    </main>

    <footer>

    </footer>
</body>

</html>