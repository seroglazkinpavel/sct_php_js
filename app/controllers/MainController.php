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
        $userModel = new GameModel();
        $users = $userModel->get_list_users(); // массив пользователей кто играл
        // foreach($users as $row){
        //     echo "<pre>";
        //        print_r($row);
        //     echo "</pre>";
        // }die;

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
 
        // Объеденим массив игроков с оценкой рейтинга и кол-во проголосовавших
        $products = array();
        foreach ($users as $row) {
            $rating = $this->get_rating($row['id']);
            $count_rating = count($this->get_all_array_rating($row['id']));
            $width = $rating * 40;
            $products[] = array(
                'user' => $row, 'rating' => $rating, 'count_rating' => $count_rating, 'width' => $width);
        }
        // foreach($products as $row){
        //     echo "<pre>";
        //        print_r($row);
        //     echo "</pre>";
        // }die;
        // $products_usort = usort($products, "cmp");
        // var_dump($products_usort);die;
        // $top_products = array_reverse($products_usort);

        $this->render('main', [
            'error_message' => $error_message,
            'err_mes'=> $err_mes,
            'count_users' => $count_users,
            'products' => $products
        ]);
    }

    /**
     * Метод для сортировки
     */
    public function cmp($a, $b) {
        return strnatcmp($a['rating'], $b['rating']);
    }

    /**
     * Метод по выводу среднего значения
     * 
     * @param integer $id - $user_id пользователя
     * @return float - среднее число
     */
    public function get_rating($id) {
        $all_ratings = $this->get_all_array_rating($id);
        //Рассчет среднего балла
        if (!empty($all_ratings)) {
            //Сумма всех наших оценок
            $total_rating = 0;
            for($i = 0; $i < count($all_ratings); $i++){
                $total_rating += $all_ratings[$i]['value'];
            }
            return round($total_rating / count($all_ratings), 1);
        } else return 0;
    }

    public function get_all_array_rating($id) {
        //Подгрузим все наши оценки
        $ratingModel = new MainsModels();
        $ratings = $ratingModel->getListRating();

        //Массив со всеми оценками
        $all_ratings = array();

        //Отфильтруем оценки
        foreach ($ratings as $row) {
            if ($row['user_id'] == $id) {
                $all_ratings[] = $row;
            }
        }
        return $all_ratings;
    }
}
