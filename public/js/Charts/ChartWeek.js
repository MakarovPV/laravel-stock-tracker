import {options} from "../script";
import {ChartData} from "./ChartData";

//Диаграмма с данными за неделю.
let chart = new ChartData(options.source, {
    moscow: {
        segment: 'week',
        ticker: options.ticker,
        interval: 60,
        limit: null,
        date: 'week',
    },
    foreign: {
        segment: 'intraday',
        ticker: options.ticker,
        interval: 60,
        limit: 80,
        date: 'week',
    },
    crypto: {
        segment: 'histohour',
        ticker: options.ticker,
        interval: 4,
        limit: 42,
        date: 'week',
    },
})
chart.buildChart()
