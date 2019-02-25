<?php include('includes/header.php');?>
<link rel="stylesheet" href="assets/css/obrazovanie.css">

	<div class='AdvokatFB_Form'>
		<div class='window'>
			<div class='headline'><span>Форма добавления отзыва на учреждение</span><div class='close' onclick='Close_Obrazovanie_FeedBack();'></div></div>
			<form class='container'>
				<span class='label'>Отзыв на учреждение</span>
				<span class='setervalue'>Отзыв на учреждение</span>

				<span class='label'>Ваши данные</span>
				<input type='name' class='name' name='name' placeholder='Ваше Ф.И.О *' />
				<input type='email' class='email' name='email' placeholder='Ваш E-Mail *' />
				<textarea class='text' type='text' placeholder='Текст отзыва *'></textarea>

				<span class='label'>Материалы отзыва (необязательно)</span>
				<input type='file' class='file' name='file' placeholder='Материалы жалобы' />
				<br><br>
				<button class='btn' onclick='Send_Obrazovanie_FeedBack(event)'>Оставить отзыв</button>
			</form>
		</div>
	</div>
	<div class='AdvokatFB_Form_Shadow'></div>


	<div class='servicesblock2 pleaders obrazovanie'>
		<div class='wrapper'>
			<div class='center'>
					<h1>Образовательные учреждения</h1>

					<div class='search_block'>
						<input type='search' class='search' placeholder='Поиск учреждения по названию' />
						<button class='btn' onclick='EducationSearch();'>Поиск</button>
					</div>

					<div class='table_block'>
						<div class='item main'>
							<div class='name'>
								<span>Наименование учреждения</span>
							</div>
							<div class='address'>
								<span>Адрес</span>
							</div>
							<div class='map'>
								<span>Карта</span>
							</div>
							<div class='feedbackx'>
								<span>Отзыв</span>
							</div>
						</div>
						<div class="table">
						<?php
    						include_once('assets/php/connect.php');		
							$OBRAZOVANIES = $pdo->prepare('SELECT * FROM obrazov_org ORDER BY id DESC');
							$OBRAZOVANIES->execute();
							$OBRAZOVANIESX = $OBRAZOVANIES->fetchAll();
							$counter = 0;
							foreach ($OBRAZOVANIESX as $OBRAZOVAN){
								if($OBRAZOVAN['id'] != 0){
									echo "
									<div class='item item".$OBRAZOVAN['id']."'>
										<div class='name'>
											<span>".$OBRAZOVAN['name']."</span>
										</div>
										<div class='address'>
											<span>".$OBRAZOVAN['address']."</span>
										</div>
										<div class='map'>
											<a href='https://yandex.ru/maps/?ll=".$OBRAZOVAN['gps_1']."%2C".$OBRAZOVAN['gps_2']."&z=18&mode=whatshere&whatshere%5Bpoint%5D=".$OBRAZOVAN['gps_1']."%2C".$OBRAZOVAN['gps_2']."&whatshere%5Bzoom%5D=18' class='btn' target='_blank'>Показать на карте</a>
										</div>
										<div class='feedbackx'>
											<button  onclick='Open_Obrazovanie_FeedBack(".$OBRAZOVAN['id'].");' class='btn'>Оставить отзыв</button>
										</div>
									</div>";
									$counter++;
								}
							}

							if($counter == 0){
								echo "
								<div class='item empty'>
									<span>Информация временно недоступна.</span>
								</div>";
							}
						?>
						</div>
						</div>
					</div>

				</div>
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
		</div>
	</div>
<script src="assets/js/obrazovanie.js"></script>
	<?php include('includes/footer.php'); ?>