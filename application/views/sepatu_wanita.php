<div class="container-fluid">
    <h3 class="text-center">Sepatu wanita</h3>
    <hr class="hr headerlink">
    <div class="row">
        <?php foreach ($sepatu_wanita as $brg) : ?>
            <div class="card ml-2" style="width: 16rem;">
                <img src="<?= base_url() . 'upload/' . $brg->gambar; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title mb-1"><?= $brg->nama_brg; ?></h5>
                    <small><?= $brg->keterangan; ?></small><br>
                    <span class="badge badge-light mb-3">Rp <?= number_format($brg->harga, 0, ',', '.'); ?></span><br>
                    <?= anchor('dashboard/tambah_ke_keranjang/' . $brg->id_brg, '<div class="btn btn-sm btn-primary">Tambah Keranjang</div>') ?>

                    <?= anchor('dashboard/detail/' . $brg->id_brg, '<div class="btn btn-sm btn-success">Detail</div>') ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>