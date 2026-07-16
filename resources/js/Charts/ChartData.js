import {DataFactory} from "../AssetsData/DataFactory";
import {StockApiClient} from "../Api/StockApiClient";
import {calculatePercentageChange, renderBalance} from "./Balance";
import {createChart} from "./Charts";

export{ChartData}

class ChartData {
    source = null
    parameters = {}

    constructor(source, parameters, apiClient = new StockApiClient())
    {
        this.source = source
        this.parameters = parameters
        this.apiClient = apiClient
        this.chart = null
    }

    async buildChart()
    {
        try {
            this.showStatus('Загрузка…')

            const jsonFromApi = await this.apiClient.getData(this.source, this.parameters)
            const exchange = new DataFactory(this.source)
            const dataArray = exchange.fillArrayDataFromJson(jsonFromApi, this.parameters.limit)

            if (!Array.isArray(dataArray) || dataArray.length === 0) {
                this.showStatus('Нет данных')
                return
            }

            this.showStatus('')
            this.renderBalance(dataArray)
            this.chart = createChart(`chart_data_${this.parameters.date}`, dataArray)
        } catch (error) {
            console.error(`Unable to build ${this.parameters.date} chart`, error)
            this.showStatus('Не удалось загрузить данные')
        }
    }

    renderBalance(dataArray)
    {
        const first = dataArray[0].value
        const last = dataArray[dataArray.length - 1].value
        const percentage = calculatePercentageChange(first, last)

        renderBalance(`#balance_${this.parameters.date}`, percentage)
    }

    showStatus(message)
    {
        const status = document.getElementById(`chart_status_${this.parameters.date}`)

        if (status) {
            status.textContent = message
        }
    }
}
