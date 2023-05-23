function modal(val_ = 0) {
    if (document.querySelector('.whole-bg').style.display == 'block') {
        document.querySelector('.whole-bg').style.display = 'none'
    } else {
        document.querySelector('.modal').getElementsByTagName('form')[0].getElementsByTagName('input')[0].value = document.querySelectorAll('tr')[val_].getElementsByTagName('td')[1].innerHTML
        document.querySelector('.modal').getElementsByTagName('form')[0].getElementsByTagName('textarea')[0].value = document.querySelectorAll('tr')[val_].getElementsByTagName('td')[2].innerHTML
        document.querySelector('.modal').getElementsByTagName('form')[0].getElementsByTagName('input')[1].value = document.querySelectorAll('tr')[val_].getElementsByTagName('td')[3].innerHTML
        document.querySelector('.modal').getElementsByTagName('form')[0].getElementsByTagName('input')[2].value = document.querySelectorAll('tr')[val_].getElementsByTagName('td')[5].getElementsByTagName('img')[0].src
        document.querySelector('.modal').getElementsByTagName('form')[0].getElementsByTagName('input')[3].value = document.querySelectorAll('tr')[val_].getElementsByTagName('td')[4].innerText
        document.querySelector('.whole-bg').style.display = 'block'
    }
}