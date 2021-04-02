function viewProducts() {
    let basket = localStorage.getItem('basket');

    fetch('php/basket-products.php', {method: 'POST', body: basket}).then(res => {
        res.text().then(function (html) {
            document.querySelector('.products').innerHTML = html;

            let prices = document.querySelectorAll('.price-game');
            let counts = document.querySelectorAll('.product-count > div');
            let sum = 0;
            for (let i = 0; i < prices.length; i++) {
                sum += Number(prices[i]['innerHTML'].replace(' ₽', '')) * Number(counts[i]['innerHTML']);
            }

            document.querySelector('.price-games').innerHTML = sum.toString() + ' ₽';
        });
    });
}

viewProducts();

function fromBasket(id) {
    let basket = JSON.parse(localStorage.getItem('basket'));
    delete basket[id];
    localStorage.setItem('basket', JSON.stringify(basket));
    viewProducts();
}

function add(id) {
    let basket = JSON.parse(localStorage.getItem('basket'));
    basket[id]++;
    localStorage.setItem('basket', JSON.stringify(basket));
    viewProducts();
}

function remove(id) {
    let basket = JSON.parse(localStorage.getItem('basket'));
    basket[id]--;
    if (basket[id] <= 0) {
        fromBasket(id);
    } else {
        localStorage.setItem('basket', JSON.stringify(basket));
        viewProducts();
    }
}