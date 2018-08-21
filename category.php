
<?php
$id = $_GET['id'];

if(!$id){
    header('location:'.$_SERVER['HTTP_REFERER']);
}

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
    ' FROM ' . $table1 . ' inner ' . ' JOIN ' . $table2 . ' ON ' . $table1 . '.' . $f . '=' . $table2 . '.' . $f1 . ' WHERE ' . $table2 .'.'. $f1 . '=' . "$id" ) ;
$data = $conn->query($query)->result_array();

//$sql = "select n1.*, c1.id as c_id, c1.title as category_name from news as n1 inner join categories as c1
// ON n1.category_id=c1.id where c1.id = '$id' order by id desc ";
//$stmt = $conn-> query($sql);
//$data = $stmt->fetchAll();
?>
<div class="col-md-9 right">
    <?php if(!empty($data)) : ?>
        <div class="news_list ">
            <?php foreach($data as $item):?>
                <h4 class="title"><a href="view.php?id=<?php echo $item['id']; ?>"><?php echo $item['news_name']; ?></a>
                </h4>
                <div class="image_container">
                    <img src="uploads/<?php echo $item['image_path']; ?>">
                </div>
                <div class="description"><?php echo $item['description']; ?></div>

                <div class="category">Category: <?php
                    echo $item['title'];

                    ?> </div>
            <?php endforeach;  ?>
        </div>


    <?php endif;?>
</div>

</div>
</div>
<?php  require_once 'layouts/footer.php'; ?>
