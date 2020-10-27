<?php

class SeriesView extends Series
{
    public function showSeries($title)
    {
        $results = $this->displaySeries($title);
        echo "Series Name: " . $results[0]['seriesTitle'];
    }
}
