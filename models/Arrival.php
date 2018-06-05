<?php

/**
 * Класс Category - модель для работы с категориями товаров
 */
class Arrival
{

    /**
     * Возвращает массив категорий для списка на сайте
     * @return array <p>Массив с категориями</p>
     */
    //public static function getArrivalsList()
    //{

        // Запрос к БД
       // return R::getAll('SELECT id, dateOfArrival, supplierID, RelatedDocument FROM category ORDER BY dateOfArrival DESC');

        // Получение и возврат результатов
        // $i = 0;
        // $categoryList = array();
        // while ($row = $result->fetch()) {
        //     $categoryList[$i]['id'] = $row['id'];
        //     $categoryList[$i]['name'] = $row['name'];
        //     $i++;
        // }
        // return $categoryList;
    //}

    /**
     * Возвращает массив категорий для списка в админпанели <br/>
     * (при этом в результат попадают и включенные и выключенные категории)
     * @return array <p>Массив категорий</p>
     */
    public static function getArrivalsListAdmin()
    {

        // Запрос к БД
        return R::getAll('SELECT id, dateOfArrival, supplierID, RelatedDocument FROM category ORDER BY dateOfArrival DESC');

        // Получение и возврат результатов
        // $categoryList = array();
        // $i = 0;
        // while ($row = $result->fetch()) {
        //     $categoryList[$i]['id'] = $row['id'];
        //     $categoryList[$i]['name'] = $row['name'];
        //     $categoryList[$i]['sort_order'] = $row['sort_order'];
        //     $categoryList[$i]['status'] = $row['status'];
        //     $i++;
        // }
        // return $categoryList;
    }

    /**
     * Удаляет категорию с заданным id
     * @param integer $id
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function deleteArrivalById($id)
    {
        // Текст запроса к БД
        return R::exec('DELETE FROM arrival WHERE ID = ?', array($id));

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
    public static function updateArrivalById($id, $dateOfArrival, $supplierID, $RelatedDocument)
    {
        // Текст запроса к БД
        return R::exec("UPDATE arrival SET dateOfArrival = ?, supplierID = ?, RelatedDocument = ? WHERE ID = ?",
            array($dateOfArrival, $supplierID, $RelatedDocument, $id));

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
    public static function getArrivalById($id)
    {
        // Текст запроса к БД
        return R::getRow('SELECT * FROM arrival WHERE ID = ?', array($id));

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
    /*public static function getStatusText($status)
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
    public static function createArrival($dateOfArrival, $supplierID, $relatedDocument)
    {
        // Текст запроса к БД
        return R::exec("INSERT INTO arrival (dateOfArrival, supplierID, relatedDocument) VALUES (?, ?, ?)",
            array($dateOfArrival, $supplierID, $relatedDocument));

        // Получение и возврат результатов. Используется подготовленный запрос
        // $result = $db->prepare($sql);
        // $result->bindParam(':name', $name, PDO::PARAM_STR);
        // $result->bindParam(':sort_order', $sortOrder, PDO::PARAM_INT);
        // $result->bindParam(':status', $status, PDO::PARAM_INT);
        // return $result->execute();
    }

}
