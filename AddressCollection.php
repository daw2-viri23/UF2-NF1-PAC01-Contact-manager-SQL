<?php

class AddressCollection {
    private $addresses = [];

    public function addAddress(Address $address) {
        $this->addresses[] = $address;
    }

    public function getAddresses() {
        return $this->addresses;
    }
}
?>
