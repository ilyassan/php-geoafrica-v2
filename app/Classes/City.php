<?php
    class City extends BaseClass {

        private $id;
        private $name;
        private $country_id;
        private $is_capital;
        private $is_showed;

        public function __construct($id, $name, $country_id, $is_capital, $is_showed)
        {
            $this->id = $id;
            $this->name = $name;
            $this->country_id = $country_id;
            $this->is_capital = $is_capital;
            $this->is_showed = $is_showed;
        }

        public static function findCitiesByCountryId($countryId){
            $sql = "SELECT * FROM cities WHERE id_country = :id_country";
            self::$db->query($sql);
            self::$db->bind(':id_country', $countryId);
            self::$db->execute();

            $results = self::$db->results();
            return $results;
        }

        public static function attachCityToCountry($cityId){
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

        public static function unattachCityFromCountry($cityId){
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

        public static function unattachCitiesFromCountry($countryId){
            $sql = "UPDATE cities SET cities.is_showed = 0
                    WHERE cities.id_country = :id_country";
            self::$db->query($sql);
            self::$db->bind(":id_country", $countryId);

            if (self::$db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public static function showCities($ids){
            $sql = "UPDATE cities SET cities.is_showed = 1
                    WHERE cities.id IN (".implode(",", $ids).")";
            self::$db->query($sql);

            if (self::$db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }