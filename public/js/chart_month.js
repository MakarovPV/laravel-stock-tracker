import {Charts} from "./charts";
import {getDataFromApi, options} from "./script";
import {DataFactory} from "./DataFactory";

//Диаграмма с данными за месяц.

const records_count = 30
options.time = 24
options.segment = (options.source === "moscow") ? "month" : "daily_adjusted";

let json_api = await getDataFromApi(`/api/${options.source}`, new URLSearchParams(options))
let exchange = new DataFactory(options.source)
exchange.fillArrayDataFromJson(json_api, records_count)

Charts('chart_data_month', exchange['data_array']);


