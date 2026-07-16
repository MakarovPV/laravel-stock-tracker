import {ChartData} from './ChartData'
import {chartPeriods} from './ChartPeriods'

const source = localStorage.getItem('source')
const ticker = localStorage.getItem('ticker')
const stockName = localStorage.getItem('stockName')

if (source && ticker && chartPeriods.day[source]) {
    const dashboard = document.getElementById('stock_dashboard')
    const header = document.getElementById('selected_stock_header')
    const stockNameHeader = document.getElementById('stock_name_header')

    dashboard?.classList.remove('d-none')
    header?.classList.remove('d-none')

    if (stockNameHeader) {
        stockNameHeader.textContent = stockName ?? ticker
    }

    Object.entries(chartPeriods).forEach(([date, sources]) => {
        const parameters = {
            ...sources[source],
            ticker,
            date,
        }

        new ChartData(source, parameters).buildChart()
    })
}
