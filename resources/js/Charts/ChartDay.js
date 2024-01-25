import {options} from "../script";
import {ChartData} from "./ChartData"

//Диаграмма с данными за день.
let chart = new ChartData(options.source, {
    moscow: {
        segment: 'day',
        ticker: options.ticker,
        interval: 10,
        limit: null,
        date: 'day',
    },
    foreign: {
        segment: 'intraday',
        ticker: options.ticker,
        interval: 30,
        limit: 24,
        date: 'day',
    },
    crypto: {
        segment: 'histohour',
        ticker: options.ticker,
        interval: 1,
        limit: 24,
        date: 'day',
    },
})
chart.buildChart()

