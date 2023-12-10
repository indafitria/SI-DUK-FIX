<?php include '../sections/header.php'; ?>

<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

//jika tidak ada login sebelumnya maka diarahkan ke login.php
if (empty($_SESSION['username']) and empty($_SESSION['pass'])) {
    echo "<script> window.location = '../../index.php' </script>";
};

$_SESSION['level'] = $level;
?>

<div class="container mt-5" style="min-height: calc(63vh - 50px);">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Kepegawaian</h4>
                </div>
                <div class="card-body">
                    <p>
                    <div>
                  
                        <?php if($_SESSION['level'] == 1 || $_SESSION['level'] == 2){?>
                        <a class="btn btn-primary btn-sm" href="../kepegawaian/tambahdata1.php" role="button"><i class="bi bi-plus-lg p-1"></i>Tambah Data</a>
                        <a class= "btn btn-success btn-sm" href="../kepegawaian/report-excel.php" role="button" id="exportButton" data-toggle="tooltip" data-placement="top" title="Unduh Excel"><i class="bi bi-file-earmark-excel-fill p-1"></i>Excel</a>
                        <?php } ?>
                        <a class="btn btn-danger btn-sm" href="../kepegawaian/report_siduk.php" target="_blank" role="button" id="export-pdf" data-toggle="tooltip" data-placement="top" title="Unduh PDF"><i class="bi bi-filetype-pdf p-1"></i>PDF</a>
                    </div>

                    <p>
                    <?php
                    include('../../config/koneksi.php');
                    $sql = mysqli_query($koneksi,"SELECT * FROM pegawai JOIN data_pribadi ON pegawai.id_data_pribadi = data_pribadi.id_data_pribadi
                        JOIN golongan ON pegawai.id_golongan = golongan.id_golongan
                        JOIN data_bidang ON pegawai.id_bidang = data_bidang.id_bidang ORDER by pegawai.tmt_golongan");
                    ?>
                    <table id="dataTables" class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Golongan</th>
                                <th>Penempatan</th>
                              
                                <th>Aksi</th>
                                
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
                                <td><?php echo $row['nip']; ?></td>
                                <td><?php echo $row['nama']; ?></td>
                                <td><?php echo $row['nama_golongan']; ?></td>
                                <td><?php echo $row['nama_bidang']; ?></td>
                               
                                <td>
                                    <a href="../kepegawaian/detail_pegawai.php?nip=<?php echo $row['nip'];?>" class="btn btn-primary btn-sm  bi bi-eye-fill" data-toggle="tooltip" data-placement="top" title="Detail"></a>
                                    <?php if($level == 1 || $level == 2){?>
                                    <a href="../kepegawaian/editdatapegawai.php?nip=<?php echo $row['nip']; ?>" class="btn btn-warning btn-sm bi bi-pencil-square" data-toggle="tooltip" data-placement="top" title="Edit"></a>
                                    <a href="../kepegawaian/hapus.php?id_data_pribadi=<?php echo $row['id_data_pribadi']; ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger btn-sm bi bi-trash3-fill" data-toggle="tooltip" data-placement="top" title="Hapus"></a>
                                    <?php }?>
                                   

                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../sections/footer.php'; ?>

<!-- Include DataTables CSS and JavaScript -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.10/css/jquery.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.10/js/jquery.dataTables.min.js"></script>

<!-- Initialize DataTable -->
<script>
    $(document).ready(function () {
        $('#dataTables').DataTable();
    });
</script>