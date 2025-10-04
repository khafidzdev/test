<h2>All Products</h2>
<div class="row">
  <?php foreach ($products as $p): ?>
    <div class="col-6 col-md-3 mb-3">
      <div class="card h-100">
        <div class="card-body">
          <h5 class="card-title"><?= htmlspecialchars($p->name) ?></h5>
          <p class="card-text"><?= nl2br(htmlspecialchars(substr($p->description, 0, 80))) ?></p>
          <p class="fw-bold">$<?= number_format($p->price, 2) ?></p>
          <a href="/product/<?= $p->id ?>" class="btn btn-primary btn-sm">View</a>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>
