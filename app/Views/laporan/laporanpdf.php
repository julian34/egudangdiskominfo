    <table class="table table-striped table-borderd" style="width: 100%;" cellspacing="0" cellpadding="1" border="1">
        <thead>
            <tr style="background-color:#a9a9a9">
                <th width="8%" style="height: 20px;text-align:center"><strong>No</strong></th>
                <th width="20%" style="height: 20px;text-align:center"><strong>Invoice</strong></th>
                <th width="20%" style="height: 20px;text-align:center"><strong>Kegiatan</strong></th>
                <th width="10%" style="height: 20px;text-align:center"><strong>Tanggal Pinjam</strong></th>
                <th width="10%" style="height: 20px;text-align:center"><strong>Tanggal Kembali</strong></th>
                <th width="12%" style="height: 20px;text-align:center"><strong>Stakeholder</strong></th>
                <th width="12%" style="height: 20px;text-align:center"><strong>Lokasi</strong></th>
                <th width="8%" style="height: 20px;text-align:center"><strong>Jumlah Item</strong></th>
            </tr>
        </thead>
        <tbody class="listtddata">
            <?php 
$nomor=1;
// $nomor = 1;
foreach ($tampildata->getResultArray() as $row) :
?>
            <tr>
                <td width="8%" style="height: 20px;text-align:center"><?= $nomor++; ?></td>
                <td width="20%" style="height: 20px;text-align:center"><?= $row['kkdinv']; ?></td>
                <td width="20%" style="height: 20px;text-align:justify"> <?= $row['kegiatan']; ?></td>
                <td width="10%" style="height: 20px;text-align:center">
                    <?= date('d-m-Y',strtotime($row['tglpinjam'])); ?></td>
                <td width="10%" style="height: 20px;text-align:center">
                    <?= date('d-m-Y',strtotime($row['tglkembali'])); ?></td>
                <td width="12%" style="height: 20px;text-align:justify"><?= $row['stakeholder']; ?></td>
                <td width="12%" style="height: 20px;text-align:justify"><?= $row['lokasi']; ?></td>
                <td width="8%" style="height: 20px;text-align:center">
                    <?php 
        $db = \Config\Database::connect();
        $jmlItem = $db->table('detailpinjambarang')->where('detkodeinv',$row['kkdinv'])->countAllResults();
    ?>
                    <span style="cursor:pointer; font-weight: bold; color:blue"
                        onclick="detailItem('<?= $row['kkdinv']; ?>')"><?= number_format($jmlItem, 0, ",", "."); ?></span>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>