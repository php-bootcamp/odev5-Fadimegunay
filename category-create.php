<?php
    include('header.php');
?>

    <div class="col-md-offset-1 col-md-10 col-md-offset-1" style="margin-top: 25px;"> 
        <h4>Kategori Ekle</h4>
        <div class="panel panel-default">
            <div class="panel-body">
                
                <form action="functions/services.php?do=category_create" method="POST">
                    <div class="form-group">
                        <label>Kategory Adı : </label>
                        <input type="text" class="form-control" name="category_name"/>
                    </div>
                    <button type="submit" class="btn btn-success">Kaydet</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>