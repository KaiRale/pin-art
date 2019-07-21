<?php


namespace Kairale\PinArtStudio\Controllers;


use Kairale\PinArtStudio\Core\Controller;
use Kairale\PinArtStudio\Models\CategoryRepository;
use Kairale\PinArtStudio\Models\PictureRepository;
use Kairale\PinArtStudio\Models\PriceRepository;

class PriceController extends Controller
{
    private $priceRepository;
    private $pictureRepository;
    private $categoryRepository;

    public function __construct()
    {
        $this->priceRepository = new PriceRepository();
        $this->categoryRepository = new CategoryRepository();
        $this->pictureRepository = new PictureRepository();
    }

    public function indexAction()
    {
        $content = 'price.php';
        $template = 'template.php';
        $category = $this->categoryRepository->getAll();
        $price = [];

        $pictures =[];
        foreach ($category as $cat){
            $pictures[$cat['name']]=$this->pictureRepository->getByCategory($cat['idcategory']);
        }

        foreach ($category as $cat) {
            $price[$cat['name']] = $this->priceRepository->getPriceWithCategory($cat['idcategory']);
        }
        $data = [
            'pictures' => $pictures,
            'title' => 'Услуги и цены',
            'prices' => $price,
        ];
        echo $this->renderPage($content, $template, $data);
    }

    public function addAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            header('Location: /');
        } else
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $post = $_POST;
                $params = [
                    'idcategory' => $post['category'],
                    'title' => trim($post['title']),
                    'price' => trim($post['price']),
                ];


                if ($this->priceRepository->save($params) === false) {
                    echo $addResult = 'Что то пошло не так, попробуйте заново';
                } else {
                    echo $addResult = 'Услуга добавлена';
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
                if ($this->priceRepository->deletePrice($rest_json) === false) {
                    echo $addResult = 'Ошибка при удалении, попробуйте заново';
                } else {
                    echo $addResult = 'Услуга удалено';
                }
            }
    }

}