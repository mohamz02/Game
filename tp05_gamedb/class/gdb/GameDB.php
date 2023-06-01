<?php
namespace gdb ;

use \pdo_wrapper\PdoWrapper ;

include __DIR__ . "../../../DB_CREDENTIALS.php" ;

class GameDB extends PdoWrapper
{

    public const UPLOAD_DIR = "uploads/" ;

    public function __construct(){
        // appel au constructeur de la classe mère
        parent::__construct(
            $GLOBALS['db_name'],
            $GLOBALS['db_host'],
            $GLOBALS['db_port'],
            $GLOBALS['db_user'],
            $GLOBALS['db_pwd']) ;
    }

    public function getAllGames(){
        return $this->exec(
            "SELECT * FROM games ORDER BY name",
            null,
            'gdb\GameRenderer') ;
    }

    public function createGame($name, $description=null, $imgFile=null){

        $name = htmlspecialchars($name) ;
        $description = htmlspecialchars($description) ;

        $imgName = null ;
        // enregistrement du fichier uploadé
        if($imgFile != null){
            $tmpName = $imgFile['tmp_name'] ;
            $imgName = $imgFile['name'] ;
            $imgName = urlencode(htmlspecialchars($imgName)) ;

            $dirname = $GLOBALS['PHP_DIR'].self::UPLOAD_DIR ;
            if(!is_dir($dirname)) mkdir($dirname) ;
            $uploaded = move_uploaded_file($tmpName, $dirname.$imgName) ;
            if (!$uploaded) die("FILE NOT UPLOADED") ;
        }else echo "NO IMAGE !!!!" ;

        $query = 'INSERT INTO games(name, description, image) VALUES (:name, :description, :image)';
        $params=[
            'name' => htmlspecialchars($name),
            'description' => htmlspecialchars($description),
            'image' => $imgName
        ] ;
        return $this->exec($query, $params) ;
    }

}