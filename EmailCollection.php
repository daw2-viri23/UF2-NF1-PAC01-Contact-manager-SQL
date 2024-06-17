<?php

class EmailCollection {
    private $emails = [];

    public function addEmail(Email $email) {
        $this->emails[] = $email;
    }

    public function getEmails() {
        return $this->emails;
    }
}
?>
