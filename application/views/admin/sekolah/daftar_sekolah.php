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
                <h3 class="box-title">Data Mahasiswa</h3>
            </div>
            <div class="box-header">
            </div>
            <div class="box-body">
                <table id="sekolah" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama Sekolah</th>
                            <th>Alamat</th>
                            <th>Daerah</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($sekolah as $mas) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $mas->nama_sekolah; ?></td>
                                <td><?php echo $mas->alamat_sekolah; ?></td>
                                <td><?php echo $mas->kecamatan; ?>, <?php echo $mas->kabupaten; ?>, <?php echo $mas->provinsi; ?></td>
                                <td>
                                    <a href="<?php echo base_url('admin/C_sekolah/edit_sekolah/' . $mas->id_sekolah) ?>" class="btn btn-social-icon"><i class="fa fa-pencil"></i></a>|| </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('admin/body_bawah'); ?>
<!-- javascrip -->
<script>
    $('.select2').select2()
    $(function() {
        $('#sekolah').DataTable()
    });
</script>
<?php $this->load->view('admin/footer'); ?>