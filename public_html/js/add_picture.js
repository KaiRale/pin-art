

let areaForAddPicture = document.getElementById('areaForAddPicture');
let formAddPicture = document.forms.for_add_picture;
let img = formAddPicture.elements.img;



formAddPicture.addEventListener("submit", addPrice);


function addPrice(event) {
    event.preventDefault();
    let form_data = new FormData(this);

    if(img.value.length<=0){
        areaForAddPicture.innerHTML='Нет изображения для добавления';
        return;
    }
    let xhr = new XMLHttpRequest();
    xhr.open("POST", this.action, true);
    xhr.send(form_data);

    xhr.onload = function () {
        if (xhr.status == 200) {
            responseHandler(xhr.responseText);
            img.value = '';
            description.value = '';
        }
    };

    function responseHandler(data) {
        console.log(data);
        areaForAddPicture.innerHTML=data;
    }
}
