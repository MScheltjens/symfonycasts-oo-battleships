<?php

class BattleResult
{
    private $usedJediPowers;
    private $winningShip;
    private $losingShip;

    public function __construct($usedJediPowers, Ship $winningShip = null, Ship $losingShip = null){ // otherwise error when 2 ships destroy eachother (null is not Ship object)
        $this->usedJediPowers = $usedJediPowers;
        $this->winningShip = $winningShip;
        $this->losingShip = $losingShip;

    }

    /**
     * @return bool
     */
    public function wereJediPowersUsed()
    {
        return $this->usedJediPowers;
    }

    /**
     * @return Ship | null
     */
    public function getWinningShip()
    {
        return $this->winningShip;
    }

    /**
     * @return Ship | null
     */
    public function getLosingShip()
    {
        return $this->losingShip;
    }

    public function isThereAWinner()
    {
        return $this->getWinningShip() !== null;
    }

}