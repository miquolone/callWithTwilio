<?php

require 'twilioClass.php';

$call_for = "かける先の電話番号";
$call = new CallClass();
$call->call_with_twilio($call_for);

?>
