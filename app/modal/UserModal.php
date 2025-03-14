<?php
    class UserModal{
        private $db;
        function __construct(){
            $this->db = new Database();
        }

        function checkUser($user, $pass){
            $sql ="SELECT * FROM user WHERE name='".$user."' AND pass='".$pass."' ";
            return $this->db->getone($sql);
        }

        function insertUser($data){
            $sql = "INSERT INTO user(name,pass,email) VALUES (?,?,?)";
            $param = [$data['name'],$data['pass'],$data['email']];
            return $this->db->insert($sql, $param);
        }

        function checkEmail($email){
            $sql ="SELECT * FROM user WHERE email='".$email."' ";
            return $this->db->getone($sql);
        }

        function getUser(){
            $sql ="SELECT * FROM user ORDER BY id ASC";
            return $this->db->getall($sql);
        }
    }