<?php
include 'header.php';
?>

<div class="container">
    <div class="row">
        <ol class="breadcrumb">
            <h4>HASIL ANALISA</h4>
        </ol>
    </div>

    <div class="panel panel-container">
        <div class="bootstrap-table">
            <a href="export-data.php" class="btn btn-primary">Export Data</a>
            <hr>
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
                    <th class="text-center">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Menampilkan data alternatif
                $data="SELECT * FROM tbl_hasil order by kode_hasil asc";
                $result = $connect->query($data);


                
                if ($result) {
                    $no = 1;
                    while ($c = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class='text-center'>" . $no . "</td>";
                        echo "<td class='text-center'>" . $c['nik_alternatif'] . "</td>";
                        echo "<td class='text-center'>" . $c['nama_alternatif'] . "</td>";
                        
                        $query1=mysqli_query($connect, "SELECT * FROM tbl_subkriteria");
                        $arr = array("K01", "K02", "K03", "K04", "K05", "K06");
                        $arr2 = array("penghasilan", "usia", "status_perkawinan", "jml_tanggungan", "pekerjaan", "kriteria_blt");
                        $nmr=0;
                        while($d=$query1->fetch_assoc()){
                            if($d['nilai_subkriteria']==$c[$arr2[$nmr]] && $d['kode_kriteria']==$arr[$nmr]){
                                $nama_subkriteria = $d['nama_subkriteria'];
                                echo "<td class='text-center'>$nama_subkriteria</td>";                       
                                $nmr+=1;
                            }
                        } 

                        echo "<td class='text-center'>" . $c['keputusan'] . "</td>";
                ?>
                        <td class="text-center">
                            <a href="hasil-hapus.php?kode_hasil=<?php echo $c['kode_hasil'] ?>" class="btn btn-danger">Hapus</a>
                        </td>
                <?php
                        echo "</tr>";
                        $no++;
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>Tidak ada data</td></tr>";
                }
                ?>
            </tbody>
        </table>

            </div>
        </div>
    </div>
</div>
