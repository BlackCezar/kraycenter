<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="../assets/fonts/fonts.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="logo"><img src="../assets/img/logo_white.png" alt=""></div>
            <div class="header_block">
                <div class="phone"><img class="icon" src="../assets/img/phone.svg">+7 (391) 2-222-222</div>
                <?php 
                    if (isset($_SESSION['token'])) {
                        echo "<button class='btn home'>Личный кабинет</button>";
                    } else echo "<button class='btn auth'>Войти в личный кабинет</button>";
                ?>
                <div class="flex">
                    <button class='btn qust'>Задать вопрос</button>
                    <button class='btn uslug'>Заказать услугу</button>
                </div>

            </div>
        </div>
    </header>
    <nav>
        <div class="burger">
            <i class="fa fa-bars" aria-hidden="true"></i>
            <i class="fa fa-times" aria-hidden="true"></i>
        </div>
            <ul class="container">
                <li class="link_to_submenu"><a href="/">Главная <i class="fa fa-angle-down"></i></a>
                    <ul class="submenu">
                        <li><a href="/about.php">Об организации</a></li>
                    </ul>
                </li>
                <li class="link_to_submenu"><a>Сфера юридических услуг <i class="fa fa-angle-down"></i></a>
                    <ul class="submenu">
                        <li><a href="/pleader.php">Реестр адвокатов</a></li>
                        <li><a href="/pleader_org.php">Реестр адвокатских образований</a></li>
                        <li><a href="/lawyers.php">Юристы</a></li>
                    </ul>
                </li>
                <li><a href="/medical.php">Сфера медицинских услуг</a></li>
                <li><a href="/obrazovanie.php">Сфера образовательных услуг</a></li>
                <li><a href="/rayting.php">Рейтинг</a></li>
                <?php 
                    if (isset($_SESSION['token'])) {
                        echo "<li><a href='/logout.php'>Выйти</a></li>";
                    }
                ?>
            </ul>
        
    </nav>

    <script>
        for (link of document.querySelectorAll('.link_to_submenu')) {
            link.onclick = function () {
                this.children[1].classList.toggle('show');
            } 
        }
        document.querySelector('.burger').onclick = function () { 
            this.classList.toggle('close');
            console.log(this);
            this.nextElementSibling.classList.toggle('display');
        }
        if (document.querySelector('.uslug')) document.querySelector('.uslug').onclick = () => { window.location = 'book_service.php' }
        if (document.querySelector('.qust')) document.querySelector('.qust').onclick = () => { window.location = 'book.php' }
        if (document.querySelector('.home')) document.querySelector('.home').onclick = () => { window.location = 'cabinet.php' }
        if (document.querySelector('.auth')) document.querySelector('.auth').onclick = () => { window.location = 'auth.php' }
   </script>