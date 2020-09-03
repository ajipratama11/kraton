<div class="card shadow py-2">
    <div class="card-body">
        <a href="<?php echo base_url()."pages/form_tambahbarang" ?>" class="btn btn-primary mb-3"> <span class="fa fa-plus-circle"></span> Tambah Barang</a>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered datatable table-custom">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>ID Barang</td>
                        <td>Nama Barang</td>
                        <td>Kategori</td>
                        <td>Harga Beli</td>
                        <td>Harga Jual</td>
                        <td>Keterangan</td>
                        <td>Option</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;
                    foreach($barang as $g) { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $g->id_barang ?></td>
                        <td><?= $g->nama_barang ?></td>
                        <td><?= $g->nama_kategori ?></td>
                        <td><?= $g->harga_beli ?></td>
                        <td><?= $g->harga_jual ?></td>
                        <td><?= $g->keterangan ?></td>
                        <td>
                            <?php 
                                $dropdown['link'] = array(
                                    "Edit" => base_url(),
                                    "Detail" => base_url(),
                                    "Delete" => array(base_url()) 
                                );
                                $this->load->view("common/dropdown", $dropdown);
                            ?>
                        </td>
                    </tr>
                            <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
