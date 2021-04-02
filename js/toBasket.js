function toBasket() {
    let id = new URL(document.location).searchParams.get('product');
    let basket = JSON.parse(localStorage.getItem('basket'));
    if (basket == null) {
        basket = {};
    }
    if (basket[id] == null) {
        basket[id] = 1;
    }
    else {
        basket[id]++;
    }
    localStorage.setItem('basket', JSON.stringify(basket));
}