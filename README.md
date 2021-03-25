# Raceroom JSON cleanup

## Usage

### Docker
PHP isn't installed? Run with Docker :)
`run.sh <input file> <output file> <session name>`

example command: `run.sh input.json outputjson Race`

### PHP
Run without Docker environment on host with `php`
`php Main.php <input file> <output file> <session name>`

example command: `php Main.php input.json outputjson Race`

## Parameters
`input file` is the input json
`output file` is the output json
`session name` is the session to fix (eg: Race)
