<?php
$loremIpsum = "Lorem ipsum dolor sit amet consectetur adipisicing elit.Animi placeat pariatur dolorem tempora expedita atque dolores nesciunt blanditiis fugiat iusto unde perferendis, rerum sed alias vero consectetur cumque doloremque explicabo.";

echo "<p>{$loremIpsum}</p>";
echo "Panjang karakter: " . strlen($loremIpsum) . "<br>";
echo "Panjang kata: " . str_word_count($loremIpsum) . "<br>";
echo "<p>" . strtoupper($loremIpsum) . "</p>";
echo "<p>" . strtolower($loremIpsum) . "</p>";
?>