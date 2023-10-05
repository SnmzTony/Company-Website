<?php   
    require("./mailing/mailfunction.php");

    $name = $_POST["name"];
    $phone = $_POST['phone'];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $body = "<ul><li>İsim: ".$name."</li><li>Telefon: ".$phone."</li><li>Email: ".$email."</li><li>Mesaji: ".$message."</li></ul>";

    $status = mailfunction("", "", $body); //reciever
    if($status)
        echo '<center><h1>Teşekkürler! En kısa zamanda sizinle iletişime geçeceğiz.</h1></center>';
    else
        echo '<center><h1>Mesaj Gönderimi Hata! Lütfen Tekrar Deneyin.</h1></center>';    

        echo '<script>
    setTimeout(function() {
        window.location.href = "index.html";
    }, 2000);
</script>';
?>