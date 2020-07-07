<?php

namespace Model;

class BattleResult {

    private $winningShip;
    private $loosingShip;
    private $usedJediPower;

    public function __construct(AbstractShip $winningShip = null,AbstractShip $loosingShip = null, $usedJediPower)
    {
        $this->winningShip = $winningShip;
        $this->loosingShip = $loosingShip;
        $this->usedJediPower = $usedJediPower;
    }

    /**
     * @return AbstractShip|null
     */ 
    public function getWinningShip()
    {
        return $this->winningShip;
    }

    /**
     *  @return AbstractShip|null
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