<?php

/**
 * Контроллер ProductController
 * Товар
 */
class ProductController
{

    /**
     * Action для страницы просмотра товара
     * @param integer $productId <p>id товара</p>
     */
    public function actionView($productId)
    {
        // Список категорий для левого меню
        $categories = Category::getCategoriesList();

        // Получаем инф о товаре
        $product = Product::getProductById($productId);
       
        
        require_once(ROOT . '/views/product/view.php');
        return true;

        
    }

}
