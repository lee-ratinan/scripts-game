<?php
$this->extend('_layout.php');
$this->section('content')
?>
    <div class="row">
        <div class="col">
            <h1>Welcome to the Scripts Game</h1>
            <p>This game will help you learn and memorize scripts of various languages.</p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-outline-danger w-100" href="<?= base_url('japanese') ?>">
                <div class="display-1">🇯🇵</div>
                <h2>日本語</h2>
                <h3>Japanese</h3>
            </a>
        </div>
        <div class="col">
            <a class="btn btn-outline-danger w-100 disabled" href="<?= base_url('shavian') ?>" aria-disabled="true">
                <div class="display-1">🇬🇧</div>
                <h2>Shavian Alphabet</h2>
                <h3>(coming soon)</h3>
            </a>
        </div>
    </div>
<?php $this->endSection() ?>