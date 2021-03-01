<?php
    
    function category_create($pdo){
        if(isset($_POST['category_name'])){
            $name = $_POST['category_name'];
            $categoryStatement = $pdo->prepare("insert into categories (uniqid,name) values (:uniqid, :name) ");
            $categoryStatement->execute([
                "uniqid" => uniqid(),
                "name" => $name
            ]);
            $_SESSION['message'] = "Kategori Ekleme işlemi Başarıyla gerçekleştirildi";
            header('Location: /index.php');
        }else{
            $_SESSION['message'] = "İşlem gerçekleştirilirken bir hatayla karşılaşıldı.";
            header('Location: /category-create.php');
        }
    }

    