<?php

class Email {
    private $emailID;

    public function __construct($emailID) {
        $this->emailID = $emailID;
    }

    public function getEmailID() {
        return $this->emailID;
    }

    // Otros métodos para trabajar con Email
}
?>
