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

        static function attachCityToCountry($cityId){
            $sql = "UPDATE cities SET cities.is_showed = 1
                    WHERE cities.id = :id_city";
            self::$db->query($sql);
            self::$db->bind(":id_city", $cityId);

            if (self::$db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        static function unattachCityToCountry($cityId){
            $sql = "UPDATE cities SET cities.is_showed = 0
                    WHERE cities.id = :id_city";
            self::$db->query($sql);
            self::$db->bind(":id_city", $cityId);

            if (self::$db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }