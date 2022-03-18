<?php

class ImageManager
{
    public $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function extensionFile($files)
    {
        $info = new SplFileInfo($files['image']['name']);
        return $extension = $info->getExtension();
    }

    public function pathOfFile()
    {
       return $path = '../../uploads/';

    }

    public function fileName($files)
    {
        $fileName = mb_strtolower(md5(uniqid($files['image']['name'])));
        return $fileName;

    }

    public function upload($files)
    {
        if (isset($files['image'])) {
            $fileTmpName = $files['image']['tmp_name'];
            $fileName = $this->fileName($files);
            $uploadfile = $this->pathOfFile() . $fileName . '.' . $this->extensionFile($files);
            move_uploaded_file($fileTmpName, $uploadfile);
            return $fileName;



        }
    }
}