<?php

class Series extends Database
{
    protected function displayAll()
    {
        try {
            $sql = 'SELECT * FROM series';
            $stmt = $this->connect()->query($sql);
            $rows = $stmt->fetchAll();
            return $rows;
        } catch (TypeError $error) {
            return "Display Error: " . $error->getMessage();
        }
    }

    protected function SearchSeries($title)
    {
        try {
            $sql = 'SELECT * FROM series WHERE seriesTitle = ?';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$title]);
            $rows = $stmt->fetchAll();
            return $rows;
        } catch (TypeError $error) {
            return "Search Error: " . $error->getMessage();
        }
    }

    protected function insert(string $title, string $description)
    {
        try {
            $sql = 'INSERT INTO series(seriesTitle, seriesDescription) VALUES(?, ?)';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$title, $description]);
        } catch (TypeError $error) {
            return "Insert Error: " . $error->getMessage();
        }
    }

    protected function delete(string $id, string $Title)
    {
        try {
            $sql = 'DELETE FROM series WHERE seriesUID = ? AND seriesTitle = ?';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id, $Title]);
            return "Deleted Successfully";
            header("Location: /");
        } catch (TypeError $error) {
            return "Delete Error: " . $error->getMessage();
        }
    }
}
