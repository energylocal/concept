<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>

<div id="app" class="bg-light">
    <div style=" background-color:#f0f0f0; padding-top:20px; padding-bottom:10px">
        <div class="container">
            <h3>EnergyLocal clubs</h3>
        </div>
    </div>

    <br>

    <!-- 3 bootstrap cards in equally spaced columns -->
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-2 g-lg-3">
            <div class="col" v-for="club in clubs">
                <div class="card p-3">
                    <div class="card-body">
                        <i class="fa fa-bolt" style="font-size:50px; float:left; color: #29abe2" v-if="club.generator=='hydro'">&nbsp;</i>
                        <i class="fa fa-wind" style="font-size:50px; float:left; color: #27c93f" v-if="club.generator=='wind'">&nbsp;</i>
                        <i class="fa fa-solar-panel" style="font-size:50px; float:left; color: #FFDC00" v-if="club.generator=='solar'">&nbsp;</i>
                        <i class="fa fa-bolt" style="font-size:50px; float:left; color: #446308" v-if="club.generator=='AD power'">&nbsp;</i>


                        <h5 class="card-title">{{ club.name }}</h5>
                        <p class="card-text">{{ club.generator }} is generating {{ club.generation | toFixed(1) }} kW</p>

                        <!--<h1><i class="fa fa-meh" style="color:#E6602B"></i></h1>
                            <h1><i class="fa fa-frown" style="color: #c20000;"></i></h1>-->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>

<script>
    var clubs = <?php echo json_encode($clubs); ?>;

    // change generation using random number
    for (var i = 0; i < clubs.length; i++) {
        clubs[i].generation = Math.floor(Math.random() * 100);
    }
    var app = new Vue({
        el: '#app',
        data: {
            clubs: clubs
        },
        filters: {
            toFixed: function (value, precision) {
                if (!value) value = 0;
                return value.toFixed(precision);
            }
        }
    })

</script>