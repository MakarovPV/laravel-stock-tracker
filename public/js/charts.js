import Chart from 'chart.js/auto'

export function Charts(element_id, options)
{
    return (async function() {
        const charts = new Chart(
            document.getElementById(element_id),
            {
                type: 'line',
                options: {
                    animation: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            enabled: true
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
                            borderWidth: 2,
                            hoverBorderColor: 'rgb(211, 1, 11)',
                            hoverBorderWidth: 2,
                            pointBorderColor: 'rgb(111, 1, 1)',
                            pointBorderWidth: 0.4,
                            pointHoverBackgroundColor: 'rgb(211, 1, 11)',
                            showLine: true,
                        }
                    ]
                }
            }
        );
    })();
}

//Изменение цвета кривой графика в зависимости от баланса, за определённый промежуток времени.
function select_color(arr)
{
    if(arr[0]['value'] > arr[arr.length-1]['value']) return 'red'
    else if(arr[0]['value'] === arr[arr.length-1]['value']) return 'blue'
    return 'green'
}

