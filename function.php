<?php 




class Func {
    public $db;
    public function __construct($db){
      $this->db = $db;
    }
    
    public static function route($uri){
      return 'http://localhost/test/' . $uri;
    }

    public function create($data){
        $sql = "insert into users (name, email,password, gender) values (:name, :email, :password,:gender)";
        $stm = $this->db->db->prepare($sql);
        $stm->execute([":name" => $data["name"], ":password" => $data["password"], ":email" => $data["email"], ":gender" => $data["gender"]]);
         
        return $stm->rowCount();
    }

    public function index(){
        $sql = "select * from users";
        $stm = $this->db->db->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_CLASS);
        return $result;
    }

    public function edit($id){
        $sql = "select * from users where user_id=$id";
        $stm = $this->db->db->prepare($sql);
        $stm->execute();
        
        $result = $stm->fetchAll();
        return $result[0];
        
    }
    public function update($data){
        $sql = "update users set name=:name, email=:email, password=:password, gender=:gender where user_id=:user_id";
        $stm = $this->db->db->prepare($sql);
        $stm->execute($data);
        return $data["user_id"];
    }

    public function delete($id){
        $sql = "delete from users where user_id=$id";
        $stm = $this->db->db->prepare($sql);
        $stm->execute();
        return $id;
    }
    
    


}