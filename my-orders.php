<?php

require __DIR__ . '/lib/PayPalDemo.php';


if (empty($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

$app = new PayPalDemo();

if (isset($_GET['status']) && $_GET['status'] == TRUE) {
    $message = 'Your payment transaction has been successfully completed.';
}

$user = $app->getUserDetails($_SESSION['user_id']);
$orders = $app->getOrders($user['id']);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orders</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<?php require 'navigation.php'; ?>

<div class="container">
    

    <div class="row">
        <div class="col-md-12">
            <h2>
                My Orders
            </h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">

            <?php
            if (isset($message) && $message != "") {
                echo '<div class="alert alert-success"><strong>Success: </strong> ' . $message . '</div>';
            }
            ?>

            <?php if (count($orders) > 0) {
                foreach ($orders as $order){
                ?>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Order @ <?php echo $order['created_at'] ?>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Currency</th>
                            </tr>
                        <?php foreach ($app->getOrderItems($order['id']) as $item){?>
                                <tr>
                                    <td>
                                        <?php echo $item['name']; ?>
                                    </td>
                                   
                                    <td>
                                        <?php echo $item['price']; ?>
                                    </td>
                                    <td>
                                        <?php echo $item['currency']; ?>
                                    </td>
                                </tr>
                        <?php } ?>
                        </table>
                        <h4>
                            Total: <?php echo $order['payment_total']; ?> USD
                        </h4>
                    </div>
                </div>

            <?php }
            }else{ ?>
                <p>
                    You don't have any orders yet, visit <a href="products.php">Products</a> to order.
                </p>
            <?php }?>

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