
function show() {
    const p = document.getElementById('pwd');
    p.setAttribute('type', 'text');
}

function hide() {
    const p = document.getElementById('pwd');
    p.setAttribute('type', 'password');
}

let pwShown = 0;

document.getElementById("eye").addEventListener("click", function () {
    if (pwShown == 0) {
        pwShown = 1;
        show();
    } else {
        pwShown = 0;
        hide();
    }
}, false);

function getValue(){
    var login = document.getElementById("login").value;
    var password = document.getElementById("pwd").value;
}
