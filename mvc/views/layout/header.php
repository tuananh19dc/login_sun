<!-- <?php 
print_r($_SERVER);
?> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <style>
    *{
        margin: 0;
        padding: 0;
    }    
    body{
    font-family: 'Open Sans', sans-serif;
}
.form-login {
    width: 50%;
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin: 0px auto;
    padding-bottom: 100px;
}

.container {
    max-width: 1200px;
    margin: 0px auto;
    display: flex;
}

.form-login h3 {
    font-size: 35px;
    text-transform: uppercase;
}

form {
    width: 80%;
}
.color-error{
    color: #eb1111;
}

.d-flex{
display: flex;
}

a.header-menu-item {
    text-decoration: none;
    padding: 12px 16px;
    font-size: 18px;
    display: inline-block;
    color: #2d2d2d;
}

ul.header-menu,.footer {
    width: 100%;
    display: flex;
    justify-content: center;
    background: #0eb0f361;
}

.header {
    width: 100%;
}
.footer {
    padding: 8px 0px;
}

div#wp-content {
    min-height: 500px;
}

.color-red{
    color: red;
}
.mess{
    background-color: #74ff5d;
    display: block;
    text-align: center;
    font-size: 21px;
}
    </style>
    <div class="wrapper">
        <div id="wp-header">
            <div class="container">
                <div class="header ">
                    <ul class="header-menu d-flex mb-0">
                        <li><a href="<?php echo ROOT_URL."home" ?>" class="header-menu-item">Danh Sách Sinh Viên</a></li>
                        <li><a href="<?php echo ROOT_URL."home/add" ?>" cl0ass="header-menu-item">Thêm Sinh Viên</a></li>
                        <li><a href="<?php echo ROOT_URL."login/logout" ?>" class="header-menu-item">Đăng xuất</a></li>
                    </ul>
                </div>
            </div>
        </div>