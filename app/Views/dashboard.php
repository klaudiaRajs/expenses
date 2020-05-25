<?php
$warningIcon = '<span class="glyphicon glyphicon-warning-sign" 
                    style="padding-right: 10px" 
                    title="You have reached limit for this category!"></span>';

?>
<div class="row">
    <div class="col">
        <h2> Your current savings for period: <strong><?=$savings?></strong> </h2>
    </div>
</div>

<div class="row">
    <table class="table table-bordered">
        <tr>
            <th colspan="11"> Your expenses during current period per category:</th>
        </tr>
        <tr style="border-bottom: #222222 solid 4px">
            <td>Category</td>
            <td>Total</td>
        </tr>
        <tr>
            <?php
            foreach ($categorySums as $category) {
                if ($category['limitReached']) {
                    echo '<tr style="background-color: #dd4814" ><td>' . $warningIcon;
                    echo $category['name'];
                    echo '</td>';
                } else {
                    echo '<tr><td>' . $category['name'] . '</td>';
                }
                echo '<td>' . $category['total'] . '</td></tr>';
            }

            ?>
        </tr>
    </table>
    <table class="table table-bordered">
        <tr>
            <th colspan="11"> Your expenses during current period per shop:</th>
        </tr>
        <tr style="border-bottom: #222222 solid 4px">
            <td>Shop</td>
            <td>Total</td>
        </tr>
        <tr>
            <?php
            foreach ($shopSums as $shop) {
                if ($shop['limitReached']) {
                    echo '<tr style="background-color: #dd4814" ><td>' . $warningIcon;
                    echo $shop['name'];
                    echo '</td>';
                } else {
                    echo '<tr><td>' . $shop['name'] . '</td>';
                }
                echo '<td>' . $shop['total'] . '</td></tr>';
            }

            ?>
        </tr>
    </table>
</div>
