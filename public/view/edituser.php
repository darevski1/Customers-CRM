

<?php
   if ($_SERVER['REQUEST_METHOD'] == "POST"){
      $obj->updateUser();
    }
    $getdata = $obj->getId('users', 'user_id');
    foreach($getdata as $data){
?>
<div>
<div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Промени податоци на корисник</h6>
                    </div>
                    <div class="card-body">
                      <form action="<?php echo htmlentities($_SERVER['REQUEST_URI']); ?>" method="POST">
                      <div class="form-group">
                          <input type="hidden" class="form-control" name="<?php echo $result['user_id'];?>" >
                        </div>


                        <div class="form-group">
                          <label for="first_name">Име:</label>
                          <input type="text" class="form-control" name="first_name" required="required" autofocus="autofocus" value="<?php echo $data["first_name"]; ?>">
                        </div>

                        <div class="form-group">
                          <label for="last_name">Презиме:</label>
                          <input type="text" class="form-control" name="last_name" required="required" autofocus="autofocus" value="<?php echo $data["last_name"]; ?>">
                        </div>

                        <div class="form-group">
                          <label for="email">Емаил:</label>
                          <input type="text" class="form-control" name="email" required="required" autofocus="autofocus" value="<?php echo $data["email"]; ?>">
                        </div>

   
                        <div class="form-group">
                          <label for="sel1">Тип на корисник:</label>
                          <select class="form-control" id="sel1" name="user_role">
                          <?php 
                              $results = $obj->getData('user_role');
                                   foreach($results as $result) {
                              
                              ?>
                            <option value="<?php echo $result['id'];?>"><?php echo $result['user_roler'];?></option>

                              <?php }?>
                          </select>
                        </div> 
                        
                        <button class="btn btn-success btn-block" name="submit"  type="submit">Зачувај</button>

                      </form>
                    </div>
                </div>
                <?php  }?> 