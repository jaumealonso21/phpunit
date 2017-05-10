<?php

class Unicorns {

    private $count = 8;

    public function getCount() {
        return $this->count;
    }

    public function steal($number) {
        // Make sure we can't have negative unicorns
        if ($this->count - $number >= 0) {
            $this->count -= $number;
        }
    }

}

