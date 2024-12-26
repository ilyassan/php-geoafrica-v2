<?php
    class User extends BaseClass{
        private $id;
        private $name;
        private $email;
        private $password;

        public function __construct($id, $name, $email, $password) {
            $this->id = $id;
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
        }

        public function getId() {
            return $this->id;
        }

        public function getName() {
            return $this->name;
        }

        public function getEmail() {
            return $this->email;
        }

        public function getPassword() {
            return $this->password;
        }

        public function save(){

        }

        public function update(){
            
        }



        public static function findUserByEmail($email){
            $sql = "SELECT * FROM users WHERE email = :email";
            self::$db->query($sql);
            self::$db->bind(':email', $email);
            self::$db->execute();
            $result = self::$db->single();

            if(self::$db->rowCount() > 0){
                return true;
            }else{
                return false;
            }

        }
    }