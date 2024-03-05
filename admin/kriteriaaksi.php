<?php
    include 'header.php';
    if(isset($_GET['aksi'])) {
        if($_GET['aksi']=='tambah') { ?>

    <div class="container">
        <div class="row">
            <ol class="breadcrumb"><h4>KRITERIA/ TAMBAH DATA</h4></ol>
        </div>

        <?php 
            $carikode = "SELECT MAX(kode_kriteria) AS max_kode FROM tbl_kriteria";
            $datakode = $connect->query($carikode);

            if ($datakode) {
                $row = $datakode->fetch_assoc();
                $max_kode = $row['max_kode'];

                if ($max_kode) {
                    $kode = (int) substr($max_kode, 1); 
                    $kode++; 
                    $kode_otomatis = "K" . str_pad($kode, 2, "0", STR_PAD_LEFT);
                } else {
                    $kode_otomatis = "K01"; 
                }
            } else {
                $kode_otomatis = "K01"; 
            }
        ?>


        <div class="panel panel-container">
            <div class="bootstrap-table">
                <form action="kriteriaproses.php?proses=prosestambah" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="kode_kriteria" class="form-control" value="<?php echo $kode_otomatis ?>">

                    <div class="form-group">
                        <label>Nama kriteria</label>
                        <input type="text" name="nama_kriteria" class="form-control" placeholder="nama kriteria">
                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" placeholder="keterangan">
                    </div>

                    <div class="modal-footer">
                        <a href="kriteria.php" class="btn btn-primary">Kembali</a>
                        <input type="submit" class="btn btn-success" value="Simpan">
                    </div>
                    

                </form>
            </div>
        </div>
    </div>

    <?php }elseif($_GET['aksi']=='ubah'){ ?>

        <div class="container">
            <div class="row">
                <ol class="breadcrumb"><h4>KRITERIA/ UBAH DATA</h4></ol>
            </div>


        <div class="panel panel-container">
            <div class="bootstrap-table">
                <?php
                $kode_kriteria = mysqli_real_escape_string($connect, $_GET['kode_kriteria']);
                $query = "SELECT * FROM tbl_kriteria WHERE kode_kriteria='$kode_kriteria'";
                $result = mysqli_query($connect, $query);

                while ($a = mysqli_fetch_array($result)) {
                ?>
                <form action="kriteriaproses.php?proses=prosesubah" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="kode_kriteria" class="form-control" value="<?php echo $a['kode_kriteria'] ?>">

                    <div class="form-group">
                        <label>Nama Kriteria</label>
                        <input type="text" name="nama_kriteria" class="form-control" placeholder="nama kriteria" value="<?php echo $a['nama_kriteria'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" placeholder="keterangan" value="<?php echo $a['keterangan'] ?>">
                    </div>

                    <div class="modal-footer">
                        <a href="kriteria.php" class="btn btn-primary">Kembali</a>
                        <input type="submit" class="btn btn-success" value="Ubah">
                    </div>
                    

                </form>
                <?php } ?>
            </div>
        </div>
    </div>

        <?php }

    
 }
?>

