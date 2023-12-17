<?php 
//  require "../config/config.php";

 class App{
    public $host=HOST;
    public $dbname=DBNAME;
    public $user=USER;
    public $pass=PASS;
    public $link ;
    
    public function __construct(){
        $this->connect();
    }

    public function connect(){
   $this->link=new PDO("mysql:host=".$this->host.";dbname=".$this->dbname."",$this->user,$this->pass);
   if($this->link)     { 
    // echo "bien connected sure database ";
   }
    }
    //selection tous data à la base de donnée 
    public function SelectAll($query){
        $row =$this->link->prepare($query);
        $row->execute(); 
        $allRows= $row->fetchAll(PDO::FETCH_OBJ);
        if($allRows){
            return $allRows; 
        }else {
           return false;
        }
    }
    //select One 
    public function SelectOne($query){
        $row =$this->link->query($query);
        $row->execute(); 
        $firstRow= $row->fetch(PDO::FETCH_OBJ);
        if($firstRow){
            return $firstRow; 
        }else {
           return false;
        }
    }
    //insert query
    public function Insert($query,$arry,$path){
        if($this->validate($arry)=="empty"){
           echo "<script> alert('un ou plisuer chomp est vide !!')</script>" ;
        }else{
            $insert=$this->link->prepare($query);
            $insert->execute($arry);
            header("location: ".$path."");
        }
    }
    //update query
    public function Update($query,$arry,$path){
        if($this->validate($arry)=="empty"){
           echo "<script> alert('un ou plisuer chomp est vide !!')</script>" ;
        }else{
            $update=$this->link->prepare($query);
            $update->execute($arry);
            header("location: ".$path."");
        }
    }
    //delete query
    public function Delete($query,$path){
      
            $delete=$this->link->prepare($query);
            $delete->execute();
            header("location: ".$path."");
    }
    
    public function validate($arr){
        if(in_array("",$arr)){
            echo "empty";  //return empty 
        }
    }

    public function register($query,$arr,$path){
        if($this->validate($arr)=="empty"){
           echo "<script> alert('un ou plisuer chomp est vide !!')</script>" ;
        }else{
            $register=$this->link->prepare($query);
            $register->execute($arr);
            header("location: ".$path."");
        }
    }

    public function login($query,$data,$path){
       //email
       $login= $this->link->prepare($query);
       $login->execute();
       $fetch = $login->fetch(PDO::FETCH_OBJ);
       if($login->rowCount() >0){
           if(password_verify($data['password'],$fetch['password'])){
            // commencer variable de sission
            header("location:".$path."");
           }
       }
    }
    // commencer session 
    public function startingSession(){
        session_start();
    }
    //   validating session 
    public function validateSession($path){
        if(isset($_SESSION['id'])){
            header("location:".$path."");
        }
    }
 }
//  $con = new App();