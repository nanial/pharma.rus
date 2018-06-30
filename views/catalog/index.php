<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                   
                    <div class="panel-group category-products">
                        <?php foreach ($categories as $categoryItem): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="/category/<?php echo $categoryItem['ID'];?>">
                                            <?php echo $categoryItem['name'];?>
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
                    <h2 class="title text-center"> Каталог</h2>
                    
                    <?php foreach ($latestProducts as $product): ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="<?php echo $product['image']; ?>" alt="" />
                                        <h2> <?php echo $product['price'];?>  бел.руб</h2>
                                        <p>
                                            <a href="/product/<?php echo $product['ID'];?>">
                                                <?php echo $product['nameOfMedical'];?>
                                            </a>
                                        </p>
                                        
                                        <a href="#" data-id="<?php echo $product['ID'];?>"
                                           class="btn btn-default add-to-cart">
                                            <i class="fa fa-shopping-cart"></i>Купить
                                        </a>
                                    </div>
                                    <?php if ($product['isNew']): ?>
                                        <img src="/template/images/home/new.png" class="new" alt="" />
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>                   

                </div><!--features_items-->
                    <ul class="pagination">
                        <li><a href="/catalog/page-1">&lt;</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="/catalog/page-2">2</a></li>
                        <li><a href="/catalog/page-3">&gt;</a></li>
                    </ul>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>