<?php

require_once __DIR__.'/lib/Ship.php';

/**
 * Undocumented function
 *
 * @param Ship $someShip
 * @return void
 */function printShipSummary($someShip) {

    echo '<b>Ship name:</b>' .$someShip->getName();
    echo '<hr/>';
    echo $someShip->getNameAndSpecs(false);
    echo '<hr/>';
    echo $someShip->getNameAndSpecs(true);
    echo '<hr/>';

}

$myShip = new Ship('Jedi Starship', 10, 0, 0);
$otherShip = new Ship('Imperial Shuttle', 20,0,0);

printShipSummary($myShip);
printShipSummary($otherShip);
