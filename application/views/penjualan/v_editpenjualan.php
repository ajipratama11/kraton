<div class="card shadow py-2">
    <div class="card-body">
        <a href="<?php echo base_url() . "transaksi/listpenjualan" ?>" class="btn btn-success mb-3"> <span class="fa fa-arrow-alt-circle-left"></span> List Penjualan</a>
        <hr>
        <form action="<?= base_url('Transaksi/aksieditpenjualan') ?>" method="POST">
            <div class="row">
                <?php foreach ($jual as $g) { ?>
                    <div class="col-md-4">
                        <label for="">Kode Penjualan</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><span class="fa fa-calendar"></span> </span>
                            </div>
                            <input type="text" value="<?= $g->kode_penjualan ?>" readonly name="kode_penjualan" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="">Tanggal</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><span class="fa fa-calendar"></span> </span>
                            </div>
                            <input type="text" value="<?= $g->tanggal_penjualan ?>" name="tanggal_jual" class="form-control datepicker">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="">Nama Pembeli</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><span class="fas fa-address-book"></span> </span>
                            </div>
                            <input type="text" value="<?= $g->nama_pembeli ?>" name="nama_pembeli" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="">Total Penjualan</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><span class="fas fa-address-book"></span> </span>
                            </div>
                            <input type="hidden" value="<?= $g->total_qty ?>" name="total_qty" class="form-control">
                            <input type="number" value="<?= $g->total_penjualan ?>" name="total_penjualan" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="">Total Bayar</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><span class="fas fa-address-book"></span> </span>
                            </div>
                            <input type="number" value="<?= $g->total_bayar ?>" name="total_bayar" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="">Total Potongan</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><span class="fas fa-address-book"></span> </span>
                            </div>
                            <input type="number" value="<?= $g->potongan ?>" name="potongan" class="form-control">
                            <input type="hidden" value="<?= $g->id_admin ?>" name="id_admin" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="">Keterangan</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><span class="fas fa-address-book"></span> </span>
                            </div>
                            <input type="text" value="<?= $g->keterangan ?>" name="keterangan2" class="form-control">
                        </div>
                    </div>
            </div>
        <?php } ?>
        <hr>
        <div class="loop-detail" data-counting='1'>
            <?php
            foreach ($detail as $key  => $data) {
                $key++;
                $start = $key == 1 ? true : false;
                $this->load->view('pembelian/loop-detail', ['start' => $start, 'now' => $key, 'edit' => $data]);
            }

            ?>
        </div>
        <div class="row">
            <div class="col-auto">
                <a href="<?= base_url() . "transaksi/addDetailPenjualan" ?>" class="btn btn-default addDetail"><span class="fa fa-plus"></span> Tambah Item</a>
            </div>
            <div class="col-auto ml-auto">
                <h4 class="total">Total : <span id='total'>0</span> </h4>
            </div>
        </div>
        <hr>
        <div class="mt-3">
            <?php
            $this->load->view('common/btn');
            ?>
        </div>

        </form>
    </div>
</div>