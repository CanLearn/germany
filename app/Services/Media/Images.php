<?php

namespace App\Services\Media;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use function Livewire\store;

class Images
{
    public static function handleUploadImageArticle($image)
    {
            $file_name_image = md5(Str::random(15)) . $image->getClientOriginalName();
            $path = $image->move(public_path('images/articles/' ), $file_name_image );
            return $file_name_image ;

    }
    // protected static $sizes = ['300', '900'];
    // public static function handleUploadImageArticle($image) : array
    // {
    //         $file_name_image = md5(Str::random(15)) . $image->getClientOriginalName();
    //         $path = $image->move(public_path('images/articles/' ), $file_name_image );
    //         return self::resize($path->getRealPath() , $file_name_image);

    // }
    // private static function resize($img,  $extension)
    // {

    //     $img = Image::make($img);

    //     $imgs['original'] =  md5(Str::random(15)) . '.' . $extension;

    //     foreach (self::$sizes as $size) {
    //         $imgs[$size] = md5(Str::random(15))  . '_'. $size . '.' . $extension;
    //         $img->resize($size, null, function ($aspect) {
    //             $aspect->aspectRatio();
    //         })->save(public_path('images/articles/' . $imgs[$size] ) );
    //     }

    //     return $imgs;
    // }

    // public function getFile_path_image_update($request , $image)
    // {
    //     if (!is_null($image)) {
    //         if (File::exists(public_path('images/podcast/' . $image->image))) {
    //             File::delete(public_path('images/podcast/' . $image->image));
    //         }
    //         $file_name_image = md5(Str::random(15)) . $image->getClientOriginalName();
    //         $image->storeAs('images/podcast/' , $file_name_image , 'public_image_podcast') ;
    //     }
    //     return $file_name_image;
    // }
}
