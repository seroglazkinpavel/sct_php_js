<?php


namespace app\core;

use app\core\Cache;
use app\core\BaseModel;

abstract class InitController
{
    public $route;
    public $view;

    /**
     * Вывод конструктора
     *
     * @param array  $route — ['controller', 'action']
     */
    public function __construct($route)
    {
        $this->route = $route;
        $this->view = new View($route);
    }

    /**
     * Вывод контроль доступа
     *
     * @return array
     */
    public function behaviors()
    {
        return [];
    }

    /**
     * Вывод вида страницы
     *
     * @param array  $params
     * @param string $view - название вида
     */
    public function render($view, $params = [])
    {
        $this->view->render($view, $params);
    }

    /**
     * Перенаправление на страницу $url
     *
     * @param string $url - адрес
     */
    public function redirect($url)
    {
        $this->view->redirect($url);
    }
	
}
