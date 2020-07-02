<?php

class BattleResult {

    private $winningShip;
    private $loosingShip;
    private $usedJediPower;

    public function __construct(Ship $winningShip = null,Ship $loosingShip = null, $usedJediPower)
    {
        $this->winningShip = $winningShip;
        $this->loosingShip = $loosingShip;
        $this->usedJediPower = $usedJediPower;
    }

    /**
     * @return Ship|null
     */ 
    public function getWinningShip()
    {
        return $this->winningShip;
    }

    /**
     *  @return Ship|null
     */ 
    public function getLoosingShip()
    {
        return $this->loosingShip;
    }

    /**
     *  @return boolean
     */ 
    public function wereJediPowerUsed()
    {
        return $this->usedJediPower;
    }

    public function isThereAWinner(){

        return $this->getWinningShip() !== null;
    }
}