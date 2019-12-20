<!-- Page Content -->
<h1>Внеси нов договор</h1>
<hr>

<?php
     if ($_SERVER['REQUEST_METHOD'] == "POST"){
      // Run your function
      $obj->addContract();
  }


?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Внеси нов договор</h6>
    </div>
    <div class="card-body">
        <form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']);?>" method="POST">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="ime">Име:</label>
                        <input type="text" class="form-control" name="user_firstname" required="required"
                            autofocus="autofocus">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="prezime">Презиме:</label>
                        <input type="text" class="form-control" name="user_lastname" required="required"
                            autofocus="autofocus">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="adresa">Адреса:</label>
                        <input type="text" class="form-control" name="user_adress" required="required"
                            autofocus="autofocus">
                    </div>

                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="registarska_tablica">Регистерски број на возило:</label>
                        <input type="text" class="form-control" name="user_plate" required="required"
                            autofocus="autofocus">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="telefon">Телефонски број:</label>
                        <input type="text" class="form-control" name="user_phone" autofocus="autofocus">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="email">Електронска адреса:</label>
                        <input type="text" class="form-control" name="user_email" autofocus="autofocus">
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="sel1">Марка на возилото:</label>
                        <select class="form-control" id="cct" name="user_car">
                            <option selected value="Andean">Избери марка на возило ...</option>
                            <?php 

                              $results = $obj->getData('car_brand');
                              foreach($results as $result){
                              ?>
                            <option value="<?php echo $result['car_id'];?>"><?php echo ucfirst($result['car_name']);?>
                            </option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="sel1">Тип на возилото:</label>
                        <select class="form-control" id="scct" name="user_carmodel">
                            <option value="1">Manta</option>
                        </select>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="sel1">Зона сектор:</label>
                        <select class="form-control" id="cct" name="user_sektor">
                            <?php 
                              $results = $obj->getData('zona');
                              foreach($results as $result){
                              ?>
                            <option value="<?php echo $result['zona_id'];?>"><?php echo ucfirst($result['zona']);?>
                            </option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="sel1">Тип на ППК:</label>
                        <select class="form-control" id="cct" name="user_ppk">
                            <?php 
                              $results = $obj->getData('ppk');
                              foreach($results as $result){
                              ?>
                            <option value="<?php echo $result['ppk_id'];?>"><?php echo ucfirst($result['ppk']);?>
                            </option>
                            <?php }?>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Зачувај</button>
        </form>
    </div>
</div>


<script>
$(document).ready(function() {
    $('select[name="carname"]').on('change', function() {
        let carid = $(this).val();
        value = 1;
        key = 1;
        // alert(carid);
        $.ajax({
            url: main.php,
            data: {
                carid: carid,
            },
            type: "POST",
            success: function() {
                $('#scct').html('<option value="' + key + '">' + value + '</option>');
            }


        });



    });
});
</script>