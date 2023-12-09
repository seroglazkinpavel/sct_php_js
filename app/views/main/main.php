<?php
/** @var array $products - массив с информацикй о игроках */
/** @var integer $count_users - Количество элементов в массиве*/
?>

<div class="page">
    <div class="auth_block">
        <div class="rule_of_game">
            <p class="rule_of_game_p">На сайте имеется игра кликер. Для того,чтобы попасть на игру, нужно зарегестрироваться/автрризоваться.
            В вашем акаунте есть меню с позицией "игра". По нажатию попадаем на игру.  
            На экране в случайном месте появляется яблоко. 
            Кликнув по яблоку мышкой, игрок получает +1 очко, и оно перемещается в новое случайное место. 
            У игрока есть 20 секунд, чтобы успеть набрать наибольшее количество очков.
            </p>
        </div>
        <h1 class="titleLogin">Авторизация</h1>
        <form name="auth_form" method="post">
            <div class="auth_form">
                <div class="alert alert-danger <? if (empty($error_message)) : ?>hidden<?php endif; ?>">
                    <? if (!empty($error_message)) : ?>
                        <?= $error_message ?>
                    <?php endif; ?>
                </div>
                <div class="input_box">
                    <label for="field_login">Логин</label>
                    <input type="text"
                           name="login"
                           id="field_login"
                           class="form-control"
                           maxlength="24"
                           value="<?= !empty($_POST['login']) ? $_POST['login'] : '' ?>"
                           placeholder="Введите логин"
                    >
                </div>
                <div class="input_box">
                    <label for="field_password">Пароль</label>
                    <input type="password"
                           name="password"
                           id="field_password"
                           class="form-control"
                           maxlength="24"
                           value=""
                           placeholder="Введите пароль"
                    >
                </div>
                <div class="button_box">
                    <button type="submit"
                            name="btn_login_form"
                            id="btnLoginForm"
                            class="btn btn-primary"
                            value="1"
                    >Войти
                    </button>
                </div>
                <div class="links_box">
                    <a href="/user/registration">Регистрация</a>
                </div>
            </div>
        </form>
    </div>
    <div class="rating">
        <h2 class="title_rating">Игру прошли <?=$count_users;?> игроков</h2>
        <? if (!empty($err_mes) && isset($_POST['add_rating'])) : ?>
            <p style="font-size: 20px;color: red;margin: 0 auto 10px;text-align:center;">
                <?= $err_mes; ?>
            </p>
            
        <?php endif; ?>
        <ul class="rating_ul">
            <?php for ($i = 0; $i < count($products); $i++): ?>
                <li>
                    <div class="div_li_rating">
                        <?=$products[$i]['rating_users']['login']; ?>
                    </div>
                    <div class="div_li_rating right_div">
                        <div class="stars">
                            <p>Средняя оценка  <?=$products[$i]['rating_users']['value'];?> проголосовало <?=$products[$i]['count_rating'];?></p>
                            <div class="point">
                                <div id="point" style="width: <?=$products[$i]['width']?>px;"></div>
                            </div>
                        </div>
                        <form action="/main/index?id=<?=$products[$i]['rating_users']['id']; ?>" method="post" class="rating_form">
                            <p>Кол-во баллов: <?=$products[$i]['rating_users']['qty'];?></p>
                            <label>Оценка</label>
                            <select name="ochenka" class="ochenka">
                                <option value=""></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <button type="submit" name="add_rating">Оценить</button>
                        </form>
                    </div>
                </li>
                
            <?php endfor; ?>
        </li>
    </div>
</div>
