<?php

/**
 * Класс Arrival - модель для работы с поступлениями товаров
 */
class Arrival
{

    
    public static function getArrivalsListAdmin()
    {

        // Запрос к БД
        return R::getAll('SELECT ID, dateOfArrival, supplierID, relatedDocument FROM arrival ORDER BY dateOfArrival DESC');
       
    }

    public static function deleteArrivalById($id)
    {
        // Текст запроса к БД
        return R::exec('DELETE FROM arrival WHERE ID = ?', array($id));

    }

    public static function updateArrivalById($id, $dateOfArrival, $supplierID, $RelatedDocument)
    {
        // Текст запроса к БД
        return R::exec("UPDATE arrival SET dateOfArrival = ?, supplierID = ?, relatedDocument = ? WHERE ID = ?" ,
            array($dateOfArrival, $supplierID, $RelatedDocument, $id));
    }

    public static function getArrivalById($id)
    {
        // Текст запроса к БД
        return R::getRow('SELECT * FROM arrival WHERE ID = ?', array($id));      
    }

    public static function createArrival($dateOfArrival, $supplierID, $relatedDocument)
    {
        // Текст запроса к БД
        return R::exec("INSERT INTO arrival (dateOfArrival, supplierID, relatedDocument) VALUES (?, ?, ?)" ,
            array($dateOfArrival, $supplierID, $relatedDocument));

        }

}
