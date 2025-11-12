// toggle class active  
const navbarNav = document.querySelector('.navbar-nav');

// ketika hanburger menu di click
document.querySelector('#hamburger-menu').onclick = () => {

    navbarNav.classList.toggle('active');
}

// Klik diluar sidebar untuk menghilangkan nav
const hamburger = document.querySelector('#hamburger-menu');

document.addEventListener('click', function(e){
if (!hamburger.contains(e.target) && !navbarNav.contains(e.target)) {
    navbarNav.classList.remove('active');
}

})

// Alert Functions
function closeAlert() {
    const alert = document.getElementById('alertMessage');
    if (alert) {
        alert.classList.add('hiding');
        setTimeout(() => {
            alert.remove();
        }, 400);
    }
}

// Auto close alert after 5 seconds
document.addEventListener('DOMContentLoaded', function() {
    const alert = document.getElementById('alertMessage');
    if (alert) {
        setTimeout(() => {
            closeAlert();
        }, 5000);
    }
});
