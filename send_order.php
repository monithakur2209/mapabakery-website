<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    function safe($key) {
        return isset($_POST[$key]) ? htmlspecialchars($_POST[$key]) : '';
    }

    $name = safe("name");
    $phone = safe("phone");
    $email = safe("email");
    $item = safe("item");
    $size = safe("size");
    $date = safe("date");
    $notes = safe("notes");

    $to = "order.mapabakery@gmail.com";
    $subject = "New MAPA Bakery Order from $name";

    $message = "
A new order has been placed:

Name: $name
Phone: $phone
Email: $email

Item: $item
Size: $size
Pickup/Delivery Date: $date

Notes:
$notes
";

    $headers = "From: MAPA Bakery <no-reply@mapabakery.com>\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $subject, $message, $headers)) {
        echo "success";
    } else {
        echo "error";
    }
}
?>
