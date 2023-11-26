<?php

namespace app\controllers;

use app\core\InitController;
use app\models\UsersModel;


class MainController extends InitController
{
        /**
     * Вывод главной страницы
     */
    public function actionIndex()
    {
        $this->view->title = 'Главная страница';
        $error_message = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['btn_login_form'])) {
            $login = !empty($_POST['login']) ? $_POST['login'] : null;
            $password = !empty($_POST['password']) ? $_POST['password'] : null;
            $userModel = new UsersModel();
            $result_auth = $userModel->authByLogin($login, $password);
            if ($result_auth['result']) {
                $this->redirect('/user/profile');
            } else {
                $error_message = $result_auth['error_message'];
            }
        };
        $this->render('main', [
            'error_message' => $error_message
        ]);
    }
}
