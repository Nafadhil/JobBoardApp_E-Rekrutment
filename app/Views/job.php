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
                    <a href="<?= base_url(); ?>/job/upload" class="btn btn-primary">Add</a>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-striped table-md">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <th>Position</th>
                                <th>Location</th>
                                <th>End Date</th>
                                <th>Action User</th>
                                <th>Action Admin</th>
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
                                    <td><a href="/apply/<?= $j['id'] ?>" class="badge badge-success">Apply</a></td>
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