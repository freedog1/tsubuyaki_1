<?php

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


//        SignUpボタンを押下したときの処理
        if(isset($_POST['SignUpButton'])){
            
        
    //        入力チェックを以下に記載
            if(array_key_exists('email',$_POST) or array_key_exists('password',$_POST) or array_key_exists('name',$_POST)){
            if($_POST['email']==''){
                echo "emailを入力してください";
            }else if($_POST['password']==''){
                echo "passwordを入力してください";
            }else if($_POST['name']==''){
                echo "User Nameを入力してください";
            }else{
                echo $_POST['name'];
                $sql = "SELECT id FROM users WHERE email = '".$_POST['email']."'";
                $result = $pdo->query($sql);
//                テーブルのレコード数を取得する
                $row_cnt = $result->rowCount();
                if($row_cnt>0){
                    echo "重複してます";
                }
                else{
                    $sql = "INSERT INTO users (email,password,name) VALUES  ('".$_POST['email']."','".$_POST['password']."','".$_POST['name']."')";
                    if($result = $pdo->query($sql)){
                        echo "成功";
    //                    $_SESSION['email']=$_POST['email'];
    //                    header("Location: session.php");
                    }else{
                        echo "失敗";
                        echo $_POST['password'];

                        print_r($sql);
                    }
                }
            }
        }
    }
//    SignInボタンを押下したときの処理
   if(isset($_POST['SignInButton'])){
           //        入力チェックを以下に記載
        if(array_key_exists('email',$_POST) or array_key_exists('password',$_POST)){
        if($_POST['email']==''){
                echo "emailを入力してください";
            }else if($_POST['password']==''){
                echo "passwordを入力してください";
            }else{
             $query = "SELECT `id` FROM users WHERE `email` = '".mysqli_real_escape_string($link,$_POST['email'])."'";
                $result = mysqli_query($link,$query);
                if(mysqli_num_rows($result)==1){
                    print_r($result);
                    print_r($link);
                    
//                    セッション
//                    session_start();
//                    $_SESSION['id']=$result
                    
                    
                }else{
                    $query = "INSERT INTO `users` (`email`,`password`,`name`) VALUES  ('".mysqli_real_escape_string($link,$_POST['email'])."','".mysqli_real_escape_string($link,$_POST['password'])."','".mysqli_real_escape_string($link,$_POST['name'])."')";
                    print_r($query);
                    if(mysqli_query($link,$query)){
                        echo "成功";
    //                    $_SESSION['email']=$_POST['email'];
    //                    header("Location: session.php");
                    }else{
                        echo "失敗";
                        echo mysqli_real_escape_string($link,$_POST['password']);

                        print_r($query);
                    }
                }
            }
        }
    }
   
?>


<form method="post"  id="sign-up-form">
  <h1>TSUBUYAKI</h1>
  <div class="form-group">
    <label for="exampleInputUserName">User Name</label>
    <input name="name" class="form-control" id="exampleInputUserName"  placeholder="Enter User Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary" name="SignUpButton">SignUp</button> 
    <a class="toggleSwitch">SignIn</a>
</form>

<form method="post" id="sign-in-form">
  <h1>TSUBUYAKI</h1>
<!--
  <div class="form-group">
    <label for="exampleInputUserName">User Name</label>
    <input name="name" class="form-control" id="exampleInputUserName"  placeholder="Enter User Name">
  </div>
-->
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary" name="SignInButton">SignIn</button> 
    <a class="toggleSwitch">SignUp</a>
</form>

