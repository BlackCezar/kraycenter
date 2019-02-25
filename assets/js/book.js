let result_pay = {
    rub: 0,
    range: 0
}
payments = {
    paid: 300,
    free: 0
}

for (opt of document.querySelectorAll('.options input')) {
    let price = Number(opt.parentElement.parentElement.querySelector('.price').innerText)

    opt.onchange = function() {
        if (this.checked) {
            result_pay.rub += price
        } else {
            result_pay.rub -= price
        }
        setResult()
    }
}

for (inp of document.querySelectorAll('.radio')) {
    inp.onchange = function() {
        for (subinp of document.querySelectorAll('.radio')) {
            subinp.parentElement.parentElement.parentElement.style.border = '1px solid rgba(158, 163, 175, 0.568)';
        }
        this.parentElement.parentElement.parentElement.style.border = '1px solid rgba(65, 105, 225, 0.568)';

        if (!this.parentElement.parentElement.classList.contains("free")) {
            document.querySelector('.opacity').classList.add('show');
        } else {
            document.querySelector('.opacity').classList.remove('show');
        }
    
        let masOfInputs = document.querySelectorAll('.cont_els input')
        if (masOfInputs[0].checked ) { 
            result_pay.rub += payments.paid 
            payments.free -= payments.paid 
        } 
        if (masOfInputs[1].checked) {
            result_pay.rub += payments.free
            payments.free -= payments.free  
            document.querySelector('.pay').value = 0;
        }
        
        setResult();
    }
}

document.onclick = setResult;


function setResult () {
    result_pay.range = document.querySelector('.pay').value 
    document.querySelector('.end').innerText = result_pay.rub + Number(result_pay.range)
}

function rechenge(ev) {
    let targ = Math.round(ev.value / 10) * 10;

    document.querySelector('.pay').value = targ;

}

document.getElementById('goPay').onclick = function() {
    
}