<?php


namespace Kairale\PinArtStudio\Controllers;


use Kairale\PinArtStudio\Core\Controller;
use Kairale\PinArtStudio\Models\Config;
use Kairale\PinArtStudio\Models\RecommendationRepository;

class RecommendationController extends Controller
{
    private $recommendationRepository;

    public function __construct()
    {
        $this->recommendationRepository = new RecommendationRepository();
    }

    public function indexAction(){
        $recommendations = $this->recommendationRepository->getAll();
        $data = [
            'recommendations'=>$recommendations,
        ];
        echo parent::renderPage('recommendations.php',
            'template.php', $data);
    }

    public function addAction(){
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            header('Location: /account');
        } else
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $rest_json=file_get_contents('php://input');
                $params = [
                    'recommendation' => $rest_json,
                    'idmasterlk' => ($_SESSION['id'])
                ];
                if ($this->recommendationRepository->save($params) === false) {
                    echo $addResult = 'Что то пошло не так, попробуйте заново';
                }else{
                    echo $addResult = 'Совет добавлена';
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
                if ($this->recommendationRepository->deleteRecommendation($rest_json) === false) {
                    echo $addResult = 'Ошибка при удалении, попробуйте заново';
                } else {
                    echo $addResult = 'Совет удален';
                }
            }
    }


}