<?php

function showBlog($conn){
    $stmt = $conn->query("SELECT * FROM posts ORDER BY id DESC");
    foreach($stmt as $row){
        echo "<h3><a href='?page=detail&id=".$row['id']."'>".$row['title']."</a></h3>";
    }
}

function showDetail($conn){
    $stmt = $conn->prepare("SELECT * FROM posts WHERE id=?");
    $stmt->execute([$_GET['id']]);
    $row = $stmt->fetch();
    echo "<h2>".$row['title']."</h2>";
    echo "<p>".$row['content']."</p>";
}

function handleContact($conn){
    if(isset($_POST['send'])){
        $stmt = $conn->prepare("INSERT INTO contacts(name,email,message) VALUES(?,?,?)");
        $stmt->execute([$_POST['name'],$_POST['email'],$_POST['message']]);
        echo "Message sent!";
    }
    echo '<form method="POST">
    <input name="name" placeholder="Name"><br>
    <input name="email" placeholder="Email"><br>
    <textarea name="message"></textarea><br>
    <button name="send">Send</button>
    </form>';
}

function handleLogin($conn){
    if(isset($_POST['login'])){
        $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
        $stmt->execute([$_POST['username']]);
        $user = $stmt->fetch();
        if($user && password_verify($_POST['password'],$user['password'])){
            $_SESSION['role'] = $user['role'];
            header("Location: ?page=dashboard");
        } else {
            echo "Login failed";
        }
    }
    echo '<form method="POST">
    <input name="username"><br>
    <input type="password" name="password"><br>
    <button name="login">Login</button>
    </form>';
}

function dashboard(){
    if(!isset($_SESSION['role'])){
        header("Location: ?page=login");
        exit;
    }
    echo "<h2>Dashboard (".$_SESSION['role'].")</h2>";
    echo "<a href='?page=logout'>Logout</a>";
}
