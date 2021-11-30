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
                        <div align="right">
                            <?= anchor('admin/Data_barang/edit/' . $brg->id_brg, '<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>'); ?>
                            <?= anchor('admin/Data_barang/hapus/' . $brg->id_brg, '<div class=" btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>'); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>