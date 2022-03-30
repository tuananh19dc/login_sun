<?php
include "./mvc/views/layout/header.php";
?>

<div id="wp-content">
    <div class="container">
    <div id="content" class="w-100">
    <span class="mess"><?php
    if(isset($_SESSION['mess'])){
        echo $_SESSION['mess'];
        unset($_SESSION['mess']);
    }
    
    ?></span>
        <h3  class="mt-3">Sửa Thông Tin Sinh Viên</h3>
        <div class="row">
            <div class="col-md-6">
            <form action="<?php echo ROOT_URL."home/edit/".$data['users']['id'] ?>" method="POST" class="form-add">
            <div class="mb-3">
                <label class="form-label" for="fullname">Họ và Tên</label>
                <input type="text" id="fullname" name="fullname" value="<?php if(isset($data['users']['name'])) echo $data['users']['name']  ?>" class="form-control">
                <span class='color-red'><?php if(!empty($_SESSION['error']['fullname'])) echo $_SESSION['error']['fullname'];?></span>
            
            </div>
            <div class="mb-3">
                <label class="form-label" for="age">Tuổi</label>
                <input type="number" min="0" id="age" name="age" value="<?php if(isset($data['users']['age'])) echo $data['users']['age']  ?>" class="form-control">
                <span class='color-red'><?php if(!empty($_SESSION['error']['age'])) echo $_SESSION['error']['age'];?></span>
            
            </div>
            <div class="mb-3">
                <label class="form-label" for="phone">Điện Thoại</label>
                <input type="text" id="phone" name="phone" value="<?php if(isset($data['users']['phone'])) echo $data['users']['phone']  ?>" class="form-control">
                <span class='color-red'><?php if(!empty($_SESSION['error']['phone'])) echo $_SESSION['error']['phone'];?></span>
            
            </div>
            <div class="mb-3">
                <label class="form-label" for="address">Địa chỉ</label>
                <input type="text" id="address" name="address" value="<?php if(isset($data['users']['address'])) echo $data['users']['address']  ?>" class="form-control">
                <span class='color-red'><?php if(!empty($_SESSION['error']['address'])) echo $_SESSION['error']['address'];?></span>
            
            </div>
            <div class="mb-3">
                <label class="form-label" for="school">Trường Học</label>
                <input type="text" id="school" name="school" value="<?php if(isset($data['users']['school'])) echo $data['users']['school']  ?>" class="form-control">
                <span class='color-red'><?php if(!empty($_SESSION['error']['school'])) echo $_SESSION['error']['school'];?></span>
            
            </div>
            <div class="mb-3">
                <button type="submit" name="btn-update" class="btn btn-primary w-100">Sửa Thông Tin</button>
            </div>
        </form>
            </div>
        </div>
    </div>
    </div>
</div>


<?php
unset($_SESSION['error']);
include "./mvc/views/layout/footer.php";
?>
