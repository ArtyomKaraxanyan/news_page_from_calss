

<?php
require_once 'layouts/header.php';
require_once 'cookies_sessions/session_on.php';
//var_dump($_SESSION['name']);
$id = $_SESSION['id'];


$conn = new Database("news_app", "root", "", "project.local");
//echo '<pre>',print_r($conn);die();
$table1 = 'registr_s';
$where = '';
$order = false;
$limit = false;
$where_mode = '';
$select_fields = '*';
$table2 = 'countries';
$f3='country_id';
$f1 = 'id';
$f2 = 'title' ;
$f = 'country_name' ;
//join
$query = ('SELECT ' . $table1 . '.' . $select_fields . ',' . $table2 . '.' . $f1 . ',' . $table2 . '.' . $f2 .
    ' FROM ' . $table1 . ' LEFT ' . ' JOIN ' . $table2 . ' ON ' . $table1 . '.' . $f3 . '=' . $table2 . '.' . $f1 .$where=array($table1['id']=>$id)) ;
$data = $conn->query($query)->result_array();

//var_dump($data);die();

//$sql="select r.*, c.id as country_id, c.title as country_name from registr_s as r left join countries as c on r.country_id = c.id where r.id = '$id'";
//$stmt = $conn->query($sql);
//$data =$stmt->fetch(PDO::FETCH_ASSOC);
//var_dump($data);
$f_name =$data['f_name'];
$l_name = $data['l_name'];
$email = $data['email'];
$country = $data['country_name'];
$img = $data['profile_path']
?>


<?php
require_once 'layouts/left-sidebar.php';
?>
    <div class="col-md-9 right">

        <div class="container">
            <h2 class="about_info">Welcome <?= $f_name ;?></h2>
            <img src ="uploads/profiles/<?=$img;?>"  class="profile_img_size">
            <ul>

                <li>Last Name: <?= $l_name ; ?></li>
                <li>Email address:  <?= $email ; ?> </li>
                <li>Country: <?= $country ; ?> </li>

            </ul>
            <a href ="admin.php" class="admin">Please just enter here if you want to add news.</a>

        </div>
    </div>

    </div>
    </div>
<?php require_once 'layouts/footer.php'; ?>