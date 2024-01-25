<?php
    require_once('./stripe-php/init.php');
    $stripe = [
        "secret_key" => "sk_test_51OVHzUHrEngaopGcq63pnGa2rZkpRCpLAYdULPTBOHLezhWCWu5frvlMwbbuR2xS8OqGAJvF13vBXmIU6tXXwVkh00NuGOrQPp",
        "publishable_key" => "pk_test_51OVHzUHrEngaopGcvIjApeSALOda328ILskqMt86nBurTqWuGCgAzZc6ZMlaLAio4i0WQ2Otx55sTAWV10SfpkBK00rKEfui84",
    ];
    \Stripe\Stripe::setApiKey($stripe['secret_key']);
?>