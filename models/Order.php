<?php

/**
 * Класс Order - модель для работы с заказами
 */
class Order
{

    /**
     * Сохранение заказа 
     * @param string $userName <p>Имя</p>
     * @param string $userPhone <p>Телефон</p>
     * @param string $userComment <p>Комментарий</p>
     * @param integer $userId <p>id пользователя</p>
     * @param array $products <p>Массив с товарами</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function save($userID, $date, $userComment, $status, $productsID)
    {
        // Текст запроса к БД
        R::exec('INSERT INTO orders (userComment, userID, date, status) '
            . 'VALUES (:userComment, :userID, :date, :status)',
                array(  ':userComment' => $userComment,
                        ':userID' => $userID,
                        ':date' => $date,
                        ':status' => $status
            ));
        $orderID = R::getCell('SELECT ID FROM orders WHERE userID= :userID ORDER BY date DESC',
            array(':userID' => $userID));
        foreach ($productsID as $prodID) {
            R::exec('INSERT INTO productsToOrders (orderID, productID) VALUES (?, ?)' ,
                array($orderID, $prodID));
        }

        return true;
     
    }

    /**
     * Возвращает список заказов
     * @return array <p>Список заказов</p>
     */
    public static function getOrdersList()
    {
       
        // Получение и возврат результатов
        return R :: getAll('SELECT ID, userComment, userID, date, status FROM orders ORDER BY id DESC');
       
    }

    /**
     * Возвращает текстое пояснение статуса для заказа :<br/>
     * <i>1 - Новый заказ, 2 - В обработке, 3 - Доставляется, 4 - Закрыт</i>
     * @param integer $status <p>Статус</p>
     * @return string <p>Текстовое пояснение</p>
     */
    public static function getStatusText($status)
    {
        switch ($status) {
            case '1':
                return 'Новый заказ';
                break;
            case '2':
                return 'В обработке';
                break;
            case '3':
                return 'Доставляется';
                break;
            case '4':
                return 'Закрыт';
                break;
        }
    }

    /**
     * Возвращает заказ с указанным id 
     * @param integer $id <p>id</p>
     * @return array <p>Массив с информацией о заказе</p>
     */
    public static function getOrderById($id)
    {
        /*return R::getAll ('SELECT a.ID, a.code, b.nameOfMedical, a.price FROM product a '
        . 'Inner Join medical b on a.medicalID=b.ID ORDER BY a.ID ASC'                        
        );*/
       

        // Текст запроса к БД
        return  R :: getRow( 'SELECT * FROM orders WHERE ID = :ID', array(':ID'=>$id));

    }

    /**
     * Удаляет заказ с заданным id
     * @param integer $id <p>id заказа</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function deleteOrderById($id)
    {
       
        // Текст запроса к БД
       return R::exec ('DELETE FROM orders WHERE ID = :ID', array (':ID'=>$id));

       
    }

    /**
     * Редактирует заказ с заданным id
     * @param integer $id <p>id товара</p>
     * @param string $userName <p>Имя клиента</p>
     * @param string $userPhone <p>Телефон клиента</p>
     * @param string $userComment <p>Комментарий клиента</p>
     * @param string $date <p>Дата оформления</p>
     * @param integer $status <p>Статус <i>(включено "1", выключено "0")</i></p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function updateOrderById($id, $userComment, $userID,  $date, $status)
    {
        // Текст запроса к БД
        return R::exec( "UPDATE orders
            SET 
                userID = :userID, 
                userComment = :userComment,              
                date = :date, 
                status = :status 
            WHERE ID = :ID", array (':userComment'=>$userComment, ':userID'=>$userId, ':date'=>$date, ':status' => $status));
    }

    public static function getOrderCountByProduct()
    {
        $result = R::getAll('SELECT med.nameOfMedical, sum(po.Quantity) '
            .'FROM productsToOrders po '
            .'inner join product pr on po.productID = pr.ID '
            .'inner join medical med on pr.medicalID = med.ID '
            .'GROUP BY med.nameOfMedical');
        $ret = array();
        foreach ($result as $val)
        {
            $rv = array();
            $rv['name'] = $val['nameOfMedical'];
            $rv['count'] = $val['sum(po.Quantity)'];
            array_push($ret, $rv);
        }
        return $ret;
    }

    public static function getOrderCountByManufactures()
    {
        $result = R::getAll('SELECT mf.nameOfManuffactures, sum(po.Quantity) '
            .'FROM productsToOrders po '
            .'inner join product pr on po.productID = pr.ID '
            .'inner join medical med on pr.medicalID = med.ID '
            .'inner join manufactures mf on med.manufacturerID = mf.ID '
            .'GROUP BY mf.nameOfManuffactures');
        
        $ret = array();
        foreach ($result as $val)
        {
            $rv = array();
            $rv['name'] = $val['nameOfManuffactures'];
            $rv['count'] = $val['sum(po.Quantity)'];
            array_push($ret, $rv);
        }
        return $ret;
    }

    public static function getOrderCountByDays()
    {
        $result = R::getAll('SELECT sum(po.Quantity), date(ord.date) '
            .'FROM productsToOrders po '
            .'inner join product pr on po.productID = pr.ID '    
            .'inner join orders ord on po.orderID = ord.ID '
            .'GROUP BY ord.date');
        $ret = array();
        foreach ($result as $val)
        {
            $rv = array();   
            $rv['count'] = $val['sum(po.Quantity)'];
            $rv['name'] = $val['date(ord.date)'];
            array_push($ret, $rv);
        }
        return $ret;
    }
    
    public static function getOrderCountBySuppliers()
    {
        $result = R::getAll('SELECT sp.NameOfSupplier, sum(po.Quantity) '
            .'FROM productsToOrders po '
            .'inner join product pr on po.productID = pr.ID '    
            .'inner join arrival arv on pr.arrivalsID = arv.ID '
            .'inner join suppliers sp on arv.supplierID = sp.ID '
            .'GROUP BY sp.NameOfSupplier');
        $ret = array();
        foreach ($result as $val)
        {
            $rv = array();   
            $rv['count'] = $val['sum(po.Quantity)'];
            $rv['name'] = $val['NameOfSupplier'];
            array_push($ret, $rv);
        }
        return $ret;
    }

    public static function getOrderCountByCategories()
    {
        $result = R::getAll('SELECT ct.name, sum(po.Quantity) '
            .'FROM productsToOrders po '
            .'inner join product pr on po.productID = pr.ID '    
            .'inner join category ct on pr.categoryID = ct.ID '
            .'GROUP BY ct.name');
        $ret = array();
        foreach ($result as $val)
        {
            $rv = array();   
            $rv['count'] = $val['sum(po.Quantity)'];
            $rv['name'] = $val['name'];
            array_push($ret, $rv);
        }
        return $ret;
    }
}
