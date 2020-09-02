<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="<?php echo base_url()."assets/" ?>css/sb-admin-2.min.css" rel="stylesheet" />
    <link href="<?php echo base_url()."assets/" ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()."assets/" ?>vendor/owl-carousel/owl.carousel.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()."assets/" ?>vendor/owl-carousel/owl.theme.default.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()."assets/" ?>css/frontend.css" rel="stylesheet" />
    <title>SINTAK JTI - Sistem Informasi Tugas Akhir</title>
</head>
<body>
<div class="loading">
    <div>
        <img src="<?php echo base_url()."assets/img/loading.gif" ?>" alt="">
        <p>Loading....</p>
    </div>
</div>
<div class="search-modal">
    <span class="fa fa-times close"></span>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 p-5 box-modal">
                <h5> <span class="fa fa-search"></span> Pencarian</h5>
                <form action="" id="filterSearch" data-topik="">
                    <input type="text" name="key" class="form-control" placeholder="Masukkan topik atau judul">
                    <button class="btn btn-primary btn-block py-3" type="submit">Cari</button>
                </form>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-md navbar-top fixed-top py-3">
  <!-- Brand -->
    <div class="container custom">
  <a class="navbar-brand font-weight-bold" href="#">SINTAK JTI</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="fa fa-bars"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link scrollTop" data-target="#topik" href="#"><span class="fa fa-code"></span> Topik Tugas Akhir</a>
      </li>
      <li class="nav-item">
        <a class="nav-link scrollTop" data-target="#referensi" href="#"><span class="fa fa-info"></span> Referensi</a>
      </li>
      <li class="nav-item">
        <a class="nav-link search" href="#"><span class="fa fa-search"></span> </a>
      </li>
      <li class="nav-item">
        <a class="nav-link nav-btn" href="<?php echo base_url()."login" ?>"><span class="fa fa-user"></span> Login Mahasiswa</a>
      </li>
    </ul>
    </div>
  </div>
</nav>
<div class="banner">
    <div class="container custom">
        <div class="row">
            <div class="col-md-6">
                <div class="text-header">
                   Sistem Informasi Tugas Akhir
                   <br>
                   SINTAK
                </div>
                <div class="text-body mb-4">
                    Jurusan Teknologi Informasi Politeknik Negeri Jember
                </div>
                <div class="btn-banner">
                    <a href="<?php echo base_url()."login/mahasiswa" ?>" class="btn-blue"> <span class="fa fa-user"></span> Login Mahasiswa</a>
                    <a href="" class="btn-white search"> <span class="fa fa-search"></span> Pencarian</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container custom">
    <div class="row" id="topik">
        <div class="col-md-12">
            <h3 class="label">Cari Berdasarkan Topik</h3>
        </div>
    </div>
    <div class="row mt-4 mb-5">
    <?php 
        if(count($topik)==0){
    ?>
        <div class="col text-center">
            <h1 class="null">Data Kosong</h1>
        </div>
    <?php
        }
    ?>
    <div class="col-md-12 owl-carousel img-topik">
        <?php 
            foreach ($topik as $key => $value) {
        ?>
        <div class="item">
            <div class="box">
                <div class="box-wrapper">
                    <span class="<?php echo $value->icon ?>"></span>
                    <h5 class="label mt-3"><?php echo $value->Topik ?></h5>
                </div>
                <a href="" data-topik="<?php echo $value->idTopik ?>" class="filter-topik">Cari topik ini</a>
            </div>
        </div>
        <?php } ?>
    </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h3 class="label">Tugas Akhir</h3>
        </div>
        <div class="col-md-6">
            <form action="<?php echo base_url()."index.php/welcome/filter" ?>" id="filterTA" data-topik="">
            <div class="input-group mb-3">
                <select name="id_prodi" id="" class="form-control">
                    <option value="">---Semua Prodi---</option>
                    <?php 
                        foreach ($prodi as $key => $value) {
                            echo "<option value='".$value->idProdi."'>".$value->Nama_prodi."</option>";
                        }
                        ?>
                </select>
                <select name="id_topik" id="" class="form-control">
                    <option value="">---Semua Topik---</option>
                    <?php 
                        foreach ($topik as $key => $value) {
                            echo "<option value='".$value->idTopik."'>".$value->Topik."</option>";
                        }
                        ?>
                </select>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit"> <span class="fa fa-filter"></span> Filter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row mb-5 mt-3" id="referensi">
        <div class="col-md-12 alert-null">
            <div class="text-center">
                <h1 class="null" id="null-ta"><?php echo count($ta)==0 ? "Data Kosong" : "" ?></h1>
            </div>
            <div class="box-list">
            <div class="table-responsive">
                <table class="table table-hover table-striped" id="tableTA">
                    <tbody>
                    <?php 
                    $no = 1;
                        foreach ($ta as $key => $value) {
                    ?>
                        <tr>
                            <td><?php echo $no ?></td>
                            <td>
                                <h6 class="ls-5 color-blue font-weight-bold">
                                <?php echo $value->Judul_TA ?>
                                </h6>    
                                <p class="text-color ls-5">
                                    <?php echo $value->Deskripsi ?>
                                </p>
                                <p class="label"> <span class="<?php echo $value->icon ?>"></span> <?php echo $value->topik ?>
                                    <a href=""class="float-right color-green mr-3"><?php echo $value->nama_mhs ?></a> 
                                </p>
                            </td>
                        </tr>
                    <?php $no++; } ?>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
    <div class="row my-4">
        <div class="col-md-12">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Prev</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>            
        </div>
    </div>
    <div class="row my-5">
        <div class="col copyright">
            Copyright 2020 - SINTAK
        </div>
    </div>
</div>
<br>
<br>
<script src="<?php echo base_url()."assets/" ?>vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url()."assets/" ?>vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()."assets/" ?>vendor/owl-carousel/owl.carousel.min.js"></script>
<script src="<?php echo base_url()."assets/" ?>js/frontend.js"></script>
</body>
</html>