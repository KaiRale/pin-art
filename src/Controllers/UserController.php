<?php

namespace Kairale\PinArtStudio\Controllers;


use Kairale\PinArtStudio\Core\Controller;
use Kairale\PinArtStudio\Models\PictureRepository;
use Kairale\PinArtStudio\Models\UserRepository;

class UserController extends Controller
{
    private $pictureRepository;
    private $userRepository;

    public function __construct()
    {
        $this->pictureRepository = new PictureRepository();
        $this->userRepository = new UserRepository();

    }

    public function addinfoAction()
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            header('Location: /account');

        } else
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $post = $_POST;
                $file = $_FILES;

                $imgName = $this->moving_file($file);
                if ($imgName !== false) {

                    for ($i = 0; $i < count($imgName); $i++) {

                        $paramImg = [
                            'img' => $imgName[$i],
                            'idmasterlk' => $_SESSION['id'],
                        ];

                        if ($this->userRepository->saveImg($paramImg) === false) {
                            echo $addResult = 'Изображение не было добавлно';
                            return;
                        }
                    }
                }
                $paramsMaster = [
                    'aboutinfo' => $post['about_text'],
                    'idmasterlk' => $_SESSION['id'],
                ];
                if ($this->userRepository->save($paramsMaster) === false) {
                    echo $addResult = 'Описание небыло добавлено';
                };

                 header('Location: /account/lk');
            }

    }

    function moving_file($arr)
    {
        $name = null;
        $ext = null;
        $tmp_name = null;
        $namearr = [];
        for ($i = 0; $i < count($arr['picture']['name']); $i++) {
            if ($this->valid_size($arr['picture']['size'][$i]) !== true) {
                continue;
            }
            $tmp_name = $arr['picture']['tmp_name'][$i];
            $name = md5($arr['picture']['name'][$i]) . date('U');
            $ext = pathinfo($arr['picture']['name'][$i], PATHINFO_EXTENSION);

            if (move_uploaded_file($tmp_name, "img/$name.$ext")) {
                array_push($namearr, $name . '.' . $ext);
            } else {
                return false;
            }
        }
        return $namearr;
    }


    //проверка на размер
    function valid_size($size)
    {
        if ($size > 8000000) {
            echo 'Размер файла не должен привышать 8 Mбайт<br>';
            return;
        } else {
            return true;
        }
    }

    public function deletemaspicAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            header('Location: /account');

        } else
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $rest_json = file_get_contents('php://input');
                $rest_json = explode(',', $rest_json);
                if ($this->userRepository->deleteImg($rest_json) === false) {
                    echo $addResult = 'Ошибка при удалении, попробуйте заново';
                } else {
                    echo $addResult = 'Изображение удалено';
                }
            }
    }


}