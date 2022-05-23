<table class="table table-sm table-striped table-hover" style="width: 100%;">
    <thead>
        <tr>
            <th style="width: 5%;">No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th style="width: 15%;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $nomor = 1;
            foreach($dataDetail->getResultArray() as $row) :
        ?>

        <tr>
            <td><?= $nomor++; ?></td>
            <td><?= $row['brgkode']; ?></td>
            <td><?= $row['brgnama']; ?></td>
            <td><?= number_format($row['detjml'],0, ",","."); ?></td>
            <td>
                <button type="button" class="btn btn-sm btn-outline-danger"
                    onclick="hapusItem('<?= $row['iddetail']; ?>')">
                    <i class="fa fa-trash-alt"></i>
                </button>
                <button type="button" class="btn btn-sm btn-outline-info"
                    onclick="editItem('<?= $row['iddetail']; ?>')">
                    <i class="fa fa-edit"></i>
                </button>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>