<?php 
Class BlogProject{
    private $conn;

    public function __construct()
    {
        $dbHost = "localhost:3307";
        $dbUser = "root";
        $dbPass = "";
        $dbName = "blog_project";

        $this->conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
        if(!$this->conn){
            die("database connection failed");
        }
    }

    public function admin_login($data){
        $admin_email = $data['admin_email'];
        $admin_pass = md5($data['admin_pass']);

        $query = "SELECT * FROM admin_info WHERE admin_email='$admin_email' && admin_pass='$admin_pass'";
        if(mysqli_query($this->conn, $query)){
            $admin_info = mysqli_query($this->conn, $query);
            if($admin_info){
                header("location: dashboard.php");
                $admin_data = mysqli_fetch_assoc($admin_info);
                session_start();
                $_SESSION['adminId'] = $admin_data['id'];
                $_SESSION['admin_name'] = $admin_data['admin_name'];
            }
        }
    }
    public function admin_Logout(){
        unset($_SESSION['adminId']);
        unset($_SESSION['admin_name']);
        header("location: index.php");
    }
    
    public function add_cat($data){
        $cat_name = $data['cat_name'];
        $cat_des = $data['cat_des'];

        $query = "INSERT into category(cat_name, cat_des) VALUE('$cat_name', '$cat_des')";
        if(mysqli_query($this->conn, $query)){
            return "Category Added Successfully";
        }
    }

    public function display_cat(){
        $query = "SELECT * FROM category";
        if(mysqli_query($this->conn, $query)){
            $category = mysqli_query($this->conn, $query);
            return $category;
        }
    }
    public function display_cat_by_id($id){
        $query = "SELECT * FROM category WHERE cat_id=$id";
        if(mysqli_query($this->conn, $query)){
            $category = mysqli_query($this->conn, $query);
            $returnData = mysqli_fetch_assoc($category); 
            return $returnData;
        }
    }

    public function update_category($data){
        $cat_name = $data['u_cat_name'];
        $cat_des = $data['u_cat_des'];
        $idNo = $data['category_id'];
        
        $query = "UPDATE category SET cat_name='$cat_name', cat_des='$cat_des' WHERE cat_id='$idNo'";
        if(mysqli_query($this->conn, $query)){
            return "Category Updated Successfully";
        }
    }

    public function del_category($id){
        $query = "DELETE FROM category WHERE cat_id=$id";
        if(mysqli_query($this->conn, $query)){
            return "Category Deleted Successfully";
        }
    }

    public function add_post($data){
        $post_title = $data['post_title'];
        $post_content = $data['post_content'];
        $post_img = $_FILES['post_img']['name'];
        $post_tmp_name = $_FILES['post_img']['tmp_name'];
        $post_cat = $data['post_cat'];
        $post_summary = $data['post_summary'];
        $post_tag = $data['post_tags'];
        $post_status = $data['post_status'];

        $query = "INSERT into post(post_title, post_content, post_img, post_cat, post_author, post_date, post_comment_count, post_tag, post_summary, post_status) VALUES('$post_title', '$post_content', '$post_img', '$post_cat','Admin', now(), 3, '$post_tag', '$post_summary', '$post_status')";

        if(mysqli_query($this->conn, $query)){
            move_uploaded_file($post_tmp_name, '../upload/'.$post_img);
            return "Post Added Successfully";
        }
    }

    public function display_post(){
        $query = "SELECT * FROM post_with_cat";
        if(mysqli_query($this->conn, $query)){
            $post = mysqli_query($this->conn, $query);
            return $post;
        }
    }
    public function display_post_public(){
        $query = "SELECT * FROM post_with_cat WHERE post_status=1";
        if(mysqli_query($this->conn, $query)){
            $post = mysqli_query($this->conn, $query);
            return $post;
        }
    }

    public function edit_img($data){
        $id = $data['editImg_id'];
        $imgName = $_FILES['change_img']['name'];
        $edit_tmp_name = $_FILES['change_img']['tmp_name'];

        $query = "UPDATE post SET post_img='$imgName' WHERE post_id=$id";
        if(mysqli_query($this->conn, $query)){
            move_uploaded_file($edit_tmp_name, '../upload/'.$imgName);
            return "Thumbnail Updated Successfully";
        }
    }

    public function display_post_update($id){
        $query = "SELECT * FROM post_with_cat WHERE post_id=$id";
        if(mysqli_query($this->conn, $query)){
            $post_info = mysqli_query($this->conn, $query);
            $post = mysqli_fetch_assoc($post_info);
            return $post;
        }
    }

    public function update_post_ct($data){
       $post_title = $data['update_title'];
       $post_content = $data['update_content'];
       $idU = $data['edit_post_id'];

       $query = "UPDATE post SET post_title='$post_title', post_content='$post_content' WHERE post_id='$idU'";
       if(mysqli_query($this->conn, $query)){
        return "Post Updated Successfully";
       }
    }

    public function del_post($id){
        $query = "DELETE FROM post WHERE post_id=$id";
        if(mysqli_query($this->conn, $query)){
            return "Post Deleted Successfully";
        }
    }
}

?>

