const link = document.getElementById("apple");
let count = 0;
$("#apple").on('click', function(e) {
	e.preventDefault();
	count++;
	$("#counter").html(count);				
});
/*$("#apple").on('click', function(e) {
	e.preventDefault();
	count++; 
    var ajax = $.ajax({
		method : 'post',
		url : '/user/game',
		data : { count : count },
		success: function(res){
            //$("#counter").html(res);
			console.log(res); 
        },
        error: function(){
            alert('Ошибка! Попробуйте позже');
        }
    });

 });*/
function handleMouseClickRandom(event) {
	event.target.style.top = Math.random()*50 + 'px';
	event.target.style.left = Math.random()*1000 + 'px';
}
let timerId = setInterval(function(){
	link.addEventListener('click', handleMouseClickRandom);
},40);

setTimeout(() => {
	clearInterval(timerId)
	// Убираем обработчик события
	
	link.removeEventListener('click', handleMouseClickRandom);
	link.remove();
	const pEl = document.createElement('p');
	pEl.className = "result";
	pEl.style.cssText = 'color: #69686a;font-family: "Open Sans", sans-serif;font-weight: 700;font-size: 24px;'
	pEl.innerHTML = "Игра закончена!"
	document.querySelector(".wraper").append(pEl);
}, 20000); 

/*В комментариях я попытался отправить на сервер очки, полученные пользователем, с помощью ajax, но не получается. В чем ошибка.
Запрос отправляю по адресу url : '/user/game'
Игра такая:
На экране в случайном месте появляется яблоко.
Кликнув по яблоку мышкой, игрок получает +1 очко, а оно перемещается в новое случайное место.
У игрока есть 20 секунд(например) чтобы успеть набрать наибольшее количество очков.
*/  