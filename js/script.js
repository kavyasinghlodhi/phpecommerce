window.addEventListener('scroll', function () {
    if (window.scrollY > 30) {
        document.querySelector('.navigation').style.background = 'white';
        document.querySelector('.navigation').style.boxShadow = '3px 3px 13px grey';
    }
    else {
        document.querySelector('.navigation').style.boxShadow = 'none';
        document.querySelector('.navigation').style.background = 'none';
    }
})
function nav() {
    if (document.querySelector('.nav-links').style.display == 'flex') {
        document.querySelector('.nav-links').style.display = 'none'
    }
    else {
        document.querySelector('.nav-links').style.display = 'flex'

    }
}

