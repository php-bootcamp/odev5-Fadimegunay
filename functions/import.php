<?php

    function import_products($pdo){
        if(isset($_FILES['file'])){
            $tmpName = $_FILES['file']['tmp_name'];
            $values = file_get_contents($tmpName);

            $import = json_decode($values);
            foreach($import as $key=>$item){
                
                $category = selectOne($pdo, "categories",['uniqid'=> $item->category_uniqid]);
                
                if($category){
                    
                    $categoryStatement = $pdo->prepare("update categories set name= :name where uniqid= :uniqid");
                    $categoryStatement->execute([
                        "name" => $item->category_name,
                        "uniqid" => $item->category_uniqid
                    ]);
                   
                    $category_id = $category->id; 
                    
                }else{
                    
                    $categoryStatement = $pdo->prepare("insert into categories (uniqid,name) values (:uniqid, :name) ");
                    $categoryStatement->execute([
                        "uniqid" => uniqid(),
                        "name" => $item->category_name
                    ]);
                    $category_id = $pdo->lastInsertId();
                }
                $product = selectOne($pdo, "products",['uniqid'=> $item->product_uniqid]);
                
                if($product){
                    $productStatement = $pdo->prepare("update products set name= :name, price= :price, description= :description,content= :content,category_id= :category where uniqid= :uniqid");
                    $productStatement->execute([
                        "name" => $item->product_name,
                        "price" => $item->price,
                        "description" => $item->description,
                        "content" => $item->content,
                        "category" => $category_id,
                        "uniqid" => $item->product_uniqid
                    ]);
                }else{
                    $productStatement = $pdo->prepare("insert into products (uniqid,name,price,description,content,category_id) values (:uniqid, :name,:price,:description,:content,:category) ");
                    $productStatement->execute([
                        "uniqid" => uniqid(),
                        "name" => $item->product_name,
                        "price" => $item->price,
                        "description" => $item->description,
                        "content" => $item->content,
                        "category" => $category_id
                    ]);
                    
                }
            }
            header("Location : /index.php");
        }else{
            header("Location : /import.php");
        }
    }