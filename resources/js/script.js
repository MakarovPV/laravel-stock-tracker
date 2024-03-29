export {options};

//Раскрытие выпадающего дочернего меню.
$('#stock_category, #moscow_stock, #foreign_company_stock, #crypto').on("click", function (e){
    e.stopImmediatePropagation();
    showChildList(this)
});

function showChildList(elem) {
    let next = $(elem).next()
    if(next.hasClass('d-none')){
        next.removeClass("d-none");
    } else {
        next.addClass("d-none");
    }
}

//обновление страницы по клику на акцию.
$(document).on('click', '.list-data-item', function(e){
    e.stopImmediatePropagation();
    location.reload();

    document.cookie = `ticker=${this.id}`
    document.cookie = `source=${$(this).data("source")}`
    document.cookie = `stock_name=${$(this).html()}`
})

function getCookie(name) {
    let matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}

//Список отправляемых параметров.
let options = {
    source: getCookie('source'),
    stock_name: getCookie('stock_name'),
    ticker: getCookie('ticker'),
}

//Установка значения h1 в body.blade.
$('#stock_name_header').html(options.stock_name)

let stock_category_id;

//получение id категории по кнопке.
$(document).on('click', '.btn-light', function() {
    stock_category_id = this.id.slice(4)
})

//Отправка данных из модального окна.
$('#save').on('click', function (e){
    e.stopImmediatePropagation();
    let stock_name = document.getElementById('stock_name').value
    let ticker = document.getElementById('ticker').value
    send(stock_name, ticker)
})

function send(stock_name, stock_ticker)
{
     axios.post('/', {
         stock_name,
         stock_ticker,
         stock_category_id,
    }).then(function (){
         document.cookie = `ticker=${stock_ticker}`
         document.cookie = `stock_name=${stock_name}`
         location.reload()
     })
}

//динамическое изменения списка полученных акций в зависимости от переданного сектора
$('#app').on('change', '#stocks :first-child :first-child', function (){
    const source = $(this).parent().attr('id');
    const sector = $(this).val();
    $.ajax({
        url: `/stocks/${source}?sector=${sector}`,
        method: 'GET',
        success: function(response) {
            $('#app').empty();
            $('#app').html(response);
        }
    });
});

