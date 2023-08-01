<?php
// no direct access
defined('EMONCMS_EXEC') or die('Restricted access');
global $session;
?>

<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"></script>

<div id="app" class="bg-light">
    <div style=" background-color:#f0f0f0; padding-top:20px; padding-bottom:10px">
        <div class="container" style="max-width:800px;">
            <h3>Account settings</h3>
        </div>
    </div>
    <div class="container" style="max-width:800px">
        <br>

        <label><b>Username</b></label>
        <div class="input-group mb-3">
            <input type="text" class="form-control" :value="account.username" disabled>
        </div>

        <label><b>Email</b></label>
        <div class="input-group mb-3">
            <input type="text" class="form-control" :value="account.email" disabled>
        </div>

        <br>
        <br>
        
    </div>
</div>

<script>
    var account = {
        username: "<?php echo $session['username']; ?>",
        email: "<?php echo $session['email']; ?>"
    };

    var app = new Vue({
        el: '#app',
        data: {
            account: {...account}
        },
        methods: {
                  
        }
    });
</script>