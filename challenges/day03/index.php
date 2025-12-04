<?php

class Challenge {
    public $input;

    public function __construct($input) {
        $this->input = inpread(__DIR__ . '/' . $input, false);
        $this->input = implode('', explode(PHP_EOL, $this->input));
    }

    public function partOne() {
        preg_match_all('/mul\((\-?\d+),(\-?\d+)\)/', $this->input, $matches, PREG_SET_ORDER);
        
        $ans = 0;
        foreach ($matches as $match) {
            $ans += $match[1] * $match[2];
        }
        return $ans;

    }

    public function partTwo() {
        preg_match_all("/mul\((\-?\d+),(\-?\d+)\)|don't\(\)|do\(\)/", $this->input, $matches, PREG_SET_ORDER);
        
        $ans = 0;
        $skip = false;
        foreach ($matches as $match) {
            if ($match[0] == "don't()") {
                $skip = true;
                continue;
            }
            if ($match[0] == "do()") {
                $skip = false;
                continue;
            }
            if ($skip) {
                continue;
            }
            $ans += $match[1] * $match[2];
        }
        return $ans;
    }
}