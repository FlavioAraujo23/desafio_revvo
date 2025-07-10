<?php if (!empty($modalId) && !empty($modalContent)): ?>
    <div id="<?= $modalId ?>" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close-modal" data-target="<?= $modalId ?>">&times;</span>
            <?= $modalContent ?>
        </div>
    </div>
<?php endif; ?>