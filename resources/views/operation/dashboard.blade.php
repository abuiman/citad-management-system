@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Operation Dashboard</h1>
@stop

@section('content')
    <p>Welcome .</p>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
               <img src="vendor/adminlte/dist/img/9mobile.jpg" alt="logo">
                <p>9Mobile Voucher</p>

                 <div class="">Total Voucher: <?php if(isset($etiVatRes['num'])){ echo $etiVatRes['num'];}else{ echo " 0 ";} ?></div>
                 <div class="">Amount: ₦ <?php if(isset($etiVatRes['conversion'])){ echo number_format($etiVatRes['conversion'],2);}else{ echo " 0 ";} ?></div>
                 <div class="">VAT: ₦ <?php if(isset($etiVatRes['vat'])){ echo number_format($etiVatRes['vat'],2);}else{ echo " 0 ";} ?></div>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <img src="vendor/adminlte/dist/img/glo.jpg" alt="logo">
                <p>Glo Voucher</p>
                <div class="">Total Voucher: <?php if(isset($gloVatCountRes['num'])){ echo $gloVatCountRes['num'];}else{ echo " 0 ";} ?></div>
                <div class="">Amount: ₦ <?php if(isset($gloVatCountRes['conversion'])){ echo number_format($gloVatCountRes['conversion'],2);}else{ echo " 0 ";} ?></div>
                 <div class="">VAT: ₦ <?php if(isset($gloVatCountRes['vat'])){ echo number_format($gloVatCountRes['vat'],2);}else{ echo " 0 ";} ?></div>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
              <img src="vendor/adminlte/dist/img/mtn.jpg" alt="logo">

                <p>MTN Voucher</p>
                <div class="">Total Voucher: <?php if(isset($mtnVatCountRes['num'])){ echo $mtnVatCountRes['num'];}else{ echo " 0 ";} ?></div>
                <div class="">Amount: ₦ <?php if(isset($mtnVatCountRes['conversion'])){ echo number_format($mtnVatCountRes['conversion'],2);}else{ echo " 0 ";} ?></div>
                 <div class="">VAT: ₦ <?php if(isset($mtnVatCountRes['vat'])){ echo number_format($mtnVatCountRes['vat'],2);}else{ echo " 0 ";} ?></div>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ route( 'mtn-dashboard' ) }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <img src="vendor/adminlte/dist/img/airtel.jpg" alt="logo">

                <p>Airtel Voucher</p>
                <div class="">Total Voucher: <?php if(isset($zainVatCountRes['num'])){ echo $zainVatCountRes['num'];}else{ echo " 0 ";} ?></div>
                <div class="">Amount: ₦ <?php if(isset($zainVatCountRes['conversion'])){ echo number_format($zainVatCountRes['conversion'],2);}else{ echo " 0 ";} ?></div>
                 <div class="">VAT: ₦ <?php if(isset($zainVatCountRes['vat'])){ echo number_format($zainVatCountRes['vat'],2);}else{ echo " 0 ";} ?></div>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        
        <!-- ROW 2       -->

<!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-default">
              <div class="inner">
               <img src="vendor/adminlte/dist/img/icons.png" alt="logo">
                <p>Interconnet Clearing House</p>

              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <div class="btn-group">
                       <button type="button" class="btn btn-default btn-flat btn-block">Load House <i class="fa fa-arrow-right"></i> </button>
                       <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                         <span class="sr-only">Toggle Dropdown</span>
                       </button>
                         <ul class="dropdown-menu pull-right" role="menu">
                             <li>
                             <a href="#billyronk"><button type="button" class="btn btn-flat btn-block btn-danger" > BILLY RONKS <i class="fa fa-home"></i></button></a>
                               
                             </li>
                             <li>
                             <a href="#"><button type="button" class="btn btn-flat btn-block btn-info" > INBIL <i class="fa fa-home"></i></button></a>
                             </li>
                             <li>
                             <a href="routelink"><button type="button" class="btn btn-flat btn-block btn-info" > ROUTER LINK <i class="fa fa-home"></i></button></a>
                             </li>
                         </ul>
              </div>
              <!--<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>-->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <img src="vendor/adminlte/dist/img/ntel.jpg" alt="logo">
                <p>NTEL</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="ntel-voucher-details" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!--div class="col-lg-3 col-6">
            <!-- small box -->
            <!--div class="small-box bg-yellow">
              <div class="inner">
              <img src="../img/mtn.jpg" alt="logo">

                <p>MTN Dashboard</p>
                
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="mtn_dashboard" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!--div class="col-lg-3 col-6">
            <!-- small box -->
            <!--div class="small-box bg-danger">
              <div class="inner">
                <img src="../img/airtel.jpg" alt="logo">

                <p>Airtel Dashboard</p>
                
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="zain_dashboard" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

<!--END OF ROW 2-->

      </div>
    </section>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
