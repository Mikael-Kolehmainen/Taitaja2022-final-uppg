function openMenuItem(index) {
    var menu = document.getElementsByClassName('menu-item');

    for (i = 0; i < menu.length; i++) {
        menu[i].style.display = 'none';
    }

    if (menu[index].style.display == 'none') {
        menu[index].style.display = 'inline-block';
    } else if (menu[index].style.display == 'inline-block') {
        menu[index].style.display = 'none';
    }
}