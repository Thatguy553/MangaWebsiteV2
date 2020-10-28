<?php

class Model extends Database
{

    # Display's All Series
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

    # Returns series information according to $title
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

    # Inserts Series Data
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

    # Update Series Information
    protected function SeriesUpdate(string $title = "", string $description = "", string $image = "", string $ID)
    {
        if (empty($title) && empty($description) && empty($image)) {
            return "<p>No Parameters Provieded</p>";
            exit;
        }

        $AllCatSQL = 'UPDATE series SET seriesTitle = ?, seriesDescription = ?, seriesImage = ? WHERE seriesUID = ?';
        $TextCatSQL = 'UPDATE series SET seriesTitle = ?, seriesDescription = ?  WHERE seriesUID = ?';
        $ImageCatSQL = 'UPDATE series SET seriesImage = ?  WHERE seriesUID = ?';

        if (!empty($title) && !empty($description) && !empty($image)) {
            $stmt = $this->connect()->prepare($AllCatSQL);
            $stmt->execute([$title, $description, $image, $ID]);
        } else if (!empty($title) && !empty($description) && empty($image)) {
            $stmt = $this->connect()->prepare($TextCatSQL);
            $stmt->execute([$title, $description, $ID]);
        } else if (empty($title) && empty($description) && !empty($image)) {
            $stmt = $this->connect()->prepare($ImageCatSQL);
            $stmt->execute([$image, $ID]);
        }
    }

    # Delete Series
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

    # Create Chapter
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

    # Chapter Search
    protected function ChapterSearch(string $series)
    {
        try {
            $sql = 'SELECT * FROM chapters  WHERE series = ?';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$series]);
            $rows = $stmt->fetchAll();
            return $rows;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    # Update Chapter Information
    protected function ChapterUpdate(string $number = "", string $name = "", string $ID)
    {
        if (empty($number) && empty($name)) {
            return "<p>No Parameters Provieded</p>";
            exit;
        }

        $bothSQL = 'UPDATE chapters SET chapterNumber = ?, chapterName = ? WHERE chapterUID = ?';
        $numberSQL = 'UPDATE chapters SET chapterNumber = ? WHERE chapterUID = ?';
        $nameSQL = 'UPDATE chapters SET chapterName = ?  WHERE chapterUID = ?';

        if (!empty($number) && !empty($name)) {
            $stmt = $this->connect()->prepare($bothSQL);
            $stmt->execute([$number, $name, $ID]);
        } else if (!empty($number) && !empty($name)) {
            $stmt = $this->connect()->prepare($numberSQL);
            $stmt->execute([$number, $ID]);
        } else if (empty($number) && empty($name)) {
            $stmt = $this->connect()->prepare($nameSQL);
            $stmt->execute([$name, $ID]);
        }
    }

    # Display's All Chapters
    protected function ChapterDisplay()
    {
        try {
            $sql = 'SELECT * FROM chapters';
            $stmt = $this->connect()->query($sql);
            $rows = $stmt->fetchAll();
            return $rows;
        } catch (TypeError $error) {
            return "Series Display Error: " . $error->getMessage();
        }
    }

    # Delete Chapter
    protected function ChapterDelete(string $id)
    {
        try {
            $sql = 'DELETE FROM chapters WHERE chapterUID = ?';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);
            $success = "Deleted Successfully";
            return $success;
        } catch (TypeError $error) {
            return "Series Delete Error: " . $error->getMessage();
        }
    }
}
