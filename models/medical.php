<?php

/**
 * Класс Category - модель для работы с категориями товаров
 */
class Medical
{

    /**
     * Возвращает массив категорий для списка на сайте
     * @return array <p>Массив с категориями</p>
     */
    public static function getMedicalList()
    {

        // Запрос к БД
        return R::getAll('SELECT * FROM medical  ORDER BY  manufacturerID ');

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
     * Редактирование категории с заданным id
     * @param integer $id <p>id категории</p>
     * @param string $name <p>Название</p>
     * @param integer $sortOrder <p>Порядковый номер</p>
     * @param integer $status <p>Статус <i>(включено "1", выключено "0")</i></p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function updateMedicalById($id, $nameOfMedical, $anotation, $manufacturerID, $unitOfMeasure, $unitName)
    {
        // Текст запроса к БД
        return R::exec("UPDATE medical SET nameOfMedical = ?, manufacturerID = ?, unitOfMeasure = ?, unitName = ? WHERE ID = ?",
            array($id, $nameOfMedical, $anotation, $manufacturerID, $unitOfMeasure, $unitName));

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
    public static function getMedicalById($id)
    {
        // Текст запроса к БД
        return R::getAll('SELECT * FROM medical WHERE ID = ?', array($id));

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
   
    /**
     * Добавляет новую категорию
     * @param string $name <p>Название</p>
     * @param integer $sortOrder <p>Порядковый номер</p>
     * @param integer $status <p>Статус <i>(включено "1", выключено "0")</i></p>
     * @return boolean <p>Результат добавления записи в таблицу</p>
     */
    public static function createMedical($nameOfMedical, $anotation, $manufacturerID, $unitOfMeasure, $unitName)
    {
        // Текст запроса к БД
        return R::exec("INSERT INTO medical (nameOfMedical, anotation, manufacturerID, unitOfMeasure, unitName) VALUES ( ?, ?, ?, ?, ?)",
            array($nameOfMedical, $anotation, $manufacturerID, $unitOfMeasure, $unitName));

        // Получение и возврат результатов. Используется подготовленный запрос
        // $result = $db->prepare($sql);
        // $result->bindParam(':name', $name, PDO::PARAM_STR);
        // $result->bindParam(':sort_order', $sortOrder, PDO::PARAM_INT);
        // $result->bindParam(':status', $status, PDO::PARAM_INT);
        // return $result->execute();
    }

}
