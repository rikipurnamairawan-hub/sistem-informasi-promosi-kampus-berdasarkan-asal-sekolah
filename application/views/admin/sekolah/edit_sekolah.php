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
                <h3 class="box-title">Edit Data Sekolah Asal</h3>
            </div>
            <?php foreach ($sekolah as $edit) { ?>
                <form id="form_asal_sekolah" method="POST">
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
                                    <input type="text" id="lat" name="lat" class="form-control" value="<?php echo $edit->latitude; ?>" readonly style="width: 100%">
                                    <label>Longitude</label>
                                    <input type="text" id="lng" name="long" class="form-control" value="<?php echo $edit->longitude; ?>" readonly>
                                </div>
                            </div>

                            <div class="col-md-8">

                                <div class="form-group">
                                    <label>Provinsi :</label>
                                    <select class="form-control select2" id="provinsi" name="provinsi" style="width: 100%;" onchange="kabupaten()">
                                        <option value="0">-- Pilih --</option>
                                        <?php
                                        foreach ($provinsi as $prov) { ?>
                                            <option value="<?php echo $prov->id_provinsi ?>" <?php if ($prov->id_provinsi == $edit->id_provinsi) {
                                                                                                    echo 'selected';
                                                                                                } else {
                                                                                                    echo '';
                                                                                                }; ?>><?php echo $prov->provinsi ?></option>
                                        <?php } ?>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Kabupaten/ Kota :</label>
                                    <select class="form-control select2" name="kabupaten_kota" id="kabupaten_kota" style="width: 100%;" onchange="kabupatenfunc()">
                                        <?php
                                        foreach ($kabupaten as $kab) { ?>
                                            <option value="<?php echo $kab->id_kab; ?>" <?php if ($kab->id_kab == $edit->id_kab) {
                                                                                            echo 'selected';
                                                                                        } else {
                                                                                            echo '';
                                                                                        }; ?>><?php echo $kab->kabupaten; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Kecamatan</label>
                                    <select class="form-control select2" name="kecamatan" id="kecamatan" style="width: 100%;">
                                        <?php
                                        foreach ($kecamatan as $kec) { ?>
                                            <option value="<?php echo $kec->id_kecamatan; ?>" <?php if ($kec->id_kecamatan == $edit->id_kecamatan) {
                                                                                                    echo 'selected';
                                                                                                } else {
                                                                                                    echo '';
                                                                                                }; ?>><?php echo $kec->kecamatan; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Lokasi Map Sekolah :</label>
                                    <input type="text" name="searchmap" class="form-control" id="searchmap" placeholder="Cari Nama/ Alamat / Lokasi Sekolah">
                                </div>
                                <div id="map-canvas"></div>
                            </div>
                            <br>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <button type="button" class="btn btn-danger" onclick="Simpan_sekolah()">SIMPAN DATA</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

        </div>
    </div>
</div>

<?php $this->load->view('admin/body_bawah'); ?>
<!-- javascrip -->
<script>
    var map = new google.maps.Map(document.getElementById("map-canvas"), {
        center: {
            lat: <?php echo $edit->latitude;?>,
            lng: <?php echo $edit->longitude;?>
        },
        zoom: 15
    });
    var marker = new google.maps.Marker({
        position: {
            lat: <?php echo $edit->latitude;?>,
            lng: <?php echo $edit->longitude;?>
        },
        map: map,
        draggable: true
    });
    var searchBox = new google.maps.places.SearchBox(document.getElementById("searchmap"));
    google.maps.event.addListener(searchBox, 'places_changed', function() {
        var places = searchBox.getPlaces();
        var bounds = new google.maps.LatLngBounds();
        var i, places;
        for (i = 0; place = places[i]; i++) {
            bounds.extend(place.geometry.location);
            marker.setPosition(place.geometry.location);
        }
        map.fitBounds(bounds);
        map.setZoom(15);
    });
    google.maps.event.addListener(marker, 'position_changed', function() {
        var lat = marker.getPosition().lat();
        var lng = marker.getPosition().lng();

        $('#lat').val(lat);
        $('#lng').val(lng);
    });
</script>
<script>
function kabupaten() {
            var kode = $('#provinsi').val();
            var x = document.getElementById("kabupaten_kota");
            var y = document.getElementById("kecamatan");
            y.readonly = true;
            x.readonly = false;
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('admin/Mahasiswa/kabupaten') ?>",
                // dataType : "JSON",
                cache: false,
                data: {
                    kode: kode
                },
                success: function(data) {
                    $("#kabupaten_kota").html('<option value="0">-- Pilih --</option>' + data);
                    $("#kecamatan").html('<option value="0">-- Pilih --</option>');
                    console.log(data);
                }
            });
            return false;
        }

        function kabupatenfunc() {
            var kode = $('#kabupaten_kota').val();
            var x = document.getElementById("kecamatan");
            x.readonly = false;
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('admin/Mahasiswa/kecamatan') ?>",
                cache: false,
                data: {
                    kode: kode
                },
                success: function(data) {
                    $("#kecamatan").html('<option value="0">-- Pilih --</option>' + data);
                    console.log(data);

                }
            });
            return false;
        }
</script>

<?php } ?>
<?php $this->load->view('admin/footer'); ?>