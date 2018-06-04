<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Adminsitrator</title>

         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" type="text/css" href="side.css">
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
                    <li class="active">
                    </li>
                    <li>
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
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
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
                    <a href="cetak.php?id_customer=<?php echo $d['id_customer']; ?>" class="btn btn-primary pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak Nota</a><br><br>                  
                    <table class="table">
                        <tr>
                            <td width="800">Nama</td>
                            <td><?php echo $d['nama'] ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><?php echo $d['alamat'] ?></td>
                        </tr>
                        <tr>
                            <td>No. Telepon</td>
                            <td><?php echo $d['noHP'] ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Check-in</td>
                            <td><?php echo $d['checkin'] ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Check-Out</td>
                            <td><?php echo $d['checkout'] ?></td>
                        </tr>
                        <tr>
                            <td>Waktu Inap</td>
                            <td><?php echo $d['jumlahinap'] ?> Hari</td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td><?php echo $d['jenis_kelamin'] ?></td>
                        </tr>
                        <tr>
                            <td>Tipe Kamar</td>
                            <td><?php echo $d['type_kamar'] ?></td>
                        </tr>
                        <tr>
                            <td>Harga Kamar Per Malam</td>
                            <td>Rp.<?php echo number_format($d['harga_kamar']); ?>,-</td>
                        </tr>
                        <tr>
                            <td>Total Harga</td>
                            <td>Rp.<?php echo number_format($d['total']) ?>,-</td>
                        </tr>
                    </table>
                    <?php 
                }
                ?>
                
            </div>
        </div>





        <!-- jQuery CDN -->
         <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
         </script>
    </body>
</html>
