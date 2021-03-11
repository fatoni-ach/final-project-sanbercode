<?php
namespace App\Classes;
use Image;

class OptimizeImage {
        public function medium($url)
        {
            $img = Image::make($url);
            $img->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save();
        }

        public function small($url)
        {
            $img = Image::make($url);
            $img->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save();
        }
}
?>