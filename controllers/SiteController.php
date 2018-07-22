<?php

/**
 * Контроллер CartController
 */
class SiteController
{

    /**
     * Action для главной страницы
     */
    public function actionIndex($page = 1)
    {
        // Список категорий для левого меню
        $categories = Category::getCategoriesList();

        // Список товаров в категории
        $latestProducts = Product::getProductsListPage($page);

        // Общее количетсво товаров (необходимо для постраничной навигации)
        $total = Product::getTotalProductsCount();

        // Список товаров для слайдера
        $sliderProducts = Product::getRecommendedProducts();
        $sliderImages = Product::getImages();
        
        // Создаем объект Pagination - постраничная навигация
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        // Подключаем вид
        require_once(ROOT . '/views/site/index.php');
        return true;
    }

    public function actionPage($page = 1)
    {
        
    }
    public function actionSearch()
    {
        
        require_once(ROOT . '/views/user/search.php');
        return true;

        
    }
    /**
     * Action для страницы "Напишите нам"
     */
    public function actionContact()
    {

        // Переменные для формы
        $userEmail = false;
        $userText = false;
        $result = false;

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена 
            // Получаем данные из формы
            $userEmail = $_POST['userEmail'];
            $userText = $_POST['userText'];

            // Флаг ошибок
            $errors = false;

            // Валидация полей
            if (!User::checkEmail($userEmail)) {
                $errors[] = 'Неправильный email';
            }

            if ($errors == false) {
                // Если ошибок нет
                // Отправляем письмо администратору 
                $adminEmail = 'php.start@mail.ru';
                $message = "Текст: {$userText}. От {$userEmail}";
                $subject = 'Тема письма';
                $result = mail($adminEmail, $subject, $message);
                $result = true;
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/site/contact.php');
        return true;
    }
    public function actionFeedback()
    {
        
        // Подключаем вид
        require_once(ROOT . '/views/site/feedback.php');
        return true;
    }
    public function actionHistory()
    {
        
        // Подключаем вид
        require_once(ROOT . '/views/site/history.php');
        return true;
    }
    public function actionTechnologyNow()
    {
        
        // Подключаем вид
        require_once(ROOT . '/views/site/technologyNow.php');
        return true;
    }
    /**
     * Action для страницы "О магазине"
     */
    public function actionAbout()
    {
        // Подключаем вид
        require_once(ROOT . '/views/site/about.php');
        return true;
    }

}
