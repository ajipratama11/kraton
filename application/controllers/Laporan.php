<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->icon = "fa-desktop";
        $this->load->model('Excel_import_model');
        $this->load->model('M_pembelian');
        $this->load->model('M_penjualan');
        $this->load->model('M_laporan');
        $this->load->library('Excel');
        if ($this->session->userdata('status') != "login") {
            echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '" . base_url('Login') . "';
            </script>"; //Url Logi
        }
    }

    function index()
    {
        $this->load->view('excel_import');
    }
    public function laporanpembelian()
    {

        $param['pageInfo'] = "List Pembelian";
        $this->template->load("laporan/v_pembelian", $param);
    }
    public function laporanpenjualan()
    {

        $param['pageInfo'] = "List Penjualan";
        $this->template->load("laporan/v_penjualan", $param);
    }
    public function laporanbukubesar()
    {

        $param['pageInfo'] = "List Buku Besar";
        $this->template->load("laporan/v_bukubesar", $param);
    }
    public function laporanlabarugi()
    {

        $param['pageInfo'] = "List Buku Besar";
        $this->template->load("laporan/v_labarugi", $param);
    }

    public function getpembelian()
    {
        // POST data
        $postData = $this->input->post();
        // Get data
        $data = $this->M_laporan->getPembelian($postData);

        echo json_encode($data);
    }
    public function getpenjualan()
    {
        // POST data
        $postData = $this->input->post();
        // Get data
        $data = $this->M_laporan->getPenjualan($postData);

        echo json_encode($data);
    }
    public function getbukubesar()
    {
        // POST data
        $postData = $this->input->post();
        // Get data
        $data = $this->M_laporan->getBukubesar($postData);

        echo json_encode($data);
    }
    public function getlabarugi()
    {
        // POST data
        $postData = $this->input->post();
        // Get data
        $data = $this->M_laporan->getLabarugi($postData)[0];

        header('content-type:json/application');
        echo json_encode($data);
    }


    public function export()
    {
        $tglawal = $this->input->post('tanggal_awal');
        $tglakhir = $this->input->post('tanggal_akhir');
        if ($this->input->post('submit')) {
            if ($tglawal == null || $tglakhir == null) {
                $data['beli'] = $this->db->query("SELECT * FROM pembelian JOIN `admin` ON `admin`.id_admin=pembelian.id_admin ")->result();
            } else {
                $data['beli'] = $this->db->query("SELECT * FROM pembelian JOIN `admin` ON `admin`.id_admin=pembelian.id_admin WHERE pembelian.tanggal_pembelian BETWEEN	'$tglawal' AND '$tglakhir'")->result();
            }


            // require(APPPATH. 'libraries/PHPExcel.php');
            require(APPPATH . 'libraries/PHPExcel/Writer/Excel2007.php');

            $object = new PHPExcel();

            $object->getProperties()->setCreator("Kelompok 70 PKL TKWU");
            $object->getProperties()->setLastModifiedBy("AJI PRATAMA");
            $object->getProperties()->setTitle("Laporan Pembelian");

            $object->setActiveSheetIndex(0);

            $object->getActiveSheet()->setCellValue('A1', 'Laporan Pembelian');
            $object->getActiveSheet()->setCellValue('A2', 'No');
            $object->getActiveSheet()->setCellValue('B2', 'Kode Pembelian');
            $object->getActiveSheet()->setCellValue('C2', 'Tanggal Pembelian');
            $object->getActiveSheet()->setCellValue('D2', 'Total');
            $object->getActiveSheet()->setCellValue('E2', 'Admin');
            $object->getActiveSheet()->setCellValue('F2', 'Keterangan');

            $baris = 3;
            $no = 1;
            $totalvalue = 0;
            foreach ($data['beli'] as $value) {
                $totalvalue += $value->total;
            }
            foreach ($data['beli'] as $beli) {
                $object->getActiveSheet()->setCellValue('A' . $baris, $no++);
                $object->getActiveSheet()->setCellValue('B' . $baris, $beli->kode_pembelian);
                $object->getActiveSheet()->setCellValue('C' . $baris, $beli->tanggal_pembelian);
                $object->getActiveSheet()->setCellValue('D' . $baris, $beli->total);
                $object->getActiveSheet()->setCellValue('E' . $baris, $beli->username);
                $object->getActiveSheet()->setCellValue('F' . $baris, $beli->keterangan);
                $baris++;
            }
            $object->getActiveSheet()->setCellValue('A' . $baris, 'Total');
            $object->getActiveSheet()->setCellValue('D' . $baris, $totalvalue);


            $filename = "Laporan Pembelian" . '.xlsx';
            $object->getActiveSheet()->setTitle("Data Gtk");

            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . '"');
            header('Cache-Control: max-age=0');

            $writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
            $writer->save('php://output');

            exit;
        } else if ($this->input->post('submit2')) {

            if ($tglawal == null || $tglakhir == null) {
                $param['pageInfo'] = "List Pembelian";
                $param['pembelian'] =  $this->db->query("SELECT * FROM pembelian JOIN `admin` ON `admin`.id_admin=pembelian.id_admin")->result();
                $this->load->view("print/pembelian", $param);
            } else {

                $param['pageInfo'] = "List Pembelian";
                $param['pembelian'] =  $this->db->query("SELECT * FROM pembelian JOIN `admin` ON `admin`.id_admin=pembelian.id_admin WHERE pembelian.tanggal_pembelian BETWEEN	'$tglawal' AND '$tglakhir'")->result();
                $this->load->view("print/pembelian", $param);
            }
        }
    }
    public function exportpenjualan()
    {
        $tglawal = $this->input->post('tanggal_awal');
        $tglakhir = $this->input->post('tanggal_akhir');
        if ($this->input->post('submit')) {
            if ($tglawal == null || $tglakhir == null) {
                $data['jual'] = $this->db->query("SELECT * FROM penjualan JOIN `admin` ON `admin`.id_admin=penjualan.id_admin ")->result();
            } else {
                $data['jual'] = $this->db->query("SELECT * FROM penjualan JOIN `admin` ON `admin`.id_admin=penjualan.id_admin WHERE penjualan.tanggal_penjualan BETWEEN	'$tglawal' AND '$tglakhir'")->result();
            }
            // require(APPPATH. 'libraries/PHPExcel.php');
            require(APPPATH . 'libraries/PHPExcel/Writer/Excel2007.php');

            $object = new PHPExcel();

            $object->getProperties()->setCreator("Kelompok 70 PKL TKWU");
            $object->getProperties()->setLastModifiedBy("AJI PRATAMA");
            $object->getProperties()->setTitle("Laporan Penjualan");

            $object->setActiveSheetIndex(0);

            $object->getActiveSheet()->setCellValue('A1', 'Laporan Penjualan Tanggal' . $tglawal . ' - ' . $tglakhir);
            $object->getActiveSheet()->setCellValue('A2', 'No');
            $object->getActiveSheet()->setCellValue('B2', 'Kode Penjualan');
            $object->getActiveSheet()->setCellValue('C2', 'Tanggal Penjualan');
            $object->getActiveSheet()->setCellValue('D2', 'Nama Pembeli');
            $object->getActiveSheet()->setCellValue('E2', 'Total QTY');
            $object->getActiveSheet()->setCellValue('F2', 'Total Penjualan');
            $object->getActiveSheet()->setCellValue('G2', 'Total Bayar');
            $object->getActiveSheet()->setCellValue('H2', 'Potongan');
            $object->getActiveSheet()->setCellValue('I2', 'Admin');
            $object->getActiveSheet()->setCellValue('J2', 'Keterangan');

            $baris = 3;
            $no = 1;
            $qty = 0;
            $penjualan = 0;
            $bayar = 0;
            foreach ($data['jual'] as $value) {
                $qty += $value->total_qty;
                $penjualan += $value->total_penjualan;
                $bayar += $value->total_bayar;
            }
            foreach ($data['jual'] as $jual) {
                $object->getActiveSheet()->setCellValue('A' . $baris, $no++);
                $object->getActiveSheet()->setCellValue('B' . $baris, $jual->kode_penjualan);
                $object->getActiveSheet()->setCellValue('C' . $baris, $jual->tanggal_penjualan);
                $object->getActiveSheet()->setCellValue('D' . $baris, $jual->nama_pembeli);
                $object->getActiveSheet()->setCellValue('E' . $baris, $jual->total_qty);
                $object->getActiveSheet()->setCellValue('F' . $baris, $jual->total_penjualan);
                $object->getActiveSheet()->setCellValue('G' . $baris, $jual->total_bayar);
                $object->getActiveSheet()->setCellValue('H' . $baris, $jual->potongan);
                $object->getActiveSheet()->setCellValue('I' . $baris, $jual->username);
                $object->getActiveSheet()->setCellValue('J' . $baris, $jual->keterangan);
                $baris++;
            }
            $object->getActiveSheet()->setCellValue('A' . $baris, 'Total');
            $object->getActiveSheet()->setCellValue('E' . $baris, $qty);
            $object->getActiveSheet()->setCellValue('F' . $baris, $penjualan);
            $object->getActiveSheet()->setCellValue('G' . $baris, $bayar);


            $filename = "Laporan Penjualan" . '.xlsx';
            $object->getActiveSheet()->setTitle("Laporan Penjualan");

            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . '"');
            header('Cache-Control: max-age=0');

            $writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
            $writer->save('php://output');

            exit;
        } else if ($this->input->post('submit2')) {

            if ($tglawal == null || $tglakhir == null) {
                $param['pageInfo'] = "List Penjualan";
                $param['penjualan'] =  $this->db->query("SELECT * FROM penjualan JOIN `admin` ON `admin`.id_admin=penjualan.id_admin ")->result();
                $this->load->view("print/penjualan", $param);
            } else {
                $param['pageInfo'] = "List Penjualan";
                $param['penjualan'] =  $this->db->query("SELECT * FROM penjualan JOIN `admin` ON `admin`.id_admin=penjualan.id_admin WHERE penjualan.tanggal_penjualan BETWEEN	'$tglawal' AND '$tglakhir'")->result();
                $this->load->view("print/penjualan", $param);
            }
        }
    }
    public function exportbukubesar()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $tanggal = $tahun . '-' . $bulan . '-01';
        $records = $this->db->query("SELECT * FROM buku_besar WHERE YEAR(tanggal)='$tahun' AND MONTH(tanggal)='$bulan' ORDER BY id_bukubesar")->result();

        $this->db->select('SUM(buku_besar.nominal) as total');
        $this->db->where('jenis', 'kredit');
        $this->db->where('tanggal <', $tanggal);
        $totalKredit  = $this->db->get('buku_besar')->result();

        $this->db->select('SUM(buku_besar.nominal) as total');

        $this->db->where('jenis', 'debit');
        $this->db->where('tanggal <', $tanggal);
        $totalDebit  = $this->db->get('buku_besar')->result();
        if ($this->input->post('submit')) {


            // require(APPPATH. 'libraries/PHPExcel.php');
            require(APPPATH . 'libraries/PHPExcel/Writer/Excel2007.php');

            $object = new PHPExcel();

            $object->getProperties()->setCreator("Kelompok 70 PKL TKWU");
            $object->getProperties()->setLastModifiedBy("AJI PRATAMA");
            $object->getProperties()->setTitle("Laporan Penjualan");

            $object->setActiveSheetIndex(0);

            $object->getActiveSheet()->setCellValue('A1', 'Buku Besar Tahun ' . $tahun . ' Bulan ' . $bulan);
            $object->getActiveSheet()->setCellValue('A2', 'No');
            $object->getActiveSheet()->setCellValue('B2', 'Kode Transaksi');
            $object->getActiveSheet()->setCellValue('C2', 'Tipe');
            $object->getActiveSheet()->setCellValue('D2', 'Tanggal');
            $object->getActiveSheet()->setCellValue('E2', 'Debit');
            $object->getActiveSheet()->setCellValue('F2', 'Kredit');
            $object->getActiveSheet()->setCellValue('G2', 'Saldo');
            $object->getActiveSheet()->setCellValue('H2', 'Keterangan');

            $baris = 4;
            $no = 1;
            $saldoAwal = $totalDebit[0]->total - $totalKredit[0]->total;
            
            $object->getActiveSheet()->setCellValue('A3', $no++);
            $object->getActiveSheet()->setCellValue('B3', 'Saldo Awal');
            $object->getActiveSheet()->setCellValue('C3', 'Saldo Awal');
            $object->getActiveSheet()->setCellValue('D3', $tanggal);
            $object->getActiveSheet()->setCellValue('E3', $totalDebit[0]->total);
            $object->getActiveSheet()->setCellValue('F3', $totalKredit[0]->total);
            $object->getActiveSheet()->setCellValue('G3', $saldoAwal);
            $object->getActiveSheet()->setCellValue('H3', '-');

            $debit = '';
            $kredit = '';
            foreach ($records as $key => $record) {
                if ($key == 0) {
                    $saldoTerakhir = $saldoAwal;
                } else {
                    $saldoTerakhir = $records[$key - 1]->saldoSekarang;
                }
                if ($record->jenis == 'debit') {
                    $saldoSekarang = $saldoTerakhir + $record->nominal;
                } else {
                    $saldoSekarang = $saldoTerakhir - $record->nominal;
                }
                $records[$key]->saldoSekarang = $saldoSekarang;
    
                if ($record->jenis == 'debit') {
                    $debit = $record->nominal;
                } else {
                    $debit = '-';
                }
                if ($record->jenis == 'kredit') {
                    $kredit = $record->nominal;
                } else {
                    $kredit = '-';
                }
                $object->getActiveSheet()->setCellValue('A' . $baris, $no++);
                $object->getActiveSheet()->setCellValue('B' . $baris, $record->kode_transaksi);
                $object->getActiveSheet()->setCellValue('C' . $baris, $record->tipe);
                $object->getActiveSheet()->setCellValue('D' . $baris, $record->tanggal);
                $object->getActiveSheet()->setCellValue('E' . $baris, $debit);
                $object->getActiveSheet()->setCellValue('F' . $baris, $kredit);
                $object->getActiveSheet()->setCellValue('G' . $baris, $saldoSekarang);
                $object->getActiveSheet()->setCellValue('H' . $baris, $record->keterangan);
                $baris++;
            }


            $filename = "Laporan Buku Besar ".$tahun."-".$bulan . '.xlsx';
            $object->getActiveSheet()->setTitle("Laporan Penjualan");

            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . '"');
            header('Cache-Control: max-age=0');

            $writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
            $writer->save('php://output');

            exit;
        } else if ($this->input->post('submit2')) {

                $param['pageInfo'] = "List Buku Besar";
                $param['totalDebit'] = $totalDebit;
                $param['totalKredit'] = $totalKredit;
                $param['tanggal'] = $tanggal;
                $param['records'] =  $this->db->query("SELECT * FROM buku_besar WHERE YEAR(tanggal)='$tahun' AND MONTH(tanggal)='$bulan' ORDER BY id_bukubesar")->result();
                $this->load->view("print/bukubesar", $param);
            
        }
    }
}
