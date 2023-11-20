<?php 
 require "../config/config.php";?>
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
   $this->link=new PDO("mysql:host=".$this->host.";dbname:".$this->dbname."",$this->user,$this->pass);
   if($this->link)     { 
    echo "bien connected sure date base ";
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
           echo "<script> alert('un ou plisuer chomp est vide !!')</script>" 
        }else{
            $insert=$this->link->prepare($query);
            $insert->execute($arry);
            header("location: ".$path."");
        }
    }
    //update query
    public function Update($query,$arry,$path){
        if($this->validate($arry)=="empty"){
           echo "<script> alert('un ou plisuer chomp est vide !!')</script>" 
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
    
    public function validate($arry){
        if(in_array("",$arry)){
            echo "empty";
        }
    }
 }
 $con = new App();