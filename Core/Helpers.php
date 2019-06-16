<?php
namespace Core;

class Helpers{

//    convert time to ago format
    public static function time_elapsed_string($datetime)
    {
        $now = new \DateTime;
        $ago = new \DateTime($datetime);
        $diff = $now->diff($ago);

        if($diff->d<1){
            return "Pievienots Šodien";
        }elseif($diff->d==1) {
            return "pievienots pirms ".$diff->d." dienas";
        }elseif($diff->d>1) {
            return "pievienots pirms ".$diff->d." dienām";
        }else{
        return "pievienots ".$datetime;
        }

    }
}