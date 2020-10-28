<?php

class View extends Model
{
    public function showAllSeries()
    {
        $results = $this->SeriesDisplay();
        if ($results) {
            foreach ($results as $result) {
                echo "Series ID: " . $result['seriesUID'] . "<br/>";
                echo "Series Name: " . $result['seriesTitle'] . "<br/>";
                echo "Series Description: " . $result['seriesDescription'] . "<br/>";
                echo "<form action='#' method='post'>
                <button type='submit' value='" . $result['seriesUID'] . "' name='delete'>Delete</button>
                <button type='submit' value='" . $result['seriesUID'] . "' name='update'>Update</button>
                </form>";
            }
        } else {
            echo "No series found.";
        }
    }

    public function showSeries($title)
    {
        $results = $this->SeriesSearch($title);

        if ($results) {
            foreach ($results as $result) {
                echo "Series ID: " . $result['seriesUID'] . "<br/>";
                echo "Series Name: " . $result['seriesTitle'] . "<br/>";
                echo "Series Description: " . $result['seriesDescription'] . "<br/>";
                echo "<form action='#' method='post'>
                <button type='submit' value='" . $result['seriesUID'] . "' name='delete'>Delete</button>
                <button type='submit' value='" . $result['seriesUID'] . "' name='update'>Update</button>
                </form>";
            }
        } else {
            echo "No series found.";
        }
    }

    public function listSeries()
    {
        $list = [];
        $results = $this->SeriesDisplay();
        if ($results) {
            foreach ($results as $result) {
                array_push($list, $result);
            }
        }
        return $list;
    }
}
