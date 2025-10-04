<div class="row">
  <div class="col-md-8">
    <h2><?= htmlspecialchars($product->name) ?></h2>
    <p><?= nl2br(htmlspecialchars($product->description)) ?></p>
  </div>
  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <p class="fw-bold display-6">$<?= number_format($product->price, 2) ?></p>
        <a href="/cart/add/<?= $product->id ?>" class="btn btn-success w-100">Add to Cart</a>
      </div>
    </div>
  </div>
</div>
