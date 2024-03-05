<?php
    include 'header.php';
    if(isset($_GET['aksi'])) {
        if($_GET['aksi']=='tambah') { ?>

    <div class="container">
        <div class="row">
            <ol class="breadcrumb"><h4>SUB KRITERIA/ TAMBAH DATA</h4></ol>
        </div>

        <?php 
            $carikode = "SELECT MAX(kode_subkriteria) AS max_kode FROM tbl_subkriteria";
            $datakode = $connect->query($carikode);

            if ($datakode) {
                $row = $datakode->fetch_assoc();
                $max_kode = $row['max_kode'];

                if ($max_kode) {
                    $kode = (int) substr($max_kode, 1); 
                    $kode++; 
                    $kode_otomatis = "S" . str_pad($kode, 2, "0", STR_PAD_LEFT);
                } else {
                    $kode_otomatis = "S01"; 
                }
            } else {
                $kode_otomatis = "S01"; 
            }
        ?>


        <div class="panel panel-container">
            <div class="bootstrap-table">
                <form action="subkriteriaproses.php?proses=prosestambah" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="kode_subkriteria" class="form-control" value="<?php echo $kode_otomatis ?>">

                    <input type="hidden" name="kode_kriteria" class="form-control" value="<?php echo $_GET['kode_kriteria'] ?>">

                    <div class="form-group">
                        <label>Nama Subkriteria</label>
                        <input type="text" name="nama_subkriteria" class="form-control" placeholder="nama subkriteria">
                    </div>

                    <div class="form-group">
                        <label>Nilai</label>
                        <input type="text" name="nilai_subkriteria" class="form-control" placeholder="nilai">
                    </div>

                    <div class="modal-footer">
                        <a href="subkriteria.php?kode_kriteria=<?php echo $_GET['kode_kriteria']?>" class="btn btn-primary">Kembali</a>
                        <input type="submit" class="btn btn-success" value="Simpan">
                    </div>
                    

                </form>
            </div>
        </div>
    </div>

    <?php }elseif($_GET['aksi']=='ubah'){ ?>

        <div class="container">
            <div class="row">
                <ol class="breadcrumb"><h4>SUB KRITERIA/ UBAH DATA</h4></ol>
            </div>


        <div class="panel panel-container">
            <div class="bootstrap-table">
                <?php
                $kode_subkriteria = mysqli_real_escape_string($connect, $_GET['kode_subkriteria']);
                $query = "SELECT * FROM tbl_subkriteria WHERE kode_subkriteria='$kode_subkriteria'";
                $result = mysqli_query($connect, $query);

                while ($a = mysqli_fetch_array($result)) {
                ?>
                <form action="subkriteriaproses.php?proses=prosesubah" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="kode_subkriteria" class="form-control" value="<?php echo $a['kode_subkriteria'] ?>">
                    <input type="hidden" name="kode_kriteria" class="form-control" value="<?php echo $a['kode_kriteria'] ?>">

                    <div class="form-group">
                        <label>Nama Subkriteria</label>
                        <input type="text" name="nama_subkriteria" class="form-control" placeholder="nama subkriteria" value="<?php echo $a['nama_subkriteria'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Nilai</label>
                        <input type="text" name="nilai_subkriteria" class="form-control" value="<?php echo $a['nilai_subkriteria'] ?>">
                    </div>

                    <div class="modal-footer">
                    <a href="subkriteria.php?kode_kriteria=<?php echo $_GET['kode_kriteria']?>" class="btn btn-primary">Kembali</a>
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

