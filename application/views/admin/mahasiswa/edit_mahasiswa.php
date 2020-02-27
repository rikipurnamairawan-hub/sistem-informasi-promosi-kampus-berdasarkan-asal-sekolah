<?php $this->load->view('admin/header') ?>
<!-- tempat css/javascript -->
<?php $this->load->view('admin/body') ?>

<div class="row">
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Data Mahasiswa</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <?php foreach ($data_edit as $edit) { ?>
                <form id="form_mahasiswa" method="POST">
                    <div class="box-body">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nomor. BP :</label>
                                <input type="text" class="form-control" name="nobp" value="<?php echo $edit->no_bp; ?>" placeholder="Nomor Bp" readonly>
                            </div>
                            <div class="form-group">
                                <label>Nama Mahasiswa :</label>
                                <input type="text" class="form-control" name="nama_M" value="<?php echo $edit->nm_mahasiswa; ?>" placeholder="Nama Mahasiswa">
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
                                <input type="text" class="form-control" name="telfon" placeholder="No Telfon" value="<?php echo $edit->no_telfon; ?>">
                            </div>
                     
                        </div>

                        <div class="col-md-4">
                        <div class="form-group">
                                <label>Agama :</label>
                                <select class="form-control select2" name="agama" style="width: 100%;">
                                    <option value="0">-- Pilih --</option>
                                    <option value="Islam" <?php if ($edit->agama == 'Islam') {
                                                                echo 'selected';
                                                            } else {
                                                            }; ?>>Islam</option>
                                    <option value="Kristen" <?php if ($edit->agama == 'Kristen') {
                                                                echo 'selected';
                                                            } else {
                                                            }; ?>>Kristen</option>
                                    <option value="Katolik" <?php if ($edit->agama == 'Katolik') {
                                                                echo 'selected';
                                                            } else {
                                                            }; ?>>Katolik</option>
                                    <option value="Hindu" <?php if ($edit->agama == 'Hindu') {
                                                                echo 'selected';
                                                            } else {
                                                            }; ?>>Hindu</option>
                                    <option value="Buddha" <?php if ($edit->agama == 'Buddha') {
                                                                echo 'selected';
                                                            } else {
                                                            }; ?>>Buddha</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Alamat Mahasiswa :</label>
                                <textarea class="form-control" name="alamat" rows="3" style="height: 101px;" placeholder="Enter ..."><?php echo $edit->alamat_mahasiswa; ?></textarea>
                            </div>
                        </div>

                        <div class="col-md-4">

                            <div class="form-group">
                                <label>Tahun Masuk :</label>
                                <select class="form-control select2" name="tahunmasuk" style="width: 100%;">
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
                                <select class="form-control select2" name="jurusan" style="width: 100%;">
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
                                <select name="sekolah_asal" id="sekolah_asal" class="form-control select2" style="width: 100%;">
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

                    <div class="box-footer">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-8" style="padding-left: 200px">
                            <a href="<?php echo base_url('admin/Mahasiswa/view_mahasiswa');?>" class="btn btn-warning">KEMBALI</a>
                            <a class="btn btn-warning">BATAL</a>
                            <button type="button" class="btn btn-danger" onclick="simpan_edit()">SIMPAN DATA</button>
                        </div>
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
    </div>
    <?php $this->load->view('admin/body_bawah'); ?>

    <script>
        $(document).ready(function() {
            var x = document.getElementById("kabupaten_kota");
            var y = document.getElementById("kecamatan");
            x.readonly = true;
            y.readonly = true;
        });

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

        function simpan_edit() {
            var data = $('#form_mahasiswa').serialize();
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('admin/Mahasiswa/simpan_edit') ?>",
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
                        // $("#form_mahasiswa")[0].reset();
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

    <?php $this->load->view('admin/footer'); ?>