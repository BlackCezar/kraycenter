<?php include('includes/header.php'); 
    include_once('assets/php/connect.php');
    if (!isset($_SESSION['token'])) echo "<script>window.location = '/auth.php'; exit;</script>";
?>
<link rel="stylesheet" href="assets/css/cabinet.css">
<div class="conteiner">
    <div class="sidebar">
        <div class="feedback-block">
            <button class="feedback-btn btn">Все заявки</button>
        </div>
        <div class="calls-block">
            <button class="calls-btn btn">Все звонки</button>
        </div>
    </div>
    <main>
        <div class="calls">
            <h2>Звонки для консультации</h2>
            <div class="call call-dis">
                <div class="call-header">
                    <img src="assets/img/g663.png" class="call-active" alt="">
                </div>
                <div class="call-body">
                    <div class="call-name">На данный момент звонков нет</div>
                </div>
            </div>
          
        </div>
        <div class="last-feedback">
            <h2>Последние заявки</h2>
            <div class="last-feedbacks">
                    

                    <?php 
                       include_once('assets/php/connect.php');
                    
                        $result = $pdo->query('SELECT * FROM `feedbacks` WHERE `status` LIKE "1" ORDER BY `id` ASC LIMIT 10');
                        $resultf = $result->fetchAll();
                        if ($resultf) {
                            foreach ($resultf as $row) {
                                echo "
                                <div class='fb'>
                                    <div class='fb-header'>
                                        <span class='name'>$row[name]</span>
                                        <span class='date'>$row[date]</span>
                                    </div>
                                    <div class='fb-body'>
                                        $row[ask]
                                    </div>
                                    <div class='fb-line'>
                                        <div>
                                            Статус: <span class='fb-status'>Активный</span>
                                        </div>
                                        <div class='fb-tel'>$row[tel]</div>
                                        <button class='btn' data-status='$row[status]' data-id='$row[id]'>Отметить отвеченным</button>
                                    </div>
                                </div>
                                ";
                            }
                        } else {
                            echo '<div class="fb dis-fb">
                            <div class="fb-header">
                                <span class="name"></span>
                                <span class="date"></span>
                            </div>
                            <div class="fb-body">
                                <h2 class="dis-fb-h2">Нет заявок</h2>
                            </div>
                            <div class="fb-line">
                            </div>
                        </div>';
                        }
                    ?>
            </div>

        </div>

    </main>
</div>

<script src="assets/js/cabinet.js"></script>



<?php include('includes/footer.php'); 