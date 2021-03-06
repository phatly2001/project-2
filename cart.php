<?php
include("./template/header.php");
include("./dao/Dbconnect.php");
if (!isset($_SESSION['username'])) {
    $_SESSION['status']="Must be logged in";
    $_SESSION['status_code']="error";
    echo '
            <script>
    window.location.href="./login.php";
              </script>
    ';
}
if(isset($_POST['btn_submit'])){
    $acc= $_SESSION['username'];
    $date=$_POST['created'];

    $sqli ="INSERT INTO payments VALUES (null,'$acc','$date','1')";
    if(mysqli_query($connect,$sqli)){
        $_SESSION['status']="success";
        $_SESSION['status_code']="success";
    }else{
        $_SESSION['status']="success";
        $_SESSION['status_code']="error";
    }
    if(isset($_SESSION["shopping_cart"])){      
        foreach($_SESSION["shopping_cart"] as $product){
            $id_ticket= $product['ticketId'];
            $quantity=$product['quantity'];
            $total=$product['price']*$product['quantity'];

            $mysql="SELECT * FROM payments";
            $mysql_run=mysqli_query($connect, $mysql);

            while($row=mysqli_fetch_array($mysql_run)){
                    $payment_id=$row['payment_id'];
            }

            $sql ="INSERT INTO paymentdetails VALUES(null,'$payment_id','$id_ticket','$quantity','$total')";
            if (!mysqli_query($connect, $sql)){
                
            
                    $_SESSION['status']="Failed";
                    $_SESSION['status_code']="error";
                }
        }
        $_SESSION['status']="success";
                $_SESSION['status_code']="success";
        echo'
        
        <script>
        window.location.href="./index.php";
        </script>
        ';
       
    };
}


if (isset($_POST['action']) && $_POST['action'] == "remove") {
    if (!empty($_SESSION["shopping_cart"])) {
        foreach ($_SESSION["shopping_cart"] as $key => $value) {
            if ($_POST["ticketId"] == $key) {
                unset($_SESSION["shopping_cart"][$key]);
                $_SESSION['status'] = "
                Product is removed from your cart!";
            }
            if (empty($_SESSION["shopping_cart"]))
                unset($_SESSION["shopping_cart"]);
        }
    }
}

if (isset($_POST['action']) && $_POST['action'] == "change") {
    foreach ($_SESSION["shopping_cart"] as &$value) {
        if (isset($_POST["btn_inc"])) {
            if ($value['ticketId'] === $_POST["ticketId"]) {
                $value['quantity'] = $_POST["quantity"] + 1;
                break;
            }
        }
        if (isset($_POST["btn_des"])) {
            if ($value['ticketId'] === $_POST["ticketId"]) {
                $value['quantity'] = $_POST["quantity"]-1 ;
                break;
            }
        }
    }
}


?>
<!-- breadcrumbs -->
<section class="inner-banner-main">
    <div class="about-inner about editContent">
        <div class="container">
            <div class="main-titles-head ">
                <h3 class="header-name editContent">
                    Your Cart
                </h3>
                <p class="title-para editContent "></p>
            </div>
            <div class="breadcrumbs-sub">
                <ul class="breadcrumbs-custom-path">
                    <li class="right-side propClone"><a href="index.php" class="editContent">Home <span class="fa fa-angle-right" aria-hidden="true"></span></a>
                        <p>
                    </li>
                    <li class="active editContent">Cart</li>
                </ul>
            </div>
        </div>

    </div>

    </div>
</section>
<!-- breadcrumbs //-->
<style>
    .remove {
        width: 100px;
        border-radius: 50px;
        background-color: #f1c544;
        border-color: #f1c544;
        box-shadow: 2px 2px 1px gray;
        color: white;
    }

    .inc_des {
        width: 30px;
        border-radius: 50px;
        background: whitesmoke;
        box-shadow: 1px 0px 1px lightgray
    }

    .calendar {
        padding: 10px;
        position: relative;
        margin: 0px 900px 10px 0;
    }
</style>
<div class="container" style="padding:70px 0 70px ; text-align:center">
    <form action="" method="POST">
        <input class="calendar" type="date" name="created" placeholder="Created" value="" required="">
        <div class="cart">
            <?php
            if (isset($_SESSION["shopping_cart"])) {
                $total_price = 0;
            ?>
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Ticket code</td>
                            <td>QUANTITY</td>
                            <td>Type</td>
                            <td>PRICE</td>
                            <td>TOTAL</td>
                            <td>Action</td>
                        </tr>
                        <?php
                        foreach ($_SESSION["shopping_cart"] as $product) {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $product["ticketId"] ?>
                                </td>
                                <td>
                                    <form method='post' action=''>
                                        <button type="submit" class="inc_des" name="btn_des"> - </button>
                                        <input style="text-align: center" type="number" name="quantity" min="1" max="10" value="<?php echo $product['quantity'] ?>" required>
                                        <button type="submit" class="inc_des" name="btn_inc"> + </button>
                                        <input type='hidden' name='ticketId' value="<?php echo $product["ticketId"] ?>">
                                        <input type='hidden' name='action' value="change">
                                    </form>
                                </td>
                                <td><?php echo $product['type'] ?></td>
                                <td><?php echo "$" . $product["price"] ?></td>
                                <td><?php echo "$" . $product["price"] * $product["quantity"] ?></td>
                                <td>
                                    <form method='post' action=''>
                                        <input type='hidden' name='ticketId' value="<?php echo $product["ticketId"] ?>" />
                                        <input type='hidden' name='action' value="remove" />
                                        <button type='submit' class='remove'>Remove </button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                            $total_price += ($product["price"] * $product["quantity"]);
                            $_SESSION['total_price'] = $total_price;
                        }
                        ?>
                    </tbody>
                </table>
                <div class="total" style="text-align: right; margin-right: 300px; padding: 50px">
                    <strong>TOTAL: <?php echo "$" . $total_price ?></strong>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" id="Submit" name="btn_submit" value="Submit" style="margin:20px">
                    </div>
                </div>
            <?php
            } else {
                echo '
        <div class="container" style="text-align:center; padding:80px 0 80px">
        <img src="./assets/images/cart-1.jpeg" >
        </div>';
            }
            ?>
        </div>
    </form>

</div>

<?php
include("./template/footer.php");
?>