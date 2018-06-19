<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

           

            <a href="/admin/product/create" class="btn btn-default back">
                <i class="fa fa-plus"></i> Добавить товар
            </a>
            
            <h3>Список препаратов</h3>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID товара</th>
                    <th>Артикул</th>
                    <th>Наименование препарата</th>
                    <th>Цена</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($productsList as $product): ?>
                    <tr>
                        <td><?php echo $product['ID']; ?></td>
                        <td><?php echo $product['code']; ?></td>
                        <td><?php echo $product['nameOfMedical']; ?></td>
                        <td><?php echo $product['price']; ?></td>  
                        <td>
                            <a href="/admin/product/update/<?php echo $product['ID']; ?>" title="Редактировать">
                                <i class="fa fa-pencil-square-o"></i>
                            </a>
                        </td>
                        <td>
                            <a href="/admin/product/delete/<?php echo $product['ID']; ?>" title="Удалить">
                                 <i class="fa fa-times"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

