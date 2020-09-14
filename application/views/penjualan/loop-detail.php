<div class="row detail-field mb-3" data-id='<?= $now; ?>'>
    <?php
    $value = array(
        'kode_barang' => '',
        'qty' => '',
        'harga_satuan' => '',
        'keterangan' => '',
        'subtotal' => ''
    );
    if (isset($edit)) {
        $value = $edit;
        $value['subtotal'] = $value['qty'] * $value['harga_satuan'];
    }
    ?>

    <div class="col-md-3">
        <?php
        if (isset($edit)) {
            echo "<input type='hidden' name='id_detail[]' value='$value[id_detail]'";
        }
        ?>
        <label for="">Kode Barang</label>
        <select name="kode_barang[]" class="form-control select2 setHarga" data-target="#harga<?= $now ?>" id="">
            <option value="">---Pilih Barang---</option>
            <?php $sql = $this->db->query("SELECT * FROM barang")->result();
            foreach ($sql as $s) {
                $selected = '';
                if ($value['kode_barang'] != '') {
                    $selected = $value['kode_barang'] == $s->kode_barang ? 'selected' : '';
                }
            ?>
                <option data-idr='<?= $s->harga_jual ?>' value="<?= $s->kode_barang ?>" <?= $selected ?>><?= $s->nama_barang ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="col-md-1">
        <label for="">QTY</label>
        <input type="number" name='qty[]' class="form-control qtyHarga" value='<?= $value['qty'] ?>' id='qty<?= $now ?>' data-parent='#harga<?= $now ?>' data-subtotal='#subtotal<?= $now ?>'>
    </div>
    <div class="col-md-2">
        <label for="">Harga Satuan</label>
        <input type="number" name='harga_satuan[]' class="form-control qtyHarga" id='harga<?= $now ?>' data-parent='#qty<?= $now ?>' data-subtotal='#subtotal<?= $now ?>' value="<?= $value['harga_satuan'] ?>" readonly>
    </div>
    <div class="col-md-2">
        <label for="">Keterangan</label>
        <input type="text" name='keterangan[]' class="form-control" value='<?= $value['keterangan'] ?>'>
    </div>
    <div class="col-md-<?= isset($start) ? '4' : '3' ?>">
        <label for="">Subtotal</label>
        <input type="text" name='subtotal[]' class="form-control subtotal" id='subtotal<?= $now ?>' value='<?= $value['subtotal'] ?>' readonly>
    </div>
    <?php
    if (empty($start)) {
    ?>
        <div class="col-md-1">
            <br>
            <a href="" data-target='<?= $now; ?>' class="btn btn-danger mt-2 removeField">Hapus</a>
        </div>
    <?php } ?>
</div>