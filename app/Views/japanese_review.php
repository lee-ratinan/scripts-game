<?php
$this->extend('_layout.php');
$this->section('content');
?>
    <style>.hover:hover {background-color: #ccc !important;}</style>
    <div class="row">
        <div class="col">
            <h1>日本語 (Japanese)</h1>
            <p>Review the characters</p>
        </div>
    </div>
    <div class="row text-center">
        <div class="col">
            <h2>ひらがな　と　カタカナ</h2>
            <p>Hiragana and Katakana</p>
            <?php foreach ($characters['hiragana'] as $line => $kanas): ?>
                <div class="row hover">
                    <div class="col-2"><?= $line ?></div>
                    <?php foreach ($kanas as $reading => $kana): ?>
                        <div class="col py-2">
                            <h3><?= $kana ?> / <?= $characters['katakana'][$line][$reading] ?></h3>
                            <b><?= $reading ?></b>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php $this->endSection() ?>