<?php

class Controller extends Model
{
    public function InsertSeries($title, $description, $image)
    {
        $this->SeriesInsert($title, $description, $image);
        header("Location: /Learning-OOP/");
        exit;
    }

    public function DeleteSeries($id)
    {
        $this->SeriesDelete($id);
        header("Location: /Learning-OOP/");
        exit;
    }

    public function InsertChapter(string $chapterNumber, string $ChapterName, string $series)
    {
        $this->ChapterInsert($chapterNumber, $ChapterName, $series);
        header("Location: /Learning-OOP/");
        exit;
    }
}
