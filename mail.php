<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<link href="css/mycss.css" rel="stylesheet">
<title>メールフォーム</title>
</head>
<body>
<?php
if ($_POST["submit"] == "メール送信"){
  if($_POST["token"] === '89403965'){

    mb_language("Ja");
    mb_internal_encoding("UTF-8");
    $mailto="massie_jp@yahoo.co.jp";
    $subject = "お問い合わせメールきたよ";
    $content = htmlspecialchars($_POST["content"]);
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $mailfrom="From:" .mb_encode_mimeheader($name) ."<".$email.">";
    mb_send_mail($mailto,$subject,$content,$mailfrom);

    echo "メールを送信しました。";
  }else{
    echo "メールの送信に失敗しました（トークンエラー）";
  }

}

?>
<form method="post" action="mail.php" class="contact-form">
  <div class="item">
      <label class="label" for="name" name="name">名前</label>
      <input id="name" type="text" name="name" required>
    </div>
    <div class="item">
      <label class="label" for="email">メール</label>
      <input id="email" type="email" name="email" autocomplete="email" placeholder="ex) abc@def.ghi" required>
    </div>
    <div class="item">
      <label class="label" for="content">内容</label>
      <textarea rows="4" id="content" name="content" required></textarea>
    </div>
    <input type="hidden" id="token" name="token" value="89403965">
    <input type="submit" name="submit" value="メール送信">
</form>

</body>
</html>