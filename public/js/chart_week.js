import {Charts} from "./charts";
import {calculateBalance, getDataFromApi, options} from "./script";
import {DataFactory} from "./DataFactory";

//Диаграмма с данными за неделю.
const records_count = 7
options.time = 60
options.interval = 60
options.segment = (options.source === "moscow") ? "week" : "intraday";

let json_api = await getDataFromApi(`/api/${options.source}`, new URLSearchParams(options))
let exchange = new DataFactory(options.source)

exchange.fillArrayDataFromJson(json_api)
calculateBalance('#balance_week', exchange['data_array'])

Charts('chart_data_week', exchange['data_array']);
