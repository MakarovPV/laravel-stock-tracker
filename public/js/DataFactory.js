import {MoscowStockData} from "./MoscowStockData"
import {ForeignStockData} from "./ForeignStockData"
export {DataFactory}

class DataFactory {
    constructor(data_name) {
        switch (data_name){
            case 'moscow': return new MoscowStockData();
            case 'foreign': return new ForeignStockData();
        }
    }
}
