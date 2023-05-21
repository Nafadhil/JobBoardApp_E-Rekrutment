<?= $this->extend('base') ?>
<?= $this->section('content') ?>
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>

    <div class="section-body">
      <div class="row justify-content-center">
        <!-- Menambahkan class justify-content-center untuk mengatur card berada di tengah -->
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1 text-center">
            <!-- Menambahkan class mx-auto untuk mengatur card berada di tengah -->
            <div class="card-icon bg-primary">
              <i class="far fa-user" style="margin-top: 30px;"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Job</h4>
              </div>
              <div class="card-body">
                <?php echo $jumlah; ?>
              </div>
            </div>
          </div>
        </div>
        <?php if (session()->get('role') == 1) { ?>
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1 text-center">
              <!-- Menambahkan class mx-auto untuk mengatur card berada di tengah -->
              <div class="card-icon bg-danger">
                <i class="far fa-newspaper" style="margin-top: 30px;"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Job Applicant</h4>
                </div>
                <div class="card-body">
                  <?php echo $jumlah2; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
</section>
<?= $this->endSection() ?>