<?php

class Challenge {
    public $input;
    public $teama;
    public $teamb;

    public function __construct($input) {
        $this->input = inpread(__DIR__ . '/' . $input, true);
        $teama = [];
        $teamb = [];

        foreach ($this->input as $line) {
            list($a, $b) = explode('   ', $line);
            $teama[] = trim($a);
            $teamb[] = trim($b);
        }
        $this->teama = $teama;
        $this->teamb = $teamb;
    }

    public function partOne() {
        

        sort($this->teama);
        sort($this->teamb);

        $ans = 0;
        foreach($this->teama as $i => $val) {
            $ans += abs($this->teamb[$i] - $val);
        }

        return $ans;
    }

    public function partTwo() {

        $ans = 0;
        foreach($this->teama as $i => $val) {
            // check how many times val appears in teamb
            $count = 0;
            foreach($this->teamb as $bval) {
                if ($bval == $val) {
                    $count++;
                }
            }
            $ans += $count * $val;
        }
        return $ans;
    }
}