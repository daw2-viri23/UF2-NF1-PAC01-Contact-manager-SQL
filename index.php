<?php

include 'DataManager.php';
include 'Address.php';
include 'Email.php';
include 'Phone.php';
include 'AddressCollection.php';
include 'EmailCollection.php';
include 'PhoneCollection.php';

try {
    $entityID = 1;

    // Obtener y mostrar datos de dirección
    echo "<h2>Address Data</h2>";
    $addressData = DataManager::getAddressData($entityID);
    DataManager::displayTable($addressData);

    // Obtener y mostrar datos de entidad
    echo "<h2>Entity Data</h2>";
    $entityData = DataManager::getEntityData($entityID);
    DataManager::displayTable($entityData);

    // Obtener y mostrar objetos de direcciones para la entidad
    echo "<h2>Address Objects</h2>";
    $addressObjects = DataManager::getAddressObjectsForEntity($entityID);
    foreach ($addressObjects->getAddresses() as $address) {
        echo "Address ID: " . $address->getAddressID() . "<br>";
    }

    // Obtener y mostrar objetos de correos electrónicos para la entidad
    echo "<h2>Email Objects</h2>";
    $emailObjects = DataManager::getEmailObjectsForEntity($entityID);
    foreach ($emailObjects->getEmails() as $email) {
        echo "Email ID: " . $email->getEmailID() . "<br>";
    }

    // Obtener y mostrar objetos de números de teléfono para la entidad
    echo "<h2>Phone Objects</h2>";
    $phoneObjects = DataManager::getPhoneNumberObjectsForEntity($entityID);
    foreach ($phoneObjects->getPhones() as $phone) {
        echo "Phone ID: " . $phone->getPhoneID() . "<br>";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
