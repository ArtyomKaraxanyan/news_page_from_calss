<?php
require_once 'components/Database.php';


$conn = new Database("news_app", "root", "", "project.local");
//echo '<pre>',print_r($conn);die();
$table = 'categories';
$where = '';
$limit = '';
$order = '';
$where_mode = '';
$select_fields = '*';

$data = $conn->select($table, $where, $limit, $order, $where_mode, $select_fields)->result_array();
//$stmt = $conn->query("SELECT * FROM categories");
//$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="container">
    <div class="row">
        <div class="col-md-3 left">
            <h3 style="font-style: italic">Categories</h3>
            <ul class="category_nav" id="sortable">
                <?php foreach ($data as $value):?>
                    <li><a href="category.php?id=<?= $value['id']


                        ?>"><?= $value['title']?></a> </li>
                <?php endforeach;?>
            </ul>

        </div>
