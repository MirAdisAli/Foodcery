<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php

    $products =$conn->query("SELECT * FROM cart WHERE user_id='$_SESSION[user_id]'");
    $products->execute();

    $allProducts = $products->fetchAll(PDO::FETCH_OBJ);





?>
    <div id="page-content" class="page-content">
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('<?php echo APPURL; ?>/assets/img/bg-header.jpg');">
                <div class="container">
                    <h1 class="pt-5">
                        Your Cart
                    </h1>
                    <p class="lead">
                        Save time and leave the groceries to us.
                    </p>
                </div>
            </div>
        </div>

        <section id="cart">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="10%"></th>
                                        <th>Products</th>
                                        <th>Price in BDT</th>
                                        <th width="15%">Quantity</th>
                                        <th width="15%">Update</th>
                                        <th>Subtotal in BDT</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(count($allProducts) > 0) : ?>
                                    <?php foreach($allProducts as $product) : ?>
                                    <tr>
                                        <td>
                                            <img src="<?php echo APPURL; ?>/assets/img/<?php echo $product->pro_image; ?>" width="60">
                                        </td>
                                        <td>
                                        <?php echo $product->pro_title; ?><br>
                                            <small>1000g</small>
                                        </td>
                                        <td class="pro_price">
                                            BDT <?php echo $product->pro_price; ?>
                                        </td>
                                        <td>
                                            <input class="pro_qty form-control" type="number" min="1" data-bts-button-down-class="btn btn-primary" data-bts-button-up-class="btn btn-primary" value="<?php echo $product->pro_qty; ?>" name="vertical-spin">
                                        </td>
                                        <td>
                                            <button value="<?php echo $product->id; ?>" class="btn-update btn btn-primary">UPDATE</button>
                                        </td>
                                        <td class="subtotal_price">
                                            <?php echo $product->pro_price * $product->pro_qty; ?>
                                        </td>
                                        <td>
                                            <a href="javascript:void" class="text-danger"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <div class="alert alert-success bg-success text-white text-center">
                                        there are no products in cart just yet
                                    </div>
                                    <?php endif; ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col">
                        <a href="<?php echo APPURL; ?>/shop.php" class="btn btn-default">Continue Shopping</a>
                    </div>
                    <div class="col text-right">
                   
                        <div class="clearfix"></div>
                        <h6 class="mt-3">Total: Rp 180.000</h6>
                        <a href="checkout.html" class="btn btn-lg btn-primary">Checkout <i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php require "../includes/footer.php"; ?>

    <script>
        $(document).ready(function() {
            $(".form-control").keyup(function(){
                var value = $(this).val();
                value = value.replace(/^(0*)/,"");
                $(this).val(1);
            });

            $(".pro_qty").mouseup(function () {
                  
                  var $el = $(this).closest('tr');

        

                  var pro_qty = $el.find(".pro_qty").val();
                  var pro_price = $el.find(".pro_price").html();

                  var subtotal = pro_qty * pro_price;
                  $el.find(".subtotal_price").html("");        

                  $el.find(".subtotal_price").append(subtotal);



                  $(".btn-update").on('click', function(e) {

                      var id = $(this).val();
                    

                      $.ajax({
                        type: "POST",
                        url: "update-product.php",
                        data: {
                          update: "update",
                          id: id,
                          pro_qty: pro_qty,
                          subtotal: subtotal
                        },

                        success: function() {
                         alert("done");
                          //reload();
                        }
                      })
                    });
                 
                
           fetch();     
          });

        })
    </script>