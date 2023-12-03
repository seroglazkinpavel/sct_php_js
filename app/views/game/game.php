
<div class="wraper">
	<div class="counter">
		Количество очков: <span id="counter">0</span>
	</div>
	<a data-id="<?=$_SESSION['user']['id'];?>" href="cart/add?id=<?=$_SESSION['user']['id'];?>" title="Click me" id="link">
		<img data-id="<?=$_SESSION['user']['id'];?>" src="/app/web/images/apple.png" alt="Click me" id="apple">
	</a>
</div><?php unset($_SESSION['qty']);
