<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="assets/css/lawyars.css">
	<div class='servicesblock2 sbblock3'>
		<div class='wrapper'>
			<div class='center' style='width:100%; float:none;'>
				<div class='lawyers_sidebar'>
					<ul>
						<?php
						if($_GET['cat'] == null){
							echo "<li class='active'><a href='lawyers.php' >Весь список</a></li>";
						}
						else{
							echo "<li><a href='lawyers.php'>Весь список</a></li>";
						}
    					include_once('assets/php/connect.php');
						  
						$URCOMPANIESDBS = $pdo->prepare('SELECT * FROM urists_cat ORDER BY position ASC');
						$URCOMPANIESDBS->execute();
						$URCOMPANIESDBSX = $URCOMPANIESDBS->fetchAll();
						foreach ($URCOMPANIESDBSX as $URCOM){
							if($_GET['cat'] == $URCOM['id']){
								echo "<li class='active'><a href='lawyers.php?cat=".$URCOM['id']."' >".$URCOM['name']."</a></li>";
							}
							else{
								echo "<li><a href='lawyers.php?cat=".$URCOM['id']."'>".$URCOM['name']."</a></li>";
							}
						}
						?>
					</ul>
				</div>
				<div class='lawyers_list'>

					<?php

						function makeClickableLinks($text){
							$urls = mb_substr($text, 0, 5);
							switch($urls){
								case "http:":
									$link = $text;
								break;
								case "https":
									$link = $text;
								break;
								default:
									$link = "http://".$text;
								break;
							}

							return $link;
						}

						if(htmlspecialchars(trim($_GET['cat'])) != null){

							$URCOMPANIESDBS = $pdo->prepare('SELECT * FROM urists_companys WHERE urists_cat_id LIKE :urists_cat_id ORDER BY id ASC');
							$URCOMPANIESDBS->bindValue(':urists_cat_id', "%".htmlspecialchars(trim($_GET['cat']))."%", PDO::PARAM_STR);
							$URCOMPANIESDBS->execute();
							$URCOMPANIESDBSX = $URCOMPANIESDBS->fetchAll();
							foreach ($URCOMPANIESDBSX as $URCOM){
									
									echo"
									<div class='item'>
										<span class='name'>".$URCOM['name']."</span>
										<div class='btns'>
											<a href='".makeClickableLinks($URCOM['site'])."' target='_blank'>Перейти на сайт</a>
										</div>
										<div class='clear'></div>
									</div>";
								
							}
						}

						else{
							$URCOMPANIESDBS = $pdo->prepare('SELECT * FROM urists_companys ORDER BY id ASC');
							$URCOMPANIESDBS->execute();
							$URCOMPANIESDBSX = $URCOMPANIESDBS->fetchAll();
							foreach ($URCOMPANIESDBSX as $URCOM){
									
									echo"
									<div class='item'>
										<span class='name'>".$URCOM['name']."</span>
										<div class='btns'>
											<a href='".makeClickableLinks($URCOM['site'])."' target='_blank'>Перейти на сайт</a>
										</div>
										<div class='clear'></div>
									</div>";
								
							}
						}
					?>

				</div>
			<div class='clear'></div>
			</div>
		</div>
	</div>
	<div class='feedback'>
		<div class='wrapper'>
			<div class='left'>
				<h2>Оставьте заявку <br>прямо сейчас</h2>
				<input type='name' class='name' name='name' placeholder='Ваше имя'/>
				<input type='phone' class='phone' name='phone' placeholder='Ваш номер телефона'/>
				<textarea class='message' type='message' name='message' placeholder='Ваш вопрос'></textarea>
				<span class='warning'>Отправляя данную форму Вы соглашаетесь с политикой конфиденциальности и условиями использования</span>
				<button class='btn'>Отправить</button>
			</div>
			<div class='clear'></div>
		</div>
	</div>

<script>
	document.querySelector('.feedback .btn').onclick = sendFeedback;
	let display = {
		feedback: true
	}
	function sendFeedback() {
    try {
        if (display.feedback) {
            let parent = document.querySelector('.feedback').querySelector('.left');
            parent.children[5].innerHTML = '<i class="fa fa-spin fa-circle-o-notch"></i>';
            let data = {
                name: parent.children[1].value,
                num: parent.children[2].value,
                ask: parent.children[3].value 
            };
            if (data.name && data.num && data.ask) {
                let xhr = new XMLHttpRequest();
                xhr.open('POST', '/assets/php/feedback.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
                xhr.send(`name=${data.name}&tel=${data.num}&ask=${data.ask}`);
                xhr.onload = function() {
                    if (xhr.responseText == 'OK') {
                        display.feedback = false;
                        parent.children[1].value = '';
                        parent.children[2].value = '';
                        parent.children[3].value = '';
                        parent.children[5].innerHTML = '<i class="fa fa-check" aria-hidden="true"></i> Отправлено';
                    } else {
                        document.querySelector('.feedback .btn').innerHTML = '<i class="fa fa-close" aria-hidden="true"></i> Не отправлено';
                        throw `Error on php, ${xhr.responseText}`;
                    }
                }
                xhr.onerror = function() {
                    throw 'Error on ajax';
                }
            } else {
                throw 'Error on client';
            }
        } else throw 'Error dupl'; 
    } catch (err) {
        console.log(err);
        document.querySelector('.feedback .btn').innerHTML = '<i class="fa fa-close" aria-hidden="true"></i> Не отправлено';
    }
}

</script>
<?php include('includes/footer.php'); ?>