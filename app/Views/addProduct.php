<?php
    $productName = isset($productName) ? $productName : "";
    $productPrice = isset($productPrice) ? $productPrice : "";
    $productAmount = isset($productAmount) ? $productAmount : "";
    $purchaseDate = isset($purchaseDate) ? $purchaseDate : date('Y-m-d');
    $productComment = isset($productComment) ? $productComment : "";

    if (empty($shopList) || empty($categoryList)) {
        if (empty($shopList)) {
            echo 'You must first add some shops in order to group the purchases by store.';
        }
        if (empty($categoryList)) {
            echo 'First add some categories!';
        }
    } else {
?>
    <div>
        <form class="form-horizontal" method="POST" action="<?= $action ?>">
            <!--- Product name -->
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Product name</label>
                <div class="col-sm-10">
                    <input type="text"
                           class="form-control"
                           placeholder="Product name"
                           name="productname"
                           value="<?= $productName ?>">
                </div>
            </div>
            <!-- Price -->
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Price</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Price" name="productprice"
                           value="<?= $productPrice ?>">
                </div>
            </div>
            <!-- Amount -->
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Amount</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Amount" name="amount"
                           value="<?= $productAmount ?>">
                </div>
            </div>
            <!-- Shop -->
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Shop</label>
                <div class="col-sm-10">
                    <select class="form-control" name="shop">
                        <?php
                            foreach ($shopList as $shop) {
                                echo '<option value="' . $shop->shop_id . '">' . $shop->name . '</option>';
                            }
                        ?>
                    </select>
                </div>
            </div>
            <!-- Category   -->
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Category</label>
                <div class="col-sm-10">
                    <select class="form-control" name="category">
                        <?php
                            foreach ($categoryList as $category) {
                                echo '<option value="' . $category->category_id . '">' . $category->name . '</option>';
                            }
                        ?>
                    </select>
                </div>
            </div>

            <!-- Date -->
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Date of purchase</label>
                <div class="col-sm-10">
                    <input type="date"
                           style="line-height: 20px"
                           class="form-control"
                           name="date"
                           value="<?= $purchaseDate ?>">
                </div>
            </div>

            <!-- Comment -->
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Comment: </label>
                <div class="col-sm-10">
                    <textarea class="form-control"
                              name="comment" maxlength="255"
                              style="height: 50px;"
                              placeholder="Comment"><?= $productComment ?></textarea>
                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default"> <?= $buttonName ?> </button>
                </div>
            </div>
        </form>
    </div>
    <?php
}