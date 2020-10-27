<?php

class SeriesView extends Series
{
    public function showAllSeries()
    {
        $results = $this->displayAll();
        if ($results) {
            foreach ($results as $result) {
                echo "Series ID: " . $result['seriesUID'] . "<br/>";
                echo "Series Name: " . $result['seriesTitle'] . "<br/>";
                echo "Series Description: " . $result['seriesDescription'] . "<br/>";
            }
        } else {
            echo "No series found.";
        }
    }

    public function showSeries($title)
    {
        $results = $this->SearchSeries($title);

        if ($results) {
            foreach ($results as $result) {
                echo "Series ID: " . $result['seriesUID'] . "<br/>";
                echo "Series Name: " . $result['seriesTitle'] . "<br/>";
                echo "Series Description: " . $result['seriesDescription'] . "<br/>";
            }
        } else {
            echo "No series found.";
        }
    }
}
