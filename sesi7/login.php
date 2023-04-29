<?php

include_once("Konfigurasi.php");
    if(isset($_POST["txUSER"])){
        $user = $_POST["txUSER"];
        $pwd = $_POST["txPASS"];

        echo "DEBUG: username: " .$user;
        echo "password: ".$pwd ;

    $sql = "SELECT tu.nama, tu.email, tu.username, tu.passkey, tu.iduser FROM tbuser tu WHERE tu.username='".$user."';";

    $cnn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME, PORT) or die ("Gagal konfigurasi");
    $hasil = mysqli_query($cnn,$sql);
    $jdata = mysqli_num_rows($hasil);
    //echo "DEBUG: jdata=>".$jdata;
    if($jdata > 0 ){
    $h = mysqli_fetch_assoc($hasil);
    //echo "DEBUG: <br>Nama: " .$h["passkey"];
    if(md5($pwd) == $h["passkey"]){
        echo "DEBUG: password sama";
    }else{
        $spn = "Akses Ditolak";
    }
}else{
    $spn = "Akses Ditolak";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <div><?= $psn; ?></div>
    <form method="POST" action="login.php">
        <h3>Form Login</h3>
        <div>
            User Name 
            <input type="text" name="txUSER">
        </div>
        <div>
            Password 
            <input type="password" name="txPASS">
        </div>
        <div>
            <button type="submit">Login</button>
        </div>

    </form>


</body>
</html>