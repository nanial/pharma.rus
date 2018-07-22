<?php include ROOT . '/views/layouts/header.php'; ?>


<style>
    .item2{
/*стиль блока навигации*/
     margin-left:4px;
     margin-top:5px;
     overflow:hidden;
     padding-right:0;
     top:10px;
     
}
    .cycle-slideshow img {
        height: 100% !important; 
        width: 100% !important;
    }
    .panel-group category-products{
        height: 150px !important; 
        width: 50px !important;
    }
    
</style>
<section>
    <div class="page-wrapper">
        <div class="container">
            <div class="row">
                
        <div>

            <div class="cycle-slideshow"
                data-cycle-fx=carousel
                data-cycle-timeout=8000
                data-cycle-carousel-visible=1
                data-cycle-carousel-fluid=true
                data-cycle-slides="div.item2"
                data-cycle-prev="#prev"
                data-cycle-next="#next"
            >              
                                        
                                    <?php foreach ($sliderImages as $sliderImages): ?>
                                    <div class="item2">
                                    
                                        <!--sign up form <?php echo $sliderImages['ID']; ?>-->
                                         <a href="<?php echo $sliderImages['reference']; ?>">
                                                    <img src="<?php echo $sliderImages['imageSlide']; ?>" alt="" />
                                                    <a href="<?php echo $sliderImages['reference']; ?>"> </a>
                                                
                                    
                                    </div>
                                <?php endforeach; ?>
          
                                <a class="left recommended-item-control" id="prev" href="#recommended-item-carousel" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="right recommended-item-control" id="next"  href="#recommended-item-carousel" data-slide="next">
                        <i class="fa fa-angle-right"></i>                 
            </div> 
           
        </div>
    </div> 
</div>
</div>      
</div>
</section>
<?php include ROOT . '/views/layouts/footer.php'; ?>

