<?php
$this->extend('_layout.php');
$this->section('content');
$rules = [
    'romaji-pick-kana' => 'Pick the Kana<br>Read the Romaji on the screen and pick the right (kana) as fast as possible.',
    'romaji-type-kana' => 'Type the Kana<br>Read the Romaji on the screen and type the right (kana) as fast as possible. Press enter when done.',
    'kana-pick-romaji' => 'Read it right<br>Read the (kana) on the screen and pick the right Romaji as fast as possible.',
    'kana-type-romaji' => 'Type the Romaji<br>Read the (kana) on the screen and type the right Romaji as fast as possible. Press enter when done.',
];
?>
    <div class="row">
        <div class="col">
            <h1>日本語 (Japanese)</h1>
            <p><?= $rules[$game_name] ?></p>
            <hr>
            <div class="row">
                <div class="col">
                    <?php for ($i = 1; $i <= 15; $i++) : ?>
                        <span class="badge bg-light text-dark" id="question-bubble-<?= $i ?>"><?= $i ?></span> &nbsp;
                    <?php endfor; ?>
                </div>
                <div class="col text-end">
                    <span class="badge bg-danger" id="stopwatch">0</span> seconds | <span class="badge bg-danger" id="total-score">0</span> scores
                </div>
            </div>
            <?php foreach ($game_data as $i => $game_row) : ?><?php $question_no = $i+1; ?>
            <div class="row" id="question-<?= $question_no ?>" style="display:none">
                <div class="col-12 text-center py-5">
                    <p><?= $question_no ?></p>
                    <h2><?= $game_row['question'] ?></h2>
                </div>
                <div class="col-12 text-center">
                    <?php if ('pick' == $format) : ?>
                        <?php foreach ($game_row['choices'] as $answer) : ?>
                            <button class="btn btn-outline-danger p-4 answer" data-question-no="<?= $question_no ?>" data-correct-answer="<?= $game_row['answer'] == $answer ? 'Y' : 'N' ?>" data-this-choice="<?= $answer ?>">
                                <?= $answer ?>
                            </button>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <label for="answer-<?= $question_no ?>">Answer:</label><br>
                        <input type="text" class="form-control answer" id="answer-<?= $question_no ?>" data-question-no="<?= $question_no ?>" style="width:120px;text-align:center;margin:0 auto;" />
                    <?php endif; ?>
                    <label for="correct-answer-<?= $question_no ?>" class="d-none">Answer</label>
                    <input type="hidden" name="correct-answer-<?= $question_no ?>" id="correct-answer-<?= $question_no ?>" value="<?= $game_row['answer'] ?>" />
                </div>
            </div>
            <?php endforeach; ?>
            <div class="row" id="game-result" style="display:none;">
                <div class="col my-5 text-center"
                <h2>RESULTS</h2>
                <h3><span id="result-seconds">0</span><br><small>seconds used</small></h3>
                <h3><span id="result-score">0</span><br><small>correct answers</small></h3>
                <p><b>Summary</b></p>
                <?php for ($j = 1; $j <= 15; $j++) : ?>
                    <p><?= $j ?>. <?= $game_data[$j-1]['question'] ?> = <?= $game_data[$j-1]['answer'] ?> | Your answer = <b id="result-your-answer-<?= $j ?>"></b></p>
                <?php endfor; ?>
                <a class="btn btn-outline-danger" href="<?= base_url('japanese') ?>">Back to Japanese Home</a>
            </div>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(function() {
        let seconds = 0,
            timer = null,
            score = 0;
        function updateStopwatch() {
            $('#stopwatch').text(seconds);
        }
        function startWatch() {
            if (timer === null) {
                timer = setInterval(function () {
                    seconds++;
                    updateStopwatch();
                }, 1000);
            }
        }
        startWatch();
        $('#question-1').show();
        <?php if ('pick' == $format) : ?>
        $('.answer').click(function(e) {
            e.preventDefault();
            let question_no = $(this).data('question-no'),
                user_answer = $(this).data('this-choice'),
                is_correct = $(this).data('correct-answer');
            if ('Y' === is_correct) {
                score++;
                $('#total-score').text(score);
                $('#question-bubble-'+question_no).removeClass('bg-light').addClass('bg-success text-white');
            } else {
                $('#question-bubble-'+question_no).removeClass('bg-light').addClass('bg-danger text-white');
            }
            $('#result-your-answer-'+question_no).text(user_answer);
            // close this question, go to the next
            $('#question-'+question_no).hide();
            if (15 === question_no) {
                // last question, show result
                clearInterval(timer);
                timer = null;
                $('#result-seconds').text(seconds);
                $('#result-score').text(score);
                $('#game-result').show();
            } else {
                let next_question = parseInt(question_no) + 1;
                $('#question-'+next_question).show();
            }
        });
        <?php else: ?>
        $('#answer-1').focus();
        $('.answer').change(function() {
            let question_no = $(this).data('question-no'),
                correct_answer = $('#correct-answer-'+question_no).val(),
                user_answer = $(this).val();
            // check answer, update score
            if (correct_answer === user_answer) {
                score++;
                $('#total-score').text(score);
                $('#question-bubble-'+question_no).removeClass('bg-light').addClass('bg-success text-white');
            } else {
                $('#question-bubble-'+question_no).removeClass('bg-light').addClass('bg-danger text-white');
            }
            $('#result-your-answer-'+question_no).text(user_answer);
            // close this question, go to the next
            $('#question-'+question_no).hide();
            if (15 === question_no) {
                // last question, show result
                clearInterval(timer);
                timer = null;
                $('#result-seconds').text(seconds);
                $('#result-score').text(score);
                $('#game-result').show();
            } else {
                let next_question = parseInt(question_no) + 1;
                $('#question-'+next_question).show();
                $('#answer-'+next_question).focus();
            }
        });
        <?php endif; ?>
    })
</script>
<?php $this->endSection() ?>
