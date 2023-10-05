<?php   
    require("./mailing/mailfunction.php");

    $name = $_POST["name"];
    $phone = $_POST['phone'];
    $email = $_POST["email"];
    $applyfor = $_POST["status"];
    $experience = $_POST["experience"];
    $otherdetails = $_POST["details"];

    $filename = $_FILES["fileToUpload"]["name"];
	$filetype = $_FILES["fileToUpload"]["type"];
	$filesize = $_FILES["fileToUpload"]["size"];
	$tempfile = $_FILES["fileToUpload"]["tmp_name"];
	$filenameWithDirectory = "kariyer".$name.".pdf";  //give path of tmp-uploads folder(available in this project folder) with slash(/ or \ as per your path) at end of path

    $body = "<ul><li>İsim: ".$name."</li><li>Telefon: ".$phone."</li><li>Email: ".$email."</li><li>Ne İçin: ".$applyfor."</li><li>Tecrübe: ".$experience." Yrs.</li><li>Özgeçmiş (Aşağida Eklidir):</li></ul>";
	if(move_uploaded_file($tempfile, $filenameWithDirectory))
	{
		$status = mailfunction("", "Company", $body, $filenameWithDirectory); //reciever
        if($status)
            echo '<center><h1>Teşekkürler! En kısa zamanda sizinle iletişime geçeceğiz.</h1></center>';
        else
            echo '<center><h1>Mesaj Gönderimi Hata! Lütfen Tekrar Deneyin.</h1></center>';
	}
	else 
	{
		echo "<center><h1>Dosya Yüklenirken Hata Oluştu! Lütfen Tekrar Deneyin.</h1></center>";
	}

?>