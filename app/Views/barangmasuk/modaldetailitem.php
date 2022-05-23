<!-- Modal -->
<div class="modal fade" id="modalDetailItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDetailItemTitle">Detail Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Barang</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tbody>
                        <?php 
                                $nomor = 1;
                                foreach($tampildatadetail->getResultArray() as $row) :
                            ?>

                        <tr>
                            <td><?= $nomor++; ?></td>
                            <td><?= $row['detbrgkode']; ?></td>
                            <td><?= $row['brgnama']; ?></td>
                            <td style="text-align: center;"><?= number_format($row['detjml'],0, ",","."); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>