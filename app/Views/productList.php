<a class="btn btn-default" style="margin-bottom: 15px;" href="<?= base_url() ?>/Product" role="button">Add a product</a>
<table class="table table-bordered">
    <tr>
        <th colspan="8"> You buy in following shops:  </th>
    </tr>
    <tr>
        <td>Name</td>
        <td>Price</td>
        <td>Amount</td>
        <td>Date</td>
        <td>Comment</td>
        <td>Total</td>
    </tr>
    <tr>
        <?php
        foreach($productList as $product) {
            echo '<td>' . $product->name . '</td>';
            echo '<td>' . $product->price . '</td>';
            echo '<td>' . $product->amount . '</td>';
            echo '<td>' . $product->purchase_date . '</td>';
            echo '<td>' . $product->comment . '</td>';
            echo '<td>' . round($product->price * $product->amount, 2) . '</td>';
            echo '<td> <a class="btn btn-default" href="/Product/EditForm/' .
                $product->product_id . '" role="button">Edit</a> </td>';
            echo '<td> <a class="btn btn-default" href="/Product/Delete/' .
                $product->product_id . '" role="button">Delete</a> </td><tr/>';

        }?>
</table>
