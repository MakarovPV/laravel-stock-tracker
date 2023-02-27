import {Charts} from "./charts";
import {calculateBalance, getDataFromApi, options} from "./script";
import {DataFactory} from "./DataFactory";

//Диаграмма с данными за день.
options.time = 10
options.interval = 30
options.segment = (options.source === "moscow") ? "day" : "intraday";

let json_api = await getDataFromApi(`/api/${options.source}`, new URLSearchParams(options))
let exchange = new DataFactory(options.source)

exchange.fillArrayDataFromJson(json_api, 30)
calculateBalance('#balance_day', exchange['data_array'])

Charts('chart_data_day', exchange['data_array']);
