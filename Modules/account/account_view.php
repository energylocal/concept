<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

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
        series: [{
                name: 'Hydro',
                data: [30, 33, 35, 50, 49, 60, 70]
            },
            {
                name: 'Overnight',
                data: [43, 41, 35, 50, 49, 60, 70]
            },
            {
                name: 'Daytime',
                data: [22, 35, 35, 50, 49, 60, 70]
            },
            {
                name: 'Evening',
                data: [15, 38, 35, 50, 49, 60, 70]
            }
        ],
        xaxis: {
            categories_foo: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998, 1999],
            categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']

        }
    }

    var chart = new ApexCharts(document.querySelector("#chart"), options);

    chart.render();
</script>