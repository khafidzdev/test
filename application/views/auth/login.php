<h2>Login</h2>
<?php if ($this->session->flashdata('error')): ?>
  <div class="alert alert-danger"><?= htmlspecialchars($this->session->flashdata('error')) ?></div>
<?php endif; ?>
<form method="post" action="/login">
  <input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash()?>" />
  <div class="mb-3">
    <label class="form-label">Email</label>
    <input type="email" name="email" class="form-control" required />
  </div>
  <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" name="password" class="form-control" required />
  </div>
  <button class="btn btn-primary" type="submit">Login</button>
</form>
