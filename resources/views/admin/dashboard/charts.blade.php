<div class="application_statics">
    <h4>Resumen Actual</h4>
    <div class="row">
        <div class="col-5">
            <form action="">
                <input type="date" name="form" class="form-control" id="from">
            </form>
        </div>
        <div class="col-5">
            <form action="">
                <input type="date" name="to" class="form-control" id="to">
            </form>
        </div>
        <div class="col-2">
            <button class="btn btn-sm btn-dark btn-block p-2" onclick="filter.clear()">{{ __("Limpiar") }}</button>
        </div>
    </div>
    <div id="chart" style="height: 300px;" class="c_container"></div>
</div>

@push("js")
    <!-- Charting library -->
    <script src="https://unpkg.com/chart.js@2.9.3/dist/Chart.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/chartjs@2.0.3/dist/chartisan_chartjs.js"></script>
    <script>
        let from = null, to = null, fromVal = null, toVal = null;
        const chart = new Chartisan({
            el: '#chart',
            url: `/api/chart/admin/profit?from=${fromVal}&to=${toVal}`,
            hooks: new ChartisanHooks()
                .colors(['#e35a9a', '#041a2c'])
                .responsive()
                .beginAtZero()
                .legend({
                    position: 'bottom'
                })
                .title('{{ __("Ganancias totales en :app", ["app" => env("APP_NAME")]) }}')
                .datasets([{type: 'line', fill: true}])
                .tooltip({
                    callbacks: {
                        label: function (data) {
                            return `Ganancias: ${data.value} $`;
                        }
                    }
                })
        });
        const filter = {
            setFrom: (val) => {
                if (!val) return;
                const toInput = $("#to");
                toVal = toInput.val();
                from = new Date(val);
                if (to) {
                    if (to.getTime() < from.getTime()) {
                        toInput.val(val);
                        $("from").val(toVal);
                    }
                    filter.search();
                }
            },
            setTo: (val) => {
                if (!val) return;
                const fromInput = $("#from");
                fromVal = fromInput.val();
                to = new Date(val);
                if (from) {
                    if (to.getTime() < from.getTime()) {
                        fromInput.val(val);
                        $("#to").val(fromVal);
                    }
                    filter.search();
                }
            },
            clear: () => {
                to = null;
                from = null;
                $("#to, #from").val(null);
                chart.update({
                    url: `/api/chart/admin/profit/?from=null&to=null`
                });
            },
            search: () => {
                chart.update({
                    url: `/api/chart/admin/profit/?from=${$("#from").val()}&to=${$("#to").val()}`
                });
            }
        }

        jQuery(document).ready(function () {
            $("#from").on("input", function () {
                const thisVal = $(this).val();
                filter.setFrom(thisVal);
            });
            $("#to").on("input", function () {
                const thisVal = $(this).val();
                filter.setTo(thisVal);
            })
        })
    </script>

@endpush
