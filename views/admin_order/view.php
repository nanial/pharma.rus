<?php include ROOT . '/views/layouts/header_admin.php'; ?>
<style>
    h4,h3{
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


            <h4>Заказ <?php echo $order['ID']; ?></h4>
            <br/>




            
            <table class="table-admin-small table-bordered table-striped table">
                <tr>
                    <td>Номер заказа</td>
                    <td><?php echo $order['ID']; ?></td>
                </tr>
                
                <tr>
                        <td>ID клиента</td>
                        <td><?php echo $order['userID']; ?></td>
                </tr>
                
                
                <tr>
                    <td>Комментарий клиента</td>
                    <td><?php echo $order['userComment']; ?></td>
                </tr>
                
                <tr>
                    <td><b>Статус заказа</b></td>
                    <td><?php echo Order::getStatusText($order['status']); ?></td>
                </tr>
                <tr>
                    <td><b>Дата заказа</b></td>
                    <td><?php echo $order['date']; ?></td>
                </tr>
            </table>

          

            <table class="table-admin-medium table-bordered table-striped table ">
                <tr>
                    <th>Название</th>
                    <th>Количество</th>
                    <th>Артикул товара</th>
                    <th>Цена</th>
                    <th>Описание</th>
                    <th>Статус</th>
                    
                </tr>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo $product['nameOfMedical']; ?></td>
                        <td><?php echo $product['Quantity']; ?></td>
                        <td><?php echo $product['code']; ?></td>
                        <td><?php echo $product['price']; ?> бел.руб</td>
                        <td><?php echo $product['description']; ?> </td>
                        <td><?php echo $product['status']; ?></td>
                     
                    </tr>
                <?php endforeach; ?>
            </table>

            
        </div>


</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

