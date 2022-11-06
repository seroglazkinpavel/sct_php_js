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

    if (surname == '' || name == '' || patronymic == '' || topic == '') {
        errorMessage = 'Заполните все поля.';
    } else if (surname.length <= 1 || surname.length > 40) {
        errorMessage = 'Введите корректную фамилию.';
    } else if (name.length <= 1 || name.length > 40) {
        errorMessage = 'Введите корректное имя.';
    } else if (patronymic.length <= 1 || patronymic.length > 40) {
        errorMessage = 'Введите корректноe. отчество.';
    }

    if (email == "") {
        errorMessage = 'Введите адрес вашей электронной почты';
    } else {
        var regex = /^\S+@\S+\.\S+$/;
        if (regex.test(email) === false) {
            errorMessage = 'Введите действительный адрес электронной почты';
        }
    }

    if (mobile == "") {
        errorMessage = 'Введите номер вашего мобильного телефона';
    } else {
        var regex = /^[1-9]\d{9}$/;
        if (regex.test(mobile) === false) {
            errorMessage = 'Введите действительный 10-значный номер мобильного телефона';
        }
    }
    if (topic == "") {
        errorMessage = 'Введите тему вопроса';
    } else {
        var regex = /^[a-zA-Z\s]+$/;
        if (regex.test(topic) === false) {
            errorMessage = 'Введите правильно тему вопроса';
        }
    }

    if (errorMessage !== '') {
        document.getElementById('error-block').innerHTML = errorMessage;
    } else {
        alert('Данные заполнены корректно');
        window.location = 'http://sct-php-js/';
    }
    return false;
}