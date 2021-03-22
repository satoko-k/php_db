


<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/form.css" />
    <title>メンバー登録</title>
  </head>
  <body>

    <header>
    <h1>メンバー登録</h1>
    </header>
    <div class="wrapper">
  <main>
      <form method="post" action="member_insert.php">
        <div class="form">
      

            <p><label for="">お名前<span class="required">必須</span><br><input type="text" name="u_name" required/></label></p>
            <p><label for="">ログインID<span class="required">必須</span><br><input type="text" name="u_id" required /></label></p>
            <p><label for="">ログインPW<span class="required">必須</span><br><input type="text" name="u_pw" required /></label></p>
            <input type="submit" class="form-Btn" value="登録する" />
         
        </div><!-- /.form -->
        <div>
          <a class="navbar-brand" href="login.php">ログイン画面へ戻る</a>
        </div>
      </form>
    </main>
   </div>
  </body>
</html>
