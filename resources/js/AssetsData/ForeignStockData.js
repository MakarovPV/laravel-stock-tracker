import {AssetData} from './AssetData'
export {ForeignStockData}

class ForeignStockData extends AssetData {

    fillArrayDataFromJson(json_from_api, count)
    {
        this.dataArray = []

        const responseKeys = Object.keys(json_from_api ?? {})

        if (responseKeys.length < 2) {
            throw new Error('Unexpected Alpha Vantage response')
        }

        let name = responseKeys[1]

        if (!json_from_api[name] || typeof json_from_api[name] !== 'object') {
            throw new Error('Alpha Vantage time series is missing')
        }

        for(let val in json_from_api[name]){
            let key = Object.keys(json_from_api[name][val])[0]
            this.dataArray.push({
                date: val,
                value: Number(json_from_api[name][val][key]),
            })
            if(this.dataArray.length >= count) break
        }

        this.dataArray.reverse()

        return this.getDataArray()
    }
}
