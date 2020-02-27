<?php $this->load->view('user/header_user') ?>
<!-- tempat css/javascript -->
<style>
    #map-canvas {
        width: 100%;
        height: 250px;
    }
</style>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTL1Y3hIK6L-NuMojKK_L0NBCh0YGgSd0&callback=showPlaces"></script>


<?php $this->load->view('user/body_user') ?>
<br>
<div class="box">
    <div class="box-header with-border">
        <div class="col-md-12">
            <div class="box-header with-border">
                <h3 class="box-title">Detail Sekolah</h3>
            </div>
            <?php foreach ($sekolah as $local) { ?>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nama Sekolah :</label>
                                <input type="text" class="form-control" name="nama_sekolah" value="<?php echo $local->nama_sekolah; ?>">
                            </div>
                            <div class="form-group">
                                <label>Alamat Sekolah :</label>
                                <textarea class="form-control" name="alamat" rows="3" style="height: 101px;"><?php echo $local->alamat_sekolah; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Daerah Sekolah :</label>
                                <textarea class="form-control" name="alamat" rows="3" style="height: 101px;"><?php echo $local->kecamatan; ?>, <?php echo $local->kabupaten; ?>, <?php echo $local->provinsi; ?></textarea>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Lokasi Sekolah :</label>
                            </div>
                            <div id="map-canvas"></div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <div class="box-header with-border">
        <h3 class="box-title"> <center>Data Mahasiswa</center></h3>
    </div>
    <div class="box-body">
    <div class="scroll1">
        <table id="mahasiswa" class="table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Tahun_Masuk</th>
                    <th>Nomor_BP</th>
                    <th>Nama_Mahasiswa</th>
                    <th>Jenis_Kelamin</th>
                    <th>No.Telfon</th>
                    <th>Agama</th>
                    <th>Jurusan</th>
                    <th>alamat_mahasiswa</th>
                    <th>Daerah</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($data_mahasiswa as $mas) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $mas->tahun_masuk; ?></td>
                        <td><?php echo $mas->no_bp; ?></td>
                        <td><?php echo $mas->nm_mahasiswa; ?></td>
                        <td><?php echo $mas->j_kelamin; ?></td>
                        <td><?php echo $mas->no_telfon; ?></td>
                        <td><?php echo $mas->agama; ?></td>
                        <td><?php echo $mas->jurusan; ?></td>
                        <td><?php echo $mas->alamat_mahasiswa; ?></td>
                        <td><?php echo $mas->kabupaten; ?>, <?php echo $mas->kecamatan; ?>, <?php echo $mas->provinsi; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    </div>
</div>
<?php $this->load->view('user/body_bawah_user'); ?>
<!-- java -->

<script type="text/javascript">
    function initialize() {
        var myLatlng = new google.maps.LatLng('<?php echo $local->latitude ?>', '<?php echo $local->longitude ?>');
        var mapOptions = {
            zoom: 15,
            center: myLatlng
        };

        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

        var contentString = '';

        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });

        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            //   title: 'Maps Info',
            //   icon:'gambar/place1.ico'
        });
        google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map, marker);
        });
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>
<?php } ?>

<script>
    $(function() {
        $('#mahasiswa').DataTable()
    });
</script>
<?php $this->load->view('user/footer_user'); ?>