<div class="container-fluid">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner mb-3">
            <div class="carousel-item active">
                <img style="height: 250px; border-radius:10px;" src="<?= base_url('assets/img/4.jpg') ?>" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img style="height: 250px; border-radius:10px;" src="<?= base_url('assets/img/5.jpg') ?>" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img style="height: 250px; border-radius:10px;" src="<?= base_url('assets/img/6.jpg') ?>" class="d-block w-100" alt="...">
            </div>
        </div>
    </div>
    <div class="row text-center">
        <?php foreach ($barang as $brg) : ?>
            <div class="card ml-2" style="width: 16rem;">
                <img src="<?= base_url() . 'upload/' . $brg->gambar; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title mb-1"><?= $brg->nama_brg; ?></h5>
                    <small class=""><?= $brg->keterangan; ?></small><br>
                    <span class="badge badge-light mb-3">Rp <?= number_format($brg->harga, 0, ',', '.'); ?></span><br>
                    <?= anchor('dashboard/tambah_ke_keranjang/' . $brg->id_brg, '<div class="btn btn-sm btn-primary">Tambah Keranjang</div>') ?>

                    <?= anchor('dashboard/detail/' . $brg->id_brg, '<div class="btn btn-sm btn-success">Detail</div>') ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>