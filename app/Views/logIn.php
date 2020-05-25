    <div>
        <form class="form-horizontal" method="POST" action="<?= base_url() ?>/Auth/LogIn">
            <!-- User name -->
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Login</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Login" name="login">
                </div>
            </div>
            <!-- Password -->
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Sign in</button>
                </div>
                <div class="col-sm-offset-2 col-sm-10" style="margin-top:30px;">
                    <a class="btn btn-default" href="<?= base_url() ?>/Auth/RegisterForm" role="button">Register</a>
                </div>
            </div>
        </form>
    </div>
