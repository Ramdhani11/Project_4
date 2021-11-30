<div class="container-fluid">
    <h3><i class="fas fa-edit"></i> EDIT DATA BARANG</h3>

    <?php foreach ($barang as $brg) : ?>
        <form action="<?= base_url() . 'admin/Data_barang/update/' ?>" method="POST">
            <div class="for-group">
                <label for="">Nama Barang</label>
                <input type="text" name="nama_brg" id="" class="form-control" value="<?= $brg->nama_brg ?>">
            </div>
            <div class="for-group">
                <label for="">Keterangan</label>
                <input type="hidden" name="id_brg" id="" class="form-control" value="<?= $brg->id_brg ?>">
                <input type="text" name="keterangan" id="" class="form-control" value="<?= $brg->keterangan ?>">
            </div>
            <div class="for-group">
                <label for="">Kategori</label>
                <input type="text" name="kategori" id="" class="form-control" value="<?= $brg->kategori ?>">
            </div>
            <div class="for-group">
                <label for="">Harga</label>
                <input type="text" name="harga" id="" class="form-control" value="<?= $brg->harga ?>">
            </div>
            <div class="for-group">
                <label for="">Stok</label>
                <input type="text" name="stok" id="" class="form-control" value="<?= $brg->stok ?>">
            </div>
            <div align="right">
                <button type="submit" class="btn btn-primary btn-sm mt-3">Simpan</button>
            </div>
        </form>
    <?php endforeach; ?>
</div>