<h2>Edit Product</h2>
<form method="post" action="">
  <div class="mb-3">
    <label class="form-label">Name</label>
    <input class="form-control" name="name" value="<?= htmlspecialchars($product->name) ?>" required />
  </div>
  <div class="mb-3">
    <label class="form-label">Description</label>
    <textarea class="form-control" name="description" rows="4" required><?= htmlspecialchars($product->description) ?></textarea>
  </div>
  <div class="mb-3">
    <label class="form-label">Price</label>
    <input class="form-control" name="price" type="number" step="0.01" value="<?= number_format($product->price, 2, '.', '') ?>" required />
  </div>
  <button class="btn btn-primary" type="submit">Update</button>
</form>
