<?php
include "./mvc/views/layout/header.php";
?>

<div id="wp-content">
  <div class="container">
    <div id="content" class="d-flex flex-column justify-content-center w-100">
      <h3 class="d-block text-center">Danh Sách Sinh Viên</h3>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Họ và Tên</th>
            <th scope="col">Tuổi</th>
            <th scope="col">Điện Thoại</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Trường Học</th>
          </tr>
        </thead>
        <tbody>
          <?php $count = 1; 
          foreach ($data['users'] as $user) {
          ?>
            <tr>
              <th scope="row"><?php echo $count++; ?></th>
              <td><?php echo $user['name'] ?></td>
              <td><?php echo $user['age'] ?></td>
              <td><?php echo $user['phone'] ?></td>
              <td><?php echo $user['address'] ?></td>
              <td><?php echo $user['school'] ?></td>
              <td>
                <a href="<?php echo ROOT_URL."home/viewEdit/".$user['id'] ?>" class="btn btn-danger">Sửa Đổi</a>
                <a href="<?php echo ROOT_URL."home/delete/".$user['id'] ?>" onclick="return confirm('Xóa sinh viên')" class="btn btn-primary">Xóa Bỏ</a>
              </td>
            </tr>

          <?php
          } ?>


        </tbody>
      </table>
    </div>
  </div>
</div>



<?php
include "./mvc/views/layout/footer.php";
?>