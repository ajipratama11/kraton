<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_barang   extends CI_Model
{
    private $_table = 'barang';

    public $id_barang;
    public $nama_barang;
    public $id_kategori;
    public $harga_beli;
    public $harga_jual;
    public $gambar;
    public $keterangan  ;

    function __construct()
    {
        parent::__construct();
    }

    public function rules()
    {
        return [

            [
                'field' => 'no_transaksi',
                'label' => 'No Transaksi',
                'rules' => 'required'
            ],

        ];
    }

    public function get_laporan()
    {
        return $this->db->get($this->_table)->result();
    }

    public function get_by_id($no_transaksi)
    {
        return $this->db->get_where($this->_table, ['no_transaksi' => $no_transaksi])->row();
    }

    public function get_cekkel()
    {
        return $this->db->get_where($this->_table, ['status_2' => 'Terbaca'])->result();
    }
    public function get_cekkel2()
    {
        return $this->db->get_where($this->_table, ['status_2' => 'Terhapus'])->result();
    }
    function get_idproduk(){
        $this->db->select('RIGHT(produk.id_produk,4) as kode', FALSE);
        $this->db->order_by('id_produk','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('produk');     
        if($query->num_rows() <> 0){      
      
         $data = $query->row();      
         $kode = intval($data->kode) + 1;    
        }
        else {      
         //jika kode belum ada      
         $kode = 1;    
        }
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); 
        $kodejadi = "PR".$kodemax;  
        return $kodejadi;
  }
    public function addBarang()
    {
        $post = $this->input->post();
        $this->nama_barang = $post['nama_barang'];
        $this->id_kategori = $post['id_kategori'];
        $this->harga_jual = $post['harga_jual'];
        $this->harga_beli = $post['harga_beli'];
        $this->gambar = $this->_uploadImage();
        $this->keterangan = $post['keterangan'];
        $this->db->insert($this->_table, $this);
    }

    public function update_cek_kelengkapan($status)
    {
        $post = $this->input->post();
        $this->no_transaksi = $post['no_transaksi'];
        $this->no_rekdis = $post['no_rekdis'];
        $this->nama_pasien = $post['nama_pasien'];
        $this->jenis_pelayanan = $post['jenis_pelayanan'];
        $this->asal_ruangan = $post['asal_ruangan'];
        $this->tgl_cek = $post['tgl_cek'];
        $this->nama_form = $post['nama_form'];
        $this->catatan = $post['catatan'];
        $this->card_x = $post['card_x'];
        $this->inform_consent = $post['inform_consent'];
        $this->pemantauan = $post['pemantauan'];
        $this->pengkajian_kadar = $post['pengkajian_kadar'];
        $this->sbar = $post['sbar'];
        $this->skrining = $post['skrining'];
        $this->assesmen_awal = $post['assesmen_awal'];
        $this->transfer_ruangan = $post['transfer_ruangan'];
        $this->resume = $post['resume'];
        $this->ringkasan_mk = $post['ringkasan_mk'];
        $this->assesmen_dpjp = $post['assesmen_dpjp'];
        $this->pengkajian_bayi = $post['pengkajian_bayi'];
        $this->pengkajian_perawat = $post['pengkajian_perawat'];
        $this->asuhan_gizi = $post['asuhan_gizi'];
        $this->perencanaan_pasien_pulang = $post['perencanaan_pasien_pulang'];
        $this->obs_tanda_vital = $post['obs_tanda_vital'];
        $this->obs_suhu_nadi = $post['obs_suhu_nadi'];
        $this->laporan_operasi = $post['laporan_operasi'];
        $this->assesmen_prabedah = $post['assesmen_prabedah'];
        $this->assesmen_praanastesi = $post['assesmen_praanastesi'];
        $this->assesmen_keperawatan = $post['assesmen_keperawatan'];
        $this->timbang_terima = $post['timbang_terima'];
        $this->set_marking = $post['set_marking'];
        $this->ceklist_keselamatan = $post['ceklist_keselamatan'];
        $this->ppi = $post['ppi'];
        $this->status = $status;
        $this->status_2 = $post['status_2'];
        $this->db->update($this->_table, $this, array("no_transaksi" => $post['no_transaksi']));
    }

    public function delete_cek_kelengkapan($no_transaksi)
    {
        return $this->db->delete($this->_table, array("no_transaksi" => $no_transaksi));
    }

    public function hapus_sementara($status, $no_transaksi)
    {
        $this->db->query("UPDATE `cek_kelengkapan` SET `status_2`='$status' WHERE cek_kelengkapan.no_transaksi='$no_transaksi'");
    }

    function restore($status, $no_transaksi)
    {
        $query = $this->db->query("UPDATE `cek_kelengkapan` SET `status_2`='$status' WHERE no_transaksi='$no_transaksi'");
    }

    private function _uploadImage()
    {
        $config['upload_path']          =  './assets/images/depan';
        $config['allowed_types']        = 'gif|jpg|png|JPG';
        $config['max_size']             = 9048;
        $config['overwrite']            = true;
        $config['file_name']            = $_FILES['filefoto']['name'];
        // 1MB
        // $config['max_width']            = 1024;
		// $config['max_height']           = 768;
		$this->upload->initialize($config);
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('filefoto')) {
            return $this->upload->data("file_name");
        }

        return "camera.jpg";
	}		
	
}
