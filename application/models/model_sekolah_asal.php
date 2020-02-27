<?php

/**
 * 
 */
class model_sekolah_asal extends CI_Model{

    function insert_sekolah($data, $table){
        $this->db->insert($table, $data);
    }

    public function view_sekolah_asal()
    {
        $data = $this->db->query("SELECT * from tb_sekolah_asal JOIN tb_mahasiswa ON tb_mahasiswa.id_sekolah = tb_sekolah_asal.id_sekolah");
		return $data->result();
    }

    public function sekolah_asal()
    {
        $data = $this->db->query("SELECT * from tb_sekolah_asal  JOIN tb_kecamatan ON tb_sekolah_asal.id_kecamatan = tb_kecamatan.id_kecamatan
        JOIN tb_kabupaten ON tb_sekolah_asal.id_kab = tb_kabupaten.id_kab 
        JOIN tb_provinsi ON tb_sekolah_asal.id_provinsi = tb_provinsi.id_provinsi order by id_sekolah desc");
		return $data->result();
    }

    public function view_jumlah(){
        $data = $this->db->query("SELECT  kabupaten, count(tb_sekolah_asal.id_kab) as total_kab from tb_sekolah_asal JOIN tb_kabupaten ON tb_sekolah_asal.id_kab = tb_kabupaten.id_kab  JOIN tb_mahasiswa ON tb_mahasiswa.id_sekolah = tb_sekolah_asal.id_sekolah group by tb_kabupaten.id_kab");
        return $data->result();
    }

    public function detail_sekolah($kode)
    {
        $data = $this->db->query("SELECT * from tb_sekolah_asal 
        JOIN tb_kecamatan ON tb_sekolah_asal.id_kecamatan = tb_kecamatan.id_kecamatan
        JOIN tb_kabupaten ON tb_sekolah_asal.id_kab = tb_kabupaten.id_kab 
        JOIN tb_provinsi ON tb_sekolah_asal.id_provinsi = tb_provinsi.id_provinsi
        where id_sekolah='$kode'");
		return $data->result();
    }


}

?>