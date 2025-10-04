<h2>Your Cart</h2>
<?php $cart = $this->cart->contents(); ?>
<?php if (empty($cart)): ?>
  <div class="alert alert-info">Cart is empty.</div>
<?php else: ?>
  <table class="table">
    <thead><tr><th>Product</th><th>Qty</th><th>Price</th><th>Total</th><th></th></tr></thead>
    <tbody>
    <?php foreach ($cart as $row): ?>
      <tr>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= (int)$row['qty'] ?></td>
        <td>$<?= number_format($row['price'], 2) ?></td>
        <td>$<?= number_format($row['subtotal'], 2) ?></td>
        <td><a class="btn btn-sm btn-danger" href="/cart/remove/<?= urlencode($row['rowid']) ?>">Remove</a></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
  <div class="text-end">
    <a class="btn btn-primary" href="/checkout">Checkout</a>
  </div>
<?php endif; ?>
