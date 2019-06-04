<?php
$input = explode(", ", readline());
echo format_template($input);
function format_template($input)
{
    $output = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<quiz>\n";
    for ($i = 0; $i < count($input); $i += 2) {
        $output .= " <question>\n   {$input[$i]}\n </question>
 <answer>
    {$input[$i + 1]}
 </answer>\n";
    }
    $output .= "</quiz>";

    return $output;
}
