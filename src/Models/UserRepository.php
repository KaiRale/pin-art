<?php


namespace Kairale\PinArtStudio\Models;


use Kairale\PinArtStudio\Core\Repository;
use Kairale\PinArtStudio\Core\DB;

class UserRepository implements Repository
{
    private $db;
    public function __construct()
    {
        $this->db = DB::getDB();
    }

    public function isAuth($post){
        $sql='SELECT * FROM Masterlk WHERE login=:login';

        $params=[
            'login'=>$post['login']
        ];
        
        $result=$this->db->paramsGetOne($sql,$params);
        //если по login запись не будет найдена то запрос выше вернет false
        if ($result === false) return false;

        //если запись нашлась, то надо проверить совпадает ли пароль
        if (!password_verify($post['password'],$result['hash'])){
            return false;
        }
        session_start();
        $_SESSION['name']=$result['name'];
        $_SESSION['id']=$result['idmasterlk'];

        return true;
    }

    public function getAllPublickInfo()
    {
        $sql='SELECT `name`, aboutinfo, idmasterlk  FROM Masterlk';
        return $this->db->getAll($sql);
    }
    public function getAllPicture(){
        $sql='SELECT img, masterlk_idmasterlk FROM Masterpic';
        return $this->db->getAll($sql);
    }
    public function getById(int $id)
    {
        $sql = 'SELECT aboutinfo FROM Masterlk WHERE idmasterlk=:id';
        $params = ['id'=>$id];
        return $this->db->paramsGetOne($sql, $params);
    }

    public function save($params)
    {
        $sql='UPDATE Masterlk SET aboutinfo=:aboutinfo WHERE idmasterlk=:idmasterlk';
        return $this->db->nonSelectQuery($sql, $params);
    }

    public function saveImg($params)
    {
        $sql = 'INSERT INTO Masterpic ( img, masterlk_idmasterlk) VALUES (:img,:idmasterlk)';
        return $this->db->nonSelectQuery($sql, $params);
    }
    public function getAllById($id){
        $sql='SELECT * FROM Masterpic WHERE masterlk_idmasterlk=:id';
        $params = ['id'=>$id];
        return $this->db->paramsGetAll($sql, $params);
    }

    public function deleteImg($Data){
        $sql='DELETE from Masterpic WHERE idmasterpic IN (';
        foreach ($Data as &$task){
            $task=(int)$task;
            $sql.='?,';
        };
        $sql = substr($sql, 0, -1);
        $sql.=')';
        return $this->db->nonSelectQuery($sql,$Data);
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
    }
}