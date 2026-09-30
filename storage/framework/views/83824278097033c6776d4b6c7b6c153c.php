

<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4">
                <h3 class="fw-bold mb-4">Tambah Skema Sertifikasi Baru</h3>

                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="<?php echo e(route('skema.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3">
                        <label class="form-label">Kode Skema</label>
                        <input type="text" name="kode_skema" class="form-control" value="<?php echo e(old('kode_skema')); ?>" placeholder="Contoh: SKM/JWD/001" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Skema Sertifikasi</label>
                        <input type="text" name="nama_skema" class="form-control" value="<?php echo e(old('nama_skema')); ?>" placeholder="Contoh: Junior Web Developer" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Jenis Skema</label>
                        <select name="jenis" class="form-select" required>
                            <option value="">-- Pilih Jenis Skema --</option>
                            <option value="KKNI" <?php echo e(old('jenis') == 'KKNI' ? 'selected' : ''); ?>>KKNI</option>
                            <option value="Okupasi" <?php echo e(old('jenis') == 'Okupasi' ? 'selected' : ''); ?>>Okupasi</option>
                            <option value="Klaster" <?php echo e(old('jenis') == 'Klaster' ? 'selected' : ''); ?>>Klaster</option>
                        </select>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="<?php echo e(route('skema.index')); ?>" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan Skema</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\app-sertifikasi_miko\resources\views/skema/create.blade.php ENDPATH**/ ?>