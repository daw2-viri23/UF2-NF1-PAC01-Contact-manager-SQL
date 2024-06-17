<?php

class PhoneCollection {
    private $phones = [];

    public function addPhone(Phone $phone) {
        $this->phones[] = $phone;
    }

    public function getPhones() {
        return $this->phones;
    }
}
?>
