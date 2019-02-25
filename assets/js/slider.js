let slides = document.querySelectorAll('.slide');
slides[0].classList.add('active');
let activeCount = 0;
// setInterval(() => {
//     slides[activeCount].classList.remove('active');
//     console.log(activeCount)
//     if (activeCount < slides.length - 1) {activeCount++} else {activeCount = 0;}
//     slides[activeCount].classList.add('active');
// }, 5000)

createSlidePicker();
runSlider();


function createSlidePicker () {
    let slides = document.querySelectorAll('.main-slide');

    let picker = document.createElement('div');
    picker.className = 'slider-points';

    for (slide of slides) {
        let point = document.createElement('div');
        point.className = 'slide-point';
        point.dataset.target = slide.dataset.id;
        picker.appendChild(point);
    }

    document.querySelector('.main-slider').appendChild(picker);
}

let mainSlides = document.querySelectorAll('.slide-point')


function runSlider() {
    let mainSlides = document.querySelectorAll('.slide-point')
    let actSl = 0;
    mainSlides[actSl].classList.add('active');
    document.querySelector('.main-slide').classList.add('active');
    let initid;
    initid = setInterval(runSlide, 5000);

    mainSlides.forEach(point => {
        point.onclick = function() {
            clearInterval(initid);
            this.classList.add('active');
            for (pnt of mainSlides) {
                if (pnt != this) {
                    pnt.classList.remove('active');
                }
            }
            for (sl of document.querySelectorAll('.main-slide')) {
                if (sl.dataset.id == this.dataset.target) {
                    sl.classList.add('active');
                    actSl = sl.dataset.number;
                } else {
                    sl.classList.remove('active')
                }
            }
            initid = setInterval(runSlide, 5000);
        }
    });

    function runSlide() {
        mainSlides[actSl].classList.remove('active');
        if (actSl < mainSlides.length - 1) {actSl++} else {actSl = 0;}
        mainSlides[actSl].classList.add('active');
        console.log('s')
        for (sl of document.querySelectorAll('.main-slide')) {
            if (sl.dataset.id == mainSlides[actSl].dataset.target) {
                sl.classList.add('active');
            } else {
                sl.classList.remove('active')
            }
        }
    }
}