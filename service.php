<?php
error_reporting(0);
include("Session_Cek.php");
include("Koneksi.php");
  $owner = $_COOKIE['owner'];
	$sql = "SELECT nama_alat,id,model,jumlah FROM alat_db where owner='$owner'";
	$result = mysqli_query($koneksi, $sql);
  $nilai;
  if(!($_SESSION['user_level'] == "Admin" || $_SESSION['user_level'] == "vendor")){
    header("Location: Homepage.php");
  }
  include('layout.php');
?>
        <title>Management Alat</title>
        <head>
          <link rel="stylesheet" href="css/bootstrap.min.css" />
        </head>
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/sweetalert.min.js"></script>
      <div class="container up">
        <div class="page-header centered">
          <h1>Manage Alat</h1>
          <a style="margin-left: 10px;" href="AddStock.php" class="btn btn-xs btn-success">Tambah Alat Baru!</a>
        </div>
        <table class="table">
         <tr>
          <th>Nama Alat</th>
          <th>ID</th>
          <th>Model</th>
          <th>Jumlah</th>
          <th>Status</th>
          <th>Action</th>
          </tr>

     <?php
      while($row = mysqli_fetch_array($result)){
        if($row[3]>0){
        $status = "tersedia";
        }else{
        $status = "tidak tersedia";
        }
       ?>
      <tr>
      <td><?php echo $row[0]; ?></td>
      <td><?php echo $row[1]; ?></td>
      <td><?php echo $row[2]; ?></td>
      <td><?php echo $row[3]; ?></td>
      <td><?php echo $status ?></td>
      <td>
        <a href="updateStock.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-success">Update</a>
        <a href="DeleteStock.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
      </td>
       </tr>
       <?php } ?>
     </table>
     <?php
     if(isset($_COOKIE['sukses'])){
       setcookie('sukses', 'sukses');
       ?>
       <script>
       swal('Sukses', 'Data Berhasil Di Update', 'success');
       </script>
       <?php
     }
     else if(isset($_COOKIE['suksesdelete'])){
       setcookie('suksesdelete', '');
       ?>
       <script>
       swal('Sukses', 'Data Telah di Hapus', 'success');
       </script>
       <?php
     }
     ?>
      </div>
