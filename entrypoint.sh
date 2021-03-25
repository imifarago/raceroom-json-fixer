#!/bin/sh
INPUT_FILE=${INPUT_FILE:-input.json}
OUTPUT_FILE=${OUTPUT_FILE:-output.json}
SESSION_NAME=${SESSION_NAME:-Race}

echo "INPUT: $INPUT_FILE"
echo "OUTPUT: $OUTPUT_FILE"
echo "SESSION: $SESSION_NAME"
cd /app && php Main.php $INPUT_FILE $OUTPUT_FILE $SESSION_NAME && echo "Done. Please check the output" || echo "FAILED!"
