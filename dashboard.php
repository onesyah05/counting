<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo rupiah($con->getPenjualan()['bKemarin']) ?></div>
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
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo rupiah($con->getPenjualan()['bIni']) ?></div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <?php 
                        $bStat = upDown($con->getPenjualan()['bKemarin'],$con->getPenjualan()['bIni']);
                          if($bStat['status']=='naik'){
                            ?>
                            <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> <?php echo $bStat['pesren'] ?>%</span>
                            <span>Dari bulan kemarin</span>
                            <?php
                          }else{
                            ?>
                            <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> <?php echo $bStat['pesren'] ?>%</span>
                            <span>Dari bulan kemarin</span>
                            <?php
                          }
                        ?>
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
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo rupiah($con->getPenjualan()['hKemarin']) ?></div>
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
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo rupiah($con->getPenjualan()['hIni']) ?></div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                      <?php 
                        $bStat = upDown($con->getPenjualan()['hKemarin'],$con->getPenjualan()['hIni']);
                          if($bStat['status']=='naik'){
                            ?>
                            <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> <?php echo $bStat['pesren'] ?>%</span>
                            <span>Dari bulan kemarin</span>
                            <?php
                          }else{
                            ?>
                            <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> <?php echo $bStat['pesren'] ?>%</span>
                            <span>Dari bulan kemarin</span>
                            <?php
                          }
                        ?>
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
                  <h6 class="m-0 font-weight-bold text-primary">Weekly Recap Report</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                      aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <!-- Invoice Example -->
            <div class="col-xl-12 col-lg-7 mb-4">
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Invoice</h6>
                  <a class="m-0 float-right btn btn-danger btn-sm" href="#">View More <i
                      class="fas fa-chevron-right"></i></a>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Kode Pembayaran</th>
                        <th>Harga Tanpa Fee</th>
                        <th>Tagihan</th>
                        <th>Waktu Expierd</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>

                    <?php
                      foreach ($con->getTrxUnpaid() as $item) {
                        ?>
                        <tr>
                        <td><a href="#"><?php echo $item['reference'] ?></a></td>
                        <td><?php echo $item['customer_name'] ?></td>
                        <td><?php echo $item['pay_code'] ?></td>
                        <td style="text-align:right"><?php echo rupiah($item['amount_received']) ?></td>
                        <td style="text-align:right"><?php echo rupiah($item['amount']) ?></td>
                        <td>
                        <?php if(date('d-m-Y H:i:s',$item['expired_time']) < date('d-m-Y H:i:s')){
                          ?>
                          <span class="badge badge-danger"><?php echo date('d-m-Y H:i:s',$item['expired_time'])?></span>
                        <?php
                        }else{
                          ?>
                            <span class="badge badge-success"><?php echo date('d-m-Y H:i:s',$item['expired_time'])?></span>
                          <?php
                        } ?></td>
                        <td><?php echo $item['insert_at'] ?></td>
                        <td><?php if($item['status'] == "UNPAID"){
                          ?>
                          <span class="badge badge-danger"><?php echo $item['status'] ?></span>
                        <?php
                        }else{
                          ?>
                            <span class="badge badge-success"><?php echo $item['status'] ?></span>
                          <?php
                        } ?></td>
                      </tr>
                        <?php
                      }
                    ?>
                      
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>