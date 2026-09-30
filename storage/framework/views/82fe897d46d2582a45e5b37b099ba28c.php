

<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4">
                <h3 class="fw-bold mb-4">Detail Data Peserta</h3>

                <table class="table table-bordered">
                    <tr>
                        <th width="30%">NIK</th>
                        <td><code><?php echo e($peserta->nik); ?></code></td>
                    </tr>
                    <tr>
                        <th>Nama Lengkap</th>
                        <td class="fw-bold"><?php echo e($peserta->nama_lengkap); ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?php echo e($peserta->email); ?></td>
                    </tr>
                    <tr>
                        <th>Nomor Telepon</th>
                        <td><?php echo e($peserta->telepon); ?></td>
                    </tr>
                    <tr>
                        <th>Skema Sertifikasi</th>
                        <td>
                            <span class="badge bg-info text-dark">
                                <?php echo e($peserta->skema->nama_skema ?? '-'); ?>

                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>Tanggal Dibuat</th>
                        <td><?php echo e($peserta->created_at ? $peserta->created_at->setTimezone('Asia/Jakarta')->format('d-m-Y H:i') : '-'); ?></td>
                    </tr>
                </table>

                <div class="mt-4">
                    <a href="<?php echo e(route('peserta.index')); ?>" class="btn btn-secondary">Kembali</a>
                    <a href="<?php echo e(route('peserta.edit', $peserta->id)); ?>" class="btn btn-warning">Edit Data</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\app-sertifikasi_miko\resources\views/peserta/show.blade.php ENDPATH**/ ?>