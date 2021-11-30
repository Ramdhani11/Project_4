<div class="container-fluid">
    <h4>Detail Pesanan <div class="btn btn-sm btn-success">No. Invoice <?= $invoice->id; ?></div>
    </h4>

    <table class="table table-bordered table-hover table-striped">
        <tr class="text-center">
            <th>ID BARANG</th>
            <th>NAMA PRODUK</th>
            <TH>JUMLAH PESANAN</TH>
            <TH>HARGA SATUAN</TH>
            <TH>SUB TOTAL</TH>
        </tr>

        <?php
        $total = 0;
        foreach ($pesanan as $psn) : {
                $subtotal = $psn->jumlah * $psn->harga;
                $total += $subtotal;
            }
        ?>

            <tr>
                <td align="center"><?= $psn->id_brg; ?></td>
                <td align="center"><?= $psn->nama_brg; ?></td>
                <td align="center"><?= $psn->jumlah; ?></td>
                <td align="right">Rp <?= number_format($psn->harga, 0, ',', '.'); ?></td>
                <td align="right">Rp <?= number_format($subtotal, 0, ',', '.'); ?></td>
            </tr>


        <?php endforeach; ?>

        <tr>
            <td colspan="4" align="right">Total</td>
            <td align="right">Rp <?= number_format($total, 0, ',', '.'); ?></td>
        </tr>
    </table>

    <a href="<?= base_url('admin/invoices/') ?>">
        <div class="btn btn-sm btn-primary"><i class="fas fa-backward"></i>Kembali</div>
    </a>
</div>