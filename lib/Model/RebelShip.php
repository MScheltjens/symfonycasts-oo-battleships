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
        if ($useShortFormat) {
            return sprintf(
                '%s: %s/%s/%s (Rebel)',
                $this->getName(),
                $this->getWeaponPower(),
                $this->getJediFactor(),
                $this->getStrength()
            );
        } else {
            return sprintf(
                '%s: w:%s, j:%s, s:%s (Rebel)',
                $this->getName(),
                $this->getWeaponPower(),
                $this->getJediFactor(),
                $this->getStrength()
            );
        }
    }
}