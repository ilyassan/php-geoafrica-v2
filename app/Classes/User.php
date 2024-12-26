<?php
    class User extends BaseClass{
        private $id;
        private $username;
        private $email;
        private $password;
        private $role_id;

        static public $adminRoleId = 1;
        static public $visitorRoleId = 2;

        public function __construct($username, $email, $password) {
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
        }

        public function getId() {
            return $this->id;
        }

        public function getUsername() {
            return $this->username;
        }

        public function getEmail() {
            return $this->email;
        }

        public function save(){
            $sql = "INSERT INTO users (username, email, password_hash, role_id) VALUES (:username, :email, :password_hash, :role_id)";
            self::$db->query($sql);
            self::$db->bind(':username', $this->username);
            self::$db->bind(':email', $this->email);
            self::$db->bind(':password_hash', $this->password);
            self::$db->bind(':role_id', self::$visitorRoleId);

            if (self::$db->execute()) {
                return true;
            } else {
                return false;
            }
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