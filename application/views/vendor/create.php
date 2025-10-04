<h2>Create Product</h2>
<form method="post" action="/vendor/products/create">
  <div class="mb-3">
    <label class="form-label">Name</label>
    <input class="form-control" name="name" required />
  </div>
  <div class="mb-3">
    <label class="form-label">Description</label>
    <textarea class="form-control" name="description" rows="4" required></textarea>
  </div>
  <div class="mb-3">
    <label class="form-label">Price</label>
    <input class="form-control" name="price" type="number" step="0.01" required />
  </div>
  <button class="btn btn-primary" type="submit">Save</button>
</form>
