<?php

// Kết nối database và thông tin chung
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/core/init.php');
$path = '../files/'; // patch lưu file

// Nếu đăng nhập và là admin
if ($user && $data_user['admin'] > 0) {
    
    $id = trim(htmlspecialchars(addslashes($_POST['id'])));
    $title = $_POST['title'];
    $alias = $_POST['alias'];
    $category = $_POST['category'];
    if ($alias == '') {
        $alias = vn_str_filter($title);
    } else {
        $alias = vn_str_filter($alias);
    }
    $url_img = $_POST['images'];
    if ($_FILES['image']['name'] == null) {
        if ($id == '') {
            $url_img = '';
        } else {
            $url_img = $_POST['images'];
        }
    } else {
        $path = '../img_blog/'; // patch lưu file
        $tmp_name = $_FILES["image"]["tmp_name"];
        $name = $_FILES["image"]["name"];
        $temp            = explode('.', $name);
        move_uploaded_file($_FILES["image"]["tmp_name"], $path . "$alias.$temp[1]");
        
        $url_img = '/assets/img_blog/' . $alias . '.' . $temp[1];
    }
    if ($_POST['meta_title'] == '') {
        $meta_title = $meta_key = $meta_des = $title;
    } else {
        $meta_title = $_POST['meta_title'];
        $meta_key     = $_POST['meta_key'];
        $meta_des     = $_POST['meta_des'];
    }
    $title_suggest = '';
    $content_suggest = '';
    if ($_FILES["file"]["name"]) {
        # Tạo thư mục
        $album_dir  =  'download/';
        if (!is_dir($album_dir)) {
            mkdir($album_dir);
        }
        #upload.
        $config['upload_path']     =  $album_dir;
        $config['allowed_types'] =  'doc|docx|pdf|xls|xlsx';
        $config['max_size'] =  10000;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $image =  $this->upload->do_upload("file");
        $image_data  =     $this->upload->data();
        if ($image) {
            $file =    $config['upload_path'] . $image_data['file_name'];
        } else {
            $file = '';
        }
    } else {
        if ($id == '') {
            $file = '';
        } else {
            $file = $_POST['file'];
        }
    }
    $date = time();
    $sapo = $_POST['sapo'];
    $content = $_POST['content'];
   if($id > 0){
        $sql_add_post = "UPDATE baiviet SET 
            title = '$title',
            alias = '$alias',
            chuyenmuc = '$category',
            image = '$url_img',
            file = '$file',
            sapo = '$sapo',
            content = '$content',
            title_suggest = '$title_suggest',
            content_suggest = '$content_suggest',
            status = '1',
            meta_title = '$meta_title',
            meta_key = '$meta_key',
            meta_des = '$meta_des',
            updated_at = '$date'
        WHERE id = '$id'
    ";
   }else{
        
        $sql_add_post = "INSERT INTO baiviet (title,alias,chuyenmuc,image,file,sapo,content,title_suggest,content_suggest,status,meta_title,meta_key,meta_des,created_at) VALUES (
                        '$title',
                        '$alias',
                        '$category',
                        '$url_img',
                        '$file',
                        '$sapo',
                        '$content',
                        '$title_suggest',
                        '$content_suggest',
                        '1',
                        '$meta_title',
                        '$meta_key',
                        '$meta_des',
                        '$date'
                    )";

   }  
   
   setcookie('url_sitemap', '/'.$alias.'/', time() + 86400, '/');
    $db->query($sql_add_post);
    $db->close();



   

       new Redirect("/sitemap.php?type=blog"); 

    // }
} else {
   new Redirect("/admin/?act=blog"); 
}
