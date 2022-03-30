<?php
include "./mvc/views/layout/header.php";
?>

<div id="wp-content">
    <div class="container">
    <div id="content" class="w-100">
        <span class="mess"><?php if(isset($data['mess'])) echo $data['mess']; ?></span>
        <h3 class="mt-3">Thêm Sinh Viên</h3>
        <div class="row">
            <div class="col-md-6">
            <form action="" method="POST" class="form-add">
            <div class="mb-3">
                <label class="form-label" for="fullname">Họ và Tên</label>
                <input type="text" id="fullname" name="fullname" class="form-control">
                <span class='color-red'><?php if(!empty($data['error']['fullname'])) echo $data['error']['fullname'];?></span>
            </div>
            <div class="mb-3">
                <label class="form-label" for="age">Tuổi</label>
                <input type="number" min="0" id="age" name="age" class="form-control">
                <span class='color-red'><?php if(!empty($data['error']['age'])) echo $data['error']['age'];?></span>
            </div>
            <div class="mb-3">
                <label class="form-label" for="phone">Điện Thoại</label>
                <input type="text" id="phone" name="phone" class="form-control">
                <span class='color-red'><?php if(!empty($data['error']['phone'])) echo $data['error']['phone'];?></span>
            </div>
            <div class="mb-3">
                <label class="form-label" for="address">Địa chỉ</label>
                <input type="text" id="address" name="address" class="form-control">
                <span class='color-red'><?php if(!empty($data['error']['address'])) echo $data['error']['address'];?></span>
            </div>
            <div class="mb-3">
                <label class="form-label" for="school">Trường Học</label>
                <input type="text" id="school" name="school" class="form-control">
                <span class='color-red'><?php if(!empty($data['error']['school'])) echo $data['error']['school'];?></span>
            </div>
            <div class="mb-3">
                <button type="submit" name="btn-add" class="btn btn-primary w-100"> Thêm Mới</button>
            </div>
        </form>
            </div>
        </div>
    </div>
    </div>
</div>


<?php
include "./mvc/views/layout/footer.php";
?>
