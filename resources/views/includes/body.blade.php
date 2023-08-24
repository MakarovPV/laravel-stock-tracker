<div class="col-10 row pt-2">
    <div id="body_div ">
        <div class="card ">
        <div class="text-center ">
            <h1 id="stock_name_header" class="pt-3"></h1>
        </div>
        </div>
        <div class="row col-11 pt-2 " >
            <div class="col-1"></div>
            <div class="col-5 card h-50 chart">
                <div class="pt-3 pb-3 border-bottom row">
                    <div class="col-1"></div>
                    <h3 class="col-8 fw-bolder">Изменения за день</h3>
                    <h3 class="col-3" id="balance_day"></h3>
                </div>
                <canvas id="chart_data_day" class="pt-3"></canvas>
            </div>

            <div class="col-1"></div>

            <div class="col-5 card h-50  chart">
                <div class="pt-3 pb-3 border-bottom row">
                    <div class="col-1"></div>
                    <h3 class="col-8 fw-bolder">Изменения за неделю</h3>
                    <h3 class="col-3" id="balance_week"></h3>
                </div>
                <canvas id="chart_data_week" class="pt-4"></canvas>
            </div>


            <div class="pt-4"></div>
            <div class="col-1"></div>
            <div class="col-5 card h-50 chart">
                <div class="pt-3 pb-3 border-bottom row">
                    <div class="col-1"></div>
                    <h3 class="col-8 fw-bolder">Изменения за месяц</h3>
                    <h3 class="col-3" id="balance_month"></h3>
                </div>
                <canvas id="chart_data_month" class="pt-3"></canvas>
            </div>

            <div class="col-1"></div>

            <div class="col-5 card h-50 chart">
                <div class="pt-3 pb-3 border-bottom row">
                    <div class="col-1"></div>
                    <h3 class="col-8 fw-bolder">Изменения за год</h3>
                    <h3 class="col-3" id="balance_year"></h3>
                </div>
                <canvas id="chart_data_year" class="pt-4"></canvas>
            </div>
        </div>
    </div>

</div>
