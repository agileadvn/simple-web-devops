<?php
class Autoloader
{
    public static function register()
    {
      $directorys = array(
        'model/',
        'storage/'
      );

      foreach($directorys as $directory)
      {
        $files = array_diff(scandir($directory), array('..', '.'));
        foreach($files as $file) {
          require_once($directory. $file);
        }
      }
    }
}
//Autoloader::register();
//require_once('model/Product.php');
require_once('storage/ProductRepository.php')

?>
