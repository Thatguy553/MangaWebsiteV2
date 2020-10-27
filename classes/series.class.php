<?php

class Series extends Database
{

    protected function displaySeries($title)
    {
        $sql = 'SELECT * FROM series WHERE seriesTitle = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$title]);

        $rows = $stmt->fetchAll();

        return $rows;
    }

    public function insert(string $title, string $description)
    {
        $sql = 'INSERT INTO series(seriesTitle, seriesDescription) VALUES(?, ?)';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$title, $description]);
    }

    public function delete(string $id, string $Title)
    {
        $sql = 'DELETE FROM series WHERE seriesUID = ? AND seriesTitle = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id, $Title]);
    }
}
