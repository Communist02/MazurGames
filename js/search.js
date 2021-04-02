function input(text) {
    if (text !== '')
        fetch('php/search.php', {method: 'POST', body: text}).then(res => {
            res.text().then(function (html) {
                document.querySelector('.search-block').innerHTML = html;
            });
        });
    else document.querySelector('.search-block').innerHTML = '';
}