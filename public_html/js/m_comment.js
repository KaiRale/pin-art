
let btns=document.getElementsByClassName('btn_get_id');
btns = Array.prototype.slice.call( btns );
btns.forEach( function (item) {
    item.addEventListener('click',activeForm)
});
function activeForm() {
    getFrom(this.name);
}


function getFrom(name) {
    let formMaster=document.getElementById(name);
    formMaster.style.display='block';
    console.log(formMaster.elements);
    let closes=formMaster.elements.closes;
    closes.addEventListener("click", function () {
        formMaster.style.display='none';
    });


    formMaster.addEventListener('submit',addCommit)
}

function addCommit(event) {
    console.log(this.id+'areaForError');
    let errorArea = document.getElementById(this.id+'errorArea');
    let responseArea=document.getElementById(this.id+'responseArea')
    let textArea = this.elements.textMCom;
    event.preventDefault();
    if (textArea.value.trim().length < 3) {
        errorArea.style.display = 'block';
        return;
    }else {
        errorArea.style.display = 'none';
    }
     let sending=[textArea.value.trim(),this.id];
   
    let xhr = new XMLHttpRequest();
    xhr.open("POST", this.action, true);
    xhr.send(sending);

    xhr.onload = function () {
        if (xhr.status == 200) {
            responseHandler(xhr.responseText);
            textArea.value = '';
        }
    };

    function responseHandler(data) {
        responseArea.innerHTML=data;

    }
}


    




