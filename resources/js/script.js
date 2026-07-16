import $ from 'jquery'

$('#stock_category, #moscow_stock, #foreign_company_stock, #crypto').on('click', function (event) {
    event.stopImmediatePropagation()
    showChildList(this)
})

function showChildList(element)
{
    $(element).next().toggleClass('d-none')
}

$(document).on('click', '.list-data-item', function (event) {
    event.stopImmediatePropagation()

    localStorage.setItem('ticker', this.id)
    localStorage.setItem('source', $(this).data('source'))
    localStorage.setItem('stockName', $(this).text())

    location.reload()
})

let stockCategoryId

$(document).on('click', '.btn-light', function () {
    stockCategoryId = this.id.slice(4)
})

$('#save').on('click', function (event) {
    event.stopImmediatePropagation()

    const stockName = document.getElementById('stock_name').value
    const stockTicker = document.getElementById('ticker').value

    saveStock(stockName, stockTicker)
})

function saveStock(stockName, stockTicker)
{
    window.axios.post('/', {
        stock_name: stockName,
        stock_ticker: stockTicker,
        stock_category_id: stockCategoryId,
    }).then(function () {
        localStorage.setItem('ticker', stockTicker)
        localStorage.setItem('source', stockCategoryId)
        localStorage.setItem('stockName', stockName)

        location.reload()
    }).catch(function (error) {
        console.error('Unable to save stock', error)
    })
}

document.addEventListener('change', async function (event) {
    if (!event.target.matches('#stocks #sector_select')) {
        return
    }

    const source = event.target.closest('[data-stock-source]')?.dataset.stockSource
    const sector = event.target.value

    if (!source) {
        return
    }

    try {
        const response = await fetch(`/stocks/${source}?sector=${encodeURIComponent(sector)}`, {
            headers: {
                'Accept': 'text/html',
            },
        })

        if (!response.ok) {
            throw new Error(`Stock list request failed with status ${response.status}`)
        }

        const html = await response.text()
        const responseDocument = new DOMParser().parseFromString(html, 'text/html')
        const newStockList = responseDocument.getElementById('stock_list_container')
        const currentStockList = document.getElementById('stock_list_container')

        if (!newStockList || !currentStockList) {
            throw new Error('Stock list was not found in the response')
        }

        currentStockList.innerHTML = newStockList.innerHTML
    } catch (error) {
        console.error('Unable to load stock list', error)
    }
})
