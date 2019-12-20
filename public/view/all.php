<h1>Сите договори</h1>
<hr>
<div class="table-responsive-sm">
<table class="table table-hover table-sm table-bordered" id="dataTable" role="grid" aria-describedby="dataTable_info"
    style="width: 100%;" width="100%" cellspacing="0">
    <thead class="thead-dark">
        <tr role="row">
            <th>Име</th>
            <th>Презиме</th>
            <th>Адреса</th>
            <th>Рег. Таблица</th>
            <th>Телефон</th>
            <th>Емаил</th>
            <th>Марка на Возило</th>
            <th>Модел на возило</th>
            <th>Зона</th>
            <th>Тип на ППК</th>
            <th>Креирано од:</th>
        </tr>
    </thead>
    <tbody>
        <?php             
                        $results = $obj->getTables('dogovori', 'car_brand', 'car_model', 'zona', 'ppk', 'users');
                        foreach($results as $result)
                        {
                  ?>
        <tr role="row" class="odd">
            <td><?php echo ucfirst($result['user_firstname']);?></td>
            <td><?php echo ucfirst($result['user_lastname']);?></td>
            <td><?php echo ucfirst($result['user_adress']);?></td>
            <td><?php echo $result['user_plate'];?></td>
            <td><?php echo $result['user_phone'];?></td>
            <td><?php echo $result['user_email'];?></td>
            <td><?php echo $result['car_name'];?></td>
            <td><?php echo $result['model_name'];?></td>
            <td><?php echo $result['zona'];?></td>
            <td><?php echo $result['ppk'];?></td>
            <td><?php echo ucfirst($result['first_name']);?> <?php echo $result['last_name'];?></td>

            <?php }?>
        </tr>
    </tbody>
</table>
 </div>
<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul>
</nav>

 