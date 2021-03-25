<?php

namespace RaceroomJsonCleanup;

include_once 'ArrayHelper.php';
use ArrayHelper\ArrayHelper as ArrayHelper;

class RaceroomSession
{
    private $data;

    public function __construct($data)
    {
        if (!is_array($data) || empty($data)) {
            throw new \Exception("Data is not array");
        }

        $this->data = $data;
    }

    public function getData() {
        return $this->data;
    }

    private function getByType(string $type)
    {
        foreach ($this->data['Sessions'] as $session) {
            if (mb_strtolower($session['Type']) === mb_strtolower($type)) {
                return $session['Players'];
            }
        }
    }

    private function setByType(string $type, $newSession) {
        foreach ($this->data['Sessions'] as &$session) {
            if (mb_strtolower($session['Type']) === mb_strtolower($type)) {
                $session['Players'] = $newSession;
            }
        }
    }

    public function removeDuplicateRacelaps(string $type)
    {
        $session_data = $this->getByType($type);

        foreach($session_data as $key => $userSesssion) {
            $serializedLaps = [];
            foreach($userSesssion['RaceSessionLaps'] as $lap) {
                unset($lap['Incidents']);
                $serializedLaps[] = serialize($lap);
            }
            // Mivel az incidenteket ki kell szedni, ezért ez nem működik a későbbi összehasonlításnál :(
            // $serializedLaps = array_map('serialize', $userSesssion['RaceSessionLaps']);
            $keep_laps = array_keys(array_unique($serializedLaps, SORT_STRING));
            $session_data[$key]['RaceSessionLaps'] = ArrayHelper::keepKeys($userSesssion['RaceSessionLaps'], $keep_laps);
        }

        $this->setByType($type, $session_data);
    }
}