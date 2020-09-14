<div class="card shadow py-2">
    <div class="card-body">
        
        <form action="<?php echo base_url(); ?>Laporan/exportbukubesar" method="POST" class="row">
            <div class="col-md-2">
                <select class="form-control" name="bulan" id="bulan" required>
                    <option value="01">Januari</option>
                    <option value="02">Februari</option>
                    <option value="03">Maret</option>
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Agustus</option>
                    <option value="09">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
            </div>
            <div class="col-md-2">
                <select class="form-control" name="tahun" id="tahun" required>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2021</option>
                </select>
            </div>
            <input style="margin-right: 10px;" name="submit" type="submit" value="Export" class="btn btn-info" />
            <input style="margin-right: 10px;" name="submit2" type="submit" value="PDF" class="btn btn-info" />
            <a class="btn btn-info" href="<?php echo base_url(); ?>Laporan/laporanpembelian">Reset</a>
        </form>
        <br>
        <div class="table-responsive">
            <table id="userTable" class="table table-striped table-hover table-bordered datatable table-custom">
                <thead>
                    <tr>
                        <td>Kode Transaksi</td>
                        <td>Tipe</td>
                        <td>Tanggal</td>
                        <td>Debit</td>
                        <td>Kredit</td>
                        <td>Saldo</td>
                        <td>Keterangan</td>
                    </tr>
                </thead>

            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        var userDataTable = $('#userTable').DataTable({
            //   'processing': true,
            'serverSide': true,
            'serverMethod': 'post',
            //'searching': false, // Remove default Search Control
            'ajax': {
                'url': '<?= base_url() ?>Laporan/getBukubesar',
                'data': function(data) {
                    data.bulan = $('#bulan').val();
                    data.tahun = $('#tahun').val();
                    // data.searchNama = $('#sel_naama').val();
                    console.log(data);
                }

            },
            'columns': [{
                    data: 'kode_transaksi'
                },
                {
                    data: 'tipe'
                },
                {
                    data: 'tanggal'
                },
                {
                    data: 'debit'
                },
                {
                    data: 'kredit'
                },
                {
                    data: 'saldo'
                },
                {
                    data: 'keterangan'
                }

            ]
        });

        $('#bulan,#sel_nama,#tahun').change(function() {
            userDataTable.draw();
        });
        $('#searchName').keyup(function() {
            userDataTable.draw();
        });
    });
</script>