<?Php

    require 'redis/Autoload.php';
    Predis\Autoloader::register();
    $redis = new Predis\Client();
    $redis->flushAll();
    header("location: ./index.php");
    //header("Location: <a href="index.php"</a>"));
    header("location: ./index.php");?>
    public function flushAll()
{
    $this->_redis->flushAll();
}
?>