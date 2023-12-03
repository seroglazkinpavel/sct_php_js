<?php


namespace app\models;

use app\core\BaseModel;

class GameModel extends BaseModel
{
    /**
     * Добавление игры
     *
     * @param integer $user_id - пользователь
     * @param integer $qty - количество очков
     * @var array $result
     */
    public function addToGame($user_id, $qty)
    {
        $result = false;
        //$error_message = '';

        $game = $this->selectOne(
            "SELECT * FROM `game` WHERE `user_id` =:user_id",
            [
                'user_id' => $user_id
            ]
        );
        $result = $game;

        if (!empty($result)) {
            $result = $this->edit($user_id, $qty);
        } else {
            $result = $this->addNewUser($user_id, $qty);
        }
        return $result;
    }
    /**
     * Редактирования игры
     *
     * @param integer $user_id - id пользователя
     * @param array $qty - копичество очков
     * @return array
     */
    public function edit($user_id, $qty)
    {
        $result = false;

        $game = $this->update(
            'UPDATE `game` SET `qty`=:qty WHERE `user_id`=:user_id',
            [
                'qty' => $qty,
                'user_id' => $user_id
            ]
        );
        return $game;
    }
    /**
     * Регистрация игры
     *
     * @param integer $qty - количество очков
     * @return integer $user_id - id подьзователя
     */
    public function addNewUser($user_id, $qty)
    { 
        $game = $this->insert(
           
            'INSERT INTO `game` (`user_id`, `qty`) VALUES (:user_id, :qty)',
            [
                'user_id' => $user_id,
                'qty' => $qty,
            ]
        );
        return $game;
    }

    /**
     * Выбор игры по user_id
     *
     * @aram integer $user_id - id выбранного пользователя
     * @return array $result
     */
    public function getUserById($user_id)
    {
        $result = null;

        $qty = $this->select(
            "SELECT qty FROM `game` WHERE `user_id`=:user_id",
            [
                'user_id' => $user_id
            ]
        );

        if (!empty($user_id)) {
            $result = $qty;
        }
        return $result;
    }

    /**
     * Метод по выводу всех игроков
     *
     * @return array $result
     */
    public function get_list_users()
    {
        $result = null;

        $users = $this->select("SELECT game.qty, users.login, users.id FROM game JOIN users ON game.user_id = users.id");
        if (!empty($users)) {
            $result = $users;
        }
        return $result;
    }
}