<?php 
$apikey = "rzp_test_SVw9R97QIknqtn";
?>
<script src="<?= base_url() ?>assets/jquery/jquery/dist/jquery.js"></script>

<form action="https://www.example.com/payment/success/" method="POST">
    <input type="text">
    <input type="text">
    <input type="text">

<input type="hidden" custom="Hidden Element" name="hidden">
</form>

<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="rzp_test_SVw9R97QIknqtn" // Enter the Test API Key ID generated from Dashboard → Settings → API Keys
    data-amount="29935" // Amount is in currency subunits. Hence, 29935 refers to 29935 paise or ₹299.35.
    data-currency="INR"// You can accept international payments by changing the currency code. Contact our Support Team to enable International for your account
   
    data-buttontext="Pay with Razorpay"
    data-name="Acme Corp"
    data-description="A Wild Sheep Chase is the third novel by Japanese author Haruki Murakami"
    data-image="https://example.com/your_logo.jpg"
    data-prefill.name="Gaurav Kumar"
    data-prefill.email="gaurav.kumar@example.com"
    data-theme.color="#F37254"
></script>