<?php

class Model extends Database
{
    protected function SeriesDisplay()
    {
        try {
            $sql = 'SELECT * FROM series';
            $stmt = $this->connect()->query($sql);
            $rows = $stmt->fetchAll();
            return $rows;
        } catch (TypeError $error) {
            return "Series Display Error: " . $error->getMessage();
        }
    }

    protected function SeriesSearch($title)
    {
        try {
            $sql = 'SELECT * FROM series WHERE seriesTitle = ?';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$title]);
            $rows = $stmt->fetchAll();
            return $rows;
        } catch (TypeError $error) {
            return "Series Search Error: " . $error->getMessage();
        }
    }

    protected function SeriesInsert(string $title, string $description)
    {
        try {
            $sql = 'INSERT INTO series(seriesTitle, seriesDescription) VALUES(?, ?)';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$title, $description]);
        } catch (TypeError $error) {
            return "Series Insert Error: " . $error->getMessage();
        }
    }


    protected function SeriesDelete(string $id)
    {
        try {
            $sql = 'DELETE FROM series WHERE seriesUID = ?';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);
            $success = "Deleted Successfully";
            return $success;
        } catch (TypeError $error) {
            return "Series Delete Error: " . $error->getMessage();
        }
    }

    protected function ChapterInsert(string $chapterNumber, string $ChapterName, string $series)
    {
        try {
            $sql = 'INSERT INTO chapters(chapterNumber, chapterName, series, chapterFolder) VALUES(?, ?, ?, ?)';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$chapterNumber, $ChapterName, $series, "TestFolder"]);
        } catch (TypeError $error) {
            return "Chapter Insert Error: " . $error->getMessage();
        }
    }
}
