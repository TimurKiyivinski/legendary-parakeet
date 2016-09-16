<?php
ini_set('auto_detect_line_endings', true);

function read_csv($file_name)
{
    $csv = [];
    $csv_file = fopen($file_name, 'r');
    if ($csv_file !== false)
    {
        while (($row = fgetcsv($csv_file)) !== false)
        {
            $csv[] = $row;
        }
    }
    fclose($csv_file);
    return $csv;
}

function get_questions()
{
    $questions = read_csv('questions.csv');
    $output = [];
    foreach($questions as $row)
    {
        $question = [
            'name' => $row[0],
            'title' => $row[1],
            'question' => $row[2],
            'options' => [
                0 => [
                    'key' => 'a',
                    'text' => $row[3]
                ],
                1 => [
                    'key' => 'b',
                    'text' => $row[4]
                ],
                2 => [
                    'key' => 'c',
                    'text' => $row[5]
                ],
                3 => [
                    'key' => 'd',
                    'text' => $row[6]
                ],
            ],
            'answer' => $row[7]
        ];
        $output[] = $question;
    }
    return $output;
}

$questions = get_questions();

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
            $answer = $_GET[$question['name']] === $question['answer'] ? '(Correct!)' : '(Incorrect)';
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
