<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8  text-center ">
            <div class="btn btn-sm btn-success">
                <?php
                $grand_total = 0;
                if ($keranjang = $this->cart->contents()) {
                    foreach ($keranjang as $item) {
                        $grand_total = $grand_total + $item['subtotal'];
                    }
                    echo "<h3>Total Belanja Anda: Rp " . number_format($grand_total, 0, ',', '.');

                ?>
            </div><br><br>
            <h3 class="text-center">Input Alamat Pengiriman dan pembayaran</h3>
            <form action="<?= base_url() ?>Dashboard/proses_pesanan" method="POST">
                <div class="from-group text-left mb-2">
                    <label for="">Nama Lengkap</label>
                    <input type="text" name="nama" id="" placeholder="Masukkan Nama" class="form-control">
                </div>
                <div class="from-group text-left  mb-2">
                    <label for="">Alamat Lengkap</label>
                    <input type="text" name="alamat" id="" placeholder="Masukkan Alamat" class="form-control">
                </div>
                <div class="from-group text-left  mb-2">
                    <label for="">No Telpon</label>
                    <input type="tel" name="nhp" id="" placeholder="Masukkan Nomer" class="form-control">
                </div>
                <div class="from-group text-left  mb-2">
                    <label for="">Jasa Pengiriman</label>
                    <select class="form-control">
                        <option value="JNE">JNE</option>
                        <option value="J&T">J&T</option>
                        <option value="Sicepat">Sicepat </option>
                    </select>
                </div>
                <div class="from-group text-left  mb-4">
                    <label for="">Pilh BANK</label>
                    <select class="form-control">
                        <option value="BCA">BCA</option>
                        <option value="BRI">BRI</option>
                        <option value="MANDIRI">MANDIRI </option>
                    </select>
                </div>
                <button class="btn btn-sm btn-primary mb-3" type="submit">
                    Pesan
                </button>
            </form>
        <?php
                } else {
                    echo "<h5>Keranjang Anda Masih Kosong";
                }
        ?>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>