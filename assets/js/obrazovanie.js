document.querySelector('.feedback .btn').onclick = sendFeedback;

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
            
let display = {
    onload: false,
    loaded: 20,
    feedback: true
}

function EducationSearch() {
    let val = document.querySelector('.search').value;
    refind(val);
}

function refind (val) {
    let xhr = new XMLHttpRequest();
        val = encodeURIComponent(val);
        let mode = document.querySelector('.search').dataset.selector || '';
    
        xhr.open('GET', '/assets/php/search.php?table=obrazov_org&word=' + val + '&mode=' + mode, true);
        xhr.send();
        display.onload = false;
        xhr.onload = function() {
            console.log(xhr.responseText);
            let res = JSON.parse(xhr.responseText); 
            document.querySelector('.table').innerHTML = '';
            if (!res.finded) {
                if (mode != '') {
                    // Блок для поиска черного списка
                    // for (row of res) {
                    //     if (!row.finded) {
                    //         let html = document.createElement('tr');
                    //         let img = new Image;
                    //         img.src = '' + row.photo;
                    //         console.log('ww', row)
                    //         html.innerHTML = `
                    //         <td><img src="${img.src}"></td>
                    //         <td>${row.name}</td>
                    //         <td>${row.reg_num}</td>
                    //         <td>${row.review}</td>
                    //         <td>${row.status}</td>
                    //         `;
                    //         html.dataset.id = row.id;
                    //         document.querySelector('.table').appendChild(html);
                    //         img.onload = function () {
                    //         }
                    //     } 
                    // }
                } else {
                    for (row of res) {
                        if (!row.finded) {
                            let html = document.createElement('div');
                            html.innerHTML = `
                            <div class="name"><span>${row.name}</span></div>
                            <div class="address"><span>${row.address}</span></div>				
                            <div class="map"><a href='https://yandex.ru/maps/?ll=${row.gps_1}%2C${row.gps_2}&z=18&mode=whatshere&whatshere%5Bpoint%5D=${row.gps_1}%2C${row.gps_2}&whatshere%5Bzoom%5D=18' class='btn' target='_blank'>Показать на карте</a></div>
                            <div class="feedbackx"><button class="btn" onclick="Open_Obrazovanie_FeedBack(${row.id})">Оставить отзыв</button></div>
                            `;
                            html.className = 'item item' + row.id;
                            document.querySelector('.table').appendChild(html);
                        } else display.onload = true;
                    }
                }
            } 
        }
}



function Open_Obrazovanie_FeedBack(id) {
    var name = document.querySelector(".obrazovanie .table_block .item" + id + " .name span");
    var address = document.querySelector(".obrazovanie .table_block .item" + id + " .address span");
    document.querySelector(".AdvokatFB_Form .setervalue").innerHTML = name.innerText;
    document.querySelector(".AdvokatFB_Form_Shadow").style.display = 'unset';
    document.querySelector(".AdvokatFB_Form").style.display = 'unset';
}
function Close_Obrazovanie_FeedBack() {
    document.querySelector(".AdvokatFB_Form_Shadow").style.display = 'none';
    document.querySelector(".AdvokatFB_Form").style.display = 'none';
}
function Send_Obrazovanie_FeedBack(ev) {
    ev.preventDefault();
    
}