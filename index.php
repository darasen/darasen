<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <?php
     $fp = fopen("settei.txt", "r") or die("ファイルが開けないよぉ！");
                while( $line = fgets($fp) ){
                    if(substr($line, 0, 1) === '!'){
    echo "<title>",str_replace(PHP_EOL, '',mb_substr($line,1)),"</title>\n";
                    }else if (substr($line, 0, 1) === '?'){
     echo "<meta name=\"description\" content=\"",str_replace(PHP_EOL, '',mb_substr($line,1)),"\">\n";
                    }

                }
    fclose($fp);
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:url" content="https://darasen.com">
    <meta property="og:type" content="website">
    <meta property="og:title" content="darasen Home">
    <meta property="og:description" content="レスポンシブ、サイトの再構築、デザインカンプからサイト制作などHTMLコーディング">
    <meta property="og:image" content="https://darasen.com/images/ogp.jpg">
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link href="https://fonts.googleapis.com/css?family=Sawarabi+Gothic" rel="stylesheet">
    <link href="css/mycss.css" rel="stylesheet">
    <?php
        $filearr2 = file("settei.txt");
        echo "<link rel==\"icon\" href=\"/",str_replace(PHP_EOL, '',$filearr2[2]),"\">\n";
     ?>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
</head>

<body>
<h6>Darasen.com</h6>

<a href="#" class="back-to-top"></a>
<!-- #wrapper ここから　-->
<div id="wrapper">
    <!-- header ここから -->
    <header>
      <?php
          echo "<img src=\"",str_replace(PHP_EOL, '',$filearr2[3]),"\" id=\"logo\"  class=\"logo\" alt=\"",str_replace(PHP_EOL, '',$filearr2[4]),"\">\n";
       ?>
        <!-- ハンバーガーメニュー部分 -->
    <div class="drawer">
    <!-- ハンバーガーメニューの表示・非表示を切り替えるチェックボックス -->
    <input type="checkbox" id="drawer-check" class="drawer-hidden" >
    <!-- ハンバーガーアイコン -->
    <label for="drawer-check" class="drawer-open"><span><br>MENU</span></label>

        <!-- ナビバー ここから -->
         <nav class="drawer-content">
           <h6>何かお手伝いできますか？</h6>
            <ul class="drawer-list">

<?php
$i = 0;
$fp = fopen("menu.txt", "r") or die("ファイルが開けないよぉ！");
while( !feof($fp) ) {
  $i = $i + 1;
  echo "<li><a href=\"#",$i,"c\" id=\"",$i,"m\" class=\"btn-text-3d drawer-item\">",fgets($fp),"</a></li>\n";
};

fclose($fp);

?>
             </ul>
        </nav>
        <!-- ナビバー ここまで -->
    </div>
    <!-- drawer-->
   </header>
    <!-- header こｋまで-->

    <!-- #container ここから-->
    <div id="container">

    <!-- #left ここから -->
    <aside><hgroup>
      <h1>aside~MENU</h1>
        <?php
            for ($count = 1; $count < $i+1; $count++){
                echo "<div id=\"",$count,"c_2\">\n";
                $filearr = file("menu.txt");
                echo "<h2>",$filearr[$count-1],"</h2><br>\n";

                echo "</div>\n";
                }

             ?>
    </hgroup></aside>
    <!-- #left ここまで -->

    <!-- #right ここから -->
    <main>

       <?php
                for ($count = 1; $count < $i+1; $count++){
                echo "<article>\n<div id=\"",$count,"c\" class=\"kiji item\">\n";
                echo "<p class=\"mintitle\">",$filearr[$count-1],"</p>\n";

                $fp = fopen($count.".txt", "r") or die("ファイルが開けないよぉ！");
                while( $line = fgets($fp) ){
                    if(substr($line, 0, 1) === '#'){
                        echo mb_substr($line,1),"<br>\n";
                    }else{
                        if (substr($line, 0, 1) === '%'){
                                echo "<div class=\"map\">",mb_substr($line,1),"</div>\n";
                        } else if (substr($line, 0, 1) === '$'){
                                echo "<h1>",str_replace(PHP_EOL, '',mb_substr($line,1)),"</h1>\n";
                        }else if (substr($line, 0, 1) === '&'){
                                echo "<h2>",str_replace(PHP_EOL, '',mb_substr($line,1)),"</h2>\n";
                        }else if (substr($line, 0, 1) === '*'){
                                echo "<div class=\"iframe-wrap\">",mb_substr($line,1),"</div>\n";
                        }else{
                                echo $line,"<br>\n";
                                }
                        }

                }

                fclose($fp);
                echo "<br>\n";
                echo "</div>\n</article>\n";
                }

            ?>


    </main>
    <!-- #right ここまで -->

    </div>
     <!--#container ここまで-->


</div>
<!-- #wrapper ここまで　-->
    <!-- footer ここから -->
    <footer>

    <?php
        echo str_replace(PHP_EOL, '',$filearr2[5]),"\n";
     ?>
    </footer>
    <!-- footerr こｋまで-->
</body>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
    <?php
            for ($count = 1; $count < $i+1; $count++){
                echo "$(function () {\n";
                echo "var pos = $('#",$count,"c').offset();\n";

                echo "$('#",$count,"c_2').offset({top: pos.top});\n";

                echo "});\n";

                }
    ?>

$(document).ready(function(){
    $(window).scroll(function() {
        if($(this).scrollTop() > 100) { // 100pxスクロールしていたら上に戻るボタンを表示
            $(".back-to-top").fadeIn();
        } else {
            $(".back-to-top").fadeOut();
        }
    });
    $(".back-to-top").click(function() {
        $("body,html").animate({scrollTop:0},800); // 800msかけて上に戻る
    });
});

</script>

<script>
     var initPosition = $(".drawer").offset().top;
    $(window).scroll(function() {
    var scroll = $(document).scrollTop();

    // 移動後ポジション
    var movePosition = initPosition + scroll + "px";
    $(".drawer").animate({
        top : movePosition
    }, {
        duration : 600,
        queue : false
    });

    });
    </script>
<!--Jquery 競合回避　jQuery(function($) { });-->
<script>

jQuery(function($) {
$(function() {
  $('.drawer-item').click(function() {
    $('#drawer-check').removeAttr('checked').prop('checked', false).change();
  });
});

    });
</script>

</html>
