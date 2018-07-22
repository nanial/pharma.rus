<?php include ROOT . '/views/layouts/header.php'; ?>
<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">
<?php

    $output = '';
    if (isset ($_POST['search'])) {
        $searchq = $_POST['search'];
      //$searchq = preg_replace ("#[^0-9a-zа-я]#i","",$searchq);

        $query = R::getAll ('SELECT * FROM product a '
        . 'Inner Join medical b on a.medicalID=b.ID '
        . 'WHERE nameOfMedical LIKE "%'. $searchq . '%" '                                
        ) ;
        //var_dump($query);

        $count = count($query);
       

        if ($count == 0){
            $output = 'Поиск не дал результатов!';
        }
        else{
           /* while ( $row = mysql_fetch_array ($query)){
                
                $id = $row['ID'];
                $output .='<div> ' .$nameOfMedical. '</div>';
            }*/
               

            foreach($query as $row){
               $nameOfMedical = $row['nameOfMedical'];
               echo $row ['ID']; 
               echo $row ['nameOfMedical'];
               echo $row ['price'];
               $output = $nameOfMedical;
            }
        }
    }
  
?>
<!--<?php print ("$output"); ?>-->
            <div class="signup-form"><!--sign up form-->
                                <h2>Форма для поиска</h2>
                                <form action="#" method="post">
                                    <input type="text" name="search" placeholder="Введите наименование:" value="<?php echo $output; ?>"/>
                                
                                    <input type="submit" name="submit" class="btn btn-default" value="Найти!" />
                                </form>
                            </div>
                            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>