<?php

namespace Kairale\PinArtStudio\Controllers;

use Kairale\PinArtStudio\Core\Controller;
use Kairale\PinArtStudio\Models\CommentRepository;
use Kairale\PinArtStudio\Models\Config;


class CommentsController extends Controller
{
    private $commentRepository;

    public function __construct()
    {
        $this->commentRepository = new CommentRepository();
    }

    public function addAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            header('Location: /');
        } else
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $post = $_POST;
                $params = [
                    'author' => $post['author'],
                    'text' => $post['text'],


                ];

                $lastid = $this->commentRepository->save($params);
                if ($lastid === false) {
                    echo Config::AUTH_ERROR;
                } else {
                    echo $this->commentRepository->getById($lastid)['date'];
                }
            }
    }


    public function showAction()
    {
        $comments = $this->commentRepository->getAll();
        $commentsMaster=[];
        foreach ($comments as $key=>&$comment){
            if ($comment['idcommentmaster'] !== null){
                array_push($commentsMaster, $comment);
                unset($comments[$key]);
            }
        }



        foreach ($commentsMaster as $item=>$value) {

            foreach ($comments as $key=>&$comment){
                if ($comment['idcomment']== $value['idcommentmaster']){
                    array_push($comment, $value);
                }
            }

        }



        $data = [
            'comments' => $comments,
        ];

        echo parent::renderPage('comments.php',
            'template.php', $data);
    }

    public function deleteAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            header('Location: /account');

        } else
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $rest_json = file_get_contents('php://input');
                $rest_json = explode(',', $rest_json);
                if ($this->commentRepository->deleteRecommendation($rest_json) === false) {
                    echo $addResult = 'Ошибка при удалении, попробуйте заново';
                } else {
                    echo $addResult = 'Запись удалена';
                }
            }
    }

    public function addMasterAction()
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            header('Location: /');
        } else
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $rest_json = explode(',', file_get_contents('php://input'));
                $params = [
                    'author' => $_SESSION['name'],
                    'text' => $rest_json[0],
                    'idcommentmaster' => $rest_json[1],
                ];
                if ($this->commentRepository->saveWithMaster($params) === false) {
                    echo $addResult = 'Ошибка при добавлении, попробуйте заново';
                } else {
                    echo 'Ответ успешно добален';
                }
            }
    }
}