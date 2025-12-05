<?php

class Challenge {
    public $input;
    public $grid;
    public $ans = 0;

    public function __construct($input) {
        $this->input = inpread(__DIR__ . '/' . $input, true);
        $this->grid = array_map('str_split', $this->input);
    }

    public function partOne() {
        $this->ans = 0;
        foreach($this->grid as $y => $row) {
            foreach($row as $x => $cell) {
                if ($cell == 'X') {
                    $this->checkForXmas($x, $y, 1, 0); // right
                    $this->checkForXmas($x, $y, 1, 1); // down-right
                    $this->checkForXmas($x, $y, 0, 1); // down
                    $this->checkForXmas($x, $y, -1, 1); // left-down
                    $this->checkForXmas($x, $y, -1, 0); // left
                    $this->checkForXmas($x, $y, -1, -1); // left-up
                    $this->checkForXmas($x, $y, 0, -1); // up
                    $this->checkForXmas($x, $y, 1, -1); // right-up
                }
            }
        }

        return $this->ans;
    }

    public function partTwo() {
        $this->ans = 0;
        foreach($this->grid as $y => $row) {
            foreach($row as $x => $cell) {
                if ($cell == 'A') {
                    if(
                        ((
                            $this->checkForCharAtPos($y-1, $x-1, 'M')
                            && $this->checkForCharAtPos($y+1, $x+1, 'S')
                        )||
                        (
                            $this->checkForCharAtPos($y-1, $x-1, 'S')
                            && $this->checkForCharAtPos($y+1, $x+1, 'M')
                        ))
                        &&
                        ((
                            $this->checkForCharAtPos($y-1, $x+1, 'M')
                            && $this->checkForCharAtPos($y+1, $x-1, 'S')
                        )||
                        (
                            $this->checkForCharAtPos($y-1, $x+1, 'S')
                            && $this->checkForCharAtPos($y+1, $x-1, 'M')
                        ))

                        ) {
                        $this->ans++;
                    }
                }
            }
        }

        return $this->ans;
    }

    public function checkForCharAtPos($y, $x, $char) {
        if(!isset($this->grid[$y]) || !isset($this->grid[$y][$x])) {
            return false;
        }
        return $this->grid[$y][$x] == $char;
    }

    public function checkForXmas($startX, $startY, $directionX, $directionY) {
        // we can assume startX and startY are always X, so start checking from start in the direction given, for first the M, then the A, then the S
        $x = $startX;
        $y = $startY; 
        $toFind = ['M', 'A', 'S'];
        foreach($toFind as $char) {
            $x = $x + $directionX;
            $y = $y + $directionY;
            $found = false;

            if(!isset($this->grid[$y]) || !isset($this->grid[$y][$x])) {
                return;
            }

            if($this->grid[$y][$x] != $char) {
                return;
            }
        }
        $this->ans++;
    }

    public function printGrid() {
        foreach($this->grid as $row) {
            echo implode('', $row) . PHP_EOL;
        }
    }
}