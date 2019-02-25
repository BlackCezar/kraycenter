<?php include('includes/header.php'); 

?>

<link rel="stylesheet" href="assets/css/pleader.css">
<?php include('includes/window.php'); ?>


<div class="container">
    <div class="sidebar">
        <button class="btn review">Отзыв об адвокате</button>
        <button class="btn complain">Пожаловаться на адвоката</button>
        <button class="btn black-list">Лишенные статуса</button>
    </div>
    <main>
            <?php include('includes/pleader-sidebar.php'); ?>
        

        <div class="main">
            <h2>Реестр адвокатов</h2>
            <div class="search_block">
                <input type="search" placeholder="Поиск адвоката по Ф.И.О. или номеру в реестре" name="" id="search">
                <button class="find">Поиск</button>
            </div>
            <div class="results">
                <table >
                    <thead>
                        <tr>
                            <td>Ф.И.О. Адвоката</td>
                            <td>Регистрационный номер</td>
                            <td>Номер удостоверения</td>
                            <td>Адрес</td>
                            <td>Телефон</td>
                        </tr>
                    </thead>
                    <tbody class="table">
                    <?php 
                       include_once('assets/php/connect.php');
                    
                        $result = $pdo->query('SELECT * FROM advokats ORDER BY name ASC LIMIT 20');
                        $resultf = $result->fetchAll();
                        foreach ($resultf as $row) {
                            print_r('<tr data-id="'.$row[id].'"><td>'.$row[name].'</td><td>'.$row[reg_num].'</td><td>'.$row[num_udostover].'</td><td>'.$row[address].'</td><td>'.$row[phone].'</td></tr>');
                        }
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="disclaymer" hidden>
                <p>*Адвокаты, подозреваемые или обвиняемые в совершении умышленных преступлений; в отношении которых вынесен обвинительный приговор или принято решение о прекращении дела по нереабилитирующим основаниям; в отношении которых имеется информация об умышленном нарушении действующего законодательства; в отношении которых поступили негативные отзывы по конкретным делам; уличённые в нарушении Кодекса профессиональной этики адвоката и (или) привлечённые к дисциплинарной отвественности.</p>
                <p>** Включением конкретных адвокатов в настоящий чёрный список администрация сайта не преследует цели унижения чести и достоинства, подрыва деловой репутации специалиста, а лишь перепечатывает уже находящуюся в открытом доступе информацию, чтобы сделать её более удобной для ознакомления. При этом мы не оцениваем личные и профессиональные качества, квалификацию включённых в чёрный список адвокатов, а само название списка обусловлено исключительно негативным характером имеющейся в открытом доступе информации о привлечении адвокатов к уголовной отвественности и нарушении ими норм действующего законодательства.</p>
                <p>*** В разделе «Черный список адвокатов» отзывы публикуются на основании достоверной информации и при наличии процессуального или иного решения о привлечении адвоката к отвественности. Если вы хотите оставить отзыв об адвокате, но решение компетентного органа в отношении адвоката не принималось, тогда используйте раздел отзывов об адвокатов.</p>
            </div>
        </div>
    </main>
</div>
    <div class="feedback">
        <div class="wrapper">
            <div class="left">
                <h2>Оставьте заявку <br>прямо сейчас</h2>
                <input type="name" class="name" name="name" placeholder="Ваше имя">
                <input type="phone" class="phone" name="phone" placeholder="Ваш номер телефона">
                <textarea class="message" type="message" name="message" placeholder="Ваш вопрос"></textarea>
                <span class="warning">Отправляя данную форму Вы соглашаетесь с политикой конфиденциальности и условиями использования</span>
                <button class="btn">Отправить</button>
            </div>
            <div class="clear"></div>
        </div>
    </div>



    
<script src="/assets/js/pleader.js"></script>

<?php include('includes/footer.php'); ?>