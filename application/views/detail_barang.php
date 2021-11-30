<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Detail Produk
        </div>
        <div class="card-body">
            <div class="row">
                <?php foreach ($barang as $brg) : ?>
                    <div class="col-md-4"><img src="<?= base_url() . '/upload/' . $brg->gambar ?>" alt="" style="width: 350px;"></div>
                    <div class="col-md-8">
                        <table class="table">
                            <tr>
                                <td>Nama Produk</td>
                                <td><strong><?= $brg->nama_brg; ?></strong></td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td><strong><?= $brg->keterangan; ?></strong></td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td><strong><?= $brg->kategori; ?></strong></td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td><strong>Rp <?= number_format($brg->harga, 0, ',', '.'); ?></strong> </td>
                            </tr>
                            <tr>
                                <td>Stok</td>
                                <td><strong><?= $brg->stok; ?></strong></td>
                            </tr>
                        </table>
                        <div align="right"><?= anchor('dashboard/tambah_ke_keranjang/' . $brg->id_brg, '<div class="btn btn-sm btn-primary">Tambah Keranjang</div>') ?>
                            <?= anchor('dashboard/', '<div class="btn btn-sm btn-secondary">Kembali</div>') ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>