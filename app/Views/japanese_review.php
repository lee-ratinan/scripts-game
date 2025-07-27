<?php
$this->extend('_layout.php');
$this->section('content');
?>
    <style>
        td { width: 20%; }
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
            <table class="table table-sm table-hover table-striped table-bordered">
                <?php foreach ($characters['hiragana'] as $line => $kanas): ?>
                <tr>
                    <?php foreach ($kanas as $reading => $kana): ?>
                        <td <?= (in_array($reading, ['shi', 'chi', 'tsu', 'fu', 'ji', 'zu']) ? 'class="bg-danger bg-opacity-50"' : '') ?>>
                            <b><?= $kana ?> &nbsp; &middot; &nbsp; <?= $characters['katakana'][$line][$reading] ?></b><br>
                            <b><?= $reading ?></b>
                        </td>
                        <?php if (in_array($reading, ['ya', 'yu', 'kya', 'kyu', 'sha', 'shu', 'cha', 'chu',
                                                      'nya', 'nyu', 'hya', 'hyu', 'mya', 'myu', 'rya', 'ryu', 'gya', 'gyu',
                                                      'ja', 'ju', 'bya', 'byu', 'pya', 'pyu'])) : ?>
                            <td class="bg-secondary bg-opacity-50">&nbsp;</td>
                        <?php elseif ('wa' == $reading) : ?>
                            <td class="bg-secondary bg-opacity-50" colspan="3">&nbsp;</td>
                        <?php elseif ('n' == $reading) : ?>
                            <td class="bg-secondary bg-opacity-50" colspan="4">&nbsp;</td>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
<?php $this->endSection() ?>