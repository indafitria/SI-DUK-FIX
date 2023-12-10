<?php include '../sections/header.php'; ?>

<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

// Jika tidak ada login sebelumnya maka diarahkan ke login.php
if (empty($_SESSION['username']) && empty($_SESSION['pass'])) {
    echo "<script> window.location = './../index.php' </script>";
};
?>

<div class="container mt-5" style="min-height: calc(63vh - 10px);">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Admin SI-DUK</h4>
                </div>
                <div class="card-body">
                <div>
    
    <a class="btn btn-primary btn-sm" href="../kepegawaian/tambah-user.php" role="button"><i class="bi bi-plus-lg p-1"></i>Tambah User</a>
              </div>
</br>
                    <?php
                    include('../../config/koneksi.php');
                    $sql = mysqli_query($koneksi, "SELECT * FROM user");
                    ?>
                    <table id="dataTables" class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th><center>No</center></th>
                                <th><center>Nama</center></th>
                                <th><center>Username</center></th>
                                <th><center>Email</center></th>
                                <th><center>Jenis</center></th>
                                <th><center>Aksi</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include('../../config/koneksi.php');
                            $no = 1;
                            while ($row = mysqli_fetch_array($sql)) {
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row['nama']; ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <?php if($row['level'] == 1){?>
                                    <td>Super Admin</td>
                                    <?php }?>
                                    <?php if($row['level'] == 2){?>
                                    <td>Admin</td>
                                    <?php }?>
                                    <?php if($row['level'] == 3){?>
                                    <td>User</td>
                                    <?php }?>
                                    <td>
                                        <a href="../kepegawaian/reset-pass.php?id_user=<?php echo $row['id_user']; ?>" class="btn btn-primary btn-sm bi bi-arrow-clockwise" data-toggle="tooltip" data-placement="top" title="Reset"></a>
                                        <?php if($row['level'] != 1 ){ ?>
                                        <a href="../kepegawaian/hapus.php?id_user=<?php echo $row['id_user']; ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger btn-sm bi bi-trash3-fill" data-toggle="tooltip" data-placement="top" title="Hapus"></a>
                                            <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../sections/footer.php'; ?>
<script>
    $(document).ready(function() {
        $('#dataTables').DataTable();
    });
</script>
