<?php
    $categoryName = isset($categoryName) ? $categoryName : "";
    $categoryLimit = isset($categoryLimit) ? $categoryLimit : "";
?>
    <div>
        <form class="form-horizontal" method="POST" onsubmit="" action="<?= $action ?>">
            <!-- Category name -->
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Category name</label>
                <div id="category_name" class="col-sm-10">
                    <input
                           type="text" class="form-control" placeholder="Category name"
                           name="category_name" value="<?= $categoryName ?>" required>
                </div>
            </div>
            <!-- Limit -->
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Category limit</label>
                <div class="col-sm-10">
                    <input type="text"
                           class="form-control" name="limit" value="<?= $categoryLimit ?>" required>
                    </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button id="submit" type="submit" class="btn btn-default" name="added"> <?= $buttonName; ?> </button>
                </div>
            </div>
        </form>
    </div>