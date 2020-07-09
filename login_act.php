<?php
// var_dump($_POST);
// exit();


session_start();
include('functions.php');
// 関数ファイル読み込み  
check_session_id();
// 外部ファイル読み込み

// DB接続します
$pdo = connect_to_db();
// データ受け取り
$username = $_POST['username']; // データ受け取り→変数に入れる  
$password = $_POST['password'];
// データ取得SQL作成&実行



// SQL実行時にエラーがある場合はエラーを表示して終了
$sql = 'SELECT * FROM users_table             
WHERE username=:username              
 AND password=:password               
 AND is_deleted=0';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$status = $stmt->execute();


// うまくいったらデータ（1レコード）を取得
$val = $stmt->fetch(PDO::FETCH_ASSOC);

// ユーザ情報が取得できない場合はメッセージを表示
if (!$val) {
  echo "<p>ログイン情報に誤りがあります．</p>";
  echo '<a href="todo_login.php">login</a>';
  exit();
} else {
  $_SESSION = array();
  // セッション変数を空にする    
  $_SESSION["session_id"] = session_id();
  $_SESSION["is_admin"] = $val["is_admin"];
  $_SESSION["username"] = $val["username"];
  header("Location:gio.php");

  exit();
  // ログインできたら情報をsession領域に保存して一覧ページへ移動

}
