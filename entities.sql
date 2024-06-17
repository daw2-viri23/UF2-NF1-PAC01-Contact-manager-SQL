CREATE TABLE "entities" (
  "entityid" SERIAL PRIMARY KEY NOT NULL,
  "name1" varchar(100) NOT NULL,
  "name2" varchar(100) NOT NULL,
  "type" char(1) NOT NULL
);


public static function getEmailData($emailID) {
      $sql = "SELECT * FROM \"entityemail\" WHERE \"emailid\" = $emailID";
      $res = pg_query(DataManager::_getConnection(), $sql);
   
      if(! ($res && pg_num_rows($res))) {
         die("Failed getting email data for email $emailID");
      }
   
      return pg_fetch_assoc($res);
   }

   public static function getPhoneNumberData($phoneID) {

      $sql = "SELECT * FROM \"entityphone\" WHERE \"phoneid\" = $phoneID";
      $res = pg_query(DataManager::_getConnection(), $sql);
      if(! ($res && pg_num_rows($res))) {
         die("Failed getting phone number data for phone $phoneID");
      }
   
      return pg_fetch_assoc($res);
   }
   
 
  public static function getEntityData($entityID) {
    $sql = "SELECT * FROM \"entities\" WHERE \"entityid\" = $entityID";
    $res = pg_query(DataManager::_getConnection(),$sql);
    if(! ($res && pg_num_rows($res))) {
      die("Failed getting entity $entityID");
    }
    return pg_fetch_assoc($res);
 }

  public static function getAddressObjectsForEntity($entityID) {
    $sql = "SELECT \"addressid\" from \"entityaddress\" WHERE \"entityid\" = 
            $entityID";
    $res = pg_query(DataManager::_getConnection(), $sql);

    if(!$res) {
      die("Failed getting address data for entity $entityID");
    }
   
    if(pg_num_rows($res)) {
      $objs = array();
      while($rec = pg_fetch_assoc($res)) {
        $objs[] = new Address($rec['addressid']);
      }
      return $objs;
    } else {
      return array();
    }
  }

   
  public static function getEmailObjectsForEntity($entityID) {

    $sql = "SELECT \"emailid\" from \"entityemail\" 
            WHERE \"entityid\" = $entityID";
    $res = pg_query(DataManager::_getConnection(), $sql);
    if(!$res) {
      die("Failed getting email data for entity $entityID");
    }
   
    if(pg_num_rows($res)) {
      $objs = array();
      while($rec = pg_fetch_assoc($res)) {
        $objs[] = new EmailAddress($rec['emailid']);
      }
      return $objs;
    } else {
      return array();
    }
  }

  public static function getPhoneNumberObjectsForEntity($entityID) {
    $sql = "SELECT \"phoneid\" from \"entityphone\" 
            WHERE \"entityid\" = $entityID";
    $res = pg_query(DataManager::_getConnection(), $sql);
   
    if(!$res) {
      die("Failed getting phone data for entity $entityID");
    }
   
    if(pg_num_rows($res)) {
      $objs = array();
      while($rec = pg_fetch_assoc($res)) {
        $objs[] = new PhoneNumber($rec['phoneid']);
      }
      return $objs;
    } else {
      return array();
    }
  }