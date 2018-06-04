<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Data Karyawan</title>

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
                                <span>Tambah Karyawan</span>
                            </button>
                        </div>
                    </div>
                </nav>

                <h2>Karyawan</h2>
                <form action="karyawan_cari.php" method="get">
                    <div class="input-group col-md-5 col-md-offset-7">
                        <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
                        <input type="text" class="form-control" placeholder="Cari Karyawan..." aria-describedby="basic-addon1" name="cari"> 
                    </div>
                </form>

                <table class="table table-hover">
                    <tr>
                        <th>No ID</th>
                        <th>Nama Depan</th>
                        <th>Nama Belakang</th>
                        <th>Jabatan</th>
                        <th>Jenis Kelamin</th>
                        <th>No HP</th>
                        <th>Alamat</th>
                        <th>Email</th>
                    </tr>
                    <?php 
                    if(isset($_GET['cari'])){
                        $cari=mysql_real_escape_string($_GET['cari']);
                        $brg=mysql_query("select * from karyawan where nama like '$cari' or nik like '$cari'");
                        if($brg === FALSE){
                            die(mysql_error());
                        }
                    }else{
                        $brg=mysql_query("select * from karyawan");
                        if($brg === FALSE){
                            die(mysql_error());
                        }
                    }
                    $no=1;
                    while($b=mysql_fetch_array($brg)){

                        ?>
                        <tr>
                            <td><?php echo $b['idkaryawan'] ?></td>
                            <td><?php echo $b['namadepan'] ?></td>
                            <td><?php echo $b['namabelakang']?></td>
                            <td><?php echo $b['tgl']?></td>
                            <td><?php echo $b['jabatan']?></td>
                            <td><?php echo $b['jk']?></td>
                            <td><?php echo $b['nohp']?></td>
                            <td><?php echo $b['alamat']?></td>
                            <td><?php echo $b['email']?></td>

                            <td>
                                <a href="karyawan_detail.php?idkaryawan=<?php echo $b['idkaryawan']; ?>" class="btn btn-info">Detail</a>
                                <a href="karyawan_edit.php?idkaryawan=<?php echo $b['idkaryawan']; ?>" class="btn btn-warning">Edit</a>
                                <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='karyawan_hapus.php?idkaryawan=<?php echo $b['idkaryawan']; ?>' }" class="btn btn-danger">Hapus</a>
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
                                <h4 class="modal-title"><span class="glyphicon glyphicon-user"></span> Tambah Karyawan</h4>
                            </div>
                            <div class="modal-body">
                                <form action="simpan_karyawan.php" method="POST">
                                    <div class="form-group">
                                        <label>ID Karyawan</label>
                                        <input type="text" name="idkaryawan" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Depan</label>
                                        <input type="text" name="namadepan" class="form-control">
                                    </div>
                                      <div class="form-group">
                                        <label>Nama Belakang</label>
                                        <input type="text" name="namabelakang" class="form-control">
                                    </div>
                                  
                                    <div class="form-group">
                                        <label>No. Telepon</label>
                                        <input type="text" name="nohp" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="text" name="checkin" id="from" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Check-out</label>
                                        <input type="text" name="checkout" id="to" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label><br>
                                        <input type="radio" name="jk" value="Laki - laki"> Laki - laki
                                        <input type="radio" name="jk" value="Perempuan"> Perempuan
                                    </div>
                                      <div class="form-group">
                                        <label>Alamat Customer</label>
                                        <textarea name="alamat" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <select name="type_kamar" class="form-control">
                                            <option value="Manager">Manager</option>
                                            <option value="Marketing">Marketing</option>
                                            <option value="HRD">HRD</option>
                                            <option value="OB">OB</option>
                                        </select>
                                    </div>
                                     <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" id="to" class="form-control">
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
