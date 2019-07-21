<?php


namespace Kairale\PinArtStudio\Models;


use Kairale\PinArtStudio\Core\Repository;
use Kairale\PinArtStudio\Core\DB;

class CommentRepository implements Repository
{
    private $db;

    public function __construct()
    {
        $this->db = DB::getDB();
    }

    public function getAll()
    {
        $sql = 'SELECT * FROM Comment';
        return $this->db->getAll($sql);
    }

    public function getById(int $id)
    {
        $sql = 'SELECT * FROM Comment WHERE idcomment=:id';
        $params = ['id' => $id];
        return $this->db->paramsGetOne($sql, $params);
    }

    public function save($params)
    {
        $sql = 'INSERT INTO Comment ( author, text) VALUES (:author,:text)';
        return $this->db->insertInfoTable($sql, $params);
    }

    public function saveWithMaster($params)
    {
        $sql = 'INSERT INTO Comment ( author, text, idcommentmaster) VALUES (:author,:text,:idcommentmaster)';
        return $this->db->insertInfoTable($sql, $params);
    }
    
    public function deleteRecommendation($Data)
    {
        $sql = 'DELETE from Comment WHERE idcomment IN (';
        foreach ($Data as &$task) {
            $task = (int)$task;
            $sql .= '?,';
        };
        $sql = substr($sql, 0, -1);
        $sql .= ')';
        return $this->db->nonSelectQuery($sql, $Data);
    }
}