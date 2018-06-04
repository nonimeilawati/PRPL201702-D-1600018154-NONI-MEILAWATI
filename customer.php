<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Data Customer</title>

         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" type="text/css" href="side.css">
        
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $( function() {
                from = $( "#from" ).datepicker({
                    dateFormat : 'yy/mm/dd',
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 2
                })
                .on( "change", function() {
                  to.datepicker( "option", "minDate", getDate( this ) );
                }),
                to = $( "#to" ).datepicker({
                    dateFormat : 'yy/mm/dd',
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 2
                })
                .on( "change", function() {
                    from.datepicker( "option", "maxDate", getDate( this ) );
                });
         
                function getDate( element ) {
                var date;
                try {
                    date = $.datepicker.parseDate( dateFormat, element.value );
                } 
                catch( error ) {
                    date = null;
                }
         
                return date;
            }
            });
        </script>

        <!-- jQuery CDN -->
         
         <!-- Bootstrap Js CDN -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
         </script>
    </head>
    <body>
    <?php 
        include 'connect.php'
    ?>
        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>Noni Hotel</h3>
                    <strong>NH</strong>
                </div>

                <ul class="list-unstyled components">
                    <li>
                    </li>
                    <li class="active">
                        <a href="customer.php">
                            <i class="glyphicon glyphicon-user"></i>
                            Customer
                        </a>
                    </li>
                    <li>
                        <a href="#" aria-expanded="false">
                            <i class="glyphicon glyphicon-briefcase"></i>
                            Karyawan
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Page Content Holder -->
            <div id="content">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <span>M E N U</span>
                            </button>
                            <button class="btn btn-info navbar-btn" data-toggle="modal" data-target="#myModal">
                                <i class="glyphicon glyphicon-plus"></i>
                                <span>Tambah Customer</span>
                            </button>
                        </div>
                    </div>
                </nav>

                <h2>Customer</h2>
                <form action="customer-cari.php" method="get">
                    <div class="input-group col-md-5 col-md-offset-7">
                        <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
                        <input type="text" class="form-control" placeholder="Cari Customer..." aria-describedby="basic-addon1" name="cari"> 
                    </div>
                </form>

                <table class="table table-hover">
                    <tr>
                        <th >No. ID</th>
                        <th >Nama</th>
                        <th >Check-in</th>
                        <th >Check-out</th>
                        <th >Durasi</th>
                        <th >Tipe</th>
                        <th >Harga</th>
                        <th >Total</th>
                        <th >Opsi</th>
                    </tr>
                    <?php 
                    if(isset($_GET['cari'])){
                        $cari=mysql_real_escape_string($_GET['cari']);
                        $brg=mysql_query("select * from customer where nama like '$cari' or nik like '$cari'");
                        if($brg === FALSE){
                            die(mysql_error());
                        }
                    }else{
                        $brg=mysql_query("select * from customer");
                        if($brg === FALSE){
                            die(mysql_error());
                        }
                    }
                    $no=1;
                    while($b=mysql_fetch_array($brg)){

                        ?>
                        <tr>
                            <td><?php echo $b['nik'] ?></td>
                            <td><?php echo $b['nama'] ?></td>
                            
                            <td><?php echo $b['checkin'] ?></td>
                            <td><?php echo $b['checkout'] ?></td>
                            <td><?php echo $b['jumlahinap'].' Hari' ?></td>
                            <td><?php echo $b['type_kamar'] ?></td>
                            <td>Rp.<?php echo number_format($b['harga_kamar']) ?>,-</td>
                            <td>Rp.<?php echo number_format($b['total']) ?>,-</td>
                            <td>
                                <a href="customer-detail.php?id_customer=<?php echo $b['id_customer']; ?>" class="btn btn-info">Detail</a>
                                <a href="customer-edit.php?id_customer=<?php echo $b['id_customer']; ?>" class="btn btn-warning">Edit</a>
                                <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='customer-hapus.php?id_customer=<?php echo $b['id_customer']; ?>' }" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>       
                        <?php 
                    }
                    ?>
                </table>

                <!-- Modal Modal Modal Modal Modal Modal Modal Modal Modal Modal Modal Modal Modal Modal Modal Modal Modal Modal  -->

                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">    
                      <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><span class="glyphicon glyphicon-user"></span> Tambah Customer</h4>
                            </div>
                            <div class="modal-body">
                                <form action="customer_simpan.php" method="POST">
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input type="text" name="nik" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Customer</label>
                                        <input type="text" name="nama" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat Customer</label>
                                        <textarea name="alamat" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>No. Telepon</label>
                                        <input type="text" name="noHP" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Check-in</label>
                                        <input type="text" name="checkin" id="from" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Check-out</label>
                                        <input type="text" name="checkout" id="to" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label><br>
                                        <input type="radio" name="jenis_kelamin" value="Laki - laki"> Laki - laki
                                        <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
                                    </div>
                                    <div class="form-group">
                                        <label>Tipe Kamar</label>
                                        <select name="type_kamar" class="form-control">
                                            <option value="Standard">Standard</option>
                                            <option value="VIP">VIP</option>
                                            <option value="VVIP">VVIP</option>
                                            <option value="President">President</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <input type="text" name="harga_kamar" class="form-control">
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

        
    </body>
</html>
