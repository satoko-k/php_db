<?php
// 入力チェック（受信確認処理の追加）
// セットされていない　または空の場合はエラーを返す
    if(
    !isset($_POST["u_name"]) ||$_POST["u_name"] ==""||
    !isset($_POST["u_id"]) ||$_POST["u_id"] ==""||
    !isset($_POST["u_pw"]) ||$_POST["u_pw"] ==""
    ){
        exit('ParamError');
    }

//１:POSTデータの取得

$u_name = $_POST["u_name"];
$u_id = $_POST["u_id"];
$u_pw = $_POST["u_pw"];

echo $u_name;


// ２:DBに接続する（エラー処理の追加）
//  レンタルサーバーを借りたらhostにIPアドレスを指定する。
// rootはID(XAMPPはrootになってる　最後の''はパスワード　
    try {
        $pdo = new PDO('mysql:dbname=camp_plantdb; charset=utf8; host=localhost','root','');
    }catch(PDOException $e){
        exit('DbConnectError:'.$e->getMessage());
    }


//３ :データ登録のSQL作成　　:a1は変数が入れられないので置き換え用
    $sql="INSERT INTO camp_plant_table(id, u_name, u_id, u_pw, indate)
        VALUES( NULL,:a1,:a2,:a3,sysdate())"; 
    
    $stmt = $pdo->prepare($sql);

    // これと同じ↓
    // $stmt = $pdo->prepare("INSERT INTO camp_testan_table(id, name, email, naiyou, indate)
    // VALUES( NULL,:a1,:a2,:a3,sysdate())");



    // bindValue関連付け
    $stmt->bindValue(':a1', $u_name, PDO::PARAM_STR); //Integer 数値の場合はPDO::PARAM_INT　にする
    $stmt->bindValue(':a2',$u_id, PDO::PARAM_STR);
    $stmt->bindValue(':a3',$u_pw, PDO::PARAM_STR);
    //bindValue(バインド変数, 変数, dataType);


    // SQLの実行
    $status = $stmt->execute();


// 4:データ登録処理後

    if($status==false){
        //SQL実行時にエラーがある場合（エラーオブジェクトを取得して表示）
        $error=$stmt->errorInfo();
        exit("QueryError:".$error[2]);
    }else{
        //5:index.phpへリダイレクト
        header("Location: login.php"); //Location: この後半角スペースを必ず入れる
        exit;
    }
?>