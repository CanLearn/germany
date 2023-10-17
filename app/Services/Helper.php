<?php

namespace App\Services;

class Helper
{
    public static function counterText($text)
    {
         $wordCount =  mb_strlen(strip_tags(preg_replace('/\s+/', '', $text)));
          return  ceil($wordCount / 250);
    }
}
