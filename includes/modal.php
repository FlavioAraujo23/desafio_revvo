<?php
if (!function_exists('renderModal')) {
    function renderModal($id, $content)
    {
        echo <<<HTML
<div id="$id" class="modal" style="display:none;">
    <div class="modal-content" >
        <span class="close-modal" data-target="$id" >
            &times;
        </span>
        $content
    </div>
</div>
HTML;
    }
}
