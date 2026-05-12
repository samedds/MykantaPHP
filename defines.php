<?php

 define('DOC_ROOT' , $_SERVER['DOCUMENT_ROOT']);
 define('DS' , DIRECTORY_SEPARATOR);
 
  define('INCLUDES' , DOC_ROOT . 'includes' . DS );
  
  define('MYSQL_DIR' , DOC_ROOT . '/mysql' . DS );
  define('MODELS_DIR' , DOC_ROOT . '/mysql' . DS . '/models' . DS );
  require_once MYSQL_DIR . '/conxn.php';
  ?>
    