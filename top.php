<?php

session_start();
include("function.php");
loginCheck();

// echo $_SESSION["chk_ssid"];
// echo $_SESSION["u_name"] ;
// echo $_SESSION["rank_flg"];
// echo $_SESSION["id"];

$id = $_SESSION["id"];
// echo $id;

// ここから追加

// 1:DBに接続する（エラー処理の追加）
$pdo = db_connect();



//2：データ登録のSQL作成[選択]

  $stmt = $pdo->prepare("SELECT * FROM camp_member_table WHERE id=:id");
  $stmt->bindValue(':id', $id, PDO::PARAM_INT); //取得したいidを渡す

  // SQLの実行
  $status = $stmt->execute();

// 3.データの表示
$view = "";
if($status==false){
  //execute (SQL実行時にErrorがある場合）
  $error = $stmt->errorInfo();
exit("ErrorQuery:".$error[2]);   //"ErrorQuery:"を日本語にしてもＯＫ「sqlエラーです」
} else {
  $val = $stmt->fetch(); //レコードを１つだけ取得する方法
  }

  // echo $val["rank_flg"] ;
  // echo $val["image_name"] ;
  // echo $val["image_path"] ;

 




?>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>雑草図鑑|||トップページ</title>
    <link rel="stylesheet" href="css/reset.css /">
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p&display=swap" rel="stylesheet">
    
  </head>
  <body>
    <header>
      <div class="log">
        <p class="loginPlace"><a href="logout.php" class="btn_logout">ログアウト</a></p>
      </div>
    <div class="header">
      <h1>雑草図鑑</h1>
      <p>身近にすごす草花たちに会いに行こう。</p>
    </div>
    </header>
    <div class="cp_breadcrumb" id="nav">
      <ul class="breadcrumbs">
      <li class="lastList">Home</li>
      </ul>
     </div>

    <main>
        <div class="profile">
            <div>
              <img class="plofileImg" src="<?php echo $val["image_path"] ;?>">
              <form enctype="multipart/form-data" method="post" action="file_upload.php">
                  <input type ="hidden" name="MAX_FILE_SIZE" value="1048576" />
                  プロフィール画像を変更できます<br><input name="img" type="file" accept="image/*"/>
                  <!-- accept　画像だけ選択 -->
                  <input type="submit" value="変更"　class="btn" />
              </form>
            </div>
            <div>
              <p>こんにちは！</p>
              <h2><?php echo h($_SESSION["u_name"]);?> <span style="font-size:18px;">さん</span></h2>
            </div>

        </div><!--/.profile--->
  <div class="content">
    <div class="categoryZukan">
     <h2>雑草ずかん</h2>
      <p>身近な雑草を見つけにいこう！</p>
      <p>＞＞　CLICK　＜＜</p>
      <a href="zukan.php"></a>
    </div>
  </div>

    </main>
    
    <footer></footer>
    <!-- jQueryを読み込む！必ず先に！ -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- slicknojsはiQueryの次に読み込む
    <script src="js/slick.js"></script> -->
    <!-- jsを読み込む -->
    <script src="js/app.js"></script>
    
  </body>
</html>
