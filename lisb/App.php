<?php 
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
    // validate cart
    public function ValidateCart($quer){
        $row =$this->link->query($quer);
        $row->execute(); 
        $count=$row->rowCount();
        return $count;
    }
    //insert query
    public function Insert($query,$arry,$path,$message){
        if($this->validate($arry)=="empty"){
           echo "<script> alert('un ou plisuer chomp est vide !!')</script>" ;
        }else{
            $insert=$this->link->prepare($query);
            $insert->execute($arry);
            // header("location: ".$path."");Mrdmatch
            $_SESSION['message']=$message;
            echo "<script>window.location.href='".$path."'</script>";
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
    public function Delete($query,$path,$message){
      
            $delete=$this->link->prepare($query);
            $delete->execute();
            $_SESSION['message']=$message;
            // header("location: ".$path."");Mrdmatch
            echo "<script>window.location.href='".$path."'</script>";
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

    public function login($query,$data){
       //email
       $login= $this->link->prepare($query);
       $login->execute();
       $fetch = $login->fetch(PDO::FETCH_ASSOC);
       if($login->rowCount() > 0){
           if(password_verify($data['password'],$fetch['password'])){
            // commencer variable de sission
            $_SESSION['email'] =$fetch['email'];
            $_SESSION['username'] =$fetch['username'];
            $_SESSION['user_id'] =$fetch['id'];
            if($fetch["is_admin"]){
            $_SESSION['admin'] =$fetch['username'];
                header("location:".APPURL."/Admin");
            }else{
                header("location:".APPURL."");
            }
           }
        //    else{
        //     echo "<script>alert('email ou password inccoricte !!')</script>";
        //    }
       }
    }
    // commencer session 
    public function startingSession(){
        session_start();
    }
    //   validating session 
    public function validateSession(){
        if(isset($_SESSION['user_id'])){
            // header("location:".APPURL."");mrdmatch 
            echo "<script>window.location.href='".APPURL."'</script>";
        }
    }
    public function validateAdmin(){
        if(!isset($_SESSION['admin'])){
     echo "<script>window.location.href='".APPURL."/Auth/login.php'</script>";
        }
    }
 }
//  $con = new App();