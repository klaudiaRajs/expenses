<div>
    <form class="form-horizontal" action="<?= base_url() ?>/Auth/Register" method="POST">
        <!--        {{--Login--}}-->
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Login</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Login" name="login" value=""/>
            </div>
        </div>
        <!--        {{--Email--}}-->
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Email" name="email" value=""/>
            </div>
        </div>
        <!--        {{--Password--}}-->
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" placeholder="Password" name="password" value=""/>
            </div>
        </div>
        <!--        {{--Income--}}-->
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Income</label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control" placeholder="Income" name="income"
                       value="0000.00"/>
            </div>
        </div>
        <!--        {{--Period start day --}}-->
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Period start day</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name="period_start_day" value="1">
            </div>
        </div>
        <!--        {{--Button--}}-->
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Sign in</button>
            </div>
        </div>
    </form>
</div>