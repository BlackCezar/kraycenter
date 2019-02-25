<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="assets/css/book.css">

<main>
    <div class="main_block">
        <h1>СОЗДАЙТЕ ЗАЯВКУ НА ЮРИДИЧЕСКУЮ УСЛУГУ</h1>

        <p>Добро пожаловать в онлайн сервис юридических консультаций, здесь вы можете получить качественную юридическую помощь
        по любому правовому вопросу, для этого вам нужно заполнить форму добавления вопроса на сайт и дождаться ответа юриста.</p>
    </div>
    <div class="analytic_block">
        <div class="analytic_el">
            <div class="analytic_logo"><i class="fa fa-address-book"></i></div>
            <div class="h2">Какое-то достижение</div>
            <p class="analytic_desc">Ну и описание самого достижения</p>
        </div> 
        <div class="analytic_el">
            <div class="analytic_logo"><i class="fa fa-address-book"></i></div>
            <div class="h2">Какое-то достижение</div>
            <p class="analytic_desc">Ну и описание самого достижения</p>
        </div> 
        <div class="analytic_el">
            <div class="analytic_logo"><i class="fa fa-address-book"></i></div>
            <div class="h2">Какое-то достижение</div>
            <p class="analytic_desc">Ну и описание самого достижения</p>
        </div> 
        <div class="analytic_el">
            <div class="analytic_logo"><i class="fa fa-address-book"></i></div>
            <div class="h2">Какое-то достижение</div>
            <p class="analytic_desc">Ну и описание самого достижения</p>
        </div> 
    </div>
        <div class="devline"></div>
    <div class="form_block">
        <h2>ВАША ЗАЯВКА:</h2>
        <div class="row">
            <label>Выберите категорию: <select name="categories">
                <?php
                    include_once('assets/php/connect.php');
                        
                    $result = $pdo->query('SELECT * FROM `categories`');
                    $resultf = $result->fetchAll();
                    
                ?>
            </select></label>
            <label>Выберите услугу: <div class="row"><select name="service">
                <?php
                    include_once('assets/php/connect.php');
                        
                    $result = $pdo->query('SELECT * FROM `categories`');
                    $resultf = $result->fetchAll();
                    
                ?>
            </select><button type="search" class="subcat"><i class="fa fa-search" aria-hidden="true"></i></button></div></label>
        </div>
        <label>Название заявки: <input type="text" name="title"></label>
        <label>Текст заявки: <textarea name="text"cols="30" rows="10" placeholder="Напишите о своей проблеме"></textarea></label>
        <label>Прилагаемые документы \ изображения: <input type="file" name="files" ></label>
        <div class="devline"></div>
        <h2>СУММА КОТОРУЮ ВЫ ПЛАНИРУЕТЕ ПОТРАТИТЬ НА УСЛУГУ:</h2>
        <label for="gonorar">Оплата / гонорар</label>
        <div class="row">
            <input type="number" id="gonorar">
            <label class="dogovor_form_lab">
                <input type="checkbox" class="input_radio dogovor_form">
                <span class="mgn-l-10">По договоренности</span>
            </label>
        </div>

        <?php 
            if (isset($_SESSION['token'])) {     
                    $result = $pdo->query("SELECT * FROM `users` WHERE `email`=\'$_SESSION[email]\'");
                    $resultf = $result->fetchAll();
                ?>
                <input type="text" name="city" value="<?php print($resultf['city']); ?>">
                <input type="text" name="name" value="<?php print($resultf['name']); ?>">
                <input type="email" name="email" value="<?php print($resultf['email']); ?>">
            <?php } else { ?>
                <h2>Ваши данные</h2>
                <div class="row mar">
                    <label>Город: <input type="text" name="city"></label>
                    <label>Имя: <input type="text" name="name"></label>
                </div>
                <div class="row mar">
                    <label>Почта: <input type="email" name="email"></label>
                    <label>Уже имеете аккаунт? <button class="btn">Войти</button></label>

                </div>

           <? }
        ?>
        <div class="devline"></div>
        <h2>ДОПОЛНИТЕЛЬНЫЕ ОПЦИИ К ВОПРОСУ:</h2>
        <div class="options">
            <div class="cont_el">
                <div class="cont_header">
                    <label for="fast_qust">
                        <input type="checkbox" id="fast_qust" class="input_radio option" name="options[]">
                        <span>СРОЧНЫЙ ВОПРОС</span>
                    </label>
                    <div class="flex">
                        <span></span><div class="price">
                            200
                        </div><span> РУБ.</span>
                    </div>
                </div>
                        <div class="desc">
                        Гарантия ответа в течение 3-х часов (в будние дни с 10.00 до 19.00 МСК). Опция доступна для платного типа вопроса. Гарантия ответа в течение 3-х часов в будние дни с 10.00 до 19.00 ч. МСК.
                        </div>
            </div>
        </div>
        <div class="devline"></div>
        <div class="row">
            <h2>ИТОГО: <span class="end"></span> РУБ.</h2>
            <label class="agree_fld" for="agree">
                <input type="checkbox" class="input_radio ag" name="agree" id="agree">
                Я принимаю условия пользовательского соглашения
            </label>
            <button class="btn" id="goPay">Перейти к оплате</button>
        </div>
    </div>
</main>

<script src="/assets/js/book_service.js"></script>

<?php include('includes/footer.php'); ?>