<?php

/**
 * 
 */
class model_mahasiswa extends CI_Model
{

    function insert_mahasiswa($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function data_mahasiswa()
    {

        $data = $this->db->query("SELECT * from tb_mahasiswa 
                                   JOIN tb_jurusan ON tb_mahasiswa.id_jurusan = tb_jurusan.id_jurusan
                                   JOIN tb_sekolah_asal ON tb_mahasiswa.id_sekolah = tb_sekolah_asal.id_sekolah
                                ");
        return $data->result();
    }

    public function edit_mahasiswa($kode)
    {

        $data = $this->db->query("SELECT * from tb_mahasiswa 
        JOIN tb_jurusan ON tb_mahasiswa.id_jurusan = tb_jurusan.id_jurusan
        JOIN tb_sekolah_asal ON tb_mahasiswa.id_sekolah = tb_sekolah_asal.id_sekolah where tb_mahasiswa.no_bp='$kode'
     ");
        return $data->result();
    }

    public function update_mahasiswa($nobp, $data)
    {
        $this->db->where('no_bp',$nobp);
		return $this->db->update('tb_mahasiswa',$data);
    }

    public function jumlah_angkatan(){
        $data = $this->db->query("SELECT tahun_masuk, count(tahun_masuk) as total_tahun from tb_mahasiswa group by tahun_masuk");
        return $data->result();

    }

    public function kelamin_laki(){
        $data = $this->db->query("SELECT j_kelamin, count(j_kelamin) as total_j_kelamin from tb_mahasiswa where j_kelamin='Laki-laki' group by j_kelamin");
        return $data->result();

    }

    public function kelamin_pr(){
        $data = $this->db->query("SELECT j_kelamin, count(j_kelamin) as total_j_kelamin from tb_mahasiswa where j_kelamin='Perempuan' group by j_kelamin");
        return $data->result();

    }

    public function jumlah_sekolah(){

        $data = $this->db->query("SELECT tb_mahasiswa.id_sekolah, nama_sekolah, count(tb_mahasiswa.id_sekolah) as total_sekolah from tb_mahasiswa JOIN tb_sekolah_asal ON tb_mahasiswa.id_sekolah = tb_sekolah_asal.id_sekolah Group by  tb_mahasiswa.id_sekolah
     "); 
        return $data->result();

    }

    public function detail_mahasiswa_map($kode)
    {

        $data = $this->db->query("SELECT * from tb_mahasiswa 
        JOIN tb_jurusan ON tb_mahasiswa.id_jurusan = tb_jurusan.id_jurusan
        JOIN tb_provinsi ON tb_mahasiswa.id_provinsi = tb_provinsi.id_provinsi
        JOIN tb_kecamatan ON tb_mahasiswa.id_kecamatan = tb_kecamatan.id_kecamatan
        JOIN tb_kabupaten ON tb_mahasiswa.id_kab = tb_kabupaten.id_kab
        JOIN tb_sekolah_asal ON tb_mahasiswa.id_sekolah = tb_sekolah_asal.id_sekolah where tb_mahasiswa.id_sekolah='$kode'
     ");
        return $data->result();
    }
}
