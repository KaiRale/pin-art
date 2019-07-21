<?php
/**
 * Created by PhpStorm.
 * User: Kairale
 * Date: 09.07.2019
 * Time: 19:41
 */

namespace Kairale\PinArtStudio\Models;

use Kairale\PinArtStudio\Core\Repository;
use Kairale\PinArtStudio\Core\DB;

class CategoryRepository implements Repository
{
    private $db;
    public function __construct()
    {
        $this->db = DB::getDB();
    }

    public function getAll()
    {
        $sql = 'SELECT * FROM Category';
        return $this->db->getAll($sql);
    }

    public function getById(int $id)
    {
        $sql = 'SELECT `name` FROM Category WHERE idcategory=:id';
        $params = ['id'=>$id];
        return $this->db->paramsGetOne($sql, $params);
    }

    public function save($params)
    {
        $sql = 'INSERT INTO Category ( author, text) VALUES (:author,:text)';
        return $this->db->insertInfoTable($sql, $params);
    }

    public function deleteFromPicHasCet($taskData){
        $sql='DELETE from picture_has_category WHERE picture_idpicture IN (';
        foreach ($taskData as &$task){
            $task=(int)$task;
            $sql.='?,';
        };
        $sql = substr($sql, 0, -1);
        $sql.=')';
        return $this->db->nonSelectQuery($sql,$taskData);
    }
}