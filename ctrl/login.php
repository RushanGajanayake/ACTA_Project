<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 8/23/14
 * Time: 2:11 PM
 */

require_once("../conn/db_conn.php");

class Login{

    private $db_connection=null;

    // logged user details
    private $u_id = null;
    private $u_name = "";
    private $u_email= "";

    private $user_is_loggedin = false;

    private $forgot_urPassword_link_isValid = false;

    private $password_isReset = false;

    private $mail_sentSuccessfull = false;


    public function __construct(){

        session_start();

        if(isset($_POST['login'])){

            if(!isset($_POST['remember_me'])){
                $_POST['remember_me'] = null;
            }
            $this->loginWithPostData($_POST['login_username'],$_POST['login_password'],$_POST['remember_me']);
        }

        if(isset($_POST['reset_password'])){

            $this->forgotPassword($_POST['username']);
        }


    }

    private function loginWithPostData($username,$userpass,$remember){


        if(empty($username)){
            echo '<p style="color:#e40005;  margin-left: 20px; text-align:center; font-family: Century Gothic; font-size:22px;background-color: #ffebe8;padding: 25px;margin: 25px; border-style: solid; border-color:#dd3c10 ">Please Enter Username</p>';

        }
        elseif(empty($userpass)){

            echo '<p style="color:#e40005;  margin-left: 20px; text-align:center; font-family: Century Gothic; font-size:22px;background-color: #ffebe8;padding: 25px;margin: 25px; border-style: solid; border-color:#dd3c10 ">Please Enter correct password</p>';
        }
        elseif(isset($username) && isset($userpass)){

            //check the user name is not a email.
            if(!filter_var($username,FILTER_VALIDATE_EMAIL)){
                //get the user details for username
                $result_row = $this->getUserData(trim($username));

            }
            elseif($this->databaseConnection()){
                //if user name is a email.
                $query_user = $this->db_connection->prepare('SELECT * FROM authen WHERE user_email= :user_email');// get user details form user_email.
                $query_user->bindValue(':user_email',trim($username),PDO::PARAM_STR);
                $query_user->execute();

                $result_row = $query_user->fetchObject();

            }


            //check the valid user name
            if(!isset($result_row->u_id)){

                echo '<p style="color:#e40005;  margin-left: 20px; text-align:center; font-family: Century Gothic; font-size:22px;background-color: #ffebe8;padding: 25px;margin: 25px; border-style: solid; border-color:#dd3c10 ">Login failed. User not exists</p>';

            }
            elseif( $this->checkPassword($userpass) != $result_row->password_hash){

                echo '<p style="color:#e40005;  margin-left: 20px; text-align:center; font-family: Century Gothic; font-size:22px;background-color: #ffebe8;padding: 25px;margin: 25px; border-style: solid; border-color:#dd3c10 ">Incorrect Password</p>';

                $this->forgot_urPassword_link_isValid = true;

            }
            else{
                //start a new session for user and logged in.

                $_SESSION['user_name'] =$result_row->user_name;
                $_SESSION['user_email'] = $result_row->user_email;
                $_SESSION['p_nic'] = $result_row->Person_NIC;
                $_SESSION['pri_level'] =$result_row->privilage_level;
                $_SESSION['user_logged_in'] = 1;

                $this->u_id = $result_row->u_id;
                $this->u_name= $result_row->user_name;
                $this->u_email= $result_row->user_email;
                $this->user_is_loggedin = true;

            }

        }
    }

    private function databaseConnection(){

        if($this->db_connection != null){

            return true;
        }
        else{
//            try{
//
//                $this->db_connection = new PDO('mysql:host='.DB_host.';dbname='.DB_name.';charset=utf8',DB_user,DB_pass);
//                return true;
//            }
//            catch(PDOException $e){
//
//            }

            //$db = new DB_conn();
            return $this->db_connection = DB_conn::conn();


        }
        //return false;


    }

    private function getUserData($user_name){


        if($this->databaseConnection()){



            $query_user = $this->db_connection->prepare('SELECT * FROM authen WHERE user_name = :user_name'); //http://php.net/manual/en/pdostatement.bindvalue.php
            $query_user-> bindValue(':user_name',$user_name,PDO::PARAM_STR);
            $query_user->execute();

            return $query_user->fetchObject();
        }
        else{
            return false;
        }
    }

    private  function checkPassword($password){

        $pass= md5($password);
        return $pass;


    }

    public function isUserLoggedIn(){

        return $this->user_is_loggedin;
    }

    public function passwordResetSuccessful(){

    //reset the password
        return $this->password_isReset ;

    }

    private function forgotPassword($username){

        //check the username is email or not
        if(!filter_var($username,FILTER_VALIDATE_EMAIL)){
            //get the user details for username
            $result = $this->getUserData(trim($username));

        }
        elseif($this->databaseConnection()){
            //if user name is a email.
            $query_user = $this->db_connection->prepare('SELECT * FROM authen WHERE user_email= :user_email');// get user details form user_email.
            $query_user->bindValue(':user_email',trim($username),PDO::PARAM_STR);
            $query_user->execute();

            $result = $query_user->fetchObject();
        }

        if(!isset($result->user_id)){
            echo "## invalid email. user does not exist.! ";
        }
        else{

            $u_name = $result->user_name;
            $u_password = $result->user_password;
            $u_email = $result->user_email;

            $this->mailSend($u_name,$u_password,$u_email);//change user password to usr password hash

        }




    }

    public function mailWasSent(){
        $this->mail_sentSuccessfull; //if mail sent to user email.
    }

    //this will be send the email
    public function mailSend($username,$userpassword,$useremail){


        echo $useremail;

        $to = $useremail;
        $subject = "Change the user password - ACTA";
        $message = 'Someone has asked to reset the password for the following site and username.

                    --------------------------
                    site : http:// acta.edu.lk/
                    Username: '.$username.'
                    --------------------------

                    To reset your password visit the following address, otherwise just ignore this email and nothing will happen.
                    http://localhost/ACTA_project/proj/view/reset_pass.php?email='.$useremail.'&hash='.$userpassword.'';

        $header = 'From:badre512@gmail.com';
        mail($to,$subject,$message,$header);


        $this->mail_sentSuccessfull= true; //re check this.. if connection will be lost then wat happen??.

    }



}