<?php


namespace Core;


use mysql_xdevapi\Exception;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class View
{
    public static function render($view, $args=[])
    {
        extract($args, EXTR_SKIP);
        $file='../App/Views/'.$view;
        if(is_readable($file)){
            require_once $file;
        }else{
            echo "view not found";
        }
    }

    public static function renderTemplate($template, $args=[])
    {
        static $twig=null;

        if($twig===null){
            $loader = new FilesystemLoader('../App/Views');
            $twig = new Environment($loader);
        }
        echo $twig->render($template, $args);

    }
}