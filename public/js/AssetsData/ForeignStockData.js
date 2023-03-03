import {AssetData} from './AssetData'
export {ForeignStockData}

class ForeignStockData extends AssetData {

    fillArrayDataFromJson(json_from_api, count)
    {
        let name = Object.keys(json_from_api)[1]
        for(let val in json_from_api[name]){
            let key = Object.keys(json_from_api[name][val])[0]
            this.data_array.push({
                date: val,
                value: json_from_api[name][val][key],
            })
            if(this.data_array.length >= count) break
        }
        this.getDataArray().reverse()
    }
}
