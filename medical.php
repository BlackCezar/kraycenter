<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="assets/css/medical.css">
	<div class='servicesblock2 sbbock3'>
		<div class='wrapper'>
			<div class='center'>
				<div class='page1'>
					<h1>Медицинские учреждения</h1>
					<p></p>
					<div class='listlawyers_search'>
						<input type='search' class='search' placeholder='Поиск учреждения' />
						<button class='btn' onclick='MedicalSearch();'>Поиск</button>
						<div class='clear'></div>
					</div>
					<div class='med_list'>
						<div class='item main'>
							<div class='name'>
								<span>Наименование учреждения</span>
							</div>
							<div class='address'>
								<span>Адрес</span>
							</div>
							<div class='report'>
								<span>Отзыв</span>
							</div>
							<div class='clear'></div>
						</div>
						<div class="table">
						<?php
    						include_once('assets/php/connect.php');
							$MEDICAL = $pdo->prepare('SELECT * FROM med_companys ORDER BY position ASC');
							$MEDICAL->execute();
							$MEDICALX = $MEDICAL->fetchAll();
							$counter = 0;
							foreach ($MEDICALX as $MED){
								if($MED['id'] != 0){
									echo "
									<div class='item i1 n".$MED['id']."'>
										<div class='name'>
											<a href='".$MED['website']."'><span>".$MED['name']."</span></a>
										</div>
										<div class='address'>
											<span>".$MED['address']."</span>
										</div>
										<div class='report'>
											<button onclick='Medical_Report_Open(".$MED['id'].");' class='btn'>Оставить отзыв</button>
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
				<div class='page2'>
					
				</div>				
			</div>
			<div class='clear'></div>
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

	<script src="assets/js/medical.js"></script>

<?php include('includes/footer.php'); ?>