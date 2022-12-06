<?php

require_once "Database.php";
//include vs reruired -- require is more "strict"

class User extends Database {

    public function createUser($first_name, $last_name, $username, $password){
        
        $sql = "INSERT INTO users(first_name, last_name, username, `password`)
                values('$first_name', '$last_name', '$username', '$password')";
        
        if($this->conn->query($sql)){
            header("location: ../views");
            exit;
        }else{
            die("Cannot create user: ".$this->conn->error);
        }
    }

    public function login($username, $password){
        // get the record/row containing the user
        $sql = "SELECT * FROM users WHERE username = '$username'";

        $result = $this->conn->query($sql);

        // check if username exits
        if($result->num_rows == 1){
            $user_details = $result->fetch_assoc();
            if(password_verify($password, $user_details['password'])){

                //login; startsession
                session_start();
                $_SESSION['user_id'] = $user_details['id'];
                $_SESSION['username'] = $username;

                //redirect
                header("location: ../views/dashboard.php");
                exit;
            }else{
                die("Password incorrect");
            }
        }else{
            die("Cannot find that user");
        }
    }

    public function getUsers(){
        $sql = "SELECT * FROM users";

        if($result = $this->conn->query($sql)){
            return $result;
        }else{
            die("Cannot get users: ".$this->conn->error);
        }
    }

    public function getUser($id){
        $sql = "SELECT * FROM users WHERE id = $id";

        if($result = $this->conn->query($sql)){
            return $result->fetch_assoc();      // 1row
        }else{
            die("Cannot get user: ".$this->conn->error);
        }
    }

    public function updataUser($id, $first_name, $last_name, $username){
        $sql = "UPDATE users SET first_name = '$first_name',
                                 last_name ='$last_name',
                                 username = '$username'
                             WHERE id = $id";
        
        if($this->conn->query($sql)){
            //redirect
            header("location: ../views/dashboard.php");
            exit;       
        }else{
            die("Cannot updata user: ".$this->conn->error);
        }
    }

    public function delateUser($id){
        $sql = "DELETE FROM users WHERE id = $id";

        if($this->conn->query($sql)){
            header("location: ../views/dashboard.php");
            exit;
        }else{
            die("Cannot dekate user: ".$this->conn->error);
        }
    }

    public function uploadPhoto($uid, $filename, $tmp_name){
        $sql = "UPDATE users SET photo ='$filename' WHERE id = $uid";

        if($this->conn->query($sql)){
            //move file from temporary location to a folder
            $destination = "../images/$filename";
            if(move_uploaded_file($tmp_name, $destination)){
                header("location: ../views/profile.php");
                exit;
            }else{
                die("Cannot move the file");
            }
        }else{
            die("Error updationg photo: ".$this->conn->error);
        }
    }

}