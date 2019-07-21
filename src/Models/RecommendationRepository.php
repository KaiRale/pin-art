<?php


namespace Kairale\PinArtStudio\Models;


use Kairale\PinArtStudio\Core\DB;
use Kairale\PinArtStudio\Core\Repository;

class RecommendationRepository implements Repository
{
    private $db;
    public function __construct()
    {
        $this->db = DB::getDB();
    }

    public function getAll()
    {
        $sql = 'SELECT * FROM Recommendation';
        return $this->db->getAll($sql);
    }

    public function getById(int $id)
    {
        $sql = 'SELECT * FROM Recommendation WHERE idrecommendation=:idrecommendation';
        $params = ['idrecommendation'=>$id];
        return $this->db->paramsGetOne($sql, $params);
    }


    public function save($params)
    {
        $sql = 'INSERT INTO Recommendation ( recommendation, idmasterlk) VALUES (:recommendation,:idmasterlk)';
        return $this->db->nonSelectQuery($sql, $params);
    }

    public function deleteRecommendation($Data){
        $sql='DELETE from Recommendation WHERE idrecommendation IN (';
        foreach ($Data as &$task){
            $task=(int)$task;
            $sql.='?,';
        };
        $sql = substr($sql, 0, -1);
        $sql.=')';
        return $this->db->nonSelectQuery($sql,$Data);
    }


}