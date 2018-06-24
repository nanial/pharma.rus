<?php




class ChartsController
{

    public function actionDiagramm()
    {
        $table_name = $_GET['table'];

        $data = array();
        switch ($table_name)
        {
            case 'orders':
                $data = Order::getOrderCountByProduct();
                break;
            case 'manufactures':
                $data = Order::getOrderCountByManufactures();
                break;
            case 'productToOrders':
                $data = Order::getOrderCountByDays();
                break;
            case 'category':
                $data = Order::getOrderCountByCategories();
                break;
        }
        require_once(ROOT . '/views/charts/diagramm.php');
        return true;
    }

    public function actionDiagrammBar()
    {
        $table_name = $_GET['table'];

        $data = array();
        switch ($table_name)
        {
            case 'orders':
                $data = Order::getOrderCountByProduct();
                break;
            case 'manufactures':
                $data = Order::getOrderCountByManufactures();
                break;
            case 'productToOrders':
                $data = Order::getOrderCountByDays();
                break;
            case 'category':
                $data = Order::getOrderCountByCategories();
                break;
        }
        require_once(ROOT . '/views/charts/diagrammBar.php');
        return true;
    }
}