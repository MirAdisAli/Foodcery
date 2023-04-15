<?php require "includes/header.php"; ?>
<?php require "config/config.php"; ?>
<?php
     $categories = $conn->query("SELECT * FROM categories");
     $categories->execute();

     $allCategories = $categories->fetchAll(PDO::FETCH_OBJ);

?>
    <div id="page-content" class="page-content">
        <div class="banner">
        <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('assets/img/header3.jpg');">

                <div class="container">
                    <h1 class="pt-5">
                        Save time and leave the<br>
                        groceries to us.
                    </h1>
                    <p class="lead">
                        Always Fresh Everyday.
                    </p>
                    </div>
                </div>
            </div>
        </div>

        <section id="why">
            <h2 class="title">Why Foodcery</h2>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card border-0 text-center gray-bg">
                            <div class="card-icon">
                                <div class="card-icon-i text-success">
                                    <i class="fas fa-leaf"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">
                                    Straight from the Farm
                                </h4>
                                <p class="card-text">
                                    Our farm-to-table concept emphasizes on getting the fresh produce directly from local farms to your tables within one day, hence you know you get the freshest produce straight from harvest.
                                </p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 text-center gray-bg">
                            <div class="card-icon">
                                <div class="card-icon-i text-success">
                                    <i class="fa fa-question"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">
                                    Know Your Farmers
                                </h4>
                                <p class="card-text">
                                    We want you to know exactly who is growing your food by having the farmers profile on each item and farmers page. You’re welcome to visit the farms and see the love they put into growing your food.
                                </p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 text-center gray-bg">
                            <div class="card-icon">
                                <div class="card-icon-i text-success">
                                    <i class="fas fa-smile"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">
                                    Improving Farmers Livelihood
                                </h4>
                                <p class="card-text">
                                    Slowly but sure, by cutting the complex supply chain and food system, we hope to improve the welfare of farmers by giving them the returns they deserve for their hard work.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-5 text-center">
                        <a href="shop.php" class="btn btn-primary btn-lg">SHOP NOW</a>
                    </div>
                </div>
            </div>
        </section>

        <section id="categories" class="pb-0 gray-bg">
            <h2 class="title">Categories</h2>
            <div class="landing-categories owl-carousel">
                <?php foreach($allCategories as $category) : ?>
                <div class="item">
                    <div class="card rounded-0 border-0 text-center">
                        <img src="assets/img/<?php echo $category->image; ?>">
                        <div class="card-img-overlay d-flex align-items-center justify-content-center">
                            <!-- <h4 class="card-title">Vegetables</h4> -->
                            <a href="shop.php" class="btn btn-primary btn-lg"><?php echo $category->name; ?></a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>
        </section>
    </div>
<?php require "includes/footer.php"; ?>
