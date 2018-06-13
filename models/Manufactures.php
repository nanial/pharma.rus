<?php

/**
 * Класс Manufactures - модель для работы с поставщиками товаров
 */
class Manufactures
{

    /**
     * Возвращает массив категорий для списка на сайте
     * @return array <p>Массив с категориями</p>
     */
    public static function getManufacturesList()
    {

        // Запрос к БД
        return R::getAll('SELECT ID, nameOfManuffactures, country FROM manufactures  ORDER BY country ASC');
       
    }

    public static function getManufacturesListAdmin()
    {

        // Запрос к БД
        return R::getAll('SELECT * FROM manufactures  ORDER BY country ASC');
  
    }

    /**
     * Удаляет категорию с заданным id
     * @param integer $id
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function deleteManufacturesById($id)
    {
        // Текст запроса к БД
        return R::exec('DELETE FROM manufactures WHERE ID = ?', array($id));

    }

    public static function updateManufacturesById($id, $nameOfManuffactures, $country, $account)
    {
        // Текст запроса к БД
        return R::exec("UPDATE manufactures SET nameOfManuffactures	 = ?, country = ?, account = ? WHERE ID = ?",
            array($nameOfManuffactures, $country, $account, $id));

    }

    public static function getManufacturesById($id)
    {
        // Текст запроса к БД
        return R::getRow('SELECT * FROM manufactures WHERE ID = ?', array($id));

    }

    public static function createManufactures($account, $nameOfManuffactures, $country)
    {
        // Текст запроса к БД
        return R::exec("INSERT INTO manufactures (account, nameOfManuffactures, country) VALUES (?, ?, ?)",
            array($account, $nameOfManuffactures, $country));
 
    }

}
