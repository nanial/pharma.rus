<?php include ROOT . '/views/layouts/header.php'; ?>
<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">
				<?php
					$output = '';
				?>
   				<?php if (isset ($_POST['search'])): ?>
	        		<?php
	        			$searchq = $_POST['search'];

				        $query = R::getAll ('SELECT a.ID, a.image, a.price, a.isNew, b.nameOfMedical '
                        . 'FROM product a Inner Join medical b on a.medicalID=b.ID '
                        . 'WHERE b.nameOfMedical LIKE "%'. $searchq . '%" '


                 );
				        //var_dump($query);

	        			$count = count($query);
	        		?>
	       			<?php if ($count == 0): ?>
	                	<?php $output = 'Поиск не дал результатов!'; ?>
	            	<?php else: ?>
	            		<?php  foreach($query as $row): ?>
                			<div class="productinfo text-center">
                                <img src="<?php echo $row['image']; ?>" alt="" />
                                <h2> <?php echo $row['price'];?>  бел.руб</h2>
                                <p>
                                    <a href="/product/<?php echo $row['ID'];?>">
                                        <?php echo $row['nameOfMedical'];?>
                                    </a>
                                </p>

                                <a href="#" data-id="<?php echo $row['ID'];?>"
                                    class="btn btn-default add-to-cart">
                                    <i class="fa fa-shopping-cart"></i>Купить
                                </a>
	                            <?php if ($row['isNew']): ?>
	                                <img src="/template/images/home/new.png" class="new" alt="" />
	                            <?php endif; ?>
                            </div>
            			<?php endforeach; ?>
                    <?php endif; ?>
             	<?php endif; ?>
            <div class="signup-form"><!--sign up form-->
                <h2>Форма для поиска</h2>
                <form action="#" method="post">
                    <input type="text" name="search" placeholder="Введите наименование:" />

                    <input type="submit" name="submit" class="btn btn-default" value="Найти!" />
                </form>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>