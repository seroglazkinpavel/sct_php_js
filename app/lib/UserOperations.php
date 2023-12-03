<?php


namespace app\lib;


class UserOperations
{
    const RoleGuest = 'guest';
    const RoleAdmin = 'admin';
    const RoleUser = 'user';

    /**
     * Выдает роль пользователя
     *
     * @return  string $result - роль пользователя
     */
    public static function getRoleUser()
    {
        $result = self::RoleGuest;
        if (isset($_SESSION['user']['id']) && $_SESSION['user']['is_admin']) {
            $result = self::RoleAdmin;
        } elseif (isset($_SESSION['user']['id'])) {
            $result = self::RoleUser;
        }
        return $result;
    }

    /**
     * Создает ссылки для меню в виде массива
     *
     * @return array $list
     */
    public static function getMenuLinks()
    {
        $role = self::getRoleUser();
        $list[] = [
            'title' => 'Мой профиль',
            'link' => '/user/profile'
        ];
		if ($role === self::RoleUser) {
			$list[] = [
				'title' => 'Игра',
				'link' => '/game/play'
			];
		}
		if ($role === self::RoleAdmin) {
			$list[] = [
				'title' => 'Игра',
				'link' => '/game/play'
			];
		}
        if ($role === self::RoleAdmin) {
            $list[] = [
                'title' => 'Пользователи',
                'link' => '/user/users'
            ];
        }

        $list[] = [
            'title' => 'Выход',
            'link' => '/user/logout'
        ];

        return $list;
    }

}
