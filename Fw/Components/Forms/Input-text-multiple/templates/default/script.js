var count = 1;

function addInput() {
    var str = '<input type="text" class="link" placeholder="Ссылка на профиль *"> <div id="input' + (x + 1) + '"></div>';
    document.getElementById('input' + count).innerHTML = str;
    count++;
}