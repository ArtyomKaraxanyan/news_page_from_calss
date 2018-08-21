<?php
require_once 'components/Database.php';
require_once 'layouts/header.php';
?>


<?php
require_once 'layouts/left-sidebar.php';
?>


<?php
$conn = new Database("news_app", "root", "", "project.local");
//echo '<pre>',print_r($conn);die();
$table1 = 'news';
$where = '';
$order = false;
$limit = false;
$where_mode = '';
$select_fields = '*';
$table2 = 'categories';
$f1 = 'id';
$f2 = 'title' ;
$f = 'category_id' ;

$query = ('SELECT ' . $table1 . '.' . $select_fields . ',' . $table2 . '.' . $f1 . ',' . $table2 . '.' . $f2 .
    ' FROM ' . $table1 . ' LEFT ' . ' JOIN ' . $table2 . ' ON ' . $table1 . '.' . $f . '=' . $table2 . '.' . $f1) ;
$data = $conn->query($query)->result_array();
?>

<div class="col-md-9 right">
    <div class="news_list ">
        <?php if (!empty($data)): ?>
            <?php foreach ($data as $item):?>


                <h4 class="title"><a href="view.php?id=<?php echo $item['id']; ?>"><?php echo $item['news_name']; ?></a>
                </h4>
                <div class="image_container">
                    <img src="uploads/<?php echo $item['image_path']; ?>">
                </div>
                <div class="description"><?php echo $item['description']; ?></div>


                <div class="category">Category: <?php
                    echo $item['title'];
                   // echo $category['title'];

                    ?> </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
</div>
</div>




<?php require_once 'layouts/footer.php'; ?>


