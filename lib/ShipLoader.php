<?php

class ShipLoader
{
    /**
     * @return Ship[];
     */
    public function getShips()
    {
        $shipsData = $this->queryForShips();
        //echo '<pre>' , var_dump($shipsData) , '</pre>'; die;

        $ships = array();
        foreach ($shipsData as $shipData) {

            $ships[] = $this->createShipFromData($shipData);
        }
        return $ships;
    }

    /**
     * @param $id
     * @return Ship|null
     */
    public function findOneById($id){
        $pdo = new PDO('mysql:host=localhost;dbname=oo_battle', 'root', 'root');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement = $pdo->prepare('SELECT * FROM ship where id = :id');
        $statement->execute(array('id' => $id ));
        $shipArray = $statement->fetch(PDO::FETCH_ASSOC);

        if(!$shipArray) {
            return null;
        }
        return $this->createShipFromData($shipArray);

        //echo '<pre>' , var_dump($shipArray) , '</pre>'; die;
    }

    private function createShipFromData(array $shipData){
        $ship = new Ship($shipData['name']);
        $ship->setId($shipData['id']);
        $ship->setWeaponPower($shipData['weapon_power']);
        $ship->setJediFactor($shipData['jedi_factor']);
        $ship->setStrength($shipData['strength']);

        return $ship;
    }

    private function queryForShips(){
    $pdo = new PDO('mysql:host=localhost;dbname=oo_battle', 'root', 'root');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $statement = $pdo->prepare('SELECT * FROM ship');
    $statement->execute();
    $shipsArray = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $shipsArray;
}
}