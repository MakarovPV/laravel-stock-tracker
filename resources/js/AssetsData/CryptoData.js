import {AssetData} from './AssetData'
export {CryptoData}

const dateFormatter = new Intl.DateTimeFormat('ru-RU', {
    year: 'numeric',
    month: '2-digit',
    day: '2-digit',
    hour: '2-digit',
    minute: '2-digit',
})

class CryptoData extends AssetData {

    fillArrayDataFromJson(json_from_api, count)
    {
        this.dataArray = []

        const rows = json_from_api?.Data?.Data

        if (!Array.isArray(rows)) {
            throw new Error('Unexpected CryptoCompare response')
        }

        let arr = [...rows].reverse()

        for(let val in arr){
            let date = new Date(arr[val]["time"] * 1000)
            this.dataArray.push({
                date: dateFormatter.format(date),
                value: Number(arr[val]['open']),
            })
            if(this.dataArray.length >= count) break
        }

        this.dataArray.reverse()

        return this.getDataArray()
    }
}
