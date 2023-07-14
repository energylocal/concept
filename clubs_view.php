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
                        <i class="fa fa-bolt" style="font-size:50px; float:left; color: #29abe2" v-if="club.generator=='Hydro'">&nbsp;</i>
                        <i class="fa fa-wind" style="font-size:50px; float:left; color: #27c93f" v-if="club.generator=='Wind'">&nbsp;</i>
                        <i class="fa fa-solar-panel" style="font-size:50px; float:left; color: #FFDC00" v-if="club.generator=='Solar'">&nbsp;</i>
                        <i class="fa fa-bolt" style="font-size:50px; float:left; color: #446308" v-if="club.generator=='AD Power'">&nbsp;</i>


                        <h5 class="card-title">{{ club.name }}</h5>
                        <p class="card-text">{{ club.generator }} is generating {{ club.generation }} kW</p>

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
    var clubs = [
        {
            "name":"Bethesda",
            "members": 10,
            "generation": 50,
            "consumption": 20,
            "generator": "Hydro"
        },
        {
            "name":"Corwen",
            "members": 10,
            "generation": 50,
            "consumption": 20,
            "generator": "Hydro"
        },
        {
            "name":"Crickhowell",
            "members": 10,
            "generation": 50,
            "consumption": 20,
            "generator": "Hydro"
        },
        //mach
        {
            "name":"Machynlleth",
            "members": 10,
            "generation": 50,
            "consumption": 20,
            "generator": "Hydro"
        },
        // bridport
        {
            "name":"Bridport",
            "members": 10,
            "generation": 50,
            "consumption": 20,
            "generator": "Wind"
        },
        // Roupell park
        {
            "name":"Roupell Park",
            "members": 10,
            "generation": 50,
            "consumption": 20,
            "generator": "Solar"
        },
        // LLandysul
        {
            "name":"Llandysul",
            "members": 10,
            "generation": 50,
            "consumption": 20,
            "generator": "Solar"
        },
        // Capel Dewi
        {
            "name":"Capel Dewi",
            "members": 10,
            "generation": 50,
            "consumption": 20,
            "generator": "Solar"
        },
        // Dyffryn Banw
        {
            "name":"Dyffryn Banw",
            "members": 10,
            "generation": 50,
            "consumption": 20,
            "generator": "AD Power"
        }
    ];
    // change generation using random number
    for (var i = 0; i < clubs.length; i++) {
        clubs[i].generation = Math.floor(Math.random() * 100);
    }
    var app = new Vue({
        el: '#app',
        data: {
            clubs: clubs
        }
    })

</script>