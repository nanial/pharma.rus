<?php include ROOT . '/views/layouts/header_admin.php'; ?>
<style>
    h4{
        color : rgb(0,255,255);
    }
</style>
<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                   
                    <li><a href="/admin/order">Управление заказами</a></li>
                    
                </ol>
            </div>


            <h4>Удалить заказ <?php echo $id; ?></h4>


            <p>Вы действительно хотите удалить этот заказ?</p>

            <form method="post">
                <input type="submit" name="submit" value="Удалить" />
            </form>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

