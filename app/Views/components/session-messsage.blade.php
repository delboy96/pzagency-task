<?php if(!empty($_SESSION['message'])) : ?>
<span class="success-msg mt-10"><?= $_SESSION['message'] ?></span>
    <?php unset($_SESSION['message']); ?>
<?php endif; ?>