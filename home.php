<?php
    function displayTweets(){
//        $mysqli =new mysqli("localhost","root","root","tsubuyaki");
//        if ($mysqli->connect_error) {
//        echo $mysqli->connect_error;
//        exit();
//        } else {
//            $mysqli->set_charset("utf8");
//        }
//
//    //    DB処理
//        $sql = "SELECT name FROM users WHERE email = 'aaa@aaa'";
//        if ($result = $mysqli->query($sql)) {
//        // 連想配列を取得
//            while ($row = $result->fetch_assoc()) {
//                echo "<br>" .$row["name"]. "<br>";
//                echo "rows=" . $result->num_rows;
//                
//            }
//        $mysqli->close();
//        }
//    }
        
        
        
        try {
          // PDOインスタンスを生成
          $pdo = new PDO('mysql:host=localhost;dbname=tsubuyaki;charset=utf8','root','root');

        // エラー（例外）が発生した時の処理を記述
        } catch (PDOException $e) {

          // エラーメッセージを表示させる
          echo 'データベースにアクセスできません！' . $e->getMessage();

          // 強制終了
          exit;
        }
        
        $sql = "SELECT * FROM users";
        // SQLステートメントを実行し、結果を変数に格納
        $stmt = $pdo->query($sql);

        // foreach文で配列の中身を一行ずつ出力
        foreach ($stmt as $row) {

          // データベースのフィールド名で出力
          echo $row['name'].'：'.$row['email'].'人';

          // 改行を入れる
          echo '<br>';
        }
        
        
        
    }
        
        

?>


<!doctype html>

<head>
    
<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
<!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>  
-->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <style type="text/css">

        body{
            background-color: azure;
        }
        #nav-column{
            font-size: 20px;
        }
        
        .col{
            border-right: 1px solid;
            border-color: darkgrey;
        }
        .col-6{
            border-right: 1px solid;
            border-color: darkgrey;
        }
        .tweet{
            border: 1px solid grey;
            border-radius: 5px;
            padding: 5px;
            margin: 5px;
        }
      
    </style>

</head>


<body>



<div class="container">
  <div class="row">
    <div class="col">
        <div id="nav-column">
            <nav class="nav flex-column">
              <a class="nav-link active" href="#">ホーム</a>
              <a class="nav-link" href="#">プロフィール</a>
              <a class="nav-link disabled" href="#">つぶやく</a>
            </nav>
        </div>
    </div>
    <div class="col-6">
      <p>One of three columnsOne of three columnsOne of three columnsOne of three columnsOne of three columnsOne of three columnsOne of three columnsOne of three columns</p>
    <div class="tweet">
        <?php displayTweets(); ?>
        
            <p>username</p>
        
    <p>texttexttext texttexttexttexttexttexttexttexttext texttexttexttexttexttexttexttexttexttexttexttexttexttexttext</p>
        </div>
            
        
    </div>
<!--      3カラム目だけ回り込ませたい-->
    <div class="col-sm">
      three of three columns
        three of three columns
        three of three columns
        three of three columns
        three of three columns
    </div>
  </div>
</div>

</body>

</html>

