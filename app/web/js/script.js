const link = document.getElementById("apple");
let count = 0;
let counter = $("#counter");
$("#apple").on('click', function(e) {
	e.preventDefault();
	//count++;
	//$("#counter").html(count);
	let ajax = $.ajax({
		method : 'post',
		url : '/game/add',
		dataType : 'text',
		data : {"count": 1}
	});	
	ajax.done(function(data){
		data = JSON.parse(data);
		counter.html(parseInt(data));
	});				
});
/*$("#apple").on('click', function(e) {
	e.preventDefault();
	var id = $(this).data('id'),
		qty = $("#counter").val() ? $("#counter").val() : 0;
        $.ajax({
		method : 'GET',
		url : '/game/add',
		data : {"id": id, "qty": qty},
		success: function(data){
			//showQame(data);
			//count = JSON.parse(data);
			$("#counter").html(data);
			console.log(data);
        },
        error: function(){
            alert('Ошибка! Попробуйте позже');
        }
    });
 });*/
// function showQame(res) {
// 	console.log(res);
// }

function handleMouseClickRandom(event) {
	event.target.style.top = Math.random()*50 + 'px';
	event.target.style.left = Math.random()*1000 + 'px';
}
let timerId = setInterval(function(){
	let linkAdd = link.addEventListener('click', handleMouseClickRandom);
},40);

setTimeout(() => {
	clearInterval(timerId)
	// Убираем обработчик события
	link.removeEventListener('click', handleMouseClickRandom);
	link.remove();
	
	link.removeEventListener('click', handleMouseClickRandom);
	link.remove();
	
	const pEl = document.createElement('p');
	pEl.className = "result";
	pEl.style.cssText = 'color: #69686a;font-family: "Open Sans", sans-serif;font-weight: 700;font-size: 24px;'
	pEl.innerHTML = "Игра закончена!"
	document.querySelector(".wraper").append(pEl);
}, 20000); 

// $( document ).ready(function() {
// 	$(".rating_form").submit( function (event) {
// 		event.preventDefault(); // Отменяем стандартное поведение формы
	 
// 		// Получаем данные из полей формы
		
// 		var selectedOchenka = $('.ochenka').val();
// 		console.log(6);
// 		// Отправляем данные на сервер с помощью AJAX
// 		$.ajax({
// 		  url: "/main/add", // Здесь указываем URL-адрес серверного обработчика ?id=<?=$products[$i]['user']['id']; ?>
// 		  type: "post",
// 		  data: { ochenka: selectedOchenka },
// 		  success: function (response) {
// 			// Обработка успешной отправки данных
// 			console.log(response);
// 		  },
// 		  error: function (error) {
// 			// Обработка ошибок при отправке данных
// 			console.error("Ошибка при отправке данных: ", error);
// 		  },
// 		});
// 	  });
// });