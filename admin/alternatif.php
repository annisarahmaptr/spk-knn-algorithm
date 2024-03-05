<?php
    include 'header.php';
?>

<div class="container-table">
    <div class="alternatif-header">
        <h4>Alternatif</h4>
        <a href="alternatifaksi.php?aksi=tambah" class="btn-secondary" style="border-radius:30px;">+ Tambah Data</a>
    </div>

    <div class="panel panel-container">
        <div class="bootstrap-table">
           <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">NIK</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Training</th>
                            <th class="text-center">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $data="SELECT * FROM tbl_alternatif order by kode_alternatif asc";
                            $result = $connect->query($data);

                            if($result){
                                $no=1;
                                while($a=$result->fetch_assoc()){
                                    ?>
                                <tr>
                                    <td class="text-center"><?php echo $no++ ?></td>
                                    <td class="text-center"><?php echo $a['nik_alternatif'] ?></td>
                                    <td class="text-center"><?php echo $a['nama_alternatif'] ?></td>
                                    <td class="text-center">
                                        <a href="training.php?kode_alternatif=<?php echo $a['kode_alternatif'] ?>">
                                            <img src="../assets/img/chip_extraction.svg" alt="">
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="alternatifaksi.php?kode_alternatif=<?php echo $a['kode_alternatif'] ?>&aksi=ubah">
                                            <img src="../assets/img/border_color.svg" alt="">
                                        </a>
                                        <a href="alternatifproses.php?kode_alternatif=<?php echo $a['kode_alternatif'] ?>&proses=proseshapus" class="">
                                            <img src="../assets/img/delete.svg" alt="">
                                        </a>
                                    </td>
                                </tr>
                        <?php 
                    }} ?>
                    </tbody>
                </table>
           </div>
        </div>
    </div>
</div>

</div>
</div>