<div id="tsa-snackbar">
    
    <?php if(isset($_SESSION['toast']['msg'])) : ?>

        <div id="snack" class="snack <?php echo $_SESSION['toast']['type']; ?>">

            <div class="snack-content">

                <div class="snack-header">

                    <?php if($_SESSION['toast']['type'] === "main") : ?>

                    <i class="fas fa-bell fa-lg snack-ico"></i>

                    <strong><?php echo WEBSITE_NAME; ?></strong>

                    <?php elseif($_SESSION['toast']['type'] === "success") : ?>

                    <i class="fas fa-check fa-lg snack-ico"></i>

                    <strong>Félicitations</strong>

                    <?php elseif($_SESSION['toast']['type'] === "warning") : ?>

                    <i class="fas fa-exclamation-triangle fa-lg snack-ico"></i>

                    <strong>Attention</strong>

                    <?php elseif($_SESSION['toast']['type'] === "danger") : ?>

                    <i class="fas fa-skull-crossbones fa-lg snack-ico"></i>

                    <strong>Erreur</strong>

                    <?php else: ?>

                    <i class="fas fa-info fa-lg snack-ico"></i>

                    <strong>Information</strong>

                    <?php endif; ?>

                    <button type="button" class="ml-2 close"><span aria-hidden="true">&times;</span></button>

                </div>

                <div class="snack-body"><?php echo $_SESSION['toast']['msg']; ?></div>

            </div>

        </div>

        <?php $_SESSION['toast'] = []; ?>

    <?php endif; ?>
        
</div>
