<?php

class SearchTags
{

    private $rowTags;

    public function __construct($tags)
    {
        $this->rowTags = $tags;
    }

    public function convertSearchTagsForExchange()
    {
        $tagsClear = $this->cleanTags($this->rowTags);
        return str_replace(' ',';',$tagsClear);
    }

    private function cleanTags($row)
    {
        return str_replace(';',' ',$row);
    }

    public function arrayExplode($RowData)
    {
        $info = "";
        foreach ($RowData as $data)
        {
            $info .= " ".$data;
        }
        return $info;
    }
}