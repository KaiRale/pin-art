
let forms=document.getElementsByClassName('delete_form');
forms = Array.prototype.slice.call( forms, 0 );


forms.forEach(function(item) {
    item.addEventListener('submit', ajaxHandler)
});

function ajaxHandler(event) {
    event.preventDefault();
    let idForDelete=searchChecked();
    let responsePictureDel=document.getElementById(this.name+'ResponseDel');
    
    if (idForDelete.length === 0){
        responsePictureDel.innerHTML='Нет выбранных элементов';
        return;
    }

    let xhr = new XMLHttpRequest();
    xhr.open("POST", this.action, true);
    xhr.send(idForDelete);

    xhr.onload = function () {
        if (xhr.status == 200) {
            responseHandler(xhr.responseText);
        }
    };
    function responseHandler(data) {
        responsePictureDel.innerHTML=data;
    }
}


function searchChecked() {
    let checkboxes = document.getElementsByClassName('checkbox');
    let checkboxesChecked = [];
    for (let i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            checkboxesChecked.push(checkboxes[i].value);
        }
    }
    return checkboxesChecked;
}
