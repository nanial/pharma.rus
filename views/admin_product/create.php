<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    
                    <li><a href="/admin/product">Управление товарами</a></li>
                  
                </ol>
            </div>


            <h4>Добавление нового товара</h4>

            <br/>

            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Наименование препарата</p>
                        <input type="text" name="nameOfMedical" placeholder="" value="">

                        <p>ID поставки</p>
                        <input type="text" name="arrivalsID" placeholder="" value="">
                        <p>ID препарата</p>
                        <input type="text" name="medicalID" placeholder="" value="">
                        <p>Код/артикул</p>
                        <input type="text" name="code" placeholder="" value="">
                        <p>Стоимость, бел.руб</p>
                        <input type="text" name="price" placeholder="" value="">

                        <p>Категория</p>
                        <select name="categoryID">
                            <?php if (is_array($categoriesList)): ?>
                                <?php foreach ($categoriesList as $category): ?>
                                    <option value="<?php echo $category['ID']; ?>">
                                        <?php echo $category['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                        <br/><br/>

                        <p>Международное непатенотованное наименование</p>
                        <input type="text" name="unitName" placeholder="" value="">

                        <p>Изображение товара</p>
                        <input type="file" name="image" placeholder="" value="">

                        <p>Показания к применению</p>
                        <textarea name="description"></textarea>

                        <br/><br/>

                        <p>Наличие на складе</p>
                        <select name="availability">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select>

                        <br/><br/>

                        <p>Новинка</p>
                        <select name="isNew">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select>

                        <br/><br/>

                        <p>Отечественные препараты</p>
                        <select name="isRecommended">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select>

                        <br/><br/>

                        <p>Статус</p>
                        <select name="status">
                            <option value="1" selected="selected">Отображается</option>
                            <option value="0">Скрыт</option>
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

