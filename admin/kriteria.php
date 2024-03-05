<?php
    include 'header.php';
?>

<div class="container">
    <div class="row">
        <ol class="breadcrumb"><h4>KRITERIA</h4></ol>
    </div>

    <div class="panel panel-container">
        <div class="bootstrap-table">
            <a href="kriteriaaksi.php?aksi=tambah" class="btn btn-primary"> + Tambah Data</a>
            <hr>

           <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Kriteria</th>
                            <th class="text-center">Keterangan</th>
                            <th class="text-center">Sub Kriteria</th>
                            <th class="text-center">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $data="SELECT * FROM tbl_kriteria order by kode_kriteria asc";
                            $result = $connect->query($data);

                            if($result){
                                $no=1;
                                while($a=$result->fetch_assoc()){
                                    ?>
                                <tr>
                                    <td class="text-center"><?php echo $no++ ?></td>
                                    <td><?php echo $a['nama_kriteria'] ?></td>
                                    <td><?php echo $a['keterangan'] ?></td>
                                    
                                    <td class="text-center">
                                        <a href="subkriteria.php?kode_kriteria=<?php echo $a['kode_kriteria'] ?>" class="btn btn-primary">Sub Kriteria</a>
                                    </td>
                                    
                                    <td class="text-center">
                                        <a href="kriteriaaksi.php?kode_kriteria=<?php echo $a['kode_kriteria'] ?>&aksi=ubah" class="btn btn-success">Ubah</a>
                                        <a href="kriteriaproses.php?kode_kriteria=<?php echo $a['kode_kriteria'] ?>&proses=proseshapus" class="btn btn-danger">Hapus</a>
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