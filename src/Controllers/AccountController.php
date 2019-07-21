<?php


namespace Kairale\PinArtStudio\Controllers;


use Kairale\PinArtStudio\Core\Controller;
use Kairale\PinArtStudio\Models\CategoryRepository;
use Kairale\PinArtStudio\Models\CommentRepository;
use Kairale\PinArtStudio\Models\Config;
use Kairale\PinArtStudio\Models\PictureRepository;
use Kairale\PinArtStudio\Models\RecommendationRepository;
use Kairale\PinArtStudio\Models\UserRepository;
use Kairale\PinArtStudio\Models\PriceRepository;

class AccountController extends Controller
{
    private $userRepository;
    private $categoryRepository;
    private $priceRepository;
    private $pictureRepository;
    private $recommendationRepository;
    private $masterlkRepository;
    private $commentRepository;


    public function __construct()
    {
        $this->userRepository = new UserRepository();
        $this->categoryRepository = new CategoryRepository();
        $this->priceRepository = new PriceRepository();
        $this->pictureRepository = new PictureRepository();
        $this->recommendationRepository = new RecommendationRepository();
        $this->masterlkRepository = new UserRepository();
        $this->commentRepository = new CommentRepository();
    }

    public function indexAction()
    {
        $template = 'login.php';
        $data = [
            'title' => 'Администрирование',
        ];
        echo $this->renderPage(null, $template, $data);
    }

    public function authAction()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $post = $_POST;
            if ($this->userRepository->isAuth($post) === false) {
                header('Location: /account');
                return;
            }
            header('Location: /account/lk');
        }
    }

    public function lkAction()
    {
        session_start();
        if (!isset($_SESSION['name'])) {
            header('Location: /');
        }
        $template = 'admin.php';
        /*Категории*/
        $categorys = $this->categoryRepository->getAll();

        /*Картинки*/
        $pictures = $this->pictureRepository->getPictureWithCategory();
        foreach ($pictures as $key => $picture) {
            $pictures[$key]['name'] = $this->categoryRepository->getById($picture['category_idcategory'])['name'];
        };

        /*Советы*/
        $recommendations = $this->recommendationRepository->getAll();
        foreach ($recommendations as $key => $recommendation) {
            $recommendations[$key]['author'] = $this->masterlkRepository->getById($recommendation['idmasterlk'])['name'];
        };

        /*Комментарии*/
        $comments = $this->commentRepository->getAll();

        /*Цены*/
        $prices = $this->priceRepository->getAll();
        foreach ($prices as $key => $price) {
            $prices[$key]['category'] = $this->categoryRepository->getById($price['idcategory'])['name'];
        };
        /*О себе*/
        $aboutInfo = null;
        $aboutPic = null;
        if ($this->userRepository->getById($_SESSION['id']) !== false) {
            $aboutInfo = $this->userRepository->getById($_SESSION['id']);
        }
        if ($this->userRepository->getAllById($_SESSION['id']) !== false) {
            $aboutPic = $this->userRepository->getAllById($_SESSION['id']);
        }

        $data = [
            'title' => 'Лк',
            'pictures' => $pictures,
            'recommendations' => $recommendations,
            'categorys' => $categorys,
            'comments' => $comments,
            'prices' => $prices,
            'name' => $_SESSION['name'],
            'aboutInfo' =>$aboutInfo,
            'aboutPic' => $aboutPic,
            'auth' => $_SESSION['name'],
        ];
        echo $this->renderPage(null, $template, $data);
    }

    public function logoutAction()
    {
        session_start();
        session_destroy();
        $_SESSION = [];
        header('Location: /account');
    }


}