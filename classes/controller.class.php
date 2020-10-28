<?php

class Controller extends Model
{
    public function InsertSeries($title, $description, $image)
    {
        $this->SeriesInsert($title, $description, $image);
        header("Location: /series");
        exit;
    }

    public function UpdateSeries($title = "", $description = "", $image = "", $ID)
    {
        $this->SeriesUpdate($title, $description, $image, $ID);
        header("Location: /series");
        exit;
    }

    public function DeleteSeries($id)
    {
        $this->SeriesDelete($id);
        header("Location: /series");
        exit;
    }

    public function InsertChapter(string $chapterNumber, string $ChapterName, string $series)
    {
        $this->ChapterInsert($chapterNumber, $ChapterName, $series);
        header("Location: /chapters");
        exit;
    }

    public function UpdateChapter(string $number = "", string $name = "", string $ID)
    {
        $this->ChapterUpdate($number, $name, $ID);
        header("Location: /chapters");
        exit;
    }

    public function DeleteChapter($id)
    {
        $this->ChapterDelete($id);
        header("Location: /chapters");
        exit;
    }
}
