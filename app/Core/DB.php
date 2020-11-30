<?php
namespace Core;
use Core\Exception\Exception;

class DB extends \PDO
{

  private $instance = null;

  public function __construct()
  {
        if(!\file_exists(dirname(__DIR__).DIRECTORY_SEPARATOR ."config" .DIRECTORY_SEPARATOR."database.yml")){

            throw new Exception("database.yml config file doesnt exists");
        }

        $db_config_file = include_once dirname(__DIR__).DIRECTORY_SEPARATOR ."config" .DIRECTORY_SEPARATOR."database.yml";
        $config = yaml_parse_file($db_config_file );

        $conn = $config['driver'].":host=".$config['host'].";dbname=".$config['dbname'];

        $options = array(
            \PDO::ATTR_PERSISTENT => true,
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
        );

        try{

            self::$instance = new PDO($conn, $config['username'], $config['password'], $options);

        }catch(\PDOException $e){
            echo $e->getMessage();
        }

  }

  public static function getConnection()
  {  
    if(is_null(self::$instance))
    {
      self::$instance = new DB();
    }
    return self::$instance;
  }

}
