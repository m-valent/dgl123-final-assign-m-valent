<?php

$fruit = array();

$stack = array("orange", "banana", "apple", "raspberry");

echo "<br />";
print_r($stack);
echo "<br />";

echo "<br />";
echo "START - var fruit: ";
print_r($fruit);
echo "<br />";


$fruit = array_shift($stack);

echo "<br />";
print_r($stack);
echo "<br />";

echo "<br />";
echo "TEST 1 - var fruit: ";
print_r($fruit);
echo "<br />";

$fruit = array_shift($stack);

echo "<br />";
print_r($stack);
echo "<br />";

echo "<br />";
echo "TEST 2 - var fruit: ";
print_r($fruit);
echo "<br />";

$fruit = array_shift($stack);

echo "<br />";
print_r($stack);
echo "<br />";

echo "<br />";
echo "TEST 3 - var fruit: ";
print_r($fruit);
echo "<br />";

?>