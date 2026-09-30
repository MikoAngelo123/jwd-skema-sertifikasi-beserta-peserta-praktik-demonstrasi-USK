

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Data Peserta Sertifikasi</h2>
    <a href="<?php echo e(route('peserta.create')); ?>" class="btn btn-primary"><i class="fas fa-plus me-1"></i> Tambah Peserta</a>
</div>

<div class="card border-0 shadow-sm rounded-4 mb-4">
    <div class="card-body">
        <form action="<?php echo e(route('peserta.index')); ?>" method="GET" class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan NAMA atau NIK peserta..." value="<?php echo e($search ?? ''); ?>">
            <button class="btn btn-dark" type="submit"><i class="fas fa-search me-1"></i> Cari</button>
            <?php if(isset($search)): ?>
                <a href="<?php echo e(route('peserta.index')); ?>" class="btn btn-outline-secondary">Reset</a>
            <?php endif; ?>
        </form>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama Lengkap</th>
                        <th>Email / Telepon</th>
                        <th>Skema Sertifikasi</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $pesertas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $peserta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($pesertas->firstItem() + $index); ?></td>
                        <td><code><?php echo e($peserta->nik); ?></code></td>
                        <td class="fw-bold"><?php echo e($peserta->nama_lengkap); ?></td>
                        <td>
                            <small class="d-block text-muted"><i class="fas fa-envelope me-1"></i><?php echo e($peserta->email); ?></small>
                            <small class="d-block text-muted"><i class="fas fa-phone me-1"></i><?php echo e($peserta->telepon); ?></small>
                        </td>
                        <td><span class="badge bg-info text-dark"><?php echo e($peserta->skema->nama_skema ?? '-'); ?></span></td>
                        <td class="text-center">
                            
                            <a href="<?php echo e(route('peserta.show', $peserta->id)); ?>" class="btn btn-info btn-sm text-white"><i class="fas fa-eye"></i></a>
                            
                            
                            <a href="<?php echo e(route('peserta.edit', $peserta->id)); ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                            
                            
                            <form action="<?php echo e(route('peserta.destroy', $peserta->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Hapus data peserta ini?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="text-center text-muted py-3">Data peserta tidak ditemukan.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php echo e($pesertas->withQueryString()->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\app-sertifikasi_miko\resources\views/peserta/index.blade.php ENDPATH**/ ?>