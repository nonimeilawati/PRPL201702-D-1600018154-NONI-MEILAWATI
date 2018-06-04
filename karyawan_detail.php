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
                        <a href="dashboard.php" aria-expanded="false">
                            <i class="glyphicon glyphicon-home"></i>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="customers.php">
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

                <h2><span class="glyphicon glyphicon-user"></span>  Data Karyawan</h2>
                <a class="btn" href="karyawan.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a><br><br>
                <?php
                $id=mysql_real_escape_string($_GET['idkaryawan']);


                $det=mysql_query("select * from karyawan where idkaryawan='$id'")or die(mysql_error());
                while($d=mysql_fetch_array($det)){
                    ?>
                    <a href="cetak.php?idkaryawan=<?php echo $d['idkaryawan']; ?>" class="btn btn-primary pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak Nota</a><br><br>                  
                    <table class="table">
                        <tr>
                            <td width="800">Nama</td>
                            <td><?php echo $d['namadepan'] ?></td>
                        </tr>
                        <tr>
                            <td width="800">Nama</td>
                            <td><?php echo $d['namabelakang'] ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td><?php echo $d['tgl'] ?></td>
                        </tr>

                        <tr>
                            <td>Alamat</td>
                            <td><?php echo $d['alamat'] ?></td>
                        </tr>
                         <tr>
                            <td>Jabatab</td>
                            <td><?php echo $d['jabatan'</td>
                        </tr>
                        <tr>
                            <td>No. Telepon</td>
                            <td><?php echo $d['nohp'] ?></td>
                        </tr>
                    
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td><?php echo $d['jk'] ?></td>
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
