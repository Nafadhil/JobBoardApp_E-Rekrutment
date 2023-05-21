<?= $this->extend('base') ?>
<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Job List</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <?php if (session()->get('role') == 1) { ?>
                        <a href="<?= base_url(); ?>/job/upload" class="btn btn-primary">Add</a>
                    <?php } ?>
                </div>
                <div class="card-body table-responsive">
                    <?php if (!empty(session()->getFlashdata('success'))): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo session()->getFlashdata('success'); ?>
                        </div>
                    <?php endif; ?>
                    <table class="table table-striped table-md">
                        <tbody>
                            <tr>
                                <th>No</th>
                                <th>Position</th>
                                <th>Location</th>
                                <th>Created Date</th>
                                <?php if (session()->get('role') == 2) { ?>
                                    <th>Action</th>
                                <?php } ?>
                                <?php if (session()->get('role') == 1) { ?>
                                    <th>Action</th>
                                <?php } ?>
                            </tr>
                            <?php
                            $i = 1;
                            foreach ($job as $j):
                                ?>
                                <tr>
                                    <td>
                                        <?= $i++; ?>
                                    </td>
                                    <td>
                                        <?= $j['position']; ?>
                                    </td>
                                    <td>
                                        <?= $j['location']; ?>
                                    </td>
                                    <td>
                                        <?= $j['end_date']; ?>
                                    </td>
                                    <?php if (session()->get('role') == 2) { ?>
                                        <td><a href="/apply/<?= $j['id'] ?>" class="badge badge-success">Apply</a></td>
                                    <?php } ?>
                                    <?php if (session()->get('role') == 1) { ?>
                                        <td>
                                            <a href="/job/<?= $j['id'] ?>/edit" class="btn btn-warning btn-sm"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                            <form action="/job/<?= $j['id'] ?>" method="post" class="d-inline"
                                                onsubmit="return confirm(`Are you sure?`)">
                                                <input type="hidden" name="_method" value="delete" />
                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    <?php } ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12">
            <?= $pager->links('jobs', 'custom_pagination') ?>
        </div>
</div>
</div>
</div>
</section>
</div>
<?= $this->endSection() ?>