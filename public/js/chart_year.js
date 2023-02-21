import {Charts} from "./charts";
import {getDataFromApi, options} from "./script";
import {DataFactory} from "./DataFactory";

//Диаграмма с данными за год.

const records_count = 52
options.time = 7
options.segment = (options.source === "moscow") ? "year" : "weekly";

let json_api = await getDataFromApi(`/api/${options.source}`, new URLSearchParams(options))
let exchange = new DataFactory(options.source)

exchange.fillArrayDataFromJson(json_api, records_count)

Charts('chart_data_year', exchange['data_array']);
