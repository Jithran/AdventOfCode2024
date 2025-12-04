<?php

class Challenge {
    public $input;

    public function __construct($input) {
        $this->input = inpread(__DIR__ . '/' . $input, true);
    }

    public function partOne() {
        // every line is a report, each report has space seperated numbers. 
        // a report is valid if the numbers are al in ascending or descending order, and are 1 or 3 apart.
        $valid = 0;
        foreach ($this->input as $line) {
            $procLine = array_map('intval', explode(' ', trim($line)));
            // order ascending and check
            $aLine = $procLine;
            sort($aLine);
            $rLine = $procLine;
            rsort($rLine);
            if(implode(' ', $aLine) != $line && implode(' ', $rLine) != $line) {
                continue;
            }

            foreach($procLine as $i => $val) {
                if ($i == 0) continue;
                $diff = abs($procLine[$i] - $procLine[$i-1]);
                if ($diff < 1 || $diff > 3) {
                    continue 2;
                }
            }

            //dump($line);
            $valid++;
        }
        return $valid;
    }

    public function partTwo() {
        $valid = 0;
        foreach ($this->input as $line) {
            $procLine = array_map('intval', explode(' ', trim($line)));
            if ($this->isValidReport($procLine)) {
                $valid++;
            } else {
                // loop through each number, remove it from the a rray and check if valid
                foreach($procLine as $i => $val) {
                    $newLine = $procLine;
                    unset($newLine[$i]);
                    $newLine = array_values($newLine);
                    if ($this->isValidReport($newLine)) {
                        $valid++;
                        break;
                    }
                }   
            }
        }

        return $valid;
    }

    private function isValidReport($procLine) {
        //$procLine = array_map('intval', explode(' ', trim($report)));
        $line = implode(' ', $procLine);
        // order ascending and check
        $aLine = $procLine;
        sort($aLine);
        $rLine = $procLine;
        rsort($rLine);
        if(implode(' ', $aLine) != $line && implode(' ', $rLine) != $line) {
            return false;
        }

        foreach($procLine as $i => $val) {
            if ($i == 0) continue;
            $diff = abs($procLine[$i] - $procLine[$i-1]);
            if ($diff < 1 || $diff > 3) {
                return false;
            }
        }   

        return true;
    }
}