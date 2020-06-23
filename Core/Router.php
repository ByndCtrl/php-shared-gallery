<?php 

namespace Core;

class Router 
{
    protected $url = '/';
    protected $controller = 'PagesController';
    protected $action = 'index';
    protected $params = [];
    
    public function __construct()
    {
        $url = $this->getUrl();  

        if($url != null && file_exists('../App/Controllers/' . ucwords($url[0]) . 'Controller.php'))
        {
            $this->controller = ucwords($url[0]) . 'Controller';
            unset($url[0]);
        }
        else
        {
            $this->controller = 'PagesController';
        }

        require_once '../App/Controllers/' . $this->controller . '.php';

        $this->controller = new $this->controller;

        if(isset($url[1]))
        {
            if(method_exists($this->controller, $url[1]))
            {
                $this->action = $url[1];

                unset($url[1]);
            }
            else
            {
                $this->action = 'index';
            }
        }

        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->action], $this->params);
    }

    public function getUrl()
    {
        if(isset($_GET['url']))
        {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
