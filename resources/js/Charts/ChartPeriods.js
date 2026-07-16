export {chartPeriods}

const chartPeriods = {
    day: {
        moscow: {segment: 'day', interval: 10, limit: null},
        foreign: {segment: 'intraday', interval: 30, limit: 24},
        crypto: {segment: 'histohour', interval: 1, limit: 24},
    },
    week: {
        moscow: {segment: 'week', interval: 60, limit: null},
        foreign: {segment: 'intraday', interval: 60, limit: 80},
        crypto: {segment: 'histohour', interval: 4, limit: 42},
    },
    month: {
        moscow: {segment: 'month', interval: 24, limit: null},
        foreign: {segment: 'daily_adjusted', interval: 60, limit: 30},
        crypto: {segment: 'histoday', interval: 1, limit: 30},
    },
    year: {
        moscow: {segment: 'year', interval: 7, limit: null},
        foreign: {segment: 'weekly', interval: 60, limit: 52},
        crypto: {segment: 'histoday', interval: 7, limit: 52},
    },
}
