 
   <?php
                   if (isset($_POST['submit'])){
                    // Run your function
                    $obj->update_status('users');
      }
            ?>
  <!-- Page Content -->
  <h1>Администрација Корисници</h1>
  <hr>
<?php echo $msg = ""; ?>
<div class="table-responsive-sm">
  <table class="table table-hover table-sm table-bordered">
  <thead class="thead-dark">
          <tr>
              <th scope="col">Р.Б</th>
              <th scope="col">Име</th>
              <th scope="col">Презиме</th>
              <th scope="col">Емаил</th>
              <th scope="col">Тип на корисник</th>
              <th scope="col">Статус</th>
              <th scope="col">Дата на креирање</th>
              <th scope="col">Промени</th>
              <th scope="col">Деактивирај</th>
          </tr>
      </thead>
      <tbody>
          <?php 
              $results = $obj->getData('users');

              foreach ($results as $result) {
        ?>
          <tr>
              <th scope="row"><?php echo $result['user_id'] ?></th>
              <td><?php echo $result['first_name'] ?></td>
              <td><?php echo $result['last_name']?></td>
              <td><?php echo $result['email']?></td>
              <td><?php echo $result['user_role']?></td>
              <td>
                  <?php 
              if ($result['userstatus'] == 1){
                echo "<i class='far fa-check-circle active'></i>";
              }else {
                echo "<i class='far fa-times-circle inactive'></i>";
              }
          
          ?>
              </td>
              <td><?php echo $result['date_created']?></td>
              <td>
                  <a href="index.php?c=edituser&user_id=<?php echo $result['user_id'] ?>" type="button"
                      class="btn btn-outline-secondary btn-xs">Промени</a>
              </td>

              <td>
              <?php 
              
                    if ($result['userstatus'] == 1) {?>
            
                        <form method ="post"action="<?php echo htmlentities($_SERVER['REQUEST_URI']); ?>">
                          <input type ="hidden" name="user_id" value="<?php echo $result['user_id'] ?>"/>
                          <input type="hidden" name="userstatus" value="0">
                          <input type ="submit" name="submit" data-id="<? echo $result['user_id'] ?>" value="Деактивирај" class="btn-xs btn btn-outline-info"/>
                        </form>
                    <?php }else { ?>

                      <form method ="post"action="<?php echo htmlentities($_SERVER['REQUEST_URI']); ?>">
                          <input type ="hidden" name="user_id" value="<?php echo $result['user_id'] ?>"/>
                          <input type="hidden" name="userstatus" value="1">

                          <input type ="submit" name="submit" data-id="<? echo $result['user_id'] ?>" value="Активирај" class="btn-xs btn btn-outline-success"/>
                        </form>

                    <?php } ?>
                  
              </td>
              <?php  } ?>

          </tr>

      </tbody>
  </table>
</div>