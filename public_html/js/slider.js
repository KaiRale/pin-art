let slider = {
    init: function (id) {
        this.sliderContainer = document.getElementById(id);
        this.sliderElem = document.createElement("ul");
        // <ul></ul>
        this.sliderElem.classList.add("slider");
        // <ul class="slider"></ul>
        this.sliderContainer.appendChild(this.sliderElem);

        this.slides = []; // массив для li
        this.currentSlide = 0; // текущий слайд (индекс)
    },
    add: function (imgPath, alt) {
        let li = document.createElement("li");
        // <li></li>
        let image = document.createElement("img");
        // <img>
        image.setAttribute("src", imgPath);
        // <img src="">
        image.setAttribute("alt", alt);
        image.setAttribute("class", 'slider_img')
        // <img src="" alt="">
        li.appendChild(image);
        // <li><img src="" alt=""></li>
        this.sliderElem.appendChild(li);
        // <ul><li><img src="" alt=""></li></ul>

        this.slides.push(li);
    },
    run: function () {
        // отображение следующего слайда
        this.nextSlide();
        setInterval(this.nextSlide.bind(this), 6000);
    },
    nextSlide: function () {
        // логика переключения слайдов
        if (this.currentSlide || this.currentSlide === 0) {
            this.slides[this.currentSlide].classList.remove("active");
            this.currentSlide += 1;
        }

        this.currentSlide = this.currentSlide < this.slides.length ?
            this.currentSlide : 0;

        this.slides[this.currentSlide].classList.add("active");
    }
};

window.sliderInit = slider.init.bind(slider);
window.sliderAdd = slider.add.bind(slider);
window.sliderRun = slider.run.bind(slider);

slider.init("slider");
slider.add("/img/eWRpyMLadvc.jpg");
slider.add("/img/YkAbKZGfzHg.jpg");
slider.add("/img/_DGNpJELyuo.jpg");
slider.add("/img/vxTpeHnwR1M.jpg");
slider.add("/img/vGAm7L6SZNY.jpg");
slider.run();