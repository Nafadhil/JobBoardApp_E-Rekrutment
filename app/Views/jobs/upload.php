<?= $this->extend('base') ?>
<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>NEW JOB</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>NEW JOB</h4>
                </div>
                <div class="card-body">
                    <div class="card-body table-responsivey">
                        <?php if (!empty(session()->getFlashdata('error'))): ?>
                            <div class="alert alert-danger" role="alert">
                                <h4>Periksa Entrian Form</h4>
                                </hr />
                                <?php echo session()->getFlashdata('error'); ?>
                            </div>
                        <?php endif; ?>
                        <form method="post" action="<?= base_url(); ?>/job/save" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="mb-3">
                                <label for="position" class="form-label">Position</label>
                                <input type="text" class="form-control" id="position" name="position"
                                    value="<?= old('position'); ?>" style="height: 50px;">
                            </div>
                            <div class="mb-3">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" class="form-control" id="location" name="location"
                                    value="<?= old('location'); ?>" style="height: 100px; vertical-align: top;">
                            </div>
                            <div class="mb-3">
                                <label for="created_date" class="form-label">Created Date</label>
                                <textarea class="form-control" id="created_date"
                                    name="created_date"><?= old('created_date'); ?></textarea>
                            </div>
                            <div class="mb-3">
                                <input type="submit" class="btn btn-info" value="Upload" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>
</section>
</div>
<?= $this->endSection() ?>