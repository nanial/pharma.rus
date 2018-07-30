<?php

/**
 * Класс Product - модель для работы с товарами
 */
class Product
{

    // Количество отображаемых товаров по умолчанию
    const SHOW_BY_DEFAULT = 9;

    /**
     * Возвращает массив последних товаров
     * @param type $count [optional] <p>Количество</p>
     * @param type $page [optional] <p>Номер текущей страницы</p>
     * @return array <p>Массив с товарами</p>
     */
    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {
     
        // Текст запроса к БД
        return R::getAll ('SELECT a.ID,a.price, a.isNew, b.nameOfMedical, a.image FROM product a '
                . 'Inner Join medical b on a.medicalID=b.ID '
                . 'WHERE a.status = 1 ORDER BY b.nameOfMedical ASC '
                . 'LIMIT :count', array (':count'=>$count                  
         ));

     
        // Получение и возврат результатов
        
    }
    public static function getProductsByOrderId($id)
    {
        return R :: getAll(
           'SELECT pto.Quantity, m.nameOfMedical, '
           .'p.code, p.price, p.description, p.status '
           .'FROM productsToOrders pto '
           .'INNER JOIN product p on pto.productID = p.ID '
           .'INNER JOIN medical m on p.medicalID = m.ID '
           .'WHERE pto.orderID = :orderId',
        array(':orderId' => $id)
        );
    }
    /**
     * Возвращает список товаров в указанной категории
     * @param type $categoryId <p>id категории</p>
     * @param type $page [optional] <p>Номер страницы</p>
     * @return type <p>Массив с товарами</p>
     */
    public static function getProductsListByCategory($categoryId, $page = 1)
    {
        $limit = Product::SHOW_BY_DEFAULT;
        // Смещение (для запроса)
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

       

        // Текст запроса к БД
        return R::getAll ('SELECT a.ID,a.price, a.isNew, b.nameOfMedical, a.image FROM product a '
                . 'Inner Join medical b on a.medicalID=b.ID '
                . 'WHERE a.status = 1 AND a.categoryID = :categoryID ORDER BY a.ID ASC '
                . 'LIMIT 6 OFFSET :offset', array (
                ':offset'=>$offset,
                ':categoryID'=>$categoryId               
         ));

       
    }
    public static function getAdminProductsListByCategory($categoryId, $page = 1)
    {
        $limit = Product::SHOW_BY_DEFAULT;
        // Смещение (для запроса)
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

       

        // Текст запроса к БД
        return R::getAll ('SELECT a.ID,a.price, a.isNew, b.nameOfMedical, a.image FROM product a '
                . 'Inner Join medical b on a.medicalID=b.ID '
                . 'WHERE a.status = 1 AND a.categoryID = :categoryID ORDER BY a.ID ASC ', array (               
                ':categoryID'=>$categoryId               
         ));

       
    }

    /**
     * Возвращает продукт с указанным id
     * @param integer $id <p>id товара</p>
     * @return array <p>Массив с информацией о товаре</p>
     */
    public static function getProductById($id)
    {
        
        // Текст запроса к БД
      
        return R::getRow ('SELECT * FROM product AS a'. ' Inner Join medical AS b on a.medicalID=b.ID'
        . ' WHERE a.ID=:ID', array (':ID'=>$id                     
    ));
       
    }
    public static function getAdminProductById($id)
    {
        
        // Текст запроса к БД
      
        return R::getRow ('SELECT * FROM product AS a'. ' Inner Join medical AS b on a.medicalID=b.ID'
        . ' WHERE a.ID=:ID', array (':ID'=>$id                     
    ));
       
    }
    /**
     * Возвращаем количество товаров в указанной категории
     * @param integer $categoryId
     * @return integer
     */
    
    public static function getAdminTotalProductsInCategory($categoryId)
    {
        

        // Текст запроса к БД
        return R::getCell('SELECT count(ID) AS count FROM product WHERE status="1" AND categoryID= :categoryID', array(':categoryID'=>$categoryId));

    }

    public static function getTotalProductsInCategory($categoryId)
    {
        // Текст запроса к БД
        return R::getCell('SELECT count(ID) AS count FROM product WHERE status="1" AND categoryID= :categoryID', array(':categoryID'=>$categoryId));
    }

    /**
     * Возвращает список товаров с указанными индентификторами
     * @param array $idsArray <p>Массив с идентификаторами</p>
     * @return array <p>Массив со списком товаров</p>
     */
    public static function getProdustsByIds($idsArray)
    {   

        $inQuery = implode(',', array_fill(0, count($idsArray), '?'));

        $sql = 'SELECT a.ID, a.price, a.code, b.nameOfMedical, a.image FROM product a '
                . 'Inner Join medical b on a.medicalID=b.ID '
                . 'WHERE a.status = 1 AND a.ID in ('.$inQuery.') ORDER BY a.ID ASC ';
        $args = array($sql, $idsArray);

        return call_user_func_array('R::getAll', $args);
        // Текст запроса к БД
       
    }
    public static function getAdminProdustsByIds($idsArray)
    {   

        $inQuery = implode(',', array_fill(0, count($idsArray), '?'));

        $sql = 'SELECT a.ID, a.price, a.code, b.nameOfMedical, a.image FROM product a '
                . 'Inner Join medical b on a.medicalID=b.ID '
                . 'WHERE a.status = 1 AND a.ID in ('.$inQuery.') ORDER BY a.ID ASC ';
        $args = array($sql, $idsArray);

        return call_user_func_array('R::getAll', $args);
        // Текст запроса к БД
       
    }
  

    /**
     * Возвращает список рекомендуемых товаров
     * @return array <p>Массив с товарами</p>
     */
    public static function getRecommendedProducts()
    {
       

        // Получение и возврат результатов
        return R::getAll ('SELECT a.ID, a.price, a.isNew, b.nameOfMedical, a.image FROM product a '
        . 'Inner Join medical b on a.medicalID=b.ID '
        . 'WHERE a.status = 1 AND a.isRecommended =1 ORDER BY a.ID DESC'                        
        );
       
    }
    public static function getAdminRecommendedProducts()
    {
       

        // Получение и возврат результатов
        return R::getAll ('SELECT a.ID, a.price, a.isNew, b.nameOfMedical, a.image FROM product a '
        . 'Inner Join medical b on a.medicalID=b.ID '
        . 'WHERE a.status = 1 AND a.isRecommended =1 ORDER BY a.ID DESC'                        
        );
       
    }
    /**
     * Возвращает список товаров
     * @return array <p>Массив с товарами</p>
     */
    public static function getProductsList()
    {
        

        // Получение и возврат результатов
        return R::getAll ('SELECT a.ID,a.price,a.code, b.nameOfMedical, a.image FROM product a '
        . 'Inner Join medical b on a.medicalID=b.ID ORDER BY a.ID ASC'                        
        );
       
    }
    
    public static function getImages()
    {
        

        // Получение и возврат результатов
        return R::getAll ('SELECT * FROM imageSlide'                        
        );
       
    }
    /**
     * Удаляет товар с указанным id
     * @param integer $id <p>id товара</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function deleteProductById($id)
    {
        
        // Текст запроса к БД
        return R::exec('DELETE FROM product WHERE ID = :ID', array (':ID'=>$id));               
    }

    /**
     * Редактирует товар с заданным id
     * @param integer $id <p>id товара</p>
     * @param array $options <p>Массив с информацей о товаре</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function updateProductById($id, $options)
    {
       

        // Текст запроса к БД
        $ret =  R::exec("UPDATE product
            SET                              
                code = :code, 
                price = :price, 
                categoryID = :categoryID, 
                availability = :availability, 
                description = :description,                
                isNew = :isNew,                
                isRecommended = :isRecommended, 
                status = :status,
                nameOfMedical = :nameOfMedical
                            

            WHERE ID = :ID", array (':ID'=>$id,
            
            ':price' =>$options ['price'],            
            ':availability' => $options ['availability'],
            ':description' => $options ['description'],
            ':isNew' => $options ['isNew'],           
            ':isRecommended' => $options ['isRecommended'],
            ':categoryID' => $options ['categoryID'],
            ':code' => $options ['code'],           
            ':status' => $options ['status'],
            ':nameOfMedical' => $options['nameOfMedical']
        ));

    }

    /**
     * Добавляет новый товар
     * @param array $options <p>Массив с информацией о товаре</p>
     * @return integer <p>id добавленной в таблицу записи</p>
     */
    public static function createProduct($options)
    {       
       
        $ret =  R::exec ('INSERT INTO product '
                . '( code, price, categoryID, availability,'
                . 'description, isNew, isRecommended, status, medicalID, arrivalsID)'
                . 'VALUES '
                . '( :code, :price, :categoryID, :availability,'
                . ':description, :isNew, :isRecommended, :status, :medicalID, :arrivalsID)',array(
                ':code'=>$options['code'],
                ':price'=>$options['price'],
                ':categoryID' =>$options['categoryID'],
                ':availability' =>$options['availability'],
                ':description' =>$options['description'],
                ':isNew' => $options['isNew'],
                ':isRecommended' => $options['isRecommended'],
                ':status' => $options['status'],                        
                ':medicalID' => $options['medicalID'],  
                ':arrivalsID' => $options['arrivalsID']
                         
                
            ));
           
        return R:: getCell ('SELECT ID FROM product WHERE code = :code ',
        array(':code' => $options['code']));    
      
    }

    public static function setImage($id, $path)
    {
        return R :: exec ('UPDATE product SET image = :pathToFile WHERE ID = :id ',
        
        array(':pathToFile' => $path, 'id' => $id));
    }

    /**
     * Возвращает текстое пояснение наличия товара:<br/>
     * <i>0 - Под заказ, 1 - В наличии</i>
     * @param integer $availability <p>Статус</p>
     * @return string <p>Текстовое пояснение</p>
     */
    public static function getAvailabilityText($availability)
    {
        switch ($availability) {
            case '1':
                return 'В наличии';
                break;
            case '0':
                return 'Под заказ';
                break;
        }
    }

    public static function getTotalProductsCount()
    {
        return R::getCell('SELECT count(ID) AS count FROM product WHERE status="1"');
    }

    public static function getProductsListPage($page = 1)
    {
        $limit = Product::SHOW_BY_DEFAULT;
        // Смещение (для запроса)
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        // Текст запроса к БД
        return R::getAll ('SELECT a.ID,a.price, a.isNew, b.nameOfMedical, a.image FROM product a '
                . 'Inner Join medical b on a.medicalID=b.ID '
                . 'WHERE a.status = 1 ORDER BY a.ID ASC '
                . 'LIMIT 9 OFFSET :offset', array (
                ':offset'=>$offset            
         ));
    }
}
