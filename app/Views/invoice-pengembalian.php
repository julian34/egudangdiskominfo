<div class="rangkasurat" style="margin-top:100px;">
    <!-- Content here -->
    <br>
    <br>
    <h1 style="text-align:center;">PENGEMBALIAN</h1>
    <p style="font-size:18pt;text-align:right;">INVOICE</p>
    <table cellpadding="0" class="invtabel">
        <tr>
            <th width="25%">No. Invoice</th>
            <th width="75%">: <strong><?php echo $kodeinv; ?></strong></th>
        </tr>
        <tr>
            <th width="25%">Tanggal Penggunaan</th>
            <th width="75%">: <strong><?php echo $hari.', '.date('d M Y',strtotime($tglpinjam)); ?></strong></th>
        </tr>
        <tr>
            <th width="25%">Stakeholder</th>
            <th width="75%">: <strong><?php echo $stakeholder; ?></strong> (<?php echo $jnsstakholder; ?>)</th>
        </tr>
        <tr>
            <th width="25%">Lokasi</th>
            <th width="75%">: <strong><?php echo $lokasi; ?></strong></th>
        </tr>
        <tr>
            <th width="25%">Kegiatan</th>
            <th width="75%">: <?php echo $kegiatan; ?><strong></strong></th>
        </tr>
    </table>
    <p></p>
    <table id="tb-item" cellpadding="4">
        <tr style="background-color:#a9a9a9">
            <th width="80%" style="height: 20px"><strong>Nama Barang</strong></th>
            <th width="12%" style="height: 20px"><strong>Satuan</strong></th>
            <th width="8%" style="height: 20px;text-align:center"><strong>Qty</strong></th>
        </tr>
        <?php 
            $nomor = 1;
            foreach($dataTemp->getResultArray() as $row) :
        ?>
        <tr>
            <td style="height: 20px"><?= $row['brgnama'] ?></td>
            <td style="height: 20px;"><?= $row['satnama'] ?></td>
            <td style="height: 20px;text-align:center"><?= $row['detjml'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <p>&nbsp;</p>
    <table cellpadding="4">
        <tr>
            <td width="40%" style="height: 20px;text-align:center">
                <p>&nbsp;</p>
            </td>
            <td width="60%" style="height: 20px;text-align:center">
                <span style="text-align:center;">Jayapura, <?=date('d - M - Y')?></span><br>
                <span style="text-align:center;">BIDANG TEKNOLOGI INFORMASI DAN KOMUNIKASI</span><br>
                <span style="text-align:center;">Kepala Seksi Multimedia</span>
                <p></p>
                <p></p>
                <p></p>
                <span style="text-align:center;" class="ttdnama"><b><u>M. ANSHAR IRIANTO NATSIR,
                            SE.</u></b></span><br>
                <span style="text-align:center;">NIP. 197110241999031003</span>
            </td>
        </tr>
    </table>
</div>