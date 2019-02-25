<style>


.window .label {
    font-family: SF_FONT;
    font-weight: 400;
    font-size: 90%;
    color: #999;
    display: block;
    margin-top: 25px;
    margin-bottom: 10px;
}
.window input , select{
    font-family: SF_FONT;
    font-weight: 400;
    font-size: 100%;
    color: #171719;
    width: calc(100% - 22px);
    resize: vertical;
    border: 1px solid #ccc;
    border-radius: 3px;
    outline: none;
    padding: 10px;
    margin: 10px 0;
}
.window textarea::placeholder {
    color: gray;
}
.window textarea {
    font-family: SF_FONT;
    font-weight: 400;
    font-size: 100%;
    color: #171719;
    width: calc(100% - 22px);
    min-height: 30px;
    max-height: 70px;
    resize: vertical;
    border: 1px solid #ccc;
    border-radius: 3px;
    outline: none;
    padding: 10px;
    margin: 10px 0;
    background-color: unset;
}
select {
    width: 100%;   
}
.shadow {
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.9);
    z-index: 998;
}
.window {
    position: relative;
    margin: 15vh auto;
    width: 500px;
    border-radius: 3px;
    background: #fff;
    z-index: 9999;
    padding: 25px;
    box-shadow: 0 15px 30px rgba(0,0,0,0.5);
}
.sendBtn {
    margin-top: 20px;
    display: block;
    padding: 20px 0;
    text-align: center;
}
</style>

<div class="review_cont" hidden>
    <div class='FeedBackForm'>
		<form class='window' name="review">
			<div class='headline'><span>Форма добавления отзыва про адвоката</span><div class='close' onclick='reviewClose()'></div></div>
			<div>
            <span class='label'>Данные об адвокате</span>
				<input type='text' class='advokat_name' name='advokat_name' placeholder='Ф.И.О. Адвоката *' />
				<input type='number' class='advokat_num' name='advokat_num' placeholder='Номер адвоката в реестре палаты' />
				<input type='text' class='advokat_palata' name='advokat_palata' placeholder='Адвокатская палата в которой состоит адвокат' />
				<input type='text' class='advokat_resident' name='advokat_resident' placeholder='Членом какой коллегии является адвокат (бюро, кабинета)' />
				<input type='url' class='advokat_resident' name='advokat_resident' placeholder='Сайт адвоката или коллегии (бюро, кабинета)' />
				<input type='email' class='advokat_resident' name='advokat_resident' placeholder='Контактный E-Mail адвоката' />
				<input type='tel' class='advokat_resident' name='advokat_resident' placeholder='Контактный телефон адвоката' />
				<span class='label'>Фотография адвоката</span>
				<input type='file' class='advokat_resident' name='advokat_resident' placeholder='Контактный телефон адвоката' />
				<select class='advokat_state' name='advokat_state'>
					<option disabled>Текущий статус адвоката</option>
					<option>Действующий</option>
					<option>Приостановлен</option>
					<option>Удален из реестра</option>
					<option>Изменил членство</option>
					<option>Прекращен</option>
					<option>Отмена решения о приеме</option>
					<option>Исключён</option>
				</select>
				<span class='label'>Ваши данные</span>
				<input type='text' class='name' name='name' placeholder='Ваше Ф.И.О *' />
				<input type='email' class='email' name='email' placeholder='Ваш E-Mail *' />
				<textarea class='text' name="text" type='text' placeholder='Текст отзыва *'></textarea>
				<a href='#' class='btn sendBtn' onclick='reviewSend(); return false;'>Отправить отзыв</a>
			</div>
        </form>
        
    </div>
<div class="shadow"></div>
</div>

<script>
function reviewSend() {
    let windowEl = document.forms.review;
    console.log(windowEl)
    let form = new FormData(windowEl);

    let xhr = new XMLHttpRequest();
    xhr.open('POST', '/assets/php/review.php', true);
    // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    xhr.send(form);
    xhr.onload = function() {
        console.log(this.responseText);
    }
}

</script>  