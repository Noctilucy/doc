<!-- /.row -->
<div class="row">
    <div class="col-12">
        <div class="card mt-5">
            <div class="card-header">
                <h3 class="card-title">
                    <?= $title; ?>
                </h3>
                
                <div class = "card-tools">
                    <a href="<?= base_url("pembelian"); ?>" class = "btn btn-secondary">Back</a>

                </div>


            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">

                        <div class="form-group">
                            <label for="">Supplier</label>
                            <p><?= $pembelian->nama_supplier; ?></p>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat Supplier</label>
                            <p><?= $pembelian->alamat_supplier; ?></p>
                        </div>
                        <div class="form-group">
                            <label for="">Nomor Telpon Supplier</label>
                            <p><?= $pembelian->telp_supplier; ?></p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Tanggal Transaksi</label>
                            <p><?= $pembelian->tgl_transaksi;?></p>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Jatuh Tempo</label>
                            <p><?= $pembelian->tgl_jatuh_tempo;?></p>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
<!-- /.row -->

<!-- /.row -->
<div class="row">
    <div class="col-12">
        <div class="card mt-1">
            <div class="card-header">
                <h3 class="card-title">
                    Product
                </h3>
                <div>

                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="" method="POST" id = "form_pembayaran">
                        <table  class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Qty</th>
                                    <th>Harga</th>
                                    <th>Diskon (%)</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody id="produk-list">
                                <?php 
                                $total_keseluruhan = 0;
                                foreach($detail_pembelian as $detail){ 
                                    ?>
                                    <tr>
                                        <td><?= $detail->nama_produk; ?></td>
                                        <td><?= $detail->qty; ?></td>
                                        <td><?= rupiah($detail->harga_beli); ?></td>
                                        <td><?= $detail->diskon; ?></td>
                                        <td><?= rupiah($detail->total); ?></td>
                                    </tr>
                                    <?php 
                                       $total_keseluruhan += $detail->total;

                                        }?>
                                    <tr>
                                        <th colspan = "4">Total</th>
                                        <th><?= rupiah($total_keseluruhan); ?></th>
                                    </tr>
                                    <tr>
                                        <th colspan = "4">Total Dibayar</th>
                                        <th><?= rupiah($pembelian->total_pembayaran); ?></th>
                                     </tr>
                                     <tr>
                                        <th colspan = "4">Sisa Tagihan</th>
                                        <th><?= rupiah($total_keseluruhan - $pembelian->total_pembayaran); ?></th>
                                     </tr>
                                     <tr>
                                        <th colspan = "3">Pembayaran</th>
                                        <input type = "hidden" id = "sisa_tagihan" value ="<?= $total_keseluruhan-$pembelian->total_pembayaran; ?>">
                                        <input type="hidden" name = "id_pembelian" value = "<?= $pembelian->id?>">
                                        <th width = "200px"><input type = "number" class = "form-control" id="total_bayar" name = "total_bayar"></th>
                                        <th width = "200px"><input type = "text" class = "form-control" id="sisa" value = "<?= rupiah($total_keseluruhan-$pembelian->total_pembayaran); ?>" readonly></th>
                                     </tr>
                            </tbody>
                        </table>
                        </form>
                    </div>
                    <div class = "col-12">
                        <button type = "button" id = "btn-bayar" class = "btn btn-success float-right">Bayar</button>
                        <a href="<?= base_url("pembelian/faktur/".$pembelian->id);?>" target = "_blank" class = "btn btn-primary float-right mr-3">Print Faktur</a>
                        <a href="<?= base_url("pembelian/suratjalan/".$pembelian->id);?>" target = "_blank" class = "btn btn-primary float-right mr-3">Print Surat Jalan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="card mt-1">
            <div class="card-header">
                <h3 class="card-title">
                    History Pembayaran
                </h3>
                <div>

                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <table  class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Total Bayar</th>
                            </thead>
                                <?php 
                                foreach($history_pembayaran as $pembayaran){ 
                                    ?>
                                    <tr>
                                        <td><?= $pembayaran->tgl_transaksi; ?></td>
                                        <td><?= rupiah($pembayaran->kredit); ?></td>
                                    </tr>
                                    <?php  }?>
                            </tbody>
                        </table>
                    </div> 
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>




<script>
    $(document).ready(function(){
        $("#total_bayar").on("input", validasi); 

        $("#total_bayar").on("input", validasi);
        
        
        function validasi(){
            var nominal_bayar = $("#total_bayar").val(); 
            var sisa_tagihan = $('#sisa_tagihan').val();   
            var sisa_bayar = sisa_tagihan - nominal_bayar;

            if (sisa_bayar < 0){
                alert("Kelebihan Bayar");
                $("#total_bayar").val("")
                $('#sisa').val(sisa_tagihan)
                
            }else if(nominal_bayar <0){
                alert("Invalid Input");
                $("#total_bayar").val("")
                $('#sisa').val(sisa_tagihan) 
            
            }else{
                $('#sisa').val(sisa_bayar);
            }
        };

        $('#btn-bayar').click(function(){
              console.log('test')
            var formData = new FormData($('#form_pembayaran')[0]);
                $.ajax({
                    url:"<?php echo base_url('pembelian/pembayaran'); ?>",
                    type: "POST",
                    cache: false,
                    processData: false,
                    contentType : false,
                    data: formData,
                    dataType: 'json',
                    success: function(result){
                      console.log(result);
                        if(result.status == true){
                          Swal.fire({
                            title: "Success",
                            text: "Pembayaran Diterima",
                            icon: "success",
                            confirmButtonText: "Done",
                            customClass: {
                              confirmButton: "btn btn-primary"
                            }
                          }).then((result)=>{
                            window.location.reload();
                          });
                        }else{
                            Swal.fire({
                            title: "Gagal",
                            text: "Internal Server Error ",
                            icon: "Error",
                            confirmButtonText: "Done",
                            customClass: {
                              confirmButton: "btn btn-primary"
                            }
                          })

                        }
                    },
                    error: function(xhr, status, error){

                    }
                });
            });

    })
    
</script>