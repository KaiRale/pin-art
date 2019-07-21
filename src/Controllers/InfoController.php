<?php


namespace Kairale\PinArtStudio\Controllers;

use Kairale\PinArtStudio\Core\Controller;
use Kairale\PinArtStudio\Models\UserRepository;


class InfoController extends Controller
{
    private $mastersRepository;
    public function __construct()
    {
        $this->mastersRepository = new UserRepository();
    }

    public function aboutAction(){
        $content='about.php';
        $template='template.php';
        $data=[
            'title'=>'О нас',
        ];

        echo $this->renderPage($content, $template, $data);

    }


    public function mastersAction(){
        $mastersInfo=$this->mastersRepository->getAllPublickInfo();
        $mastersPic=$this->mastersRepository->getAllPicture();
        $content='masters.php';
        $template='template.php';
        foreach ($mastersInfo as &$master){
            $master['img']=[];
            foreach ($mastersPic as $pic){
                if ($pic['masterlk_idmasterlk']==$master['idmasterlk']){
                    array_push($master['img'],$pic['img']);
                }
            }
        }
        $data=[
            'title'=>'Мастера',
            'mastersInfo'=>$mastersInfo,
        ];

        echo $this->renderPage($content, $template, $data);
    }

    public function contactsAction(){
        $content='contacts.php';
        $template='template.php';
        $data=[
            'title'=>'Контакты',
        ];

        echo $this->renderPage($content, $template, $data);
    }


}