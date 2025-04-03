<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $total_amount = $_POST['total_amount']; // Total amount from checkout form

    // PayPal sandbox credentials
    $paypalUrl = "https://www.sandbox.paypal.com/cgi-bin/webscr";
    $paypalId = "your-sandbox-paypal-id"; // Use your PayPal Sandbox email

    echo "
    <form action='$paypalUrl' method='post' name='paypal_form'>
        <input type='hidden' name='cmd' value='_xclick'>
        <input type='hidden' name='business' value='$paypalId'>
        <input type='hidden' name='item_name' value='Desi Mirchi Powder'>
        <input type='hidden' name='amount' value='$total_amount'>
        <input type='hidden' name='currency_code' value='INR'>
        <input type='submit' value='Pay Now'>
    </form>
    ";

    // Optionally, you could also show a thank-you message and log order details to a database
    // This step can be enhanced by integrating with your backend.
}
?>
