<?php
namespace src\main;

class Controller
{
  function __construct() {
	}

  function model($name) {
		$model = 'src\\app\\model\\' .$name;
		$model = new $model();
		return $model;
	}

  function action($name) {
		$action = 'src\app\action\\'.$name;
		$action = new $action();
		return $action;
	}

  function loadData() {
    $data = [];
    return $data;
  }

  function render($name, $data, $_mode = null) {
		extract($data);
    if(isset($_container)) { $_container = $_container; } else { $_container = ''; }

    if($_mode != 1 ) {
      $_cmn = $this->loadData();
    }

		#HEADER
		if($_mode != 1 ) {
      if (file_exists(ROOT . DS . 'src' . DS . 'app' . DS . 'views' . DS . 'common/header.php') ) {
  			require_once (ROOT . DS . 'src' . DS . 'app' . DS . 'views' . DS . 'common/header.php');
  		}
		}

		#VIEW
		if (file_exists(ROOT . DS . 'src' . DS . 'app' . DS . 'views' . DS . $name . '.php') ) {
			require_once (ROOT . DS . 'src' . DS . 'app' . DS . 'views' . DS . $name . '.php');
		}

		#FOOTER
		if($_mode != 1 ) {
      if (file_exists(ROOT . DS . 'src' . DS . 'app' . DS . 'views' . DS . 'common/footer.php') ) {
  			require_once (ROOT . DS . 'src' . DS . 'app' . DS . 'views' . DS . 'common/footer.php');
  		}
		}
	}

  function __destruct() {

	}
}
