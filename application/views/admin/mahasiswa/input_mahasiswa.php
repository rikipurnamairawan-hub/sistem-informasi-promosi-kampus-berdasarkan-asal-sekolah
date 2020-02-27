<?php $this->load->view('admin/header') ?>
<!-- tempat css/javascript -->
<?php $this->load->view('admin/body') ?>

<div class="row">
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Data Mahasiswa</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="form_mahasiswa" method="POST">
                <div class="box-body">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Nomor. BP :</label>
                            <input type="text" class="form-control" name="nobp" placeholder="Nomor Bp">
                        </div>
                        <div class="form-group">
                            <label>Nama Mahasiswa :</label>
                            <input type="text" class="form-control" name="nama_M" placeholder="Nama Mahasiswa">
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin :</label><br>
                            <label>
                                <input type="radio" name="jenis_kelamin" class="flat-red" value="Laki-laki" checked>
                                Laki - Laki
                            </label>
                            <label>
                                <input type="radio" name="jenis_kelamin" class="flat-red" value="Perempuan">
                                Perempuan
                            </label>
                        </div>
                        <div class="form-group">
                            <label>No Telfon :</label>
                            <input type="text" class="form-control" name="telfon" placeholder="No Telfon">
                        </div>

                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Agama :</label>
                            <select class="form-control select2" name="agama" style="width: 100%;">
                                <option value="0">-- Pilih --</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Alamat Mahasiswa :</label>
                            <textarea class="form-control" name="alamat" rows="3" style="height: 101px;" placeholder="Enter ..."></textarea>
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
                                for ($tahun = 2015; $tahun <= $tahunow; $tahun++) {
                                    echo "<option  value='$tahun'>$tahun </option>";
                                }

                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jurusan :</label>
                            <select class="form-control select2" name="jurusan" style="width: 100%;">
                                <option value="0">-- Pilih --</option>
                                <?php
                                foreach ($jurusan as $jurus) {
                                    echo "<option value='$jurus->id_jurusan'>$jurus->jurusan</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Sekolah asal :</label>
                            <select name="sekolah_asal" id="sekolah_asal" class="form-control select2" style="width: 100%;">
                                <option value="0">-- Pilih --</option>
                                <?php
                                foreach ($sekolah as $seko) {
                                    echo "<option value='$seko->id_sekolah'>$seko->nama_sekolah</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <div class="col-md-8">
                    </div>
                    <div class="col-md-4" style="padding-left: 200px">
                        <button type="button" class="btn btn-danger" onclick="Simpan_mahasiswa()">SIMPAN DATA</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $this->load->view('admin/body_bawah'); ?>
<!-- tampan penambahan javascrip/ jqueri -->

<script>
    $('.select2').select2()

    function Simpan_mahasiswa() {
        var data = $('#form_mahasiswa').serialize();
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('admin/Mahasiswa/simpan_mahasiswa') ?>",
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
                    $("#form_mahasiswa")[0].reset();
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