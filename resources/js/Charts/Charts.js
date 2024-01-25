import Chart from 'chart.js/auto'

export {Charts}

function Charts(element_id, options)
{
    return (async function() {
        const charts = new Chart(
            document.getElementById(element_id),
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
                    labels: options.map(row => row.date),
                    datasets: [
                        {
                            data: options.map(row => row.value),
                            borderColor: select_color(options),
                            tension: 0.2,
                            borderWidth: 0.5,
                            hoverBorderColor: 'rgb(54, 162, 235, 0.6)',
                            hoverBorderWidth: 2,
                            pointBorderColor: 'rgb(111, 1, 1)',
                            pointBorderWidth: 0.05,
                            pointHoverBackgroundColor: 'rgb(54, 162, 235, 0.3)',
                            fill: true,
                            backgroundColor: select_color(options),
                            showLine: true,
                        }
                    ]
                }
            }
        );
    })();
}

//Изменение цвета кривой графика в зависимости от баланса.
function select_color(arr)
{
    if(arr[0]['value'] > arr[arr.length-1]['value']) return 'rgb(255, 99, 132, 0.3)'
    else if(arr[0]['value'] === arr[arr.length-1]['value']) return 'rgb(54, 162, 235, 0.3)'
    return 'rgb(85, 222, 92, 0.3)'
}

