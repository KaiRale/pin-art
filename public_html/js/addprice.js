

let areaForDataPrice = document.getElementById('areaForDataPrice');
let formPrice = document.forms.for_add_price;
let title = formPrice.elements.title;
let price = formPrice.elements.price;


let error1 = document.getElementById('error1');
let error2 = document.getElementById('error2');


formPrice.addEventListener("submit", addPrice);


function addPrice(event) {
    event.preventDefault();

    if (title.value.trim().length < 3) {
        error1.style.display = 'block';
        return;
    } else {
        error1.style.display = 'none';
    }

    if (!(/^\d+$/.test(price.value.trim()))) {
        error2.style.display = 'block';
        return;
    } else {
        error2.style.display = 'none';
    }


    let form_data = new FormData(this);

    let xhr = new XMLHttpRequest();
    xhr.open("POST", this.action, true);
    xhr.send(form_data);

    xhr.onload = function () {
        if (xhr.status == 200) {
            responseHandler(xhr.responseText);
            title.value = '';
            price.value = '';
        }
    };

    function responseHandler(data) {
        areaForDataPrice.innerHTML=data;
    }
}
