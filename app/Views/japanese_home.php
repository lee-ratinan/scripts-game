<?php
$this->extend('_layout.php');
$this->section('content');
?>
    <div class="row">
        <div class="col">
            <h1>日本語 (Japanese)</h1>
            <p><a href="<?= base_url('japanese/review') ?>">Review the characters</a></p>
            <p>Pick the game:</p>
        </div>
    </div>
<?php
$modes = [
    'romaji-pick-kana' => 'Pick the Kana',
    'romaji-type-kana' => 'Type the Kana',
    'kana-pick-romaji' => 'Pick Romaji',
    'kana-type-romaji' => 'Type Romaji',
];
?>
<?php foreach ($modes as $slug => $name) : ?>
    <div class="row mb-3">
        <div class="col">
            <h2><?= $name ?></h2>
            <div class="row">
                <div class="col-4">
                    <a class="btn btn-outline-danger w-100" href="<?= base_url('japanese/entry/' . $slug . '/hiragana') ?>">
                        <h3>ひらがな</h3>
                    </a>
                </div>
                <div class="col-4">
                    <a class="btn btn-outline-danger w-100" href="<?= base_url('japanese/entry/' . $slug . '/katakana') ?>">
                        <h3>カタカナ</h3>
                    </a>
                </div>
                <?php if (in_array($slug, ['kana-pick-romaji', 'kana-type-romaji'])) : ?>
                <div class="col-4">
                    <a class="btn btn-outline-danger w-100" href="<?= base_url('japanese/entry/' . $slug . '/all') ?>">
                        <h3>ひ・カ</h3>
                    </a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?php $this->endSection(); ?>