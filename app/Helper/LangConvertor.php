<?php


use Illuminate\Support\Facades\App;

function convertEnToFa($str)
    {
        $local = App::getLocale();
        if ($local == 'fa') {
            $west_numbers = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
            $east_numbers = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');

            $str = str_replace($west_numbers, $east_numbers, $str);
            echo $str;
        }else{
            echo $str;
        }
    }
