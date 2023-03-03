import {options} from "../script";
import {ChartData} from "./ChartData";

//Диаграмма с данными за месяц.
let chart = new ChartData(options.source, {
    moscow: {
        segment: 'month',
        ticker: options.ticker,
        interval: 24,
        limit: null,
        date: 'month',
    },
    foreign: {
        segment: 'daily_adjusted',
        ticker: options.ticker,
        interval: 60,
        limit: 30,
        date: 'month',
    },
    crypto: {
        segment: 'histoday',
        ticker: options.ticker,
        interval: 1,
        limit: 30,
        date: 'month',
    },
})
chart.buildChart()

