<?php
    include('header.php');
    $products = selectMany($pdo,'products',[]);
?>
    <div class="col-md-offset-1 col-md-10 col-md-offset-1" style="margin-top: 25px;"> 
        <div class="panel panel-default">
            <div class="panel-body">
                <a href="/product-create.php" class="btn btn-success">Yeni Ürün Ekle</a>
                <a href="/category-create.php" class="btn btn-success">Yeni Kategori Ekle</a>
                <?php  
                    if(count($products) > 0){
                ?>
                  <div class="pull-right"> 
                    <a href="/functions/services.php?do=export_products" class="btn btn-success">Dışa Aktar</a>
                    <a href="/import.php" class="btn btn-success">İçe Aktar</a>
                  </div> 
                <?php } ?>
            </div>
        </div>
        <?php
            if(isset($_SESSION['message'])){
        ?>
            <div class="alert alert-info" role="alert">
                <?php echo $_SESSION['message']; unset( $_SESSION['message']); ?>
            </div>
        <?php } ?>
        <table id="table" class="table table-responsive table-bordered table-striped">
            <thead>
                <tr>
                <th>Kategori</th>
                <th>Ürün Adı</th>
                <th>Fiyat</th> 
                <th>Açıklama</th> 
                <th>İşlemler</th>
                </tr>       
            </thead>
            <tbody>
                <?php
                    foreach($products as $product){
                        $category = selectOne($pdo,"categories",['id' => $product->category_id]);
                ?>
                    <tr>
                        <td><?php echo $category->name; ?></td>
                        <td><?php echo $product->name; ?></td>
                        <td><?php echo $product->price; ?></td>
                        <td><?php echo $product->description; ?></td>
                        <td>
                            <a href="/product-update.php?product_id=<?php echo $product->id; ?>" class="btn btn-sm btn-warning">Güncelle</a>
                            <a href="/functions/services.php?do=product_delete&id=<?php echo $product->id; ?>" class="btn btn-danger btn-sm ">Sil</a></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        table = $('#table').DataTable();
    } );
</script>