<?php


namespace app\models;

use app\core\BaseModel;

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
}
