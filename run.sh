#!/bin/bash
INPUT_FILE=$1
OUTPUT_FILE=$2
SESSION_NAME=$3

if [ ! -f "$OUTPUT_FILE" ]; then
    touch $OUTPUT_FILE
fi

docker build -t raceroom-json .

docker run --rm \
-e INPUT_FILE=$INPUT_FILE \
-e OUTPUT_FILE=$OUTPUT_FILE \
-e SESSION_NAME=$SESSION_NAME \
--mount type=bind,src=$(pwd)/$INPUT_FILE,dst=/app/$INPUT_FILE \
--mount type=bind,src=$(pwd)/$OUTPUT_FILE,dst=/app/$OUTPUT_FILE \
raceroom-json

docker image rm raceroom-json &> /dev/null
