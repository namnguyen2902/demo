<?php
session_start();

include_once('layout/head.php');
include_once('layout/header.php'); 
include_once("connection/connect.php");

if(isset($_POST['save'])){
	// if($_POST['name'])
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['num'];
	$content=$_POST['editor'];
	date_default_timezone_set('Asia/Ho_Chi_Minh');
  	$created=date('Y,m,d H:i:s');
  	$sql="INSERT INTO contact (name,phone,email,content,created) VALUES (:name,:phone,:email,:content,:created)";
  	$query=$conn->prepare($sql);
  	$query->bindParam(':name',$name);
  	$query->bindParam(':email',$email);
  	$query->bindParam(':phone',$phone);
  	$query->bindParam(':content',$content);
  	$query->bindParam(':created',$created);
  	$query->execute();
}



?>
<div class="tab">
	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Liên hệ</li>
			</ol>
		</nav>
	</div>
</div>
<div class="container">
	<div class="row pt-5 mb-5 ">
		<div class="col-6 conn ">
			<h4 class="text-uppercase text-center ">liên hệ với chúng tôi</h4>
			<form class="pt-4" method="post" action="">
				<div class="form-group ">
					<label for="">Họ và tên</label>
					<input name="name" type="text" class="form-control" id="text" placeholder="Nhập tên">
				</div>
				<div class="form-group">
					<label for="">Email</label>
					<input name="email" type="email" class="form-control" id="" aria-describedby="emailHelp" placeholder="Nhập email">
				</div>
				<div class="form-group">
					<label for="">Số điện thoại</label>
					<input name="num" type="text" class="form-control" id="" placeholder="Nhập số">
				</div>
				
              <div class="form-group">
                <label for="">Nội dung liên hệ:</label>
                <textarea name="editor" id="editor1" rows=4" class="form-control ckeditor"></textarea>
              </div>
				<button name="save" type="submit" class="btn btn-primary">Gửi thông tin liên hệ</button>
			</form>
		</div>
		<div class="col-6">
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3723.900287315735!2d105.77292221432862!3d21.036675392885225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1552280427670" width="550" height="730" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
	</div>
</div>

<?php include_once('layout/footer.php') ?>
  <script src="public/ckeditor/ckeditor.js"></script>
