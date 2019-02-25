document.querySelectorAll('.fb button').forEach( el => {
    el.onclick = changeStatus;
});

async function changeStatus() {
    let stable = this.dataset.status, resp;
    (stable == 1) ? resp = await fetch(`/assets/php/feedback.php?id=${this.dataset.id}&rechange=false`): 
             resp = await fetch(`/assets/php/feedback.php?id=${this.dataset.id}&rechange=true`); 
    if (resp.status == 200) {
        if (stable == 1) {
            this.innerText = 'Отметить активным';
            this.parentElement.parentElement.querySelector('.fb-status').innerText = 'Завершен';
            this.dataset.status = 0;
        } else {
            this.innerText = 'Отметить отвеченным';
            this.parentElement.parentElement.querySelector('.fb-status').innerText = 'Активный';
            this.dataset.status = 1;
        }
    } else {
        console.log(resp.status);
    }
}

document.querySelector('.feedback-btn').onclick = async function() {
    document.querySelector('.calls').hidden = true;
    document.querySelector('.last-feedback').style.marginTop = 0;
    document.querySelector('.last-feedback').hidden = false;
    let resp = await fetch(`/assets/php/feedback.php?onload=true`);
    resp = await resp.json();
    document.querySelector('.last-feedbacks').children[0].hidden = true;
    document.querySelectorAll('.fb').forEach(el => {
        if (el.className != 'fb dis-fb') 
        el.remove();
    })
    for (el of resp) {
        let bl = document.createElement('div');
        bl.className = 'fb';
        bl.innerHTML = `
            <div class='fb-header'>
                <span class='name'>${el.name}</span>
                <span class='date'>${el.date}</span>
            </div>
            <div class='fb-body'>
                ${el.ask}
            </div>
            <div class='fb-line'>
                <div>
                    Статус: <span class='fb-status'>${(el.status == 1) ? "Активный" : "Завершен"}</span>
                </div>
                <div class='fb-tel'>${el.tel}</div>
                <button class='btn' data-status='${el.status}' data-id='${el.id}'>${(el.status == 1) ? "Отметить отвеченным" : "Отметить активным"}</button>
            </div>
        `;
        bl.querySelector('button').onclick = changeStatus;
        document.querySelector('.last-feedbacks').appendChild(bl);
    }
    if (!resp.length > 0) {
        document.querySelector('.last-feedbacks').children[0].hidden = false;
    }
}
document.querySelector('.calls-btn').onclick = function() {
    document.querySelector('.calls').hidden = false;
    document.querySelector('.last-feedback').hidden = true;
}