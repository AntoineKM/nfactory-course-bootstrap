/*
fonction mettre le theme en dark mode
fonction mettre le theme en light mode

detection de click sur les boutons light/dark
stocker une variable qui contient la couleur du theme

Light -> 0
Dark -> 1
*/

const buttonLight = document.getElementById('toggle-light');
const buttonDark = document.getElementById('toggle-dark');

buttonLight.addEventListener('click', toggleLight);
buttonDark.addEventListener('click', toggleDark);
window.addEventListener('load', function () { document.body.style.transition = 'all 2s'; });

init();

function init() {
    console.log(getCookie('theme'));
    if (getCookie('theme') == '') setCookie('theme', 0, 30);
    if (getCookie('theme') == 0) toggleLight();
    else toggleDark();
}

function toggleDark() {
    setCookie('theme', 1, 30);
    document.querySelectorAll('.bg-light').forEach(element => {
        element.classList.replace('bg-light', 'bg-dark');
    });
    document.querySelectorAll('.text-dark').forEach(element => {
        element.classList.replace('text-dark', 'text-light');
    });
    document.querySelectorAll('.navbar-light').forEach(element => {
        element.classList.replace('navbar-light', 'navbar-dark');
    });
    document.querySelectorAll('.btn-dark').forEach(element => {
        element.classList.replace('btn-dark', 'btn-light');
    });
}

function toggleLight() {
    setCookie('theme', 0, 30);
    document.querySelectorAll('.bg-dark').forEach(element => {
        element.classList.replace('bg-dark', 'bg-light');
    });
    document.querySelectorAll('.text-light').forEach(element => {
        element.classList.replace('text-light', 'text-dark');
    });
    document.querySelectorAll('.navbar-dark').forEach(element => {
        element.classList.replace('navbar-dark', 'navbar-light');
    });
    document.querySelectorAll('.btn-light').forEach(element => {
        element.classList.replace('btn-light', 'btn-dark');
    });
}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}