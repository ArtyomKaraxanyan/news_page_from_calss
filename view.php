<?php
require_once 'components/Database.php';
require_once 'layouts/header.php';
require_once 'cookies_sessions/session_on.php';



?>



            <?php
            require_once 'layouts/left-sidebar.php';
            ?>



        <div class="col-md-9 right">
            <div class="news ">
            <?php
if (isset($_GET['id'])) {
            $id = $_GET['id'];
            //$stmt = $conn->query("SELECT * FROM news where id=" . $id);
            //$data = $stmt->fetch(PDO::FETCH_ASSOC);
    $conn = new Database("news_app", "root", "", "project.local");
            $table1 = 'news';
            $where = '';
            $limit = '';
            $order = '';
            $where_mode = '';
            $select_fields = '*';
           $f = 'id';

            $query = 'SELECT ' . $select_fields . ' FROM `' . $table1 . '`'. ' WHERE ' . $f . '=' . $id;
        $data = $conn->query($query)->result_array();
       // $data=$stmt->result_array();

     //print_r($data);die();
        } else {
            header("Location: index.php");
        }

        ?>
           <?php if(!empty($data)){?>

                        <h2 class="title"><?php echo $data['news_name'];?></h2>
                        <div class="image_container"><img src="uploads/<?php echo $data['image_path'];?>"</div>
                        <div class = "description"><?php echo $data['description'];?></div>
                        <div><?php echo $data['content'];?></div>
                        <div class="news_date">Created  : <?php echo $data['date_of_creating'];?>  </div>
                    </div>

            <?php } ?>
        </div>
    </div>
</div>

<?php  require_once 'layouts/footer.php'; ?>


