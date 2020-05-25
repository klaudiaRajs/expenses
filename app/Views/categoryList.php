<a class="btn btn-default" style="margin-bottom: 15px;" href="<?= base_url() ?>/Category" role="button">Add a category</a>

<table class="table table-bordered">
    <tr>
        <th colspan="4"> You have created following categories:  </th>
    </tr>
    <tr>
        <?php
        for ($i = 0; $i < count($categoryList); $i ++) {
            echo '<td>' . $categoryList[$i]->name . '</td>';
            echo '<td>' . $categoryList[$i]->limit . '</td>';
            echo '<td><a class="btn btn-default" href="/Category/EditForm/' . $categoryList[$i]->category_id . '"role="button">Edit</a></td>';
            echo '<td><a class="btn btn-default" href="/Category/Delete/' . $categoryList[$i]->category_id . '"role="button delete" onsubmit="deleteConfirmation()">Delete</a></td><tr/>';
        }?>

</table>
