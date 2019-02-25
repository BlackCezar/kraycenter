let slides = document.querySelectorAll('.slide');
slides[0].classList.add('active');
let activeCount = 0;
setInterval(() => {
    slides[activeCount].classList.remove('active');
    console.log(activeCount)
    if (activeCount < slides.length - 1) {activeCount++} else {activeCount = 0;}
    slides[activeCount].classList.add('active');
}, 5000)