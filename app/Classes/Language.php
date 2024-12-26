<?php
    class Language extends BaseClass {
        private $id;
        private $name;

        public function __construct($id, $name) {
            $this->id = $id;
            $this->name = $name;
        }

        public function getId() {
            return $this->id;
        }

        public function getName() {
            return $this->name;
        } 

        static function all() {
            $sql = "SELECT * FROM languages";
            self::$db->query($sql);
            self::$db->execute();

            $results = self::$db->results();
            return $results;
        }
    }