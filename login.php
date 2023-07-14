<?php
// no direct access
defined('EMONCMS_EXEC') or die('Restricted access');
?>

<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"></script>

<div id="app" class="container" style="max-width:380px; padding-top:120px; height:800px;">

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
            &nbsp;<a href="#">Forgot password</a>

            <div class="alert alert-danger" style="margin-top:20px; margin-bottom: 5px;" v-if="error" v-html="error"></div>
            <div class="alert alert-success" style="margin-top:20px; margin-bottom: 5px;" v-if="success" v-html="success"></div>

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
                            window.location.href = path + "system/list";
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
    if (result.success!=undefined) {
        if (result.success) {
            app.success = result.message;
            app.error = false;
        } else {
            app.error = result.message;
            app.success = false;
        }
    }
</script>