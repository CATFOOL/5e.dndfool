<?php
$hashed_password = password_hash("779191518Sa", PASSWORD_DEFAULT);
echo ($hashed_password);


//echo password_verify("779191518Sa", $hashed_password);
