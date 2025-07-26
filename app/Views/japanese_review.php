<?php
$this->extend('_layout.php');
$this->section('content');
?>
    <style>
        .hover:hover {background-color: #ccc !important;}
        .round-border {border: 1px #888 solid; border-radius: 8px;}
    </style>
    <div class="row">
        <div class="col">
            <h1>日本語 (Japanese)</h1>
            <p>Review the characters | <a href="<?= base_url('japanese') ?>">Back</a></p>
        </div>
    </div>
    <div class="row text-center">
        <div class="col">
            <h2>ひらがな　と　カタカナ</h2>
            <p>Hiragana and Katakana</p>
            <?php foreach ($characters['hiragana'] as $line => $kanas): ?>
                <div class="row hover">
                    <div class="col-2 py-2">
                        <div class="round-border m-2">
                            <h3><?= $line ?></h3>&nbsp;
                        </div>
                    </div>
                    <?php foreach ($kanas as $reading => $kana): ?>
                        <?php
                        $class = '';
                        if (in_array($reading, ['shi', 'chi', 'tsu', 'fu', 'ji', 'zu'])) {
                            $class = 'bg-danger bg-opacity-50';
                        }
                        ?>
                        <div class="col-2 py-2">
                            <div class="round-border m-2 <?= $class ?>">
                                <h3><?= $kana ?> / <?= $characters['katakana'][$line][$reading] ?></h3>
                                <b><?= $reading ?></b>
                            </div>
                        </div>
                        <?php if (in_array($reading, ['ya', 'yu', 'kya', 'kyu', 'sha', 'shu', 'cha', 'chu',
                                                      'nya', 'nyu', 'hya', 'hyu', 'mya', 'myu', 'rya', 'ryu', 'gya', 'gyu',
                                                      'ja', 'ju', 'bya', 'byu', 'pya', 'pyu'])) : ?>
                            <div class="col-2 py-2">&nbsp;</div>
                        <?php elseif ('wa' == $reading) : ?>
                            <div class="col-6 py-2">&nbsp;</div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php $this->endSection() ?>