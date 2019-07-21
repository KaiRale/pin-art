<?php
namespace Kairale\PinArtStudio\Controllers;

use Kairale\PinArtStudio\Core\Controller;
use Kairale\PinArtStudio\Models\CategoryRepository;
use Kairale\PinArtStudio\Models\PictureRepository;
use Kairale\PinArtStudio\Models\PriceRepository;

class IndexController extends Controller
{


    public function indexAction(){
        $content='about.php';
        $template='template.php';
        $data=[
            'title'=>'О нас',
        ];

        echo $this->renderPage($content, $template, $data);

    }


}

