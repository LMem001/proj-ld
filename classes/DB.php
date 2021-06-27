<?php 
class DB 
{
    private static function connect() 
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=linkendata;charset=utf8', 'root', '');
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
  
    public static function query($query, $params = array()) 
    {
        $stmt = self::connect()->prepare($query);
        $stmt->execute($params);
        $data = $stmt->fetchAll();
        return $data;
    }
}
?>