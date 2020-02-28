<?php

session_start();

include("../handlers/orderHandler.php");

try {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $result = getOrders();
        echo json_encode($result);

    } else if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST["entity"] == "enjoy") {
            if ($_POST["endpoint"] == "receivedOrder") {
                $result = receivedOrder( $_POST['Received']);
                echo json_encode($result);

            } else if ($_POST["endpoint"] == "shippedOrder") {
                $result = shippedOrder($Shipped);
                echo json_encode($result);
            } else if ($_POST["endpoint"] == "") {
                echo json_encode($result);
            } else {
                throw new Exception("Not a valid endpoint", 501);
            }
        } else {
            throw new Exception("Not a valid entity method", 501);
        }
    } else {
        throw new Exception("Not valid request method", 405);
    }
} catch (Exception $e) {
    echo json_encode(array("Message" => $e->getMessage(), "Status" => $e->getCode()));
}

?>