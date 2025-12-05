<?php
session_start();
include("include/connect.php");

if (!isset($_SESSION['user'])) {
    header("Location:login.php");
    exit();
}

$user = $_SESSION['user'];


//------------- زيادة الكمية ---------------
if (isset($_GET['action']) && $_GET['action'] == "inc" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $q = $pdo->prepare("SELECT quantity, price FROM orders WHERE id = ? AND buyer_name = ?");
    $q->execute([$id, $user]);
    $item = $q->fetch();

    $newQuantity = $item['quantity'] + 1;
    $newTotal = $newQuantity * $item['price'];

    $upd = $pdo->prepare("UPDATE orders SET quantity = ?, total = ? WHERE id = ?");
    $upd->execute([$newQuantity, $newTotal, $id]);

    header("Location:cart.php");
    exit();
}


//------------- تقليل الكمية ---------------
if (isset($_GET['action']) && $_GET['action'] == "dec" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $q = $pdo->prepare("SELECT quantity, price FROM orders WHERE id = ? AND buyer_name = ?");
    $q->execute([$id, $user]);
    $item = $q->fetch();

    if ($item['quantity'] > 1) {
        $newQuantity = $item['quantity'] - 1;
        $newTotal = $newQuantity * $item['price'];

        $upd = $pdo->prepare("UPDATE orders SET quantity = ?, total = ? WHERE id = ?");
        $upd->execute([$newQuantity, $newTotal, $id]);
    }

    header("Location:cart.php");
    exit();
}


//------------- حذف المنتج ---------------
if (isset($_GET['action']) && $_GET['action'] == "delete" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $del = $pdo->prepare("DELETE FROM orders WHERE id = ? AND buyer_name = ?");
    $del->execute([$id, $user]);

    header("Location:cart.php");
    exit();
}



//------------- جلب كل المنتجات في السلة ---------------
$sql = "SELECT * FROM orders WHERE buyer_name = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$user]);
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);


// حساب الإجمالي النهائي
$grandTotal = 0;
foreach ($orders as $item) {
    $grandTotal += $item['total'];
}

include("include/header.php");

?>

<style>
    .title {
        color: #7a3900;
        text-align: center;
        margin-top: 5%;
    }

    .cart-wrapper {
        width: 90%;
        margin: 40px auto;
        background: #fff;
        border-radius: 15px;
        display: grid;
        grid-template-columns: 65% 35%;
        box-shadow: 0 0 20px #ddd;
        overflow: hidden;
    }

    /* ---- left side ---- */
    .cart-left {
        padding: 25px 35px;
    }

    .cart-left h2 {
        font-size: 30px;
        font-weight: bold;
        color: #934801;
        margin-bottom: 15px;
    }

    .cart-item-list {
        margin-top: 25px;
    }

    .cart-row {
        display: grid;
        grid-template-columns: 15% 40% 15% 15% 15%;
        align-items: center;
        padding: 15px 0;
        border-bottom: 1px solid #eee;
    }

    .cart-row img {
        width: 90px;
        height: 120px;
        object-fit: cover;
        border-radius: 10px;
    }

    .book-name {
        font-size: 18px;
        color: #444;
        font-weight: bold;
    }

    .qty-controller {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .qty-btn {
        background: #934801;
        padding: 4px 10px;
        border-radius: 6px;
        color: #fff;
        text-decoration: none;
        font-weight: bold;
    }

    .remove-btn {
        color: crimson;
        font-size: 14px;
        margin-top: 5px;
        display: inline-block;
    }

    /* ---- Right Side (Summary) ---- */
    .cart-right {
        background: #f7f3ef;
        padding: 30px;
    }

    .summary-title {
        font-size: 24px;
        color: #934801;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .summary-line {
        display: flex;
        justify-content: space-between;
        margin: 10px 0;
        font-size: 17px;
    }

    .total-cost {
        font-size: 22px;
        font-weight: bold;
        color: #934801;
        margin-top: 20px;
        border-top: 2px solid #ddd;
        padding-top: 15px;
    }

    .checkout-btn {
        width: 100%;
        padding: 12px;
        background: #934801;
        color: white;
        border-radius: 10px;
        margin-top: 20px;
        text-align: center;
        font-size: 18px;
        text-decoration: none;
        transition: 0.3s;
    }

    .checkout-btn:hover {
        background: #7a3900;
    }
</style>


<h1 class="title">Your Cart</h1>

<div class="cart-wrapper">

    <!-- LEFT SIDE -->
    <div class="cart-left">

        <h2>Shopping Cart</h2>

        <div class="cart-item-list">

            <?php foreach ($orders as $item): ?>

                <div class="cart-row">

                    <img src="../admin/img/<?= $item['image']; ?>">

                    <div>
                        <div class="book-name"><?= $item['name']; ?></div>
                        <a class="remove-btn" href="cart.php?action=delete&id=<?= $item['id']; ?>">Remove</a>
                    </div>

                    <div class="qty-controller">
                        <a class="qty-btn" href="cart.php?action=dec&id=<?= $item['id']; ?>">-</a>
                        <strong><?= $item['quantity']; ?></strong>
                        <a class="qty-btn" href="cart.php?action=inc&id=<?= $item['id']; ?>">+</a>
                    </div>

                    <div><?= $item['price']; ?> ج.م</div>

                    <div><?= $item['total']; ?> ج.م</div>

                </div>

            <?php endforeach; ?>

        </div>
    </div>


    <!-- RIGHT SIDE -->
    <div class="cart-right">
        <div class="summary-title">Order Summary</div>

        <div class="summary-line">
            <span>Items</span>
            <span><?= count($orders); ?></span>
        </div>

        <div class="summary-line">
            <span>Shipping</span>
            <span>30 ج.م</span>
        </div>

        <div class="total-cost">
            Total Cost: <?= $grandTotal + 30; ?> ج.م
        </div>

        <div style="margin-top: 7%; font-weight:bold; color:antiquewhite; text-align:center; background-color:#7a3900; border-radius:10%; ">
            <a href="contact_us.php" style="text-decoration: none; color:antiquewhite;"> تواصل معنا لمتابعة طلبك </a>
        </div>



    </div>

    <a href="books.php"><button class="btn btn" style="background-color: #7a3900; color:antiquewhite; margin-left:50%; margin-top: 2%; margin-bottom:2%;">BACK</button></a>

</div>


<?php include("include/footer.php"); ?>