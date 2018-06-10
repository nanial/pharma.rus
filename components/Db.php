<?php

/**
 * Класс Db
 * Компонент для работы с базой данных
 */

 require_once './RedBeanPHP5_1_0/rb.php';

class Db
{

    /**
     * Устанавливает соединение с базой данных
     */
    public static function getConnection()
    {
        
        // Получаем параметры подключения из файла
        $paramsPath = ROOT . '/config/db_params.php';
        $params = include($paramsPath);

        // Устанавливаем соединение
        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        R::setup($dsn, $params['user'], $params['password']);

    }

}
