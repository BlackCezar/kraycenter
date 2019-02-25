<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="assets/css/auth.css">

<form name="auth">

<h2>Введите ваши данные для регистрации</h2>

    <div class="label">Ваш логин</div>
    <input type="text" name="email">
    <div class="label">Ваш пароль</div>
    <input type="password" name="pass">

    <div class="error"></div>
    <button class="auth_btn btn">Войти</button>
</form>

<script>
    document.querySelector('.auth_btn').onclick = function(ev) {
        ev.preventDefault();
        
        let windowEl = document.forms.auth;

        let form = new FormData(windowEl);

        let xhr = new XMLHttpRequest();
        xhr.open('POST', '/assets/php/reg.php', true);
        xhr.send(form);
        xhr.onload = function() {
            if (this.responseText == "OK") {
                document.querySelector('.error').innerText = "Успешно"
            } else {
                document.querySelector('.error').innerText = "Возникла какая-то ошибка"
            }
            console.log(this.responseText);
        }

    }

</script>
<?php include('includes/footer.php'); ?>