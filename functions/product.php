<?php
    function product_create($pdo){
        if(isset($_POST['category']) && isset($_POST['product']) && isset($_POST['price']) && isset($_POST['description']) && isset($_POST['content'])){
            $category = $_POST['category'];
            $product = $_POST['product'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $content = $_POST['content'];

            $productStatement = $pdo->prepare("insert into products (uniqid,name,price,description,content,category_id) values (:uniqid, :name,:price,:description,:content,:category) ");
            $productStatement->execute([
                "uniqid" => uniqid(),
                "name" => $product,
                "price" => $price,
                "description" => $description,
                "content" => $content,
                "category" => $category
            ]);
            $_SESSION['message'] = "Ürün Ekleme işlemi Başarıyla gerçekleştirildi";
            header('Location: /index.php');
        }else{
            $_SESSION['message'] = "İşlem gerçekleştirilirken bir hatayla karşılaşıldı.";
            header('Location: /product-create.php');
        }
    }

    function product_update($pdo){
        if(isset($_POST['id']) && isset($_POST['category']) && isset($_POST['product']) && isset($_POST['price']) && isset($_POST['description']) && isset($_POST['content'])){
            $id = (int) $_POST['id'];
            $category = $_POST['category'];
            $product = $_POST['product'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $content = $_POST['content'];

            $productStatement = $pdo->prepare("update products set name= :name, price= :price, description= :description,content= :content,category_id= :category where id= :id");
            $productStatement->execute([
                "name" => $product,
                "price" => $price,
                "description" => $description,
                "content" => $content,
                "category" => $category,
                "id" => $id
            ]);
            $_SESSION['message'] = "Ürün Güncelleme işlemi Başarıyla gerçekleştirildi";
            header('Location: /index.php');
        }else{
            $_SESSION['message'] = "İşlem gerçekleştirilirken bir hatayla karşılaşıldı.";
            header('Location: /product-update.php');
        }
    }

    function product_delete($pdo){
        if(isset($_GET['id'])){
            $id = (int) $_GET['id'];
            $productStatement = $pdo->prepare("delete from products where id= :id");
            $productStatement->execute([
                "id" => $id
            ]);
            $_SESSION['message'] = "Ürün Silme işlemi Başarıyla gerçekleştirildi";
            header('Location: /index.php');
        }
        else{
            $_SESSION['message'] = "İşlem gerçekleştirilirken bir hatayla karşılaşıldı.";
            header('Location: /index.php');
        }
    }