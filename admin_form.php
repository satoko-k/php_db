


<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/form.css" />
    <title>雑草登録用フォーム</title>
  </head>
  <body>

    <header>
    <h1>【管理者用】登録用フォーム</h1>
    </header>
    <div class="wrapper">
  <main>
      <form method="post" action="admin_form_insert.php">
        <div class="form">
      
            <p><label for="">雑草名<span class="required">必須</span><br><input type="text" name="p_name" required placeholder="タンポポ"/></label></p>
            <p><label for="">科名と属名<span class="required">必須</span><br><input type="text" name="f_name" required placeholder="キク科 タンポポ属"/></label></p>
            <p><label for="">季節<span class="required">必須</span><br><input type="text" name="season" required placeholder="春" /></label></p>
            <p><label for="">分類<span class="required">必須</span><br><input type="radio" name="category" value="一年草" required />一年草</label>
            　<input type="radio" name="category" value="多年草" required />多年草</p>
            <p><label for="">コメント<span class="required">必須</span><br><textarea name="comment" rows="10" cols="50"></textarea></label></p>
            <p><label for="">画像名<span class="required">必須</span><br><input type="text" name="image" required placeholder="image001.jpg"/></label></p>

        </div>
        <input type="submit" class="form-Btn" value="送信" />

        












        <div>

        </div>
      </form>
    </main>
   </div>
  </body>
</html>
