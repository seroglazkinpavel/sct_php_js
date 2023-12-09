<?php

namespace app\controllers;

use app\core\InitController;
use app\models\UsersModel;
use app\models\GameModel;
use app\models\MainsModels;


class MainController extends InitController
{
        /**
     * Вывод главной страницы
     */
    public function actionIndex()
    {
        $this->view->title = 'Главная страница';
        $error_message = '';
        $err_mes = '';

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
        }

        $value = !empty($_POST['ochenka']) ? (int)$_POST['ochenka'] : null;
        $user_id = !empty($_GET['id']) ? (int)$_GET['id'] : null;
        if (empty($value)) {
            $err_mes = 'Вам нужно выбрать оценку!';
        }
        if (!empty($value) && !empty($user_id)) {
            $ratingModel = new MainsModels();
            $result_add = $ratingModel->addToRating($value, $user_id);
        }

        $ratingModel = new MainsModels();
        $count_users = $ratingModel->get_count_game();

        $rating_users = $ratingModel->getRating();

        // Объеденим массив игроков с оценкой рейтинга и кол-во проголосовавших
        $products = array();
        foreach ($rating_users as $row) {
            $rating = $ratingModel->get_rating($row['id']);
            $count_rating = count($ratingModel->get_all_array_rating($row['id']));
            $width = $rating * 40;
            $products[] = array(
                'rating_users' => $row, 'count_rating' => $count_rating, 'width' => $width
            );
        }
 
        $this->render('main', [
            'error_message' => $error_message,
            'err_mes'=> $err_mes,
            'count_users' => $count_users,
            'products' => $products
        ]);
    }

    // public function actionAdd()
    // {
    // //     // $value = !empty($_POST['ochenka']) ? (int)$_POST['ochenka'] : null;
    // //     // $user_id = !empty($_GET['id']) ? (int)$_GET['id'] : null;
    // //     // var_dump($value);
    //     if(isset($_POST['ochenka'])) {
    //         $ochenka = $_POST['ochenka'];
    //         // Дальнейшая обработка выбранного значения цвета
    //         // ...
    //         echo "Выбранная цифра: " . $ochenka;
    //     }
    // }
}
