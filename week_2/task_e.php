<?php
$questions = [
    0 => [
        'name' => 'question_0',
        'title' => 'Question 1',
        'question' => 'Why did the chicken cross the road?',
        'options' => [
            0 => [
                'key' => 'a',
                'text' => 'To get to the other side',
            ],
            1 => [
                'key' => 'b',
                'text' => 'What society do we live in that we should question the motives of chicken??!',
            ],
            2 => [
                'key' => 'c',
                'text' => 'To stay on the same side'
            ],
            3 => [
                'key' => 'd',
                'text' => 'It was playing crossword'
            ],
        ],
        'answer' => 'a'
    ],
    1 => [
        'name' => 'question_1',
        'title' => 'Question 2',
        'question' => ' Why do people love PHP?',
        'options' => [
            0 => [
                'key' => 'a',
                'text' => 'It makes SQL injections easy',
            ],
            1 => [
                'key' => 'b',
                'text' => 'Scripting languages enable stateless applications',
            ],
            2 => [
                'key' => 'c',
                'text' => 'It makes PHP injections even easier'
            ],
            3 => [
                'key' => 'd',
                'text' => 'All of the above'
            ],
        ],
        'answer' => 'd'
    ],
    2 => [
        'name' => 'question_2',
        'title' => 'Question 3',
        'question' => 'What is OSX based on?',
        'options' => [
            0 => [
                'key' => 'a',
                'text' => 'Windows NT',
            ],
            1 => [
                'key' => 'b',
                'text' => 'Linux',
            ],
            2 => [
                'key' => 'c',
                'text' => 'Darwin BSD'
            ],
            3 => [
                'key' => 'd',
                'text' => 'Android'
            ],
        ],
        'answer' => 'c'
    ],
    3 => [
        'name' => 'question_3',
        'title' => 'Question 4',
        'question' => 'Output of: ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++.--------.++++++++.------------------------------------------------.+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++.++++++++++.-----------------------------------------------------------------------------------.+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++.----.++++++++++++++++++.----------.----.+++++++++++++.----------------------------------------------------------------------------------.++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++.------------.-------.+++++++++++++.------------------------------------------------------------------------------.++++++++++++++++++++++++++++++++++.++++.',
        'options' => [
            0 => [
                'key' => 'a',
                'text' => 'PHP is easier than BF',
            ],
            1 => [
                'key' => 'b',
                'text' => 'Where there is a will, there is a way!',
            ],
            2 => [
                'key' => 'c',
                'text' => 'If at first you don\'t succeed, give up!'
            ],
            3 => [
                'key' => 'd',
                'text' => 'Me no comprendo'
            ],
        ],
        'answer' => 'a'
    ],
    4 => [
        'name' => 'question_4',
        'title' => 'Question 5',
        'question' => 'Which is lager?',
        'options' => [
            0 => [
                'key' => 'a',
                'text' => '200',
            ],
            1 => [
                'key' => 'b',
                'text' => 'Infinity',
            ],
            2 => [
                'key' => 'c',
                'text' => '50000000000000000000000000000000'
            ],
            3 => [
                'key' => 'd',
                'text' => 'Guinness'
            ],
        ],
        'answer' => 'd'
    ],
];

function print_question($question)
{
    echo "<b>" . $question['title'] . "<br/>" . $question['question'] . "</b><br/>";
    foreach ($question['options'] as $option)
    {
        echo "<input type=\"radio\" name=\"" . $question['name'] . "\" value=\"" . $option['key'] . "\">" . $option['text'] . "<br/>";
    }
    echo "<br/>";
}

function print_results($questions)
{
    $output = "";
    foreach ($questions as $question)
    {
        if (isset($_GET[$question['name']]))
        {
            $answer = $_GET[$question['name']] == $question['answer'] ? '(Correct!)' : '(Incorrect)';
            $output .= $question['title'] . ":" . $_GET[$question['name']] . "&nbsp;" . $answer . "<br/>";
        }
        else
        {
            return;
        }
    }
    echo $output;
}
?>

<html XMLns="http://www.w3.org/1999/xHTML">
  <head>
    <title>Task E</title>
  </head>
  <body>
    <form>
        <?php
        foreach ($questions as $question)
        {
            print_question($question);
        }
        ?>
        <input type="submit" value="Score"/>
    </form>
  <?php print_results($questions) ?>
</body>
</html>
