<?php
// no direct access
defined('EMONCMS_EXEC') or die('Restricted access');
?>

<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div id="app" class="container" style="padding-top:120px; height:800px;">

    <div class="row" style="color:#fff">
        <div class="col-6">
            <h1><img src="<?php echo $path; ?>theme/energylocal_logo_120.png" style="width:80px" /> Energy<span style="color:#fff">Local</span></h1><br>
            <p style="color:#fff; font-size:18px; line-height:22px">Energy Local is transforming the electricity market for communities and small-scale renewable generators.<br><br>Our mission is to help communities get more value from renewable generation by using the electricity locally.</p>
        </div>
        <div class="col-4 ms-auto">
            <div class="card">
                <div class="card-body bg-light">

                    <h1 class="h3 mb-3 fw-normal">Login</h1>

                    <label>Username</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" v-model="username">
                    </div>

                    <label>Password</label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" v-model="password">
                    </div>

                    <button type="button" class="btn btn-primary" @click="login">Login</button>
                    <!--&nbsp;<a href="#">Forgot password</a>-->

                    <div class="alert alert-danger" style="margin-top:20px; margin-bottom: 5px;" v-if="error" v-html="error"></div>
                    <div class="alert alert-success" style="margin-top:20px; margin-bottom: 5px;" v-if="success" v-html="success"></div>

                </div>

            </div>
        </div>
    </div>
<br><br>
    <div class="row" style="color:#fff">
        <div class="col-4 blink" @click="window.location.href='<?php echo $path;?>clubs'" style="cursor:pointer">
            <h2><i class="fa-solid fa-location-dot" style="color:#29abe2"></i> Explore Clubs</h2>
            <p>EnergyLocal clubs are communities that are already using low cost local power.</p>
        </div>
        <div class="col-4 blink">
            <h2><i class="fa-solid fa-person-digging" style="color:#FFDC00"></i> Get involved</h2>
            <p>See how we can help your community benefit form local power.</p>
        </div>
        <div class="col-4 blink">
            <h2><i class="fa-solid fa-child-reaching" style="color:#27c93f"></i> How it works</h2>
            <p>See how a local energy market can work for you.</p>
        </div>
    </div>


</div>

<script>
    document.body.style.backgroundColor = "#1d8dbc";

    var app = new Vue({
        el: '#app',
        data: {
            username: "",
            password: "",
            error: false,
            success: false
        },
        methods: {
            login: function() {
                const params = new URLSearchParams();
                params.append('username', this.username);
                params.append('password', this.password);

                axios.post(path + "user/login.json", params)
                    .then(function(response) {
                        if (response.data.success) {
                            window.location.href = path + "account/view";
                        } else {
                            app.error = response.data.message;
                            app.success = false;
                        }
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            }
        }
    });

    var result = {};
    if (result.success != undefined) {
        if (result.success) {
            app.success = result.message;
            app.error = false;
        } else {
            app.error = result.message;
            app.success = false;
        }
    }
</script>