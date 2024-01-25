import {options} from "../script";
import {ChartData} from "./ChartData";

//Диаграмма с данными за год.
let chart = new ChartData(options.source, {
    moscow: {
        segment: 'year',
        ticker: options.ticker,
        interval: 7,
        limit: null,
        date: 'year',
    },
    foreign: {
        segment: 'weekly',
        ticker: options.ticker,
        interval: 60,
        limit: 52,
        date: 'year',
    },
    crypto: {
        segment: 'histoday',
        ticker: options.ticker,
        interval: 7,
        limit: 52,
        date: 'year',
    },
})
chart.buildChart()
