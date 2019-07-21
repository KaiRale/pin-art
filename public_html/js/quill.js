var quill = new Quill('#editor-container', {
    modules: {
        toolbar: [
            [{'font': []}],
            [{'header': [1, 2, 3, 4, 5, 6, false]}],
            ['bold', 'italic', 'underline', 'strike'],
            [{'color': []}, {'background': []}],
            [{'align': []}],
            [{'list': 'ordered'}, {'list': 'bullet'}],
            [{'script': 'sub'}, {'script': 'super'}],
            [{'indent': '-1'}, {'indent': '+1'}],
            ['clean']
        ],
    },
    placeholder: 'Compose an epic...',
    theme: 'snow'
});

let forText = document.getElementById('text');

let formRecom = document.getElementById('hjrrgjaekbrailerhglr');
formRecom.addEventListener('submit', ajax);

function ajax(event) {
    event.preventDefault();
    let text=quill.getText();
    if (text.trim().length<=5) {
        forText.innerHTML='Слишком короткий текст совета'
        return;
    }
    let recommendation = document.querySelector('input[name=recommendation]');
    recommendation.value = quill.root.innerHTML;

    let xhr = new XMLHttpRequest();
    xhr.open("POST", this.action, true);
    xhr.send( recommendation.value);


    xhr.onload = function () {
        if (xhr.status == 200) {
            responseHandler(xhr.responseText);
            quill.deleteText();
        }
    };

    function responseHandler(data) {
        forText.innerHTML=data;
    }
}
