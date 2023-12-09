<?php


namespace app\models;

use app\core\BaseModel;
use app\models\GameModel;


class MainsModels extends BaseModel
{
    /**
     * Добавление значения пользователей
     *
     * @param integer $value - значение пользователя
     * @param integer $user_id - id пользователя
     * @var array $result
     */
    public function addToRating($value, $user_id)
    {
        $rating_id = $this->insert(
            'INSERT INTO `rating` (`value`, `user_id`) VALUES (:value, :user_id)',
            [
                'value' => $value,
                'user_id' => $user_id
            ]
        );
        return $rating_id;
    }
    
    /**
     * Метод по выводу всех значений пользователей
     *
     * @return array $result
     */
    public function getListRating()
    {
        $result = null;

        $ratings = $this->select("SELECT `id`, `user_id`, `value` FROM `rating`");
        if (!empty($ratings)) {
            $result = $ratings;
        }
        return $result;
    }

    /**
     * Метод по выводу всех участников игр
     *
     * @return integer $result
     */
    public function get_count_game()
    {
        $result = null;

        $ratings = $this->select("SELECT COUNT(*) FROM `game`");
        if (!empty($ratings)) {
            $result = $ratings[0];

        }
        return (int)$result["COUNT(*)"];
    }

    /**
     * Метод по выводу рейтинга  пользователей
     *
     * @return array $result
     */
    public function getRating()
    {
        $gameModel = new GameModel();
        $arr_players = $gameModel->get_list_users();//Массив по выводу всех игроков

        for($i = 0; $i < count($arr_players); $i++){
            $arr_players[$i]['value'] = $this->get_rating($arr_players[$i]['id']);
        }

        usort($arr_players, array($this, "cmp"));

        // echo "<pre>";
        //     print_r($arr_players);
        // echo "</pre>";die;
        // die;
        return $arr_players;
    }

    /**
     * Сортировка
     */ 
    public function cmp($a, $b) {
        if ($a['value'] == $b['value']) {
            return 0;
        }
        return ($a['value'] > $b['value']) ? -1 : 1;
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
