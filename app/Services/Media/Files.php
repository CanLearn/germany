<?php

namespace App\Services\Media;

use Illuminate\Support\Str;

class Files
{
    public function handleUploadFileArticle($file)
    {
             $file_name = md5(Str::random(10)). '.' . $file->getClientOriginalName();
             $file->storeAs('files/articles/video/' , $file_name ,  'post_file') ;
             return $file_name ;
    }

    public function handleUploadFileTicket($files)
    {
        $file_name = md5(Str::random(15)). '.' . $files->getClientOriginalName();
        $files->storeAs('files/ticketUser/' , $file_name) ;
        return $file_name ;
    }

}
