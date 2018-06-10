<?php




class ChartsController
{

    public function actionDiagramm()
    {
        $table_name = $_GET['table'];

        $data = array();
        if ($table_name == 'orders')
        {
            $data = Order::getOrderCountByProduct();
        }
        require_once(ROOT . '/views/charts/diagramm.php');
        return true;
    }
}