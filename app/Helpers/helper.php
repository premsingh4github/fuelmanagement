<?php

    function saveFile($file_name,$file_data,$path){
//        $path = 'uploads/'. date('y/m/d');
//        if(!is_dir($path)){
//            mkdir($path);
//        }
//        $path += $path.'/'.$file_name;
        $dir = $path.$file_name;
        file_put_contents($dir,$file_data);
        return $dir;
    }
?>


