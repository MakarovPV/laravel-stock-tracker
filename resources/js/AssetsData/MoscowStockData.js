import {AssetData} from './AssetData'
export {MoscowStockData}

class MoscowStockData extends AssetData {

    fillArrayDataFromJson(json_from_api)
    {
        this.dataArray = []

        if (!Array.isArray(json_from_api)) {
            throw new Error('Unexpected MOEX response')
        }

        for(let val of  json_from_api){
            this.dataArray.push({
                date: val[val.length-1],
                value: Number(val[1]),
            })
        }

        return this.getDataArray()
    }
}
