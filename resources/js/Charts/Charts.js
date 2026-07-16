import Chart from 'chart.js/auto'

export {createChart}

function createChart(elementId, dataArray)
{
    const element = document.getElementById(elementId)

    if (!element) {
        throw new Error(`Chart element #${elementId} was not found`)
    }

    const color = selectColor(dataArray)

    return new Chart(
        element,
        {
                type: 'line',
                options: {
                    animation: true,
                    plugins: {
                        legend: {
                            display: false,
                        },
                        tooltip: {
                            enabled: true
                        },
                        zoom: {
                            zoom: {
                                enabled: true,
                                mode: 'x',
                                speed: 0.1
                            },
                            pan: {
                                enabled: true,
                                mode: 'x',
                                speed: 0.1
                            }
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                lineWidth: 0.2,
                            },
                            ticks: {
                                display: false
                            },
                        }
                    }
                },
                data: {
                    labels: dataArray.map(row => row.date),
                    datasets: [
                        {
                            data: dataArray.map(row => row.value),
                            borderColor: color,
                            tension: 0.2,
                            borderWidth: 0.5,
                            hoverBorderColor: 'rgb(54, 162, 235, 0.6)',
                            hoverBorderWidth: 2,
                            pointBorderColor: 'rgb(111, 1, 1)',
                            pointBorderWidth: 0.05,
                            pointHoverBackgroundColor: 'rgb(54, 162, 235, 0.3)',
                            fill: true,
                            backgroundColor: color,
                            showLine: true,
                        }
                    ]
                }
            }
    );
}

//Изменение цвета кривой графика в зависимости от баланса.
function selectColor(arr)
{
    if(arr[0]['value'] > arr[arr.length-1]['value']) return 'rgb(255, 99, 132, 0.3)'
    else if(arr[0]['value'] === arr[arr.length-1]['value']) return 'rgb(54, 162, 235, 0.3)'
    return 'rgb(85, 222, 92, 0.3)'
}

