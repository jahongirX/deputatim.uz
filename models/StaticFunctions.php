<?php


namespace app\models;


use yii\helpers\FileHelper;

class StaticFunctions
{
    public static function saveImage($tableName,$id,$image){
        $DIR = "uploads/$tableName/$id/";
        FileHelper::createDirectory($DIR);
        $FILE = md5(rand(1,1000000).rand(1,1000000).$image->baseName);
        $FILE = $FILE . '.' . $image->extension;
        $image->saveAs($DIR . $FILE);
        return $FILE;
    }

    public static function getImage($tableName,$id,$image){
        $FILE = __DIR__ . "/../web/uploads/$tableName/$id/$image";
        if(is_file($FILE)){
            return "/uploads/$tableName/$id/$image";
        }else{
            return "/images/no_photo.jpg";
        }
    }

    public static function deleteImage($tableName,$id,$image){
        $FILE = __DIR__ . "/../web/uploads/$tableName/$id/$image";
        if(is_file($FILE)){
            unlink($FILE);
        }
    }
}