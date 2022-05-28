<table class="table table-sm table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Invoice</th>
            <th>Tanggal Pengguanan</th>
            <th>Kegiatan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $nomor = 1;
            foreach($tampildata->getResultArray() as $row):

            if($row['status'] != 'kembali'):
        ?>
        <tr>
            <td><?= $nomor++ ?></td>
            <td><?= $row['kodeinv'] ?></td>
            <td><?= $row['tglpinjam'] ?></td>
            <td><?= $row['kegiatan'] ?></td>
            <td><button type="button" class="btn btn-sm btn-info"
                    onclick="pilih('<?= $row['kodeinv'] ?>')">pilih</button></td>
        </tr>
        <?php endif; 
        endforeach; ?>
    </tbody>
</table>
<script>
function pilih(e) {
    $('#kodeinv').val(e);
    $('#modalcariinv').on('hidden.bs.modal', function(e) {
        ambildatabarang();
        dataTemp();
    })
    $('#modalcariinv').modal('hide');
}
</script>