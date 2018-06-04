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
                        <a href="dashboard.php" aria-expanded="false">
                            <i class="glyphicon glyphicon-home"></i>
                            Home
                        </a>
                    </li>
                    <li class="active">
                        <a href="customer.php">
                            <i class="glyphicon glyphicon-user"></i>
                            Customer
                        </a>
                    </li>
                    <li>
                        <a href="#" aria-expanded="false">
                            <i class="glyphicon glyphicon-duplicate"></i>
                            Pages
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-link"></i>
                            Portfolio
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-paperclip"></i>
                            FAQ
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-send"></i>
                            Contact
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

                <h2><span class="glyphicon glyphicon-user"></span>  Data Customer</h2>
                <a class="btn" href="customer.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a><br><br>
                <?php
                $id=mysql_real_escape_string($_GET['id_customer']);
                $det=mysql_query("select * from customer where id_customer='$id'")or die(mysql_error());
                while($d=mysql_fetch_array($det)){
                ?>                  
                    <form action="customer-update.php" method="post">
                        <table class="table">
                            <tr>
                                <td width="600"></td>
                                <td><input type="hidden" name="id_customer" value="<?php echo $d['id_customer'] ?>"></td>
                            </tr>
                            <tr>
                                <td>No. Identitas</td>
                                <td><input type="text" class="form-control" name="nik" value="<?php echo $d['nik'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Nama Customer</td>
                                <td><input type="text" class="form-control" name="nama" value="<?php echo $d['nama'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td><textarea class="form-control" name="alamat"></textarea></td>
                            </tr>
                            <tr>
                                <td>No. Telepon</td>
                                <td><input type="text" class="form-control" name="noHP" value="<?php echo $d['noHP'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Tanggal Check-in</td>
                                <td><input type="text" class="form-control" id="from" name="checkin" value="<?php echo $d['checkin'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Tanggal Check-out</td>
                                <td><input type="text" class="form-control" id="to" name="checkout" value="<?php echo $d['checkout'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td><input type="radio" name="jenis_kelamin" value="Laki - Laki">&nbsp;&nbsp;&nbsp;Laki Laki
                                <input type="radio" name="jenis_kelamin" value="Perempuan">&nbsp;&nbsp;&nbsp;Perempuan</td>
                            </tr>
                            <tr>
                                <td>Tipe Kamar</td>
                                <td><select name="type_kamar" class="form-control">
                                        <option value="Standard">Standard</option>
                                        <option value="VIP">VIP</option>
                                        <option value="VVIP">VVIP</option>
                                        <option value="President">President</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Harga Kamar</td>
                                <td><input type="text" class="form-control" name="harga_kamar" value="<?php echo $d['harga_kamar'] ?>"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" class="btn btn-info" value="Simpan"></td>
                            </tr>
                        </table>
                    </form>
                    <?php 
                }
                ?>
                
            </div>
        </div>

        
    </body>
</html>
