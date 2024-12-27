<?php
    class Continent extends BaseClass
    {
        private $id;
        private $name;
        private $number_of_countries;

        public function __construct($id, $name, $number_of_countries)
        {
            $this->id = $id;
            $this->name = $name;
            $this->number_of_countries = $number_of_countries;
        }

        public static function all() {
            $sql = "SELECT * FROM continents";
            self::$db->query($sql);
            self::$db->execute();
            $results = self::$db->results();
            return $results;
        }
    }