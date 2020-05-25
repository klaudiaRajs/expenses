<?php
    $shopName = isset($shopName) ? $shopName : "";
    $shopLimit = isset($shopLimit) ? $shopLimit : "";
?>

    <div>
        <form class="form-horizontal" action='<?= $action ?>' method="POST">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Shop name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Shop name" name="name" value="<?= $shopName ?>"/>
                    <p class="help-block"></p>
                </div>
                <label for="inputEmail3" class="col-sm-2 control-label">Shop limit</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="limit" value="<?= $shopLimit ?>" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default"> <?= $buttonName?> </button>
                </div>
            </div>
        </form>
    </div>
