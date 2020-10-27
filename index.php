<?php

declare(strict_types=1);
include __DIR__ . "/includes/autoloader.php"
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

        <form action="#" method="post" enctype="multipart/form-data">
            <p>Searched Series</p>
            <input type="text" name="title" placeholder="Search Title..." required>
            <button type="submit" name="search">Search</button>
        </form>


        <form action="#" method="post" enctype="multipart/form-data">
            <p>Delete Series</p>
            <input type="number" name="id" required>
            <input type="text" name="title" placeholder="Search Title..." required>
            <button type="submit" name="delete">Delete</button>
        </form>

        <?php
        // Display From Search
        if (isset($_POST['search'])) {
            $title = $_POST['title'];

            $view = new SeriesView();
            $view->showSeries($title);
        } else {
            $view = new SeriesView();
            $view->showAllSeries();
        }

        // Create
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $image = $_FILES['image']['name'];

            $controll = new SeriesContr();
            $controll->createSeries($title, $description, $image);
        }

        // Delete
        if (isset($_POST['delete'])) {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $controll = new SeriesContr();
            $controll->deleteSeries($id, $title);
        }
        ?>
    </main>

    <footer>

    </footer>
</body>

</html>