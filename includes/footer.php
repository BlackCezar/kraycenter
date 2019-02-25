<div class="footer_line"></div>
<footer>
    <div class="col">
        <img src="../assets/img/logo_white.png" alt="footer">
        <div class="footer_links">
            <a class="footer_link" href="">Условия использования</a>
            <a class="footer_link" href="">Политика конфиденциальности</a>
        </div>
        <div class="footer_about">
        © 2018, Краевой центр по защите общественной безопасности и здоровья населения
        </div>
    </div>
    <div class="col">
        <a class="footer_link home" href="/">Главная</a>
        <a class="footer_link " href="/about.php">Об организации</a>
        <a class="footer_link " href="/pleader.php">Реестр адвокатов</a>
        <a class="footer_link " href="/pleader_org.php">Реестр адвокатских образований</a>
        <a class="footer_link " href="/lawyers.php">Юристы</a>
        <a class="footer_link " href="/medical.php">Сфера медицинских услуг</a>
        <a class="footer_link " href="/obrazovanie.php">Сфера образовательных услуг</a>
        <a class="footer_link " href="/rayting.php">Рейтинг</a>
        <?php 
            if (isset($_SESSION['token'])) {
                echo "<a class='footer_link ' href='/logout.php'>Выйти</a></li>";
            } else echo "<a  class='footer_link ' href='/cabinet.php'>Личный кабинет</a>";
        ?>
      
    </div>
    <div class="col">
        <div class="phone footer_phone"><img class="icon" src="../assets/img/phone.svg"> +7 (391) 2-222-222</div>
    </div>
</footer>