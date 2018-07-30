<?php include ROOT . '/views/layouts/header_admin.php'; ?>
<style>
    h4{
        color : rgb(0,255,255);
    }
</style>
<section>
    <div class="container">
        <div class="row">   
            <br/>   
            <h4>Выберите отчёт:</h4> 
            <br/>    
            <br/>
            <ul>
                <li>
                    Популярность мед.препаратов у клиентов
                    <a href="/charts/diagramm?table=orders">Диаграмма</a>
                    <a href="/charts/diagrammBar?table=orders">Гистограмма</a>
                </li>
                <li>
                    Популярность производителей среди заказов
                    <a href="/charts/diagramm?table=manufactures">Диаграмма</a>
                    <a href="/charts/diagrammBar?table=manufactures">Гистограмма</a>
                </li>
                <li>
                    Статистика заказов по календарю
                    <a href="/charts/diagramm?table=productToOrders">Диаграмма</a>
                    <a href="/charts/diagrammBar?table=productToOrders">Гистограмма</a>
                </li>
                <li>
                    Статусы заказов
                    <a href="/charts/diagramm?table=category">Диаграмма</a>
                    <a href="/charts/diagrammBar?table=category">Гистограмма</a>
                </li>
            </ul>
            
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

