<?php $this->load->view('user/header_user') ?>
<!-- tempat css/javascript -->
<?php $this->load->view('user/body_user') ?>
<br>
<div class="box">
  <div class="box-header with-border">
    <div class="col-md-12">
    <div class="box-header with-border">
        <i class="fa fa-bar-chart-o"></i>
        <h3 class="box-title">Asal sekolah</h3>
      </div>
      <div class="box-body">
        <div id="bar-asal" style="height: 300px;"></div>
      </div>
    </div>
  </div>
</div>
<!-- batas -->
<div class="box">
  <div class="box-header with-border">
    <div class="col-md-6">
      <!-- Bar chart -->
      <div class="box-header with-border">
        <i class="fa fa-bar-chart-o"></i>
        <h3 class="box-title">Penerimaan Mahasiswa</h3>
      </div>
      <div class="box-body">
        <div id="bar-chart" style="height: 300px;"></div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="box-header with-border">
        <i class="fa fa-bar-chart-o"></i>
        <h3 class="box-title">Perbandingan Gender</h3>
      </div>
      <div class="box-body">
        <div id="donut-chart" style="height: 300px;"></div>
        <div class="timeline-footer">
          <a class="btn btn-danger btn-xs" >Laki-Laki : <?php foreach ($kelamin_laki as $laki) {
                                                                                              echo $laki->total_j_kelamin;
                                                                                            } ?> </a>
          <a class="btn btn-danger btn-xs" style="background-color: #f39c12;">Perempuan : <?php foreach ($kelamin_pr as $pr) {
                                                          echo $pr->total_j_kelamin;
                                                        } ?></a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="box">
  <div class="box-header with-border">
    <div class="col-md-12">
    <div class="box-header with-border">
        <i class="fa fa-bar-chart-o"></i>
        <h3 class="box-title">Kabupaten Asal Sekolah</h3>
      </div>
      <div class="box-body">
        <div id="bar-kab" style="height: 300px;"></div>
      </div>
    </div>
  </div>
</div>

<!-- batas -->


<?php $this->load->view('user/body_bawah_user'); ?>
<!-- tempat javascript -->
<script>
  var bar_data = {
    data: [
      <?php foreach ($data_angakatan as $tahun) { ?>['<?php echo $tahun->tahun_masuk; ?>', <?php echo $tahun->total_tahun; ?>],
      <?php  } ?>
    ],
    color: '#3c8dbc'
  }
  $.plot('#bar-chart', [bar_data], {
    grid: {
      borderWidth: 1,
      borderColor: '#f3f3f3',
      tickColor: '#f3f3f3'
    },
    series: {
      bars: {
        show: true,
        barWidth: 0.5,
        align: 'center'
      }
    },
    xaxis: {
      mode: 'categories',
      tickLength: 0
    }
  })

  // donat

  var donutData = [
    <?php foreach ($kelamin_laki as $kel) { ?>{
        label: 'Lk',
        data: '<?php echo $kel->total_j_kelamin; ?>',
        color: '#ff1010'
      },
    <?php } ?>

    <?php foreach ($kelamin_pr as $kel) { ?>{
        label: 'Pr',
        data: '<?php echo $kel->total_j_kelamin; ?>',
        color: '#f39c12'
      },
    <?php } ?>
  ]
  $.plot('#donut-chart', donutData, {
    series: {
      pie: {
        show: true,
        radius: 1,
        innerRadius: 0.5,
        label: {
          show: true,
          radius: 2 / 3,
          formatter: labelFormatter,
          threshold: 0.1
        }

      }
    },
    legend: {
      show: false
    }
  })

  function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">' +
      label +
      '<br>' +
      Math.round(series.percent) + '%</div>'
  }

// batas

  var bar_data = {
    data: [
      <?php foreach ($sekolah as $sel) { ?>['<?php echo $sel->nama_sekolah; ?>', <?php echo $sel->total_sekolah; ?>],
      <?php  } ?>
    ],
    color: '#00a65a'
  }
  $.plot('#bar-asal', [bar_data], {
    grid: {
      borderWidth: 1,
      borderColor: '#f3f3f3',
      tickColor: '#f3f3f3'
    },
    series: {
      bars: {
        show: true,
        barWidth: 0.5,
        align: 'center'
      }
    },
    xaxis: {
      mode: 'categories',
      tickLength: 0
    }
  })

  // batas

  var bar_data = {
    data: [
      <?php foreach ($kabupaten as $kab) { ?>['<?php echo $kab->kabupaten; ?>', <?php echo $kab->total_kab; ?>],
      <?php  } ?>
    ],
    color: '#8e4157'
  }
  $.plot('#bar-kab', [bar_data], {
    grid: {
      borderWidth: 1,
      borderColor: '#f3f3f3',
      tickColor: '#f3f3f3'
    },
    series: {
      bars: {
        show: true,
        barWidth: 0.5,
        align: 'center'
      }
    },
    xaxis: {
      mode: 'categories',
      tickLength: 0
    }
  })
</script>

<?php $this->load->view('user/footer_user'); ?>