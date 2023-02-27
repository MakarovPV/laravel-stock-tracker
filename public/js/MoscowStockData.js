import {AssetData} from './AssetData'
export {MoscowStockData}

class MoscowStockData extends AssetData {

    fillArrayDataFromJson(json_from_api)
    {
        for(let val of  json_from_api){
            this.data_array.push({
                date: val[val.length-1],
                value: val[1],
            })
        }
        this.getDataArray()
    }
}
