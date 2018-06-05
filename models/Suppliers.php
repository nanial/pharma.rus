<?php

/**
 * Класс Manufactures - модель для работы с поставщиками товаров
 */
class Suppliers
{

    /**
     * Возвращает массив категорий для списка на сайте
     * @return array <p>Массив с категориями</p>
     */
    public static function getSuppliersListAdmin()
    {

        // Запрос к БД
        return R::getAll('SELECT *  FROM  suppliers  ');

        // Получение и возврат результатов
        // $i = 0;
        // $categoryList = array();
        // while ($row = $result->fetch()) {
        //     $categoryList[$i]['id'] = $row['id'];
        //     $categoryList[$i]['name'] = $row['name'];
        //     $i++;
        // }
        // return $categoryList;
    }

    /**
     * Возвращает массив категорий для списка в админпанели <br/>
     * (при этом в результат попадают и включенные и выключенные категории)
     * @return array <p>Массив категорий</p>
     */
    
    /**
     * Удаляет категорию с заданным id
     * @param integer $id
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function deleteSuppliersById($id)
    
    {
        // Текст запроса к БД
        return R::exec('DELETE FROM  suppliers WHERE ID = ?', array($id));

        // // Получение и возврат результатов. Используется подготовленный запрос
        // $result = $db->prepare($sql);
        // $result->bindParam(':id', $id, PDO::PARAM_INT);
        // return $result->execute();
    }

    /**
     * Редактирование категории с заданным id
     * @param integer $id <p>id категории</p>
     * @param string $name <p>Название</p>
     * @param integer $sortOrder <p>Порядковый номер</p>
     * @param integer $status <p>Статус <i>(включено "1", выключено "0")</i></p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function updateSuppliersById($id, $nameOfSuppliers, $settlementAccount, $resedentRB)
    {
        // Текст запроса к БД
        return R::exec("UPDATE Suppliers SET NameOfSuppliers	 = ?, SettlementAccount = ?, ResedentRB = ? WHERE ID = ?",
            array($id, $nameOfSuppliers, $settlementAccount, $resedentRB));

        // Получение и возврат результатов. Используется подготовленный запрос
        // $result = $db->prepare($sql);
        // $result->bindParam(':id', $id, PDO::PARAM_INT);
        // $result->bindParam(':name', $name, PDO::PARAM_STR);
        // $result->bindParam(':sort_order', $sortOrder, PDO::PARAM_INT);
        // $result->bindParam(':status', $status, PDO::PARAM_INT);
        // return $result->execute();
    }

    /**
     * Возвращает категорию с указанным id
     * @param integer $id <p>id категории</p>
     * @return array <p>Массив с информацией о категории</p>
     */
    public static function getSuppliersById($id)
    {
        // Текст запроса к БД
        return R::getRow('SELECT * FROM suppliers WHERE ID = ?', array($id));

        // Используется подготовленный запрос
        // $result = $db->prepare($sql);
        // $result->bindParam(':id', $id, PDO::PARAM_INT);

        // // Указываем, что хотим получить данные в виде массива
        // $result->setFetchMode(PDO::FETCH_ASSOC);

        // // Выполняем запрос
        // $result->execute();

        // // Возвращаем данные
        // return $result->fetch();
    }

    /**
     * Возвращает текстое пояснение статуса для категории :<br/>
     * <i>0 - Скрыта, 1 - Отображается</i>
     * @param integer $status <p>Статус</p>
     * @return string <p>Текстовое пояснение</p>
     */
   /* public static function getStatusText($status)
    {
        switch ($status) {
            case '1':
                return 'Отображается';
                break;
            case '0':
                return 'Скрыта';
                break;
        }
    }*/

    /**
     * Добавляет новую категорию
     * @param string $name <p>Название</p>
     * @param integer $sortOrder <p>Порядковый номер</p>
     * @param integer $status <p>Статус <i>(включено "1", выключено "0")</i></p>
     * @return boolean <p>Результат добавления записи в таблицу</p>
     */
    public static function createManufactures($account, $nameOfManuffactures, $country)
    {
        // Текст запроса к БД
        return R::exec("INSERT INTO uppliers ( nameOfSuppliers, settlementAccount, resedentRB) VALUES (?, ?, ?)",
            array( $nameOfSuppliers, $settlementAccount, $resedentRB));

        // Получение и возврат результатов. Используется подготовленный запрос
        // $result = $db->prepare($sql);
        // $result->bindParam(':name', $name, PDO::PARAM_STR);
        // $result->bindParam(':sort_order', $sortOrder, PDO::PARAM_INT);
        // $result->bindParam(':status', $status, PDO::PARAM_INT);
        // return $result->execute();
    }

}
