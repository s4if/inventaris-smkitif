<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Halaman Peminjaman</title>

    <!-- Bootstrap core CSS -->
	<link href="<?=base_url();?>/css/bootstrap.min.css" rel="stylesheet">
    <style>

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      body {
	    padding-top: 5rem;
	  }
	  .starter-template {
	    padding: 3rem 1.5rem;
	    text-align: center;
	  }
    </style>
  </head>
  <body>
    
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="#">Inventaris SMKITIF</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Laman Pinjam <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url();?>/admin/beranda">Admin Area</a>
      </li>
      <li class="nav-item my-2 my-lg-0">
        <a class="nav-link" href="<?=base_url();?>/logout">Logout: <?=$username;?></a>
      </li>
    </ul>
  </div>
</nav>

<main role="main" class="container">

  <div class="row">
  	<div class="col-12">
	  <h1 class="text-center">Halaman Peminjaman Barang</h1>
	</div>
  </div>
  <div class="row">
  	<p class="col-12">TODO: Tanggal Waktu Javascript disini</p>
  </div>
  <div class="row">
  	<div class="col-12">
  		<table id="tabel_utama" class="table table-striped">
  			<thead class="thead-dark">
  				<tr>
  					<th>No</th> <!-- nomor peminjaman -->
  					<th>Nama Barang</th>
  					<th>Kode Barang</th>
  					<th>Peminjam</th>
  					<th>Kelas</th>
  					<th>Waktu Pinjam</th>
  					<th>Waktu Kembali</th>
  					<th>Status Peminjaman</th>
  					<th>Pengawas</th>
  					<th>Aksi</th>
  				</tr>
  			</thead>	
  			<tbody></tbody>
  		</table>
  	</div>
  </div>

</main><!-- /.container -->
      	
    <script src="<?=base_url();?>/js/jquery.min.js"></script>  
    <script src="<?=base_url();?>/js/bootstrap.bundle.min.js"></script>  
    <script src="<?=base_url();?>/js/datatables.min.js"></script>
    <script type="text/javascript">
$(document).ready(function() {
    var tabel = $('#tabel_utama').DataTable({
    	"scrollX": true,

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": '<?=base_url()?>/api/load_peminjaman',
            "type": "GET"
        },
        "columns": [
            { "data": "id_pinjam" },
            { "data": "nama_barang" },
            { "data": "kode_barang" },
            { "data": "nama_peminjam" },
            { "data": "kelas" },
            { "data": "waktu_pinjam" },
            { "data": "waktu_kembali" },
            { "data": "status_pinjam" },
            { "data": "nama_pengawas" },
            { "data": "aksi" }
        ]
    });

});
    </script>
  </body>
</html>
