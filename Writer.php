<?php

namespace RaceroomJsonCleanup;

class Writer
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    private function convertToJson()
    {
        if (empty($this->data)) {
            throw new \Exception("Empty json");
        }

        return json_encode($this->data);
    }

    public function writeJson($filename)
    {
        /*
        if(is_file($filename)) {
            throw new \Exception("Output file already existed. Delete file or specify another output file");
        }
        */
        return file_put_contents($filename, $this->convertToJson());
    }
}