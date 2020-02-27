<?php $this->load->view('admin/header') ?>
<!-- tempat css/javascript -->
<style>
    #map-canvas {
        width: 100%;
        height: 400px;
    }
</style>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVO3VgExFndlaCy4rg_zEKny15mesvoT8&libraries=places" type="text/javascript"></script>

<?php $this->load->view('admin/body') ?>

<div class="row">
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Detail Data Mahasiswa</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <?php foreach ($data_edit as $edit) { ?>
                <form id="form_mahasiswa" method="POST">
                    <div class="box-body">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nomor. BP :</label>
                                <input type="text" class="form-control" name="nobp" value="<?php echo $edit->no_bp; ?>">
                            </div>
                            <div class="form-group">
                                <label>Nama Mahasiswa :</label>
                                <input type="text" class="form-control" name="nama_M" value="<?php echo $edit->nm_mahasiswa; ?>">
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin :</label><br>
                                <label>
                                    <input type="radio" name="jenis_kelamin" class="flat-red" value="Laki-laki" <?php if ($edit->j_kelamin == 'Laki-laki') {
                                                                                                                    echo 'checked';
                                                                                                                } else {
                                                                                                                }; ?>>
                                    Laki - Laki
                                </label>
                                <label>
                                    <input type="radio" name="jenis_kelamin" class="flat-red" value="Perempuan" <?php if ($edit->j_kelamin == 'Perempuan') {
                                                                                                                    echo 'checked';
                                                                                                                } else {
                                                                                                                }; ?>>
                                    Perempuan
                                </label>
                            </div>
                            <div class="form-group">
                                <label>No Telfon :</label>
                                <input type="text" class="form-control" name="telfon" value="<?php echo $edit->no_telfon; ?>">
                            </div>

                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Agama :</label>
                                <input type="text" class="form-control" name="agama" value="<?php echo $edit->agama; ?>">
                            </div>
                            <div class="form-group">
                                <label>Alamat Mahasiswa :</label>
                                <textarea class="form-control" name="alamat" rows="3" style="height: 101px;" placeholder="Enter ..."><?php echo $edit->alamat_mahasiswa; ?></textarea>
                            </div>
                        </div>

                        <div class="col-md-4">

                            <div class="form-group">
                                <label>Tahun Masuk :</label>
                                <select class="form-control select2" name="tahunmasuk" style="width: 100%;" disabled>
                                    <option value="0">-- Pilih --</option>
                                    <?php
                                    date_default_timezone_set('Asia/Jakarta');
                                    $tahunow = date('Y');
                                    for ($tahun = 2015; $tahun <= $tahunow; $tahun++) { ?>
                                        <option value='<?php echo $tahun; ?>' <?php if ($tahun == $edit->tahun_masuk) {
                                                                                    echo 'selected';
                                                                                } else {
                                                                                }; ?>><?php echo $tahun; ?> </option>
                                    <?php } ?>

                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jurusan :</label>
                                <select class="form-control select2" name="jurusan" style="width: 100%;" disabled>
                                    <option value="0">-- Pilih --</option>
                                    <?php
                                    foreach ($jurusan as $jurus) { ?>
                                        echo "<option value='<?php echo $jurus->id_jurusan; ?>' <?php if ($jurus->id_jurusan == $edit->id_jurusan) {
                                                                                                    echo 'selected';
                                                                                                } else {
                                                                                                } ?>><?php echo $jurus->jurusan; ?></option>";
                                    <?php } ?>
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Sekolah asal :</label>
                                <select name="sekolah_asal" id="sekolah_asal" class="form-control select2" style="width: 100%;" disabled>
                                    <option value="0">-- Pilih --</option>
                                    <?php
                                    foreach ($sekolah as $seko) { ?>
                                        echo "<option value='<?php echo $seko->id_sekolah; ?>' <?php if ($seko->id_sekolah == $edit->id_sekolah) {
                                                                                                    echo 'selected';
                                                                                                } else {
                                                                                                } ?>><?php echo $seko->nama_sekolah; ?></option>";
                                    <?php } ?>
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-header with-border">
                        <h3 class="box-title">Detail Lokasi Sekolah</h3>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nama Sekolah Asal :</label>
                                    <input type="text" class="form-control" name="nama_sekolah" value="<?php echo $edit->nama_sekolah; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Alamat Sekolah :</label>
                                    <textarea class="form-control" name="alamat" rows="3" style="height: 101px;"><?php echo $edit->alamat_sekolah; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Latitude</label>
                                    <input type="text" id="lat" name="lat" value="<?php echo $edit->latitude; ?>" class="form-control" style="width: 100%">
                                    <label>Longitude</label>
                                    <input type="text" id="lng" name="long" value="<?php echo $edit->longitude; ?>" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="">Lokasi Map Sekolah :</label>
                                </div>
                                <div id="map-canvas"></div>
                            </div>
                        </div>
                    </div>


                    <div class="box-footer">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-8" style="padding-left: 200px">
                            <a href="<?php echo base_url('admin/Mahasiswa/view_mahasiswa'); ?>" class="btn btn-warning">KEMBALI</a>
                        </div>
                    </div>
                </form>

        </div>
    </div>
</div>
<?php $this->load->view('admin/body_bawah'); ?>

<!-- tambah javascrip -->
<script type="text/javascript">
    function initialize() {
        var myLatlng = new google.maps.LatLng('<?php echo $edit->latitude ?>', '<?php echo $edit->longitude ?>');
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

<?php $this->load->view('admin/footer'); ?>