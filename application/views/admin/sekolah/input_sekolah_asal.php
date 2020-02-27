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
                <h3 class="box-title">Tambah Data Sekolah Asal</h3>
            </div>
            <form id="form_asal_sekolah" method="POST">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nama Sekolah Asal :</label>
                                <input type="text" class="form-control" name="nama_sekolah" placeholder="Nama Sekolah Asal" required>
                            </div>
                            <div class="form-group">
                                <label>Alamat Sekolah :</label>
                                <textarea class="form-control" name="alamat" rows="3" style="height: 101px;" placeholder="Enter ..."></textarea>
                            </div>
                            <div class="form-group">
                                <label>Latitude</label>
                                <input type="text" id="lat" name="lat" class="form-control" readonly style="width: 100%">
                                <label>Longitude</label>
                                <input type="text" id="lng" name="long" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-md-8">

                            <div class="form-group">
                                <label>Provinsi :</label>
                                <select class="form-control select2" id="provinsi" name="provinsi" style="width: 100%;" onchange="kabupaten()">
                                    <option value="0">-- Pilih --</option>
                                    <?php
                                    foreach ($provinsi as $prov) {
                                        echo "<option value='$prov->id_provinsi'>$prov->provinsi</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Kabupaten/ Kota :</label>
                                <select class="form-control select2" name="kabupaten_kota" id="kabupaten_kota" style="width: 100%;" onchange="kabupatenfunc()">
                                    <option value="0">-- Pilih --</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Kecamatan</label>
                                <select class="form-control select2" name="kecamatan" id="kecamatan" style="width: 100%;">
                                    <option value="0">-- Pilih --</option>
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
<!-- tampan penambahan javascrip/ jqueri -->
<script>
    var map = new google.maps.Map(document.getElementById("map-canvas"), {
        center: {
            lat: -0.9330361,
            lng: 100.3622462
        },
        zoom: 13
    });
    var marker = new google.maps.Marker({
        position: {
            lat: -0.9330361,
            lng: 100.3622462
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
    
    function Simpan_sekolah() {
        var data = $('#form_asal_sekolah').serialize();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('admin/C_sekolah/insert_sekolah') ?>",
            data: data,
            success: function(data) {
                if (data == 'sukses') {

                    setTimeout(function() {
                        swal({
                            position: 'top-end',
                            text: 'Berhasil...',
                            title: '',
                            type: 'success',
                            timer: 1500,
                            showConfirmButton: true
                        });
                    }, 10);
                    $("#form_asal_sekolah")[0].reset();
                    console.log(data);

                } else {

                    setTimeout(function() {
                        swal({
                            position: 'top-end',
                            text: 'Gagal...',
                            title: '',
                            type: 'error',
                            timer: 1500,
                            showConfirmButton: true
                        });
                    }, 10);
                }
            },
        });
    }

</script>

<script>
    $(document).ready(function() {
        var x = document.getElementById("kabupaten_kota");
        var y = document.getElementById("kecamatan");
        x.disabled = true;
        y.disabled = true;
    });



    function kabupaten() {
        var kode = $('#provinsi').val();
        var x = document.getElementById("kabupaten_kota");
        var y = document.getElementById("kecamatan");
        y.disabled = true;
        x.disabled = false;
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
        x.disabled = false;
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
<?php $this->load->view('admin/footer'); ?>