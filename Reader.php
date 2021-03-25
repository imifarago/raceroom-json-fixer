<?php

namespace RaceroomJsonCleanup;

class Reader
{
    private string $data;
    private array $converted = [];

    public function __construct($filename)
    {
        if (!is_file($filename)) {
            throw new \Exception("File not found: " . $filename);
        }

        try {
            $this->data = file_get_contents($filename);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function getDataAsArray()
    {
        if (empty($this->converted)) {
            try {
                $this->converted = json_decode($this->data, true);
            } catch (\Exception $e) {
                throw new \Exception($e->getMessage());
            }
        }

        return $this->converted;
    }
}