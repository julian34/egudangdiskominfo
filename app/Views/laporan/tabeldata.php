<?= form_open('lpb/printLap'); ?>
<div class="input-group mb-3">
    <input type="hidden" id='tglawal' name="tglawal">
    <input type="hidden" id='tglakhir' name="tglakhir">
</div>
<?= 
form_submit('submitprint','Print',[
    'class'=>'btn btn-info',
    ]);?>
<?= form_close(); ?>
<br />
<div>
    <table class="table table-striped table-bordered" style="width: 100%;">
        <thead>
            <tr>
                <th style="width: 5%;">No</th>
                <th>Invoice</th>
                <th>Kegiatan</th>
                <th>Tanggal Pemakaian</th>
                <th>Tanggal Pengembalian</th>
                <th>Stakeholder</th>
                <th>Lokasi</th>
                <th>Jumlah Item</th>
            </tr>
        </thead>
        <tbody class="listtddata">
            <?php 
$nomor=1;
// $nomor = 1;
foreach ($tampildata->getResultArray() as $row) :
?>
            <tr>
                <td><?= $nomor++; ?></td>
                <td><?= $row['kkdinv']; ?></td>
                <td><?= $row['kegiatan']; ?></td>
                <td><?= date('d-m-Y',strtotime($row['tglpinjam'])); ?></td>
                <td><?= date('d-m-Y',strtotime($row['tglkembali'])); ?></td>
                <td><?= $row['stakeholder']; ?></td>
                <td><?= $row['lokasi']; ?></td>
                <td>
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
</div>