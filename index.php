<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> 
        <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <style>

*{
    box-sizing: border-box;
}
body{
    justify-content: center;
    align-items: center;
    display: flex;
    height: 100vh;
    background: #f2f2f2;
    font-family: 'Russo One', sans-serif;
}
.container{
 
background: #ecf0f3;
     
    padding: 30px;
    border-radius: 20px;
    box-shadow: 14px 14px 20px #cbced1, -14px -14px 20px white;
    width: 350px;
}
.logo {
  width: 80px;
  margin: auto;
}

.logo img {
  width: 100%;
  height: 80px;
  object-fit: cover;
  border-radius: 50%;
  box-shadow: 0px 0px 3px #5f5f5f, 0px 0px 0px 5px #ecf0f3, 8px 8px 15px #a7aaa7,
    -8px -8px 15px #fff;
}
.title{
    color: #ac40ab;
    font-size: 25px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    text-align: center;
    margin: 0;
    padding: 0;
    margin-bottom: 20px;
    
}
.container .form-control{
    color: #333;
    background: #ecf0f3;
    font-size: 15px;
    height: 50px;
    padding: 20px;
    letter-spacing: 1px;
    border: none;
    border-radius: 50px;
    box-shadow: inset 6px 6px 6px #cbced1, inset -6px -6px 6px #fff;
    display: inline-block;
    transition: all 0.3s ease 0s;
    width: 100%;
    margin: 0 0 25px;
    outline: none;
 
}
 
::placeholder{
    color: #808080;
    font-size: 16px;
     
     
}
.btn{
    color: #ac40ab;
    background-color: #ecf0f3;
    font-size: 20px;
    font-weight: bold;
    text-transform: uppercase;
    width: 100%;
    padding: 12px 15px 11px;
    border-radius: 20px;
    box-shadow: 6px 6px 6px #cbced1, -6px -6px 6px #fff;
    border: none;
    transition: all 0.5s ease 0s;
    margin: 25px 0 20px;
    cursor: pointer;
     
     
}
.btn:hover{
    color: orange;
}
        </style>
    </head>
    <body>
        <?php 
        if(isset($_GET['pesan'])){
            if($_GET['pesan']=="gagal"){
                echo "<script>
                    alert('Username dan Password tidak sesuai');
                    window.location.assign('index.php');
                    </script>";
                }
            }
            ?>
        <div class="container">
            <div class="logo"><img src="assets/login.png"></div><br>
                <h3 class="title">Login Kasir</h3>
            <form method="post" action="cek_login.php">
                <div class="form-group">
                <input class ="form-control"  name="username" type="text" placeholder="Username" autocomplete="off">
                </div>
                <div class="form-group">
                <input class ="form-control" name="password" type="password" placeholder="Password">  
                </div>
                <div>
                <button class="btn">Login</button>
                </div>
            </form>
        </div>
    </body>
</html>