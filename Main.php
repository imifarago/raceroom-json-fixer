<?php

include_once 'RaceroomSession.php';
include_once 'Reader.php';
include_once 'Writer.php';

use RaceroomJsonCleanup\Reader as Reader;
use RaceroomJsonCleanup\RaceroomSession as Session;
use RaceroomJsonCleanup\Writer as Writer;

if(empty($argv[1])) {
    throw new Exception("Input file required");
}

if(empty($argv[2])) {
    throw new Exception("Output file required");
}

$sessionName = !empty($argv[3]) ? $argv[3] : "Race";

$reader = new Reader($argv[1]);
$session = new Session($reader->getDataAsArray());
$session->removeDuplicateRacelaps($sessionName);
$writer = (new Writer($session->getData()))->writeJson($argv[2]);
