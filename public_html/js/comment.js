let areaForError = document.getElementById('areaForError');
let form = document.forms.for_commit;
let author = form.elements.author;
let textArea = form.elements.text;

const AUTH_ERROR='error';

let parentElem = form.parentNode;

form.addEventListener("submit", addCommit);

let error = document.getElementById('error');
let errorAuthor=document.getElementById('errorAuthor');
let correctly = document.getElementById('correctly');



function addCommit(event) {
    event.preventDefault();

    if (author.value.trim().length < 3) {
        errorAuthor.style.display = 'block';
        correctly.style.display = 'none';
        return;
    }
    errorAuthor.style.display = 'none';


    if (textArea.value.trim().length < 5) {
        error.style.display = 'block';
        correctly.style.display = 'none';
        return;
    }
    error.style.display = 'none';

    correctly.style.display = 'block';

    let form_data = new FormData(this);

    let xhr = new XMLHttpRequest();
    xhr.open("POST", this.action, true);
    xhr.send(form_data);

    xhr.onload = function () {
        if (xhr.status == 200) {
            responseHandler(xhr.responseText);
        }
    };

    function responseHandler(data) {
        areaForError.innerHTML = '';

        if (data === AUTH_ERROR) {
            areaForError.innerHTML = 'Ошибка при добавлении комментария';
            return;
        }

        let timeCommit = data;
        console.log('выполняется');
        //заполняем div
        let div = document.createElement("div");
        let p = document.createElement("p");
        let pTime = document.createElement('p');
        pTime.setAttribute('id', 'pTime');
        pTime.innerHTML = timeCommit;

        let pAut = document.createElement("p");
        pAut.setAttribute('id', 'pAut');
        pAut.innerHTML = author.value;


        div.setAttribute('id', 'com');
        p.innerHTML = textArea.value;


        div.appendChild(pAut);
        div.appendChild(p);
        div.appendChild(pTime);

        parentElem.insertBefore(div, form.nextSibling);

        textArea.value = '';
        author.value = '';
    }
}




