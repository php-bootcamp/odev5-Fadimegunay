<?php
    include('header.php');
    if(isset($_GET['product_id'])){
        $product_id = (int) $_GET['product_id'];
        $product = selectOne($pdo,"products",["id" => $product_id]);
        if(!$product){
            header('Location: /index.php');
        }

    }else{
        header('Location: /index.php');
    }

    $categories = selectMany($pdo,"categories", []);
?>

    <div class="col-md-offset-1 col-md-10 col-md-offset-1" style="margin-top: 25px;"> 
        <h4>Ürün Güncelle</h4>
        <div class="panel panel-default">
            <div class="panel-body">
                
                <form action="functions/services.php?do=product_update" method="POST">
                    <div class="form-group">
                        <label>Kategory Adı : </label>
                        <select class="form-control" name="category">
                        <option value="">Kategori Seçiniz</option>
                        <?php
                            foreach($categories as $category){
                                $selected = "";
                                if($category->id == $product->category_id)
                                    $selected = "selected";
                        ?>
                            <option <?php echo $selected; ?> value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Ürün Adı : </label>
                        <input type="text" class="form-control" name="product" value="<?php echo $product->name; ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Fiyat : </label>
                        <input type="text" class="form-control" name="price" value="<?php echo $product->price; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Açıklama : </label>
                        <input type="text" class="form-control" name="description" value="<?php echo $product->description; ?>"/>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $product->id; ?>" />
                    <div class="form-group">
                        <label>İçerik : </label>
                        <textarea type="text" class="form-control" name="content">value="<?php echo html_entity_decode($product->content); ?>"</textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Güncelle</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>