<?php
$this->extend('_layout.php');
$this->section('content');
$modes = [
    'romaji-pick-kana' => 'Pick the Kana',
    'romaji-type-kana' => 'Type the Kana',
    'kana-pick-romaji' => 'Pick Romaji',
    'kana-type-romaji' => 'Type Romaji',
];
?>
<div class="row">
    <div class="col">
        <h1>日本語 (Japanese)</h1>
        <p>Ready!</p>
        <hr>

        <p></p>
    </div>
</div>
<?php $this->endSection(); ?>