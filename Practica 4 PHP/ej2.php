<?php
for ($i = 1; $i <= 10; $i++) {
 print $i;
}
?>

<?php
for ($i = 1; $i <= 10; print $i, $i++) ;
?>

<?php
for ($i = 1; ;$i++) {
 if ($i > 10) {
 break;
 }
 print $i;
}
?>

<?php
$i = 1;
for (;;) {
 if ($i > 10) {
 break;
 }
 print $i;
 $i++;
}
?>

