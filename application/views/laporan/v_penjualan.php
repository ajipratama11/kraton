<div class="card shadow py-2">
    <div class="card-body">
    <!-- <a href="<?php echo base_url()."transaksi/penjualan" ?>" class="btn btn-primary mb-3"> <span class="fa fa-plus-circle"></span> Tambah Pembelian</a> -->
        <div class="table-responsive">
        <?php echo $this->session->flashdata('tambahpenjualan'); ?>
        <?php echo $this->session->flashdata('updatepenjualan'); ?>
            <table class="table table-striped table-hover table-bordered datatable table-custom">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Kode Penjualan</td>
                        <td>Tanggal Penjualan</td>
                        <td>Nama Pembeli</td>
                        <td>Total QTY</td>
                        <td>Total Penjualan</td>
                        <td>Total Bayar</td>
                        <td>Potongan</td>
                        <td>Admin</td>
                        <!-- <td>Option</td> -->
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($penjualan as $g) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $g->kode_penjualan ?></td>
                            <td><?= $g->tanggal_penjualan ?></td>
                            <td><?= $g->nama_pembeli ?></td>
                            <td><?= $g->total_qty ?></td>
                            <td><?= $g->total_penjualan ?></td>
                            <td><?= $g->total_bayar ?></td>
                            <td><?= $g->potongan ?></td>
                            <td><?= $g->username ?></td>
                            <!-- <td>
                                <?php
                                $dropdown['link'] = array(
                                    "Edit" => base_url() ."Transaksi/editpenjualan/".$g->kode_penjualan,
                                    "Delete" => array('confirm', base_url('Transaksi/deletepenjualan/'.$g->kode_penjualan))
                                );
                                $this->load->view("common/dropdown", $dropdown);
                                ?>
                            </td> -->
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- <script type="text/javascript">
        $(document).ready(function() {
            var userDataTable = $('#userTable').DataTable({
                //   'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                //'searching': false, // Remove default Search Control
                'ajax': {
                    'url': '<?= base_url() ?>Laporan/getPenjualan',
                    'data': function(data) {
                        data.tglawal = $('#tglawal').val();
                        data.tglakhir = $('#tglakhir').val();
                        // data.searchNama = $('#sel_naama').val();
                        console.log(data);
                    }

                },
                'columns': [{
                        data: 'kode_penjualan'
                    },
                    {
                        data: 'tanggal_penjualan'
                    },
                    {
                        data: 'nama_pembeli'
                    },
                    {
                        data: 'total_qty'
                    },
                    {
                        data: 'total_penjualan'
                    },
                    {
                        data: 'total_bayar'
                    },
                    {
                        data: 'potongan'
                    },
                    {
                        data: 'username'
                    },
                    {
                        data: 'keterangan'
                    }

                ]
            });

            $('#tglawal,#sel_nama,#tglakhir').change(function() {
                userDataTable.draw();
            });
            $('#searchName').keyup(function() {
                userDataTable.draw();
            });
        });
    </script> -->
