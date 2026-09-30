

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Data Skema Sertifikasi</h2>
    <a href="<?php echo e(route('skema.create')); ?>" class="btn btn-primary"><i class="fas fa-plus me-1"></i> Tambah Skema</a>
</div>

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Kode Skema</th>
                        <th>Nama Skema</th>
                        <th>Jenis</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $skemas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $skema): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($skemas->firstItem() + $index); ?></td>
                        <td><span class="badge bg-secondary"><?php echo e($skema->kode_skema); ?></span></td>
                        <td><?php echo e($skema->nama_skema); ?></td>
                        <td><?php echo e($skema->jenis); ?></td>
                        <td class="text-center">
                            <form action="<?php echo e(route('skema.destroy', $skema->id)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <a href="<?php echo e(route('skema.edit', $skema->id)); ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus skema ini?')"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="text-center text-muted py-3">Belum ada data skema sertifikasi.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php echo e($skemas->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\app-sertifikasi_miko\resources\views/skema/index.blade.php ENDPATH**/ ?>