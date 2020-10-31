<?php

declare(strict_types=1);
include __DIR__ . "/../../includes/autoloader.php";


class Display extends Model
{
    function display()
    {
        return $this->SeriesDisplay();
    }
}
?>


    <?php
    $display = new Display();
    $output = [];
    foreach ($display->display() as $row) {
        $output[] = $row;
    }

    echo json_encode($output);
    ?>