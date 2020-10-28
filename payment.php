<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Payment</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Payment</li>
            </ol>
          </div>

          <div class="row mb-3">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Penjualan bulan kemarin</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rp 123.000.000</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Penjualan bulan ini</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rp 230.000.00</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                        <span>Dari bulan kemarin</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-shopping-cart fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Penjualan kemarin</div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Rp. 233.000</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Penjualan hari ini</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rp 123.000</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                        <span>Since yesterday</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-8">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Buat Transaksi</h6>
                </div>
                <div class="card-body">
                    <form action="prosses/payment.php" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Pembeli</label>
                            <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pembayaran</label>
                            <select name="metode" class="form-control">
                                <?php
                                    foreach (getBank()['data'] as $item) {
                                        foreach ($item['payment'] as $key) {
                                          ?>
                                          <option class="form-control" value="<?php echo $key['code'] ?>"><?php echo $key['name'] ?></option>
                                          <?php
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email Pembeli</label>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" isi email GILNO kalau tidak ada">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nomor Hp Pembeli</label>
                            <input type="text" class="form-control" name="hp" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="08123xxx">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kode Produk</label>
                            <input type="text" class="form-control" name="kd_produk" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="08123xxx">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Produk</label>
                            <input type="text" class="form-control" name="name_produk" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="08123xxx">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Harga Produk</label>
                            <input type="number" class="form-control" id="harga" name="amount" aria-describedby="emailHelp" placeholder="Harga Produk">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jumlah Produk</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah" aria-describedby="emailHelp" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ongkir</label>
                            <input type="number" onkeypress="myFunction()" class="form-control" id="ongkir" name="ongkir" aria-describedby="emailHelp" placeholder="Ongkir">
                            <small class="text-success">Total yang akan dibayar (Total harga + ongkir + admin) : Rp <span id="total"></span></small>
                        </div>
                        <button type="submit" class="btn btn-primary">Buat Transaksi</button>
                    </form>
                </div>
              </div>
            </div>
          </div>

<script>
function myFunction() {
    var harga =document.getElementById('harga').value;
    var jumlah =document.getElementById('jumlah').value;
    var ongkir =document.getElementById('ongkir').value +"0";
    var total = (harga*jumlah) + +ongkir +4000;
    document.getElementById("total").innerHTML  = total;
}
</script>