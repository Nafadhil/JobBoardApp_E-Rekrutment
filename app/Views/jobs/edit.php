<?= $this->extend('base') ?>
<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>JOB EDIT</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>JOB EDIT</h4>
                </div>
                <div class="card-body">
                    <div class="card-body table-responsivey">
                        <form method="post" action="<?= base_url(); ?>/job/update/<?= $job['id'] ?>"
                            enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="mb-3">
                                <label for="position" class="form-label">Position</label>
                                <input type="text" class="form-control" id="position" name="position"
                                    value="<?= $job['position'] ?>" style="height: 50px;">
                            </div>
                            <div class="mb-3">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" class="form-control" id="location" name="location"
                                    value="<?= $job['location'] ?>" style="height: 100px; vertical-align: top;">
                            </div>
                            <div class="mb-3">
                                <label for="end_date" class="form-label">End Date</label>
                                <input type="text" class="form-control" id="end_date" name="end_date"
                                    value="<?= $job['end_date'] ?>" style="height: 50px;">
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