<?php

    function export_products($pdo){
        $products = selectMany($pdo,"products",[]);
        $values = [];

        foreach($products as $product){
            $category = selectOne($pdo,"categories",["id" => $product->category_id]);
            $values[] =[
                "product_uniqid" => $product->uniqid,
                "product_name" => $product->name,
                "price" => $product->price,
                "description" => $product->description,
                "content" => $product->content,
                "category_uniqid" => $category->uniqid,
                "category_name" => $category->name
            ];
        }
        
        header("Content-Type: application/json");
        header("Content-Disposition: attachment; filename=products.json");
        echo json_encode($values);

    }