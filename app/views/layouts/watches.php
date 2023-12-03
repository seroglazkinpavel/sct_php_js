<?php
use app\lib\UserOperations;
/** @var array $content */
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	
    <title><?= $this->title;?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />	
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <link rel="stylesheet" href="/app/web/css/style.css">
</head>
<body>
<div class="wrap">
    <div class="container">
    <header class="header">
        <div class="header_menu">
            <div class="header_section">
                <a href="/"><img src="/app/web/images/logo.png"></a>
            </div>
			
            <div class="header_section">
                <div class="header_item headerButton images"><img src="/app/web/images/entrance.png"></div>
				<?php if (empty($_SESSION['user'])) :?>
					<div class="header_item headerButton"><a href="/user/login">Вход\</a><a href="/user/registration">регистрация</a></div>
					<?php else : ?><span style="margin-left:10px;"><a href="/user/profile"><b>Привет <?=$_SESSION['user']['login'];?>!</b></a></span>
				<?php endif; ?>
            </div>
        </div>
    </header>
    </div>

    <div class="contents container">
        <?=$content;?>
    </div>
    <footer class="footer">
        <div class="container footer-information">
            <div class="footer_item">
                <div class="line">
                    <p>ПРИСОЕДИНЯЙСЯ К НАМ</p>
                    <hr>
                </div>
                <div class="toils">
                    <div class="touch"><a href="#"><img src="/app/web/images/exposure.png"></a></div>
                    <div class="group"><a href="#"><img src="/app/web/images/vk.png"></a></div>
                </div>
            </div>
        </div>
    </footer>
	<div  class="footer_block">
		<div class="container permission">
			<div class="copyright">	
				<p>© Игры, 2023.</p> 
			</div>
			<div class="copyright">
				<a href="#">Пользовательское соглашение</a>
				<a href="#">Политика конфиденциальности</a>
			</div>	
		</div>
	</div>
    
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="/app/web/js/jquery-3.6.3.min.js"></script>
	<script src="/app/web/js/script.js"></script>

    </div>
</body>
</html>