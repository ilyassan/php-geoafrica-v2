<?php
    class Continent extends BaseClass
    {

        public static function all() {
            $sql = "SELECT * FROM continents";
            self::$db->query($sql);
            self::$db->execute();
            $results = self::$db->results();
            return $results;
        }
    }