<?php if(!empty($_SESSION['success'])) : ?>
<span class="success-msg mt-10"><?= $_SESSION['success'] ?></span>
<?php unset($_SESSION['success']); ?>
<?php elseif(isset($_SESSION['error'])):?>
<span class="error-msg mt-10"><?= $_SESSION['error'] ?></span>
<?php unset($_SESSION['error']); ?>
<?php endif; ?>