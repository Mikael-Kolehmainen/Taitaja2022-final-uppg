// Toteuta tähän tarvittava koodi
function addToShoppingList() {
    var product = document.getElementById("item").value;
    var shoppingList = document.getElementById("shopping-list");
    var entry = document.createElement('li');

    entry.appendChild(document.createTextNode(product));
    shoppingList.appendChild(entry);

    sortItems();
}
function sortItems() {
    var products = [];
    var items = document.getElementsByTagName("li");
    for (var i = 0, l = items.length; i < l; i++) {
        products.push(items[i].innerHTML)
    }
    products.sort();
    for (var i = 0, l = items.length; i < l; i++) {
        items[i].innerHTML = products[i];
    }
    
}