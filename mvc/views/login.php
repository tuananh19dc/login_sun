
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/css/styles.css">
    <title>Login</title>
</head>


<body>
    <div class="container">
        <div class="form-login">
            <h3>Đăng Nhập</h3>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Tài Khoản</label>
                    <input type="text" name="username" class="form-control" id="username" 
                    value="<?php
                     if(isset($_COOKIE['username'])){
                         echo $_COOKIE['username'];
                     }else{
                         if( !empty($data['username'])) echo $data['username']; 
                     }
                    ?>">
                    <span class='color-red'><?php if(!empty($data['error']['username'])) echo $data['error']['username'];?></span>
                    
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password"
                    value="<?php
                     if(isset($_COOKIE['password'])){
                         echo $_COOKIE['password'];
                     }else{
                         if( !empty($data['password'])) echo $data['password']; 
                     }
                    ?>">
                    <span class='color-red'><?php if(!empty($data['error']['password'])) echo $data['error']['password'];?></span>
                    
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="checkbox" name="checkbox" value="">
                    <label class="form-check-label" for="checkbox">Lưu tài khoản</label>
                </div>
                <button type="submit" name="login" value="btn-login" class="btn btn-primary w-100">Đăng Nhập</button>
            </form>
        </div>
    </div>

</body>

</html>