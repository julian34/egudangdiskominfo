<!-- Modal -->
<div class="modal fade" id="modalcariinv" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Silahkan Cari Data Invoice</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Silakan Cari Barang Bedasakan Kode/Kegiatan"
                        aria-label="" aria-describedby="basic-addon2" id="cari">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="tmbCariInv">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <div class="row viewdetaildata"></div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#tmbCariInv').click(function(e) {
        e.preventDefault();
        cariDataPinInv();
    });

    $('#cari').keydown(function(e) {
        if (e.keyCode == '13') {
            e.preventDefault();
            cariDataPinInv();
        }
    });
});
</script>