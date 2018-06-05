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
        $orderID = R::getCell('SELECT ID FROM orders WHERE userID= :userID ORDER BY :date DESC',
            array(':userID' => $userID, ':date' => $date));
        
        foreach ($productsID as $prodID) {
            R::exec('INSERT INTO productsToOrders (orderID, productID) VALUES (?, ?)',
                array($orderID, $prodID));
        }

        return true;
        // $products = json_encode($products);

        // $result = $db->prepare($sql);
        // $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
        // $result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
        // $result->bindParam(':user_comment', $userComment, PDO::PARAM_STR);
        // $result->bindParam(':user_id', $userId, PDO::PARAM_STR);
        // $result->bindParam(':products', $products, PDO::PARAM_STR);

        // return $result->execute();
    }

    /**
     * Возвращает список заказов
     * @return array <p>Список заказов</p>
     */
    public static function getOrdersList()
    {
        // Соединение с БД
        //$db = Db::getConnection();

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
        // Соединение с БД
        //$db = Db::getConnection();

        // Текст запроса к БД
        return  R :: getAll( 'SELECT * FROM orders WHERE ID = :ID', array(':ID'=>$id));

       // $result = $db->prepare($sql);
        //$result->bindParam(':id', $id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
       // $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполняем запрос
       // $result->execute();

        // Возвращаем данные
        //return $result->fetch();
    }

    /**
     * Удаляет заказ с заданным id
     * @param integer $id <p>id заказа</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function deleteOrderById($id)
    {
        // Соединение с БД
        //$db = Db::getConnection();

        // Текст запроса к БД
       return R::exec ('DELETE FROM orders WHERE ID = :ID', array (':ID'=>$id));

        // Получение и возврат результатов. Используется подготовленный запрос
       // $result = $db->prepare($sql);
        //$result->bindParam(':id', $id, PDO::PARAM_INT);
       // return $result->execute();
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
        // Соединение с БД
       // $db = Db::getConnection();

        // Текст запроса к БД
        return R::exec( "UPDATE orders
            SET 
                userID = :userID, 
                userComment = :userComment,              
                date = :date, 
                status = :status 
            WHERE id = :id", array (':userComment'=>$userComment, ':userID'=>$userId, ':date'=>$date, ':status' => $status));


        // Получение и возврат результатов. Используется подготовленный запрос
        /*$result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
        $result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
        $result->bindParam(':user_comment', $userComment, PDO::PARAM_STR);
        $result->bindParam(':date', $date, PDO::PARAM_STR);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        return $result->execute();*/
    }

}
