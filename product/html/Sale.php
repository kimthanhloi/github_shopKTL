<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MWC</title>
    <?php include "../includes/linkcss.php" ?>
</head>

<body>
    <div class="container">
        <!-- header -->
        <section>
            <?php include "../includes/header.php" ?>
        </section>
        <!-- shoes woman -->
        <section class="container_shoesman">
            <h2 style="font-size: 2rem; ">SALE 50%</h2>
            <div class="grid wide">
                <div class="row" id="SALE_product">

                </div>
            </div>
        </section>

        <?php include "../includes/paginnation.php" ?>
        <?php include "../includes/cart.php" ?>
        <!-- footer -->
        <?php include "../includes/footer.php" ?>
    </div>

    <!-- mobi nav -->
    <?php include "../includes/mobinav.php" ?>

    <script src="../js/sale.js"></script>
</body>

</html>