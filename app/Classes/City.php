<?php
    class City extends BaseClass {




        static function findCitiesByCountryId($countryId){
            $sql = "SELECT * FROM cities WHERE id_country = :id_country";
            self::$db->query($sql);
            self::$db->bind(':id_country', $countryId);
            self::$db->execute();

            $results = self::$db->results();
            return $results;
        }
    }