<?php

class SeriesContr extends Series
{
    public function createSeries($title, $description, $image)
    {
        $this->insert($title, $description, $image);
    }

    public function deleteSeries($id, $title)
    {
        $this->delete($id, $title);
    }
}
