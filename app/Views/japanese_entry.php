<?php
$this->extend('_layout.php');
$this->section('content');
$rules = [
    'romaji-pick-kana' => 'Pick the Kana<br>Read the Romaji on the screen and pick the right (kana) as fast as possible.',
    'romaji-type-kana' => 'Type the Kana<br>Read the Romaji on the screen and type the right (kana) as fast as possible.',
    'kana-pick-romaji' => 'Read it right<br>Read the (kana) on the screen and pick the right Romaji as fast as possible.',
    'kana-type-romaji' => 'Type the Romaji<br>Read the (kana) on the screen and type the right Romaji as fast as possible.',
];
$the_kana = ucfirst($kana_set);
if ('All' == $the_kana) {
    $the_kana = 'Hiragana or Katakana';
}
?>
<div class="row">
    <div class="col">
        <h1>日本語 (Japanese)</h1>
        <p>Get ready to play the game | <a href="<?= base_url('japanese') ?>">Back</a></p>
        <hr>
        <p><b>Rules:</b> <?= str_replace('(kana)', $the_kana, $rules[$game]) ?></p>
        <div class="my-5 text-center">
            <a class="btn btn-outline-danger w-100" href="<?= base_url('japanese/game/' . $game . '/' . $kana_set) ?>">
                START
            </a>
        </div>
    </div>
</div>
<?php $this->endSection(); ?>