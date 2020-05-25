<a class="btn btn-default" style="margin-bottom: 15px;" href="<?= base_url() ?>/Shop" role="button">Add a shop</a>
<table class="table table-bordered">
    <tr>
        <th colspan="4"> You buy in following shops:  </th>
    </tr>
    <tr>
        <?php
        for ($i = 0; $i < count($shopList); $i ++) {
            echo '<td>' . $shopList[$i]->name . '</td>';
            echo '<td>' . $shopList[$i]->limit . '</td>';
            echo '<td> <a class="btn btn-default" href="/Shop/EditForm/' .
                $shopList[$i]->shop_id . '" role="button">Edit</a> </td>';
            echo '<td> <a class="btn btn-default" href="/Shop/Delete/' .
                $shopList[$i]->shop_id . '" role="button">Delete</a> </td><tr/>';

        }?>
</table>
