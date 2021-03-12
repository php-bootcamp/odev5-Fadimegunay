<?php
    include('header.php');
    $categories = selectMany($pdo,"categories", []);
?>

    <div class="col-md-offset-1 col-md-10 col-md-offset-1" style="margin-top: 25px;"> 
        <h4>Ürün Ekle</h4>
        <div class="panel panel-default">
            <div class="panel-body">
                
                <form action="functions/services.php?do=product_create" method="POST">
                    <div class="form-group">
                        <label>Kategory Adı : </label>
                        <select class="form-control" name="category">
                        <option value="">Kategori Seçiniz</option>
                        <?php
                            foreach($categories as $category){
                        ?>
                            <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Ürün Adı : </label>
                        <input type="text" class="form-control" name="product"/>
                    </div>
                    <div class="form-group">
                        <label>Fiyat : </label>
                        <input type="text" class="form-control" name="price"/>
                    </div>
                    <div class="form-group">
                        <label>Açıklama : </label>
                        <input type="text" class="form-control" name="description"/>
                    </div>
                    <div class="form-group">
                        <label>İçerik : </label>
                        <textarea type="text" class="form-control" name="content"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Kaydet</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>