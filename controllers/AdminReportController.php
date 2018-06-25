<?php

/**
 * Контроллер AdminCategoryController
 * Отчеты в админпанели
 */
class AdminReportController extends AdminBase
{

    /**
     * Action для страницы "Управление отчетами"
     */
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список отчетов
        //$reportsList = Report::getReportsListAdmin();

        // Подключаем вид
        require_once(ROOT . '/views/charts/index.php');
        return true;
    }
}
