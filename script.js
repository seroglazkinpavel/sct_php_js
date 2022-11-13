document.getElementById('main-form').addEventListener('submit', checkForm);

function checkForm(event) {
    event.preventDefault();
    var form = document.getElementById('main-form');

    var surname = form.surname.value;
    var name = form.name.value;
    var patronymic = form.patronymic.value;
    var email = form.email.value;
    var mobile = form.mobile.value;
    var topic = form.topic.value;
    var desc = form.desc.value;

    var errorMessage = '';

    if (surname == '') {
        errorMessage = 'Введите вашу фамилию';
    } else if (surname.length <= 1 || surname.length > 40) {
        errorMessage = 'Введите правильную фамилию';
    } else if (name == '') {
        errorMessage = 'Введите ваше имя';
    } else if (name.length <= 1 || name.length > 40) {
        errorMessage = 'Введите корректное имя.';
    } else if (patronymic == '') {
        errorMessage = 'Введите ваше отчество';
    } else if (patronymic.length <= 1 || patronymic.length > 40) {
        errorMessage = 'Введите корректное отчество.';
    } else if (email == "") {
        errorMessage = 'Введите адрес вашей электронной почты';
    } else if (/^\S+@\S+\.\S+$/.test(email) === false) {
        errorMessage = 'Введите действительный адрес электронной почты';
    } else if (mobile == "") {
        errorMessage = 'Введите номер вашего мобильного телефона';
    } else if (/^[1-9]\d{9}$/.test(mobile) === false) {
        errorMessage = 'Введите действительный 10-значный номер мобильного телефона';
    } else if (topic == "") {
        errorMessage = 'Введите тему вопроса';
    } else if (/^[a-zA-Z\s]+$/.test(topic) === false) {
        errorMessage = 'Введите правильно тему вопроса';
    }

    if (errorMessage !== '') {
        document.getElementById('error-block').innerHTML = errorMessage;
    } else {
        alert('Данные заполнены корректно');
        window.location = 'http://sct-php-js/';
    }
    return false;
}