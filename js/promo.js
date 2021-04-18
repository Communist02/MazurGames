let index = 0;

function view() {
    fetch('../php/promo.php', {method: 'POST', body: index.toString()}).then(res => {
        res.text().then(function (html) {
            document.querySelector('.promo').innerHTML = html;
        });
    });
}

view();

function right(count) {
    index++;
    if (index >= count) {
        index = 0;
    }
    view();
}

function left(count) {
    index--;

    if (index < 0) {
        index = count - 1;
    }
    view();
}
