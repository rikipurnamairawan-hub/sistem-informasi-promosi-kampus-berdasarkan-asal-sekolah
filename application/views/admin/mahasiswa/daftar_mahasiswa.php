<?php $this->load->view('admin/header') ?>
<!-- tempat css/javascript -->
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
                <table id="mahasiswa" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Tahun Masuk</th>
                            <th>Nomor BP</th>
                            <th>Nama Mahasiswa</th>
                            <th>Jenis Kelamin</th>
                            <th>Action</th>
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
                                <td>
                                    <a href="<?php echo base_url('admin/Mahasiswa/edit_mahasiswa/'.$mas->no_bp)?>" class="btn btn-social-icon"><i class="fa fa-pencil"></i></a>|| <a href="<?php echo base_url('admin/Mahasiswa/detail_mahasiswa/'.$mas->no_bp)?>" class="btn btn-social-icon"><i class="fa fa-search"></i></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- batas koding -->
<?php $this->load->view('admin/body_bawah'); ?>
<!-- tampan penambahan javascrip/ jqueri -->
<script>
    $('.select2').select2()
    $(function() {
        $('#mahasiswa').DataTable()
    });
</script>

<?php $this->load->view('admin/footer'); ?>