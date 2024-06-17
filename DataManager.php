<?php

class DataManager {
    private static function _getConnection() {
        static $hDB;

        if (isset($hDB)) {
            return $hDB;
        }

        $hDB = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=root")
            or die("Failure connecting to the database!");
        return $hDB;
    }

    public static function getAddressData($addressID) {
        $sql = "SELECT * FROM \"entityaddress\" WHERE \"addressid\" = $addressID";
        $res = pg_query(DataManager::_getConnection(), $sql);

        if (!($res && pg_num_rows($res))) {
            throw new Exception("Failed getting address data for address $addressID");
        }
        return pg_fetch_assoc($res);
    }

    public static function getEntityData($entityID) {
        $sql = "SELECT * FROM \"entities\" WHERE \"entityid\" = $entityID";
        $res = pg_query(DataManager::_getConnection(), $sql);
        if (!($res && pg_num_rows($res))) {
            throw new Exception("Failed getting entity $entityID");
        }
        return pg_fetch_assoc($res);
    }

    public static function getAddressObjectsForEntity($entityID) {
        $sql = "SELECT \"addressid\" FROM \"entityaddress\" WHERE \"entityid\" = $entityID";
        $res = pg_query(DataManager::_getConnection(), $sql);

        if (!$res) {
            throw new Exception("Failed getting address data for entity $entityID");
        }

        $addressCollection = new AddressCollection();

        if (pg_num_rows($res)) {
            while ($rec = pg_fetch_assoc($res)) {
                $addressCollection->addAddress(new Address($rec['addressid']));
            }
        }
        return $addressCollection;
    }

    public static function getEmailObjectsForEntity($entityID) {
        $sql = "SELECT \"emailid\" FROM \"entityemail\" WHERE \"entityid\" = $entityID";
        $res = pg_query(DataManager::_getConnection(), $sql);

        if (!$res) {
            throw new Exception("Failed getting email data for entity $entityID");
        }

        $emailCollection = new EmailCollection();

        if (pg_num_rows($res)) {
            while ($rec = pg_fetch_assoc($res)) {
                $emailCollection->addEmail(new Email($rec['emailid']));
            }
        }
        return $emailCollection;
    }

    public static function getPhoneNumberObjectsForEntity($entityID) {
        $sql = "SELECT \"phoneid\" FROM \"entityphone\" WHERE \"entityid\" = $entityID";
        $res = pg_query(DataManager::_getConnection(), $sql);

        if (!$res) {
            throw new Exception("Failed getting phone data for entity $entityID");
        }

        $phoneCollection = new PhoneCollection();

        if (pg_num_rows($res)) {
            while ($rec = pg_fetch_assoc($res)) {
                $phoneCollection->addPhone(new Phone($rec['phoneid']));
            }
        }
        return $phoneCollection;
    }

    public static function displayTable($data) {
        echo "<table border='1'>";
        echo "<tr><th>Field</th><th>Value</th></tr>";

        foreach ($data as $field => $value) {
            echo "<tr><td>$field</td><td>$value</td></tr>";
        }

        echo "</table>";
    }
}
?>
