<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<div id="app" class="bg-light">
    <div style=" background-color:#f0f0f0; padding-top:20px; padding-bottom:10px">
        <div class="container">
            <h3 v-if="!admin">My Account</h3>
        </div>
    </div>

    <br>

    <!-- 3 bootstrap cards in equally spaced columns -->
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fa fa-smile" style="font-size:50px; float:left; color: #27c93f">&nbsp;</i>
                        <h5 class="card-title">It's a good time to use power</h5>
                        <p class="card-text">Hydro is generating 50 kW</p>

                        <!--<h1><i class="fa fa-meh" style="color:#E6602B"></i></h1>
                            <h1><i class="fa fa-frown" style="color: #c20000;"></i></h1>-->

                    </div>
                </div>
            </div>
              <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fa fa-bolt" style="font-size:50px; float:left; color: #ffdc00;">&nbsp;</i>
                        <div style="float: left;">
                          <h5 class="card-title">Live usage</h5>
                          <p class="card-text">Last updated 14:38</p>
                        </div>
                        <div style="font-size:40px; float: right; color: #ffdc00;">
                          0.7kW
                        </div>
                    </div>
                </div>
            </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <i class="fa fa-pound-sign" style="font-size:50px; float:left; color: #3B6358;">&nbsp;</i>
                <div class="" style="font-size:40px; float:right; color: #3B6358;">26p/kWh</div>
                <h5 class="card-title">Current Price</h5>
                <p class="card-text">Estimated</p>
              </div>
            </div>
          </div>
        </div>
    </div>
    <br>

    <!-- list of buttons Today, Week, Month, Year, ALl all using outline and not grouped-->
    <div class="container">
        <div class="input-group" role="group" aria-label="Basic outlined example" style="width:500px">
            <button type="button" class="btn btn-outline-primary">Day</button>
            <button type="button" class="btn btn-outline-primary active">Week</button>
            <button type="button" class="btn btn-outline-primary">Month</button>
            <button type="button" class="btn btn-outline-primary">Year</button>
            <button type="button" class="btn btn-outline-primary">All</button>

            <button type="button" class="btn btn-outline-secondary"><i class="fa fa-arrow-left"></i></button>
            <input type="text" class="form-control" placeholder="Text here">
            <button type="button" class="btn btn-outline-secondary"><i class="fa fa-arrow-right"></i></button>
        </div>

        <div class="btn-group" role="group" aria-label="Basic outlined example" style="float:right; margin-left:20px">
            <button type="button" class="btn btn-primary"><i class="fa fa-chart-bar"></i></button>
            <button type="button" class="btn btn-outline-primary"><i class="fa fa-chart-pie"></i></button>
        </div>

        <div class="btn-group" role="group" aria-label="Basic outlined example" style="float:right;">
            <button type="button" class="btn btn-primary">kWh</button>
            <button type="button" class="btn btn-outline-primary">£</button>
        </div>


    </div>

    <div class="container mb-5">
        <div id="chart"></div>
    </div>
</div>
<script>
    var options = {
        colors_style_guidlines: ['#29ABE2', '#3B6358', '#27C93F', '#C92760'],
        colors: ['#29AAE3', '#59643B', '#FFB401', '#E6602B'],
        chart: {
            type: 'bar',
            stacked: true,
            height: 500,
            toolbar: {
                show: false
            }
        },
        dataLabels: {
            enabled: false
        },
        series: [ ],
        xaxis: { }
    };

    var chart = false;

    // axios get account/data
    axios.get(path+'account/data')
        .then(function(response) {
            console.log(response.data);

            // data example:
            // {"2023-07-02":{"time":1688252400,"demand":{"overnight":2.182,"daytime":0.021,"evening":0.071,"total":2.274}}}
            
            // loop through data and add to series
            var overnight = [];
            var daytime = [];
            var evening = [];
            var hydro = [];

            var categories = [];
            for (var key in response.data) {
                var obj = response.data[key];
                hydro.push(obj.generation.total);
                overnight.push(obj.import.overnight);
                daytime.push(obj.import.daytime);
                evening.push(obj.import.evening);
                categories.push(key);
            }

            options.series = [{
                name: 'Hydro',
                data: hydro
            }, {
                name: 'Overnight',
                data: overnight
            }, {
                name: 'Daytime',
                data: daytime
            }, {
                name: 'Evening',
                data: evening
            }];
            options.xaxis.categories = categories;

            chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
        })
        .catch(function(error) {
            console.log(error);
        })
        .then(function() {
            // always executed
        });
</script>
