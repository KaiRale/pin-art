<?php
namespace Kairale\PinArtStudio\Models;

use Kairale\PinArtStudio\Core\DB;
use Kairale\PinArtStudio\Core\Repository;
use Kairale\PinArtStudio\Models\Picture;

class PictureRepository implements Repository
{
    private $db;
    public function __construct()
    {
        $this->db = DB::getDB();
    }

    public function getAll()
    {
        // возвращает все картины
        $sql = 'SELECT * FROM Picture';
        return $this->db->getAll($sql);
    }

    public function getById(int $id)
    {
        // получаем картину по id
        $sql = 'SELECT * FROM Picture WHERE idpicture=:id';
        $params = ['id'=>$id];
        return $this->db->paramsGetOne($sql, $params);
    }

    public function getByCategory(int $idCategory)
    {
        $sql = $sql = 'SELECT p.img FROM picture p JOIN picture_has_category pc ON 
                      p.idpicture=pc.picture_idpicture WHERE pc.category_idcategory=:category_idcategory ORDER BY RAND() LIMIT 1 ';
        $params = ['category_idcategory'=>$idCategory];
        return $this->db->paramsGetOne($sql, $params);
    }

    public function save($params)
    {
        $sql = 'INSERT INTO Picture ( img, description,idmasterlk) VALUES (:img,:description,:idmasterlk)';
        return $this->db->insertInfoTable($sql, $params);
    }


    public function saveCategory($params)
    {
        var_dump($params);
        /*$sql = 'INSERT INTO Picture_has_category (picture_idpicture, category_idcategory) VALUES
                (:picture_idpicture, (SELECT idcategory FROM Category WHERE `name`= :category))';*/
        $sql = 'INSERT INTO Picture_has_category (picture_idpicture, category_idcategory) VALUES 
                (:picture_idpicture, :category)';
        return $this->db->nonSelectQuery($sql, $params);
    }
    public function getPictureWithCategory(){
         $sql ='SELECT p.idpicture, p.img, p.description, pc.category_idcategory FROM picture p
                 join  picture_has_category pc ON 
                      pc.picture_idpicture=p.idpicture
                ';
        return $this->db->getAll($sql);
    }

    public function deletePicture($taskData){
        $sql='DELETE from Picture WHERE idpicture IN (';
        foreach ($taskData as &$task){
            $task=(int)$task;
            $sql.='?,';
        };
        $sql = substr($sql, 0, -1);
        $sql.=')';
        return $this->db->nonSelectQuery($sql,$taskData);
    }


}