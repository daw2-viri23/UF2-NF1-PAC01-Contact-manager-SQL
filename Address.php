<?php

class Address {
    private $addressID;

    public function __construct($addressID) {
        $this->addressID = $addressID;
    }

    public function getAddressID() {
        return $this->addressID;
    }

    // Otros métodos para trabajar con Address
}
?>
