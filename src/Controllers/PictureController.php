<?php

namespace Kairale\PinArtStudio\Controllers;

use Kairale\PinArtStudio\Core\Controller;
use Kairale\PinArtStudio\Models\CategoryRepository;
use Kairale\PinArtStudio\Models\PictureRepository;


class PictureController extends Controller
{
    private $pictureRepository;
    private $categoryRepository;

    public function __construct()
    {
        $this->categoryRepository = new CategoryRepository();
        $this->pictureRepository = new PictureRepository();
    }

    //перемещение файла в папку
    private function moving_file($arr)
    {
        $name = null;
        $ext = null;
        $tmp_name = null;
        $tmp_name = $arr['img']['tmp_name'];
        $name = md5($arr['img']['name']) . date('U');
        $ext = pathinfo($arr['img']['name'], PATHINFO_EXTENSION);
        if (move_uploaded_file($tmp_name, "img/$name.$ext")) {
            return $name . '.' . $ext;
        } else {
            echo "Что то пошло не так =(<br>";
        }
    }

//    запрос /picture/add
    public function addAction()
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            header('Location: /account');

        } else
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $post = $_POST;
                $file = $_FILES;

                $imgName = $this->moving_file($file);
                $paramsImg = [
                    'img' => $imgName,
                    'description' => $post['description'],
                    'idmasterlk' => $_SESSION['id'],
                ];

                $idImg = $this->pictureRepository->save($paramsImg);

                $paramsCategory = [
                    'picture_idpicture' => $idImg,
                    'category' => $post['category'],
                ];


                if (($idImg === false) || ($this->pictureRepository->saveCategory($paramsCategory) === false)) {
                    echo $addResult = 'Изображение не было добавлно';
                } else {
                    echo $addResult = 'Изображение добавлено';
                }
            }

    }

    public function deleteAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            header('Location: /account');

        } else
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $rest_json = file_get_contents('php://input');
                $rest_json = explode(',', $rest_json);
                if ($this->categoryRepository->deleteFromPicHasCet($rest_json) === false) {
                    echo $addResult = 'Ошибка при удалении категории, попробуйте заново';
                } elseif ($this->pictureRepository->deletePicture($rest_json) === false) {
                    echo $addResult = 'Ошибка при удалении изображения, попробуйте заново';
                } else {
                    echo $addResult = 'Изображение удалено';
                }
            }
    }

    public function showAction($id)
    {
        $picture = $this->pictureRepository->getById($id);
        $data = [
            'title' => $picture['title'],
            'picture' => $picture,
        ];
        echo parent::renderPage('picture.php',
            'template.php', $data);
    }

}