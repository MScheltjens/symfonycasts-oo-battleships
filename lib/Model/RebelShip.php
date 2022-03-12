<?php

class RebelShip extends Ship
{
    public function getFavouriteJedi(){
        $coolJedis = ['Yoda', 'Ben Kenobi'];
        $key = array_rand($coolJedis); // takes random item from array
        return $coolJedis[$key];
    }

    public function getType(){
        return 'Rebel';
    }
    public function isFunctional()
    {
        return true;
    }

    public function getNameAndSpecs($useShortFormat = false)
    {
        // call parent function to overwrite
        $val = parent::getNameAndSpecs($useShortFormat);
            $val .= ' (Rebel)';
            return $val;
    }

    public function getJediFactor()
    {
        return rand(10, 30);
    }
}