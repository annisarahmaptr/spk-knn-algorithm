<?php
    include 'header.php';
    if(isset($_GET['aksi'])) {
        if($_GET['aksi']=='tambah') { 
        $kode_alternatif=$_POST['kode_alternatif'];
        $nik_alternatif=$_POST['nik_alternatif'];
        $nama_alternatif=$_POST['nama_alternatif'];

        if(empty($_POST['kode_alternatif'])){
        $hasil = mysqli_query($connect, "SELECT * FROM tbl_kriteria ORDER BY kode_kriteria");
        while($baris = mysqli_fetch_array($hasil)){
            $idK = $baris['kode_kriteria'];
            $idS = $_POST[$idK];

            $query1 = mysqli_query($connect, "INSERT INTO tbl_testing(kode_alternatif, nama_alternatif, kode_kriteria, nilai_testing, nik_alternatif) VALUES ('".$kode_alternatif."', '".$nama_alternatif."', '".$idK."', '".$idS."', '".$nik_alternatif."')");
            
        }
        
        header("location:metode.php?kode_alternatif=$_POST[kode_alternatif]&nama_alternatif=$_POST[nama_alternatif]&nik_alternatif=$_POST[nik_alternatif]");
        }else{
            $kode_alternatif=$_POST['kode_alternatif'];
            $nik_alternatif=$_POST['nik_alternatif'];
            $nama_alternatif=$_POST['nama_alternatif'];
            
            $query2 =mysqli_query($connect, "DELETE FROM tbl_testing WHERE kode_alternatif='".$_POST['kode_alternatif']."'");

            $hasil = mysqli_query($connect, "SELECT * FROM tbl_kriteria ORDER BY kode_kriteria");
            while($baris = mysqli_fetch_array($hasil)){
                $idK = $baris['kode_kriteria'];
                $idS = $_POST[$idK];
        
                $query1 = mysqli_query($connect, "INSERT INTO tbl_testing(kode_alternatif, nama_alternatif, kode_kriteria, nilai_testing, nik_alternatif) VALUES ('".$kode_alternatif."', '".$nama_alternatif."', '".$idK."', '".$idS."', '".$nik_alternatif."')");
                    
            }
                
                header("location:metode.php?kode_alternatif=$_POST[kode_alternatif]&nama_alternatif=$_POST[nama_alternatif]&nik_alternatif=$_POST[nik_alternatif]");
                }
            
        }elseif($_GET['aksi']=='simpanhasil'){
            $kode_alternatif=$_POST['kode_alternatif'];
            $nik_alternatif=$_POST['nik_alternatif'];
            $nama_alternatif=$_POST['nama_alternatif'];
            $penghasilan=$_POST['penghasilan'];
            $usia=$_POST['usia'];
            $status_perkawinan=$_POST['status_perkawinan'];
            $jml_tanggungan=$_POST['jml_tanggungan'];
            $pekerjaan=$_POST['pekerjaan'];
            $kriteria_blt=$_POST['kriteria_blt'];
            $keputusan=$_POST['keputusan'];
            $query1 = mysqli_query($connect, "INSERT INTO tbl_hasil(nama_alternatif, keputusan, nik_alternatif, penghasilan, usia, status_perkawinan, jml_tanggungan, pekerjaan, kriteria_blt) VALUES ('".$nama_alternatif."', '".$keputusan."', '".$nik_alternatif."', '".$penghasilan."', '".$usia."', '".$status_perkawinan."', '".$jml_tanggungan."', '".$pekerjaan."', '".$kriteria_blt."')");
            header("location:hasil.php");
                   
        }
    }
    
?>

<div class="container">
    <div class="row">
        <ol class="breadcrumb"><h4>METODE</h4></ol>
    </div>

    <div class="panel panel-container">
        <div class="bootstrap-table">
            <form action="metode.php?aksi=tambah" method="post" enctype="multipart/form-data">
                <input type="hidden" class="form-control" name="kode_alternatif" value="A01">

                <div class="form-group">
                    <label>NIK</label>
                    <input type="text" class="form-control" name="nik_alternatif" placeholder="nomor induk kependudukan">
                    <br>
                    <label>Nama Alternatif</label>
                    <input type="text" class="form-control" name="nama_alternatif" placeholder="nama alternatif">
                </div>
                    
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
                                echo "<option selected value=".$baris2['nilai_subkriteria'].">".$baris2['nama_subkriteria']." - (".$baris2['nilai_subkriteria'].")</option>";
                            }

                            echo "</select> </div>";
                        }

                    ?>

                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" name="proses" value="Proses Metode">
                    </div>
            </form>
            <hr>
            <br>

            <h4>DATA TRAINING</h4>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">NIK</th>
                            <th class="text-center">Nama Alternatif</th>

                            <?php
                            // menampilkan data kriteria
                            $data="SELECT * FROM tbl_kriteria ORDER BY kode_kriteria ASC";
                            $result = $connect->query($data);

                            if($result){
                                $no=1;
                                while($b=$result->fetch_assoc()){
                                    echo "<th class='text-center'>$b[nama_kriteria]</th>";
                                }}
                                    ?>
                            
                            
                            <th class="text-center">Keputusan</th>
                           
                               
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // menampilkan data alternatif
                            $data="SELECT * FROM tbl_alternatif order by kode_alternatif asc";
                            $result = $connect->query($data);

                            if($result){
                                $no=1;
                                while($c=$result->fetch_assoc()){
                                    $nomor = $no++;
                                    $kode=$c['kode_alternatif'];
                                    $nik=$c['nik_alternatif'];
                                    $nama=$c['nama_alternatif'];
                                    echo "<tr>
                                        <td class='text-center'>$nomor</td>";
                                    
                                    echo "<td>$nik</td>";
                                    echo "<td>$nama</td>";
                                    // menampilkan nilai subkriteria berdasarkan kriteria
                                    $query1=mysqli_query($connect, "SELECT a.nilai_subkriteria as sub FROM tbl_subkriteria a, tbl_training b WHERE b.kode_alternatif='".$kode."' AND a.kode_subkriteria=b.kode_subkriteria ORDER BY b.kode_kriteria");

                                    while($d=$query1->fetch_assoc()){
                                        $nilaisubkriteria = $d['sub'];
                                        echo "<td class='text-center'>$nilaisubkriteria</td>";
                                       
                                    } ?>

                                   
                                    <td class="text-center">
                                        <?php echo $c['keputusan'] ?>
                                    </td>

                                    </tr>
                        <?php 
                        }
                    }
                    ?> 
                    </tbody>
                </table>
                </div>
                <br>

                <h4>DATA TESTING</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">NIK</th>
                                <th class="text-center">Nama Alternatif</th>

                                <?php
                                // menampilkan data kriteria
                                $data="SELECT * FROM tbl_kriteria ORDER BY kode_kriteria ASC";
                                $result = $connect->query($data);

                                if($result){
                                    $no=1;
                                    while($b=$result->fetch_assoc()){
                                        echo "<th class='text-center'>$b[nama_kriteria]</th>";
                                    }}else{
                                        echo "Error: " . $connect->error;
                                    }
                                        ?>
                                
                                
                                <th class="text-center">Keputusan</th>
                            
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // menampilkan data alternatif
                                $data="SELECT * FROM tbl_testing WHERE kode_alternatif='$_GET[kode_alternatif]' limit 1";
                                $result = $connect->query($data);

                                if($result){
                                    $no=1;
                                    while($c=$result->fetch_assoc()){
                                        $nomor = $no++;
                                        $kode=$c['kode_alternatif'];
                                        $nik=$c['nik_alternatif'];
                                        $nama=$c['nama_alternatif'];
                                        echo "<tr>
                                            <td class='text-center'>$nomor</td>";
                                        
                                        echo "<td>$nik</td>";
                                        echo "<td>$nama</td>";
                                        // menampilkan nilai subkriteria berdasarkan kriteria
                                        $query1=mysqli_query($connect, "SELECT nilai_testing as sub FROM tbl_testing WHERE kode_alternatif='".$kode."' ORDER BY kode_kriteria");

                                        while($d=$query1->fetch_assoc()){
                                            $nilaisubkriteria = $d['sub'];
                                            echo "<td class='text-center'>$nilaisubkriteria</td>";
                                        
                                        } ?>

                                    
                                        <td class="text-center">
                                           ?
                                        </td>

                                        </tr>
                            <?php 
                            }
                        }
                        ?> 
                        </tbody>
                    </table>
                    </div>
                    <br>

                    <h4>EUCLIDEAN DISTANCE</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">NIK</th>
                                    <th class="text-center">Nama Alternatif</th>

                                    <?php
                                    // menampilkan data kriteria
                                    $data="SELECT * FROM tbl_kriteria ORDER BY kode_kriteria ASC";
                                    $result = $connect->query($data);

                                    if($result){
                                        $no=1;
                                        while($b=$result->fetch_assoc()){
                                            echo "<th class='text-center'>$b[nama_kriteria]</th>";
                                        }}
                                            ?>
                                    
                                    
                                    <th class="text-center">Distance</th>
                                
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // menampilkan data alternatif
                                $data="SELECT * FROM tbl_alternatif ORDER BY kode_alternatif ASC";
                                // $data="SELECT * FROM tbl_alternatif WHERE kode_alternatif='$_GET[kode_alternatif]'";
                                $result = $connect->query($data);

                                // $data="SELECT * FROM tbl_testing WHERE kode_alternatif='$_GET[kode_alternatif]' limit 1";
                                

                                if($result){
                                    $no=1;
                                    while($c=$result->fetch_assoc()){
                                        $sum = 0.0;
                                        $nomor = $no++;
                                        $kode=$c['kode_alternatif'];
                                        $nik=$c['nik_alternatif'];
                                        $nama=$c['nama_alternatif'];
                                        echo "<tr>
                                            <td class='text-center'>$nomor</td>";
                                            
                                        echo "<td>$nik</td>";
                                        echo "<td>$nama</td>";

                                      
                                        $query1=mysqli_query($connect, "SELECT a.nilai_subkriteria as subtraining FROM tbl_subkriteria a, tbl_training b WHERE b.kode_alternatif='".$kode."' AND a.kode_subkriteria=b.kode_subkriteria ORDER BY b.kode_kriteria");
                                        
                                        
                                        
                                        $query2=mysqli_query($connect, "SELECT nilai_testing as subtraining FROM tbl_testing WHERE kode_alternatif='A01' ORDER BY kode_kriteria");


                                        while ($result1 = mysqli_fetch_array($query1)) {
                                            $result2 = mysqli_fetch_array($query2);

                                            $val1 = $result1['subtraining'];
                                            $val2 = $result2['subtraining'];

                                            $val = pow(($val2 - $val1), 2); // Selisih kuadrat
                                            echo "<td class='text-center'>$val</td>"; // Tampilkan nilai selisih kuadrat
                                            $sum += $val; // Akumulasi selisih kuadrat
                                        }

                                            $akr = sqrt($sum); // Akar dari total sum
                                            $akar = number_format($akr, 2); // Format angka

                                            echo "<td class='text-center'>$akar</td>"; // Tampilkan akar kuadrat dari total sum
                                            
                                            mysqli_query($connect, "UPDATE tbl_alternatif SET distance='$akr' WHERE kode_alternatif='$kode'");
                                            ?>
                                        
                                           
                                            </tr>

                                            
                                            <?php 
                                }}
                                
                                ?> 
                            </tbody>
                        </table>
                    </div>
                        <br>

                        <?php
                        // rangking
                          $data=mysqli_query($connect, "SELECT * FROM tbl_alternatif ORDER BY distance asc");
                          
                          $rank=1;
                          while($c=mysqli_fetch_array($data)) {
                            mysqli_query($connect, "UPDATE tbl_alternatif set rangking='$rank' WHERE kode_alternatif='$c[kode_alternatif]'");
                            $rank++;

                          } 
                        ?>  

                        <?php
                        // pengelompokkan
                          $data=mysqli_query($connect, "SELECT * FROM tbl_alternatif ORDER BY distance asc");
                          
                        
                          while($c=mysqli_fetch_array($data)) {
                            if($c['rangking']<=3){
                                mysqli_query($connect, "UPDATE tbl_alternatif set pilihan='Ya' WHERE kode_alternatif='$c[kode_alternatif]'");
                           
                            }else{
                                mysqli_query($connect, "UPDATE tbl_alternatif set pilihan='Tidak' WHERE kode_alternatif='$c[kode_alternatif]'");
                         
                            }
                           
                          } 
                        ?> 



                    <h4>KLASIFIKASI K-NEAREST NEIGHBOR</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">Kode</th>
                                    <th class="text-center">NIK</th>
                                    <th class="text-center">Nama Alternatif</th>
                                    <th class="text-center">Distance</th>
                                    <th class="text-center">Rangking</th>
                                    <th class="text-center">Pilihan</th>
                                    <th class="text-center">Keputusan</th>
                            </thead>
                            <tbody>
                                <?php
                                // menampilkan data alternatif
                                    $data="SELECT * FROM tbl_alternatif order by rangking asc";
                                    $result = $connect->query($data);

                                    if($result){
                                        while($c=$result->fetch_assoc()){ ?>
                                            <td class="text-center">
                                                <?php echo $c['kode_alternatif'] ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $c['nik_alternatif'] ?>
                                            <td class="text-center">
                                                <?php echo $c['nama_alternatif'] ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo number_format($c['distance'], 3) ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $c['rangking'] ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $c['pilihan'] ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $c['keputusan'] ?>
                                            </td>

                                            </tr>
                                <?php 
                                }
                            }
                            ?> 
                            </tbody>
                        </table>
                        </div>
                        <br>

                        <?php
                        // kesimpulan
                          $data=mysqli_query($connect, "SELECT * FROM tbl_alternatif ORDER BY kode_alternatif asc");
                          
                          while($c=mysqli_fetch_array($data)) {
                           
                            $data1=mysqli_query($connect, "SELECT count(*) as jmllayak FROM tbl_alternatif WHERE pilihan='Ya' and keputusan='Layak'");
                            $a1=mysqli_fetch_array($data1);

                            $data2=mysqli_query($connect, "SELECT count(*) as jmltidaklayak FROM tbl_alternatif WHERE pilihan='Ya' and keputusan='Tidak Layak'");
                            $a2=mysqli_fetch_array($data2);

                            $jmllayak = $a1['jmllayak'];
                            $jmltidaklayak = $a2['jmltidaklayak'];

                            if($jmllayak > $jmltidaklayak){
                                $hasil = 'LAYAK';
                                $hasill = 'Kategori mayoritas (LAYAK) lebih banyak daripada mayoritas (TIDAK LAYAK)';
                            }else{
                                $hasil = 'TIDAK LAYAK';
                                $hasill = 'Kategori mayoritas (TIDAK LAYAK) lebih banyak daripada mayoritas (LAYAK)';
                            }
                          } 
                        ?> 


                          <h4>KESIMPULAN</h4>
                          <div class="text-justify" style="padding:20px; border: 1px solid;">
                                <h4>Hasil perhitungan ini mengambil 3 data terbaik ascending (K=3) yang menggunakan <b>Algoritma K-Nearest Neighbor</b>. Adapun kesimpulan dari metode klasifikasi K-Nearest Neighbor adalah : <b><?php echo $hasill ?></b>, LAYAK berjumlah <b>(<?php echo $jmllayak ?>)</b> sedangkan TIDAK LAYAK berjumlah <b>(<?php echo $jmltidaklayak ?>)</b>, sehingga dapat disimpulkan atas nama <b><?php echo $_GET['nama_alternatif'] ?></b> kelayakan sebagai penerima bantuan hasilnya : <b><?php echo $hasil ?></b>.</h4>
                          </div>
                          <br>

                        
                          <?php 
                            $query1=mysqli_query($connect, "SELECT nilai_testing as sub FROM tbl_testing WHERE kode_alternatif='A01' ORDER BY kode_kriteria");
                            $urutan = 1;
                            while($d=$query1->fetch_assoc()){
                                $nilaisubkriteria = $d['sub'];
                                if($urutan==1){
                                    $urutan1 = $nilaisubkriteria;
                                }else if($urutan==2){
                                    $urutan2 = $nilaisubkriteria;
                                }else if($urutan==3){
                                    $urutan3 = $nilaisubkriteria;
                                }else if($urutan==4){
                                    $urutan4 = $nilaisubkriteria;
                                }else if($urutan==5){
                                    $urutan5 = $nilaisubkriteria;
                                }else{
                                    $urutan6 = $nilaisubkriteria;
                                }
                                $urutan+=1;
                            }
                          ?>
                        <form action="metode.php?aksi=simpanhasil" method="post" enctype="multipart/form-data">
                            <input type="hidden" class="form-control" name="nik_alternatif" value="<?php echo $_GET['nik_alternatif'] ?>">
                            <input type="hidden" class="form-control" name="nama_alternatif" value="<?php echo $_GET['nama_alternatif'] ?>">
                            <input type="hidden" class="form-control" name="keputusan" value="<?php echo $hasil ?>">
                            <input type="hidden" class="form-control" name="penghasilan" value="<?php echo $urutan1 ?>">
                            <input type="hidden" class="form-control" name="usia" value="<?php echo $urutan2 ?>">
                            <input type="hidden" class="form-control" name="status_perkawinan" value="<?php echo $urutan3 ?>">
                            <input type="hidden" class="form-control" name="jml_tanggungan" value="<?php echo $urutan4 ?>">
                            <input type="hidden" class="form-control" name="pekerjaan" value="<?php echo $urutan5 ?>">
                            <input type="hidden" class="form-control" name="kriteria_blt" value="<?php echo $urutan6 ?>">
                          
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" name="proses" value="Simpan Hasil Analisa">
                            </div>
                        </form>
                        <hr>
                        <br>




        </div>
    </div>
</div>