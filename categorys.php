
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

 //$data = $conn->select( )->join_array($table1);
//$data->email($email );

$query = ('SELECT ' . $table2 . '.'. $f2  . $table2 . ' LEFT ' . ' JOIN ' . $table1.
    ' ON ' . $table2 . '.' . $f1 . '=' . $table1 . '.' . $f) ;
$data = $conn->query($query)->result_array();

//$sql = "SELECT categories.title, COUNT(category_id) FROM categories LEFT JOIN news ON categories.id = news.category_id
//GROUP BY categories.title";
//$stmt = $conn->query($sql);
//$data = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>


<div class="col-md-9 right">

    <div class="col-md-8">
        <h3 class="about_info">Information about  Category </h3>
        <h4>
            <?php foreach ($data as $item  ):?>
            <?php echo  $item['title']; ?>
              <?php endforeach; ?>
        </h4>


        <p>
            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in
            some form, by injected humour, or randomised words which don't look even slightly believable.
            If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden
            in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks
            as necessary, making this the first true generator on the Internet.
        </p>
    </div>
</div>


<?php  require_once 'layouts/footer.php'; ?>