<?php
namespace src\main;

class Router {

  public $routes = array();
  public $modes = array();

  function add($route, $ns, $mode = 1) {
    $pattern = '/^' . str_replace('/', '\/', dirname($_SERVER['PHP_SELF']).$route) . '$/';
    $this->routes[$pattern] = $ns;
    $this->modes[$pattern] = $mode;
  }

  function dispatch() {
    $url = $_SERVER['REQUEST_URI'];
    $parts = parse_url($url);
    $uri = $parts['path'];

    if(isset($parts['query'])) {
      parse_str($parts['query'], $parameters);
    } else {
      $parameters = [];
    }

    $output = [];

    foreach ($this->routes as $pattern => $callback) {
      if (preg_match($pattern, $uri, $params)) {
        array_shift($params);
        $output['mode'] = $this->modes[$pattern];
        $output['callback'] = $callback;
        $output['params'] = $params;
      }
    }

    //dispatch
    if(!empty($output)) {

      $segments = explode('@', $output['callback']);
      $controller = $segments[0];

      if(ENABLE_LOGIN) {
        if($output['mode']==1) {
          if(isset($_SESSION[APP."_login"])) {
            $controller = new $controller();
            if($controller) {
              call_user_func_array( array( $controller, $segments[1] ), $output['params'] );
            }
          } else {
            header("Location: ".HOME."account/login");
            exit();
          }
        } elseif($output['mode'] == 0) {
          $controller = new $controller();
          if($controller) {
            call_user_func_array( array( $controller, $segments[1] ), $output['params'] );
          }
        }
      } else {
        $controller = new $controller();
        if($controller) {
          call_user_func_array( array( $controller, $segments[1] ), $output['params'] );
        }
      }
    } else {
      echo '404';
    }
  }
}
