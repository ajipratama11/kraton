<div class="card shadow py-2">
    <div class="card-body">
    <a href="<?php echo base_url()."pages/table" ?>" class="btn btn-success mb-3"> <span class="fa fa-arrow-alt-circle-left"></span> Back to table</a>
    <hr>
        <form action="<?= base_url('Pages/tmbah_barang'); ?>" method="POST" enctype="multipart/form-data">
        <?php $yahoo = md5(uniqid(rand(), true)) ?>
            <label>Nama Barang</label>
            <input name="id_barang" type="hidden" value="<?= $yahoo ?>" placeholder="Nama Barang" class="form-control">
            <input name="nama_barang" type="text" placeholder="Nama Barang" class="form-control">
            <br>
            <label>Kategori Barang</label>
            <select name="id_kategori" id="" class="form-control select2">
                <option value="1">ATK</option>
                <option value="2">Makanan</option>
                <option value="3">Minuman</option>
            </select>
            <br>
            <br>
            <label>Harga Beli</label>
            <input name="harga_beli" type="number" placeholder="Harga Beli" class="form-control">
            <br>
            <label>Harga Jual</label>
            <input name="harga_jual" type="number" placeholder="Harga Jual" class="form-control">
            <br>
            <label>Upload File</label>
            <div class="custom-file">
                <input name="gambar" type="file" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
            <br>
            <br>
            <label>Keterangan</label>
            <textarea name="keterangan"  cols="30" rows="5" class="form-control"></textarea>
            <br>
            <?php 
                $this->load->view("common/btn");
            ?>
        </form>
    </div>
</div>
