<?php include('includes/header.php'); 
    if (isset($_SESSION['token'])) echo "<script>window.location = '/cabinet.php'; exit;</script>";
?>
<link rel="stylesheet" href="assets/css/auth.css">

<form name="auth">

<h2>Введите ваши данные</h2>
<?php print_r($_SESSION['token']) ?>
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
        xhr.open('POST', '/assets/php/auth.php', true);
        xhr.send(form);
        xhr.onload = function() {
            let err = document.querySelector('.error');
            if (this.responseText == 404) {
                err.innerText = 'Не найден пользователь';
            } else if (this.responseText == 403) {
                err.innerText = 'Неверный пароль';
            } else if (this.responseText == 200) {
                window.location = 'cabinet.php';
            } else err.innerText = 'Возника какая-то ошибка';
        }

    }

</script>
<?php include('includes/footer.php'); ?>