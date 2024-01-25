import {AssetData} from './AssetData'
export {CryptoData}

class CryptoData extends AssetData {

    fillArrayDataFromJson(json_from_api, count)
    {
        let arr = json_from_api['Data']['Data'].reverse()
        for(let val in arr){
            let date = new Date(arr[val]["time"] * 1000)
            let month =  ((date.getMonth()+1).length < 2) ? '0' + (date.getMonth()+1) : (date.getMonth()+1)
            let day =  (date.getDate().length < 2) ? '0' + (date.getDate()) : (date.getDate())
            let hour =  (date.getHours().length < 2) ? '0' + (date.getHours()) : (date.getHours())
            let min =  (date.getMinutes().length < 2) ? '0' + (date.getMinutes()) : (date.getMinutes())
            this.data_array.push({
                date: date.getFullYear() + '-' + month + '-' + day + ' ' + hour + '-' + min,
                value: arr[val]['open'],
            })
            if(this.data_array.length >= count) break
        }
        this.getDataArray().reverse()
    }
}
