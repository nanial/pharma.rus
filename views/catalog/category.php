<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products">
                        <?php foreach ($categories as $categoryItem): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="/category/<?php echo $categoryItem['ID']; ?>"
<<<<<<< HEAD
                                          class= "<?php 
                                           if ($categoryId == $categoryItem['ID']) 
                                            {
                                            echo 'active';
                                            $a = categoryItem['name'];
                                            echo $a;
                                            }
                                            ?>"
=======
                                            class= "<?php 
                                                if ($categoryId == $categoryItem['ID']) 
                                                {
                                                    echo 'active';
                                                    $a = $categoryItem['name'];
                                                } ?>"
>>>>>>> eca07370f202dfb858b227d97bb2854cfc85f7dd
                                           >                                                                                    
                                               <?php echo $categoryItem['name']; ?>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center"> <?php echo $a; ?></h2>
                    <?php foreach ($categoryProducts as $product): ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="<?php echo $product['image']; ?>" alt="" />
                                        <h2><?php echo $product['price']; ?> бел.руб</h2>
                                        <p>
                                            <a href="/product/<?php echo $product['ID']; ?>">
                                                <?php echo $product['nameOfMedical']; ?>
                                            </a>
                                        </p>
                                        <a href="/cart/add/<?php echo $product['ID']; ?>" class="btn btn-default add-to-cart" data-id="<?php echo $product['ID']; ?>"><i class="fa fa-shopping-cart"></i>Купить</a>
                                    </div>
                                    <?php if ($product['isNew']): ?>
                                        <img src="/template/images/home/new.png" class="new" alt="" />
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>                              

                </div><!--features_items-->
                
                <!-- Постраничная навигация -->
                <?php echo $pagination->get(); ?>

            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>