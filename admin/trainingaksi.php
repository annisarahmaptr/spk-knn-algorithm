<?php
    include 'header.php';
    if(isset($_GET['aksi'])) {
        if($_GET['aksi']=='tambah') { ?>

    <div class="container">
        <div class="row">
            <ol class="breadcrumb"><h4>TRAINING/ TAMBAH DATA</h4></ol>
        </div>

        <div class="panel panel-container">
            <div class="bootstrap-table">
                <form action="trainingproses.php?proses=prosestambah" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="kode_alternatif" class="form-control" value="<?php echo $_GET['kode_alternatif']?>">

                    <?php
                        $hasil = mysqli_query($connect, "SELECT * FROM tbl_kriteria ORDER BY kode_kriteria");
                        while($baris = mysqli_fetch_array($hasil)){
                            $idK = $baris['kode_kriteria'];
                            $labelK = $baris['nama_kriteria'];

                            echo "<div class='form-group'>
                            <label>".$labelK."</label>";

                            echo "<select name=".$idK." class='form-control'>";
                            
                            $hasil2 = mysqli_query($connect, "SELECT * FROM tbl_subkriteria WHERE kode_kriteria='".$idK."' ORDER BY nilai_subkriteria DESC");

                            if (!$hasil2) {
                                die("Error: " . mysqli_error($connect));
                            }

                            while($baris2 = mysqli_fetch_array($hasil2)){
                                echo "<option selected value=".$baris2['kode_subkriteria'].">".$baris2['nama_subkriteria']." - (".$baris2['nilai_subkriteria'].")</option>";
                            }

                            echo "</select> </div>";
                        }

                    ?>

                    <div class="form-group">
                        <label for="">Keputusan</label>
                        <select name="keputusan" class="form-control">
                            <option selected>LAYAK</option>
                            <option>TIDAK LAYAK</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <a href="training.php?kode_alternatif=<?php echo $_GET['kode_alternatif']?>" class="btn btn-primary">Kembali</a>
                        <input type="submit" class="btn btn-success" value="Simpan">
                    </div>

                </form>
            </div>
        </div>
    </div>

    <?php }elseif($_GET['aksi']=='ubah'){ ?>

        <div class="container">
            <div class="row">
                <ol class="breadcrumb"><h4>TRAINING/ UBAH DATA</h4></ol>
            </div>


        <div class="panel panel-container">
            <div class="bootstrap-table">
                <form action="trainingproses.php?proses=prosesubah" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="kode_alternatif" class="form-control" value="<?php echo $_GET['kode_alternatif']?>">
                    
                    <?php 
                         $hasil = mysqli_query($connect, "SELECT * FROM tbl_kriteria ORDER BY kode_kriteria");
                         while($baris = mysqli_fetch_array($hasil)){
                            $idK = $baris['kode_kriteria'];
                            $labelK = $baris['nama_kriteria'];
                            $kode_alternatif = $_GET['kode_alternatif'];

                            $hasil3 = mysqli_query($connect, "SELECT * FROM tbl_training WHERE kode_kriteria='".$idK."' AND kode_alternatif='".$kode_alternatif."' ");

                            $result3 = mysqli_fetch_array($hasil3);
                            $sub = $result3['kode_subkriteria'];

                            echo "<div class='form-group'>
                            <label>".$labelK."</label>";

                            echo "<select name=".$idK." class='form-control'>";
                            
                            $hasil2 = mysqli_query($connect, "SELECT * FROM tbl_subkriteria WHERE kode_kriteria='".$idK."' ORDER BY nilai_subkriteria DESC");

                           
                            while($baris2 = mysqli_fetch_array($hasil2)){
                                if($baris2['kode_subkriteria']==$sub){
                                    echo "<option selected value=".$baris2['kode_subkriteria'].">".$baris2['nama_subkriteria']." - (".$baris2['nilai_subkriteria'].")</option>";
                                }else{
                                    echo "<option selected value=".$baris2['kode_subkriteria'].">".$baris2['nama_subkriteria']." - (".$baris2['nilai_subkriteria'].")</option>";
                                }

                                
                            }

                            echo "</select> </div>";
                        }
                    ?>

                    <?php   
                    $hasil = mysqli_query($connect, "SELECT * FROM tbl_alternatif WHERE kode_alternatif='$_GET[kode_alternatif]'");
                    while($baris = mysqli_fetch_array($hasil)){ 
                    ?>
                           

                    <div class="form-group">
                        <label for="">Keputusan</label>
                        <select name="keputusan" class="form-control">
                            <option selected><?php echo $baris['keputusan'] ?></option>
                            <option>LAYAK</option>
                            <option>TIDAK LAYAK</option>
                        </select>
                    </div>
                    
                    <?php } ?>

                    <div class="modal-footer">
                    <a href="training.php?kode_alternatif=<?php echo $_GET['kode_alternatif']?>" class="btn btn-primary">Kembali</a>
                        <input type="submit" class="btn btn-success" value="Ubah">
                    </div>
                    

                </form>
               
            </div>
        </div>
    </div>

        <?php }

    
 }
?>

