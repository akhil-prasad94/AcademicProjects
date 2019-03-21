<?php

require __DIR__ . '/lib/PayPalDemo.php';


if (empty($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

$app = new PayPalDemo();

if (!empty($_POST['btnAddProduct'])) {

    $product_id = $_POST['product_id'];

    $product = $app->get_product_details($product_id);

    $app->add_new_product($product);

}

if (!empty($_POST['btnRemoveProduct'])) {
    $app->remove_product($_POST['index']);
}

if (isset($_GET['status']) && $_GET['status'] == FALSE) {
    $message = 'Your payment transaction failed!';
}

$user = $app->getUserDetails($_SESSION['user_id']);

$cart = (!empty($_SESSION['cart']) ? $_SESSION['cart'] : []);

$total = (!empty($_SESSION['cart']) ? $app->_get_sum() : 0);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping cart</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php require 'navigation.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h2>
                Shopping Cart
            </h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">

            <?php
            if (isset($message) && $message != "") {
                echo '<div class="alert alert-danger"><strong>Error: </strong> ' . $message . '</div>';
            }
            ?>

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        My Cart
                    </h3>
                </div>
                <div class="panel-body">
                    <?php if (count($cart) > 0) { ?>
                        <table class="table table-striped table-bordered table-responsive">
                            <tr>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            $i = 0;
                            foreach ($cart as $product) { ?>
                                <tr>
                                    <td><?php echo $product['name'] ?></td>
                                    
                                    <td><?php echo $product['quantity'] ?></td>
                                    <td><?php echo $product['price'] . ' ' . $product['currency'] ?></td>
                                    

                                    <td>
                                        <form method="post" action="shopping-cart.php">
                                            <input type="hidden" name="index" value="<?php echo $i; ?>">
                                            <input type="submit" name="btnRemoveProduct" class="btn btn-default btn-xs"
                                                   value="Remove">
                                        </form>
                                    </td>
                                </tr>
                                <?php $i++;
                            } ?>
                            <tr>
                                <td align="right"><b>Total</b></td>
                                <td colspan="4" align="right">
                                    <span class="price"><?php echo $total ?> USD</span>
                                </td>
                            </tr>
                        </table>
                    <?php } else { ?>
                        <div class="form-group">
                            <p>Your shopping cart is empty you don't have selected any of the product to purchase <a
                                        href="products.php">click here</a> to add products. </p>
                        </div>
                    <?php } ?>

                    <a class="btn btn-success" href="products.php"> Continue Shopping</a>

                    <div class="pull-right"><?php (count($cart) > 0 ? require 'pay-with-paypal.php' : '') ?></div>

                </div>
            </div>
            <?php if(count($cart) > 0){ ?>
           
            <?php } ?>
        </div>
        <div class="col-md-4 well">
            <h3>Active User</h3>
            <p>
                <b><?php echo $user['first_name'] . ' ' . $user['last_name'] ?></b>
            </p>
            <p>
                <b><?php echo $user['email']; ?></b>
            </p>
        </div>
    </div>
</div>

</body>
</html>