<?php $this->load->view('user/header_user') ?>
<!-- tempat css/javascript -->
<style>
    #map-canvas {
        width: 100%;
        height: 500px;
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
            <div id="mapcoy" style="width:100%; height:450px;"></div>
        </div>
    </div>
</div>

<?php $this->load->view('user/body_bawah_user'); ?>
<!-- java -->
<script type="text/javascript">
    function initialize() {

        var mapOptions = {
            zoom: 6,
            center: new google.maps.LatLng(-0.9161181388094186, 100.42428204687508),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var mapElement = document.getElementById('mapcoy');

        var map = new google.maps.Map(mapElement, mapOptions);

        setMarkers(map, officeLocations);

    }

    var officeLocations = [
        <?php
        foreach ($sekolah as $item) { ?>

            [<?php echo $item->id_sekolah ?>,
                '<?php echo $item->nama_sekolah ?>',
                '<?php echo $item->alamat_sekolah ?>',
                <?php echo $item->longitude ?>,
                <?php echo $item->latitude ?>],
        <?php } ?>
    ];

    function setMarkers(map, locations) {
        var globalPin = 'gambar/place1.ico';

        for (var i = 0; i < locations.length; i++) {

            var office = locations[i];
            var myLatLng = new google.maps.LatLng(office[4], office[3]);
            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });

            var contentString =
                '<div id="content">' +
                '<div id="siteNotice">' +
                '</div>' +
                '<h5 id="firstHeading" class="firstHeading">' + office[1] + '</h5>' +
                '<div id="bodyContent">' +
                '<a href=<?php echo base_url("user/grafik/view_map_sekolah");?>/' + office[0] + '>Info Detail</a>' +
                '</div>' +
                '</div>';

            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map
            });

            google.maps.event.addListener(marker, 'click', getInfoCallback(map, contentString));
        }
    }

    function getInfoCallback(map, content) {
        var infowindow = new google.maps.InfoWindow({
            content: content
        });
        return function() {
            infowindow.setContent(content);
            infowindow.open(map, this);
        };
    }

    initialize();
</script>
<?php $this->load->view('user/footer_user'); ?>