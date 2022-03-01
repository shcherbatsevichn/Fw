var count = 1; //счётчик инпутов

function addInput(Element) {
    var parent = Element.parentElement; //получаем родительский div, в котором находится кнопка
    var inputparent = parent.children[1]; //находим первый инпут (отрендеренный)
    var id = inputparent.getAttribute("id"); //записываем его id
    var name = inputparent.getAttribute("name"); // записываем его имя 
    name = name.replace(/\[.+\]/, '[' + count + ']'); //преобразовываем имя (заменяем счётчик)
    let newinp = document.createElement('input'); //создаём новый инпут
    newinp.className = inputparent.getAttribute("class"); // Заполняем атрибут класса
    newinp.id = inputparent.getAttribute("id") + count; //заполняем id 
    newinp.setAttribute('name', name); //заполняем имя
    newinp.setAttribute('type', 'text'); //заполняем тип
    newinp.setAttribute('placeholder', inputparent.getAttribute('placeholder')); // добавляем заглушку
    Element.before(newinp); //вставляем перед кнопкой, на которой висит обрботчик
    count++; //увеличиваем счётчик
}