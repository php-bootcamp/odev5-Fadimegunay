<?php
    include('header.php');
?>

    <div class="col-md-offset-1 col-md-10 col-md-offset-1" style="margin-top: 25px;"> 
        <h4>İçe Aktar</h4>
        <div class="panel panel-default">
            <div class="panel-body">
                
                <form action="functions/services.php?do=import_products" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="file">Dosya Seç : </label>
                        <input type="file" class="form-control-file" id="file" name="file">
                    </div>
                    <button type="submit" class="btn btn-success">Kaydet</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>