import {DataFactory} from "../AssetsData/DataFactory";
import {Charts} from "./Charts";

export{ChartData}

class ChartData {
    source = null
    parameters = {
        moscow: {
            segment: null,
            ticker: null,
            interval: null,
            limit: null,
            date: null,
        },
        foreign: {
            segment: null,
            ticker: null,
            interval: null,
            limit: null,
            date: null,
        },
        crypto: {
            segment: null,
            ticker: null,
            interval: null,
            limit: null,
            date: null,
        },
    }

    constructor(source, parameters)
    {
        this.source = source
        this.setParams(parameters)
    }

    setParams(parameters)
    {
        this.parameters = Object.assign(this.parameters, parameters)
    }

    async buildChart()
    {
        let json_from_api = await this.getDataFromApi().then((response) => { return response.json() })
        let exchange = this.getObjFromFactory()
        exchange.fillArrayDataFromJson(json_from_api, this.parameters[this.source].limit)

        this.calculateBalance(`#balance_${this.parameters[this.source].date}`, exchange['data_array'])
        Charts(`chart_data_${this.parameters[this.source].date}`, exchange['data_array'])
    }

    async getDataFromApi()
    {
        return fetch(`/api/${this.source}` + '?' + new URLSearchParams(this.parameters[this.source]), {
            headers : {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        })
    }

    getObjFromFactory()
    {
        return new DataFactory(this.source)
    }

    calculateBalance(elem_id, data_array)
    {
        let first = data_array[0].value
        let last = data_array[data_array.length-1].value
        if(first<last){
            $(elem_id).addClass('text-success').html('+' + (100 - (first / (last / 100))).toFixed(1) + '%')
        } else {
            $(elem_id).addClass('text-danger').html('-' + (100 - (last / (first / 100))).toFixed(1) + '%')
        }
    }
}
