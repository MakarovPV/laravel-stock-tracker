export {AssetData}

class AssetData {
    dataArray = []

    fillArrayDataFromJson()
    {
        throw new Error(`${this.constructor.name} must implement fillArrayDataFromJson()`)
    }

    getDataArray()
    {
        return this.dataArray
    }
}
