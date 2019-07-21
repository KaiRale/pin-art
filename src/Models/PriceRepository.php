<?php


namespace Kairale\PinArtStudio\Models;

use Kairale\PinArtStudio\Core\Repository;
use Kairale\PinArtStudio\Core\DB;

class PriceRepository implements Repository
{
    private $db;
    public function __construct()
    {
        $this->db = DB::getDB();
    }

    public function getAll()
    {
        $sql = 'SELECT * FROM Price';
        return $this->db->getAll($sql);
    }

    public function getById(int $id)
    {
        $sql = 'SELECT * FROM Price WHERE idprice=:id';
        $params = ['id'=>$id];
        return $this->db->paramsGetOne($sql, $params);
    }

    public function save($params)
    {
        $sql = 'INSERT INTO Price ( title, price, idcategory) VALUES (:title,:price, :idcategory)';
        return $this->db->nonSelectQuery($sql, $params);
    }
    public function getPriceWithCategory($id){
        $sql = 'SELECT title, price FROM Price WHERE idcategory=:id ';
        $params = ['id'=>$id];
        return $this->db->paramsGetAll($sql, $params);
    }

    public function deletePrice($taskData){
        $sql='DELETE from Price WHERE idprice IN (';
        foreach ($taskData as &$task){
            $task=(int)$task;
            $sql.='?,';
        };
        $sql = substr($sql, 0, -1);
        $sql.=')';
        return $this->db->nonSelectQuery($sql,$taskData);
    }
}