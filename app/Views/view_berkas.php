<?= $this->extend('base') ?>
<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Blank Page</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">

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
                                <th>Name</th>
                                <th>Position</th>
                                <th>CV</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            $i = 1;
                            foreach ($berkas as $row):
                                ?>
                                <tr>
                                    <td>
                                        <?= $i++; ?>
                                    </td>
                                    <td>
                                        <?= $row->name; ?>
                                    </td>
                                    <td>
                                        <?= $row->position; ?>
                                    </td>
                                    <td><a class="btn btn-info"
                                            href="<?= base_url(); ?>/berkas/download/<?= $row->id; ?>">Download</a></td>
                                    <td>
                                        <form action="/userdata/<?= $row->id ?>" method="post"
                                            onsubmit="return confirm(`Are you sure?`)">
                                            <input type="hidden" name="_method" value="delete" />
                                            <button type="submit" style="width: 40px;" class="btn btn-danger btn-sm"><i
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
            <?= $pager->links('userdata', 'custom_pagination') ?>
        </div>
</div>
</div>
</div>
</section>
</div>
<?= $this->endSection() ?>