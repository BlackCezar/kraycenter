<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="assets/css/book.css">

<main>
    <div class="main_block">
        <h1>Задайте вопрос юристам и адвокатам</h1>

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
        <h2>Ваш вопрос:</h2>
        <div class="row">
            <label>Выберите категорию: <select name="categories">
                <?php
                    include_once('assets/php/connect.php');
                        
                    $result = $pdo->query('SELECT * FROM `categories`');
                    $resultf = $result->fetchAll();
                    if ($resultf) {
                        $optgroups = [];
                        $elems = [];
                        $subs = [];
                        foreach ($resultf as $row) {
                            if (isset($row['parent_id'])) {
                                if (empty(findEl($optgroups, $row, false))) {
                                    array_push($optgroups, findEl($resultf, $row, false));
                                }
                                array_push($subs, $row);
                            }
                        }
                        foreach ($resultf as $row) {
                            if (empty($row['parent_id'])) {
                                if (empty(findEl($optgroups, $row, true))) {
                                    array_push($elems, $row);
                                }
                            }
                        }
    
                        foreach ($optgroups as $row) {
                            echo "<optgroup label='$row[name]'>";
                            echo "<option value='$row[id]'>$row[name]</option>";
                            foreach ($subs as $sub) {
                                if ($sub['parent_id'] == $row['id']) {
                                    echo "<option value='$sub[id]'>$sub[name] </option>";                        
                                }
                            }
                            echo "</optgroup>";
                        }
                        foreach ($elems as $el) {
                            echo "<option value='$el[id]'>$el[name]</option>";                        
                        }
                    }
    
                    function findEl($mas, $el, $notChild) {
                        if ($notChild) {
                            foreach($mas as $submas) {
                                if ($submas['id'] == $el['id']) {
                                    return $submas;
                                }
                            }
                        } else {
                            foreach ($mas as $submas) {
                                if ($submas['id'] == $el['parent_id']) {
                                    return $submas;
                                }
                            }
                        }
                    }
                ?>
            </select></label>
            <label>Заголовок вопроса*: <input type="text" placeholder="Короткое название" name="title"></label>
        </div>
        <label>Текст вопроса*: <textarea name="text"cols="30" rows="10" placeholder="Напишите о своей проблеме"></textarea></label>
        <label>Прилагаемые документы \ изображения: <input type="file" name="files"></label>
        <div class="devline"></div>
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
        <h2>Выберите тип консультации:</h2>
        <div class="cont_els">
            <div class="cont_el">
                <div class="cont_header">
                    <label>
                        <input type="radio" class="input_radio radio" name="type">
                        <span>ПЛАТНАЯ</span>
                    </label>
                    <div class="flex">
                        <span>ОТ </span><div class="price">
                             300
                        </div><span> РУБ.</span>
                    </div>
                </div>
                <ul class="cont_ul">
                    <li>
                        <div class="icon"><i class="fa fa-check"></i></div>
                        <span>Суперская услуга</span>
                    </li>
                    <li>
                        <div class="icon"><i class="fa fa-check"></i></div>
                        <span>Суперская услуга</span>
                    </li>
                    <li>
                        <div class="icon"><i class="fa fa-check"></i></div>
                        <span>Суперская услуга</span>
                    </li>
                    <li>
                        <div class="icon"><i class="fa fa-check"></i></div>
                        <span>Суперская услуга</span>
                    </li>
                </ul>
            </div>
            <div class="cont_el">
                <div class="cont_header free">
                    <label>
                        <input type="radio" class="input_radio radio" name="type">
                        <span>БЕСПЛАТНАЯ</span>
                    </label>
                    <div class="flex">
                        <span>ОТ </span><div class="price">
                             300
                        </div><span> РУБ.</span>
                    </div>
                </div>
                <ul class="cont_ul">
                    <li>
                        <div class="icon"><i class="fa fa-check"></i></div>
                        <span>Суперская услуга</span>
                    </li>
                    <li>
                        <div class="icon"><i class="fa fa-check"></i></div>
                        <span>Суперская услуга</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="opacity">
            <h3>УСТАНОВИТЕ ДЕНЕЖНОЕ ВОЗНАГРАЖДЕНИЕ ДЛЯ СВОЕГО ВОПРОСА:</h3>
            <div class="row">
                <div class="range_filed">
                    <input type="range" oninput="rechenge(this)" class="range" min="300" max="3000">
                    <div class="sub-range"><b>300р</b> <br> Легкий вопрос</div>
                    <div class="sub-range"><b>3000р</b> <br> Сложный вопрос</div>
                </div>
    
                <div class="filed">
                    <input type="number" class="pay" name="pay" id="">
                    <div class="subrub">руб.</div>
                    <div class="subtitle">
                    Выберите на шкале, либо впишите необходимую сумму
                    </div>
                </div>
            </div>
        </div>
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
            <button id="goPay" class="btn">Перейти к оплате</button>
        </div>
    </div>
</main>

<script src="/assets/js/book.js"></script>

<?php include('includes/footer.php'); ?>