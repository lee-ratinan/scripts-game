<?php
$this->extend('_layout.php');
$this->section('content');
?>
    <div class="row">
        <div class="col">
            <h1>日本語 (Japanese)</h1>
            <p>The Game</p>
            <hr>

            <pre>
                <?php
                print_r($game_data);
                print_r($format);
                ?>
            </pre>
        </div>
    </div>
<?php $this->endSection() ?>
