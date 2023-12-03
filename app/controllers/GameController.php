<?php

namespace app\controllers;

use app\core\InitController;
use app\lib\UserOperations;
use app\models\GameModel;

class GameController extends InitController
{
    /**
     * Вывод контроль доступа
     *
     * @return array
     */
    public function behaviors()
    {
        return [
            'access' => [
                'rules' => [
					[
                        'actions' => ['game'],
                        'roles' => [UserOperations::RoleUser, UserOperations::RoleAdmin],
                        'matchCallback' => function () {
                            $this->redirect('/game/game');
                        }
                    ]
                ]
            ]
        ];
    }
    /**
     * Вывод страницы игра
     */
    public function actionPlay() {
        $this->view->title = 'Игра';
 
        $this->render('game', [
            'role' => UserOperations::getRoleUser(),
        ]);
    }

    /**
     * Вывод страницы 
     */
    public function actionAdd() {
        $this->view->title = 'Игра';
	    // if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	    // 	$user_id = !empty($_GET['id']) ? (int)$_GET['id'] : null;
	    // 	$qty = !empty($_GET['qty']) ? (int)$_GET['qty'] : null;
	    // }
        // if ($user_id) {
        //     $user = $_SESSION['user'];
        //     if (!$user) {
        //         return false;
        //     }
        // }
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['count']) && (int)$_POST['count'] === 1) {
            $user_id = !empty($_SESSION['user']['id']) ? (int)$_SESSION['user']['id'] : null;
            $qty = !empty($_POST['count']) ? (int)$_POST['count'] : null;
        }
        $_SESSION['qty'] = isset($_SESSION['qty']) ? $_SESSION['qty'] + $qty : $qty;
        echo json_encode($_SESSION['qty']);

        $gameModel = new GameModel();
        $result_add = $gameModel->addToGame($user_id, $_SESSION['qty']);
        //$data = (int)$gameModel->getUserById($user_id);
        // var_dump($data);die;

        //     $this->render('add', [
        //         'role' => UserOperations::getRoleUser(),
        // 		/*'count' => $count*/
        //     ]);

    }
}