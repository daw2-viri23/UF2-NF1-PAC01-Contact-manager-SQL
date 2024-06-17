<?php

class DataManager 
{
    private static function _getConnection() {
        static $hDB;
    
        if(isset($hDB)) {
            return $hDB;
        }
    
        $hDB = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=root")
            or die("Failure connecting to the database!");
        return $hDB;
    }
 
    public static function getAddressData($addressID) {
        $sql = "SELECT * FROM \"entityaddress\" WHERE \"addressid\" = $addressID";
        $res = pg_query(DataManager::_getConnection(), $sql);

        if(!($res && pg_num_rows($res))) {
            throw new Exception("Failed getting address data for address $addressID");
        }
        return pg_fetch_assoc($res);
    }

    public static function getEntityData($entityID) {
        $sql = "SELECT * FROM \"entities\" WHERE \"entityid\" = $entityID";
        $res = pg_query(DataManager::_getConnection(), $sql);
        if(!($res && pg_num_rows($res))) {
            throw new Exception("Failed getting entity $entityID");
        }
        return pg_fetch_assoc($res);
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

// Example: Display address data for address with ID 1
try {
    $data = DataManager::getAddressData(1);
    DataManager::displayTable($data);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

// Example: Display entity data for entity with ID 1
try {
    $data = DataManager::getEntityData(1);
    DataManager::displayTable($data);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

// Puedes hacer lo mismo con otros métodos según sea necesario
?>
