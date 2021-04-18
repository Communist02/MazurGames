let index = 0;
count = 2;

function view() {
    fetch('../php/promo.php', {method: 'POST', body: index.toString()}).then(res => {
        res.text().then(function (html) {
            document.querySelector('.promo').innerHTML = html;
        });
    });
}

view();

function right() {
    index++;
    if (index >= count) {
        index = 0;
    }
    view();
}

function left() {
    index--;

    if (index < 0) {
        index = count - 1;
    }
    view();
}
