<?php

namespace Model;

trait SettableJediFactorTrait {

    private $jediFactor;

    public function getJediFactor(){

        return $this->jediFactor;
    }

    public function setJediFactor($jediFactor)
    {
        if(!is_numeric($jediFactor)){
            throw new \Exception('Invalid jedi factor power passed : ' . $jediFactor);
        }
        $this->jediFactor = $jediFactor;

        return $this;
    }

}