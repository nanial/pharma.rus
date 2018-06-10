<?php

/**
 * Класс User - модель для работы с пользователями
 */
class User
{

    /**
     * Регистрация пользователя 
     * @param string $name <p>Имя</p>
     * @param string $email <p>E-mail</p>
     * @param string $password <p>Пароль</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function register($name, $email, $password,$phone)
    {
        

        // Текст запроса к БД
        return R::exec('INSERT INTO user (name, email, password,phone) '
                . 'VALUES (:name, :email, :password, :phone)', array (':name'=>$name,
                 ':email'=>$email,
                 ':password'=>$password,
                 ':phone'=>$phone                    
                 ));

        
    }

    /**
     * Редактирование данных пользователя
     * @param integer $id <p>id пользователя</p>
     * @param string $name <p>Имя</p>
     * @param string $password <p>Пароль</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function edit($name, $email, $password,$phone)
        {
       
        // Текст запроса к БД
        return R:: exec("UPDATE user SET name = :name, 
        password =:password   phone =:phone
            WHERE ID = :ID",
             array(':name'=>$name,
                   ':password'=>$password,
                   ':phone'=>$phone,
                   ':email'=>$email            
            ));

       
    }

    /**
     * Проверяем существует ли пользователь с заданными $email и $password
     * @param string $email <p>E-mail</p>
     * @param string $password <p>Пароль</p>
     * @return mixed : integer user id or false
     */
    public static function checkUserData($email, $password)
    {
        

        // Текст запроса к БД
        $user = R::getRow('SELECT * FROM user WHERE email = :email AND password = :password', array(':password'=>$password,
                         ':email'=>$email            
        ));

        

        if ($user) {
            // Если запись существует, возвращаем id пользователя
            return $user['ID'];
        }
        return false;
    }

    /**
     * Запоминаем пользователя
     * @param integer $userId <p>id пользователя</p>
     */
    public static function auth($userId)
    {
        // Записываем идентификатор пользователя в сессию
        $_SESSION['user'] = $userId;
    }

    /**
     * Возвращает идентификатор пользователя, если он авторизирован.<br/>
     * Иначе перенаправляет на страницу входа
     * @return string <p>Идентификатор пользователя</p>
     */
    public static function checkLogged()
    {
        // Если сессия есть, вернем идентификатор пользователя
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        header("Location: /user/login");
    }

    /**
     * Проверяет является ли пользователь гостем
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    /**
     * Проверяет имя: не меньше, чем 2 символа
     * @param string $name <p>Имя</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkName($name)
    {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет телефон: не меньше, чем 10 символов
     * @param string $phone <p>Телефон</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkPhone($phone)
    {
        if (strlen($phone) >= 10) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет имя: не меньше, чем 6 символов
     * @param string $password <p>Пароль</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет email
     * @param string $email <p>E-mail</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет не занят ли email другим пользователем
     * @param type $email <p>E-mail</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkEmailExists($email)
    {
      

        // Текст запроса к БД
      $result = R::getCell('SELECT COUNT(*) FROM user WHERE email = :email', array( ':email'=>$email            
        ));

        
        if ($result)
            return true;
        return false;
    }

    /**
     * Возвращает пользователя с указанным id
     * @param integer $id <p>id пользователя</p>
     * @return array <p>Массив с информацией о пользователе</p>
     */
    public static function getUserById($id)
    {
       
        // Текст запроса к БД
        return R::getAll( 'SELECT * FROM user WHERE ID = :ID',  array(':ID'=>$id        
        ))[0];
        
       
    }

}
