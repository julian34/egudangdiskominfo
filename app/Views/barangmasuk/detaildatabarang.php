<table class="table table-sm table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $nomor = 1;
            foreach($tampildata->getResultArray() as $row):
        ?>
        <tr>
            <td><?= $nomor++ ?></td>
            <td><?= $row['brgkode'] ?></td>
            <td><?= $row['brgnama'] ?></td>
            <td><?= $row['brgstok'] ?></td>
            <td><button type="button" class="btn btn-sm btn-info"
                    onclick="pilih('<?= $row['brgkode'] ?>')">pilih</button></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script>
function pilih(e) {
    $('#kdbarang').val(e);
    $('#modalcaribarang').on('hidden.bs.modal', function(e) {
        ambildatabarang();
    })
    $('#modalcaribarang').modal('hide');
}
</script>