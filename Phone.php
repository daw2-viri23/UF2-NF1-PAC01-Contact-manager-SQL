<?php

class Phone {
    private $phoneID;

    public function __construct($phoneID) {
        $this->phoneID = $phoneID;
    }

    public function getPhoneID() {
        return $this->phoneID;
    }

    // Otros métodos para trabajar con Phone
}
?>
