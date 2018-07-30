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
                   
                    <li><a href="/admin/product">Управление товарами</a></li>
                    <li class="active">Редактирование</li>
                </ol>
            </div>


            <h4>Товар №<?php echo $id; ?></h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Название товара</p>
                        <input type="text" name="nameOfMedical" placeholder="" value="<?php echo $product['nameOfMedical']; ?>">

                        <p>Артикул</p>
                        <input type="text" name="code" placeholder="" value="<?php echo $product['code']; ?>">

                        <p>Стоимость, бел.руб</p>
                        <input type="text" name="price" placeholder="" value="<?php echo $product['price']; ?>">

                        <p>Категория</p>
                        <select name="categoryID">
                            <?php if (is_array($categoriesList)): ?>
                                <?php foreach ($categoriesList as $category): ?>
                                    <option value="<?php echo $category['ID']; ?>" 
                                        <?php if ($product['categoryID'] == $category['ID']) echo ' selected="selected"'; ?>>
                                        <?php echo $category['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        
                        <br/><br/>

                        <p>Международное непатентованное название</p>
                        <input type="text" name="brand" placeholder="" value="<?php echo $product['unitName']; ?>">

                        
                        <p>Изображение товара</p>
                        <input type="file" name="image" placeholder="" value="="<?php echo $product['image']; ?>">

                        <p>Рекомендации к применению</p>
                        <textarea name="description"><?php echo $product['description']; ?></textarea>
                        
                        <br/><br/>

                        <p>Наличие на складе</p>
                        <select name="availability">
                            <option value="1" <?php if ($product['availability'] == 1) echo ' selected="selected"'; ?>>Да</option>
                            <option value="0" <?php if ($product['availability'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                        </select>
                        
                        <br/><br/>
                        
                        <p>Новинка</p>
                        <select name="isNew">
                            <option value="1" <?php if ($product['isNew'] == 1) echo ' selected="selected"'; ?>>Да</option>
                            <option value="0" <?php if ($product['isNew'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                        </select>
                        
                        <br/><br/>

                        <p>Рекомендуемые</p>
                        <select name="isRecommended">
                            <option value="1" <?php if ($product['isRecommended'] == 1) echo ' selected="selected"'; ?>>Да</option>
                            <option value="0" <?php if ($product['isRecommended'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                        </select>
                        
                        <br/><br/>

                        <p>Статус</p>
                        <select name="status">
                            <option value="1" <?php if ($product['status'] == 1) echo ' selected="selected"'; ?>>Отображается</option>
                            <option value="0" <?php if ($product['status'] == 0) echo ' selected="selected"'; ?>>Скрыт</option>
                        </select>
                        
                        <br/><br/>
                        
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                        
                        <br/><br/>
                        
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

