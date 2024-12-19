<?php 

// Manual Hashing
// $sensitiveData = "Xander";

// $salt = bin2hex(random_bytes(16));
// $pepper = "ASecretPepperString";

// echo "<br>" . $salt;

// $dataToHash = $sensitiveData . $salt . $pepper;
// $hash = hash("sha256", $dataToHash);

// echo "<br>" . $hash;


//Automatic Regeneration of hash

$pwdSignup= "Xander";

$option = [
    'cost'=> 12
];

//Password that will be in database
$hashedPassword = password_hash($pwdSignup, PASSWORD_BCRYPT, $option);

$pwdLogin = "Alfaro";

if (password_verify($pwdLogin, $hashedPassword)) {
    echo "They are the same!";
}else{
    echo "Not the same";
    echo "<br>" . $pwdLogin;
    echo "<br>" . $hashedPassword;
}