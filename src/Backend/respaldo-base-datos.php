<?php
include 'conexión.php';

$filename = "sistema_" . date('Y-m-d') . ".sql";
$backupDir = 'respaldo/';
$filepath = $backupDir . $filename;

if (!is_dir($backupDir)) {
    mkdir($backupDir, 0777, true);
}

$output = "";

$tables = $conn->query("SHOW TABLES");

while ($row = $tables->fetch_array()) {
    $table = $row[0];

    $output .= "DROP TABLE IF EXISTS `$table`;\n";
    
    $structure = $conn->query("SHOW CREATE TABLE `$table`")->fetch_row();
    $output .= $structure[1] . ";\n\n";
    
    $result = $conn->query("SELECT * FROM `$table`");
    while ($data = $result->fetch_assoc()) {
        $output .= "INSERT INTO `$table` VALUES (";
        $values = [];
        foreach ($data as $value) {
            $values[] = "'" . $conn->real_escape_string($value) . "'";
        }
        $output .= implode(", ", $values) . ");\n";
    }
    $output .= "\n\n";
}

file_put_contents($filepath, $output);

header('Content-Type: application/sql');
header("Content-Disposition: attachment; filename=\"$filename\"");
echo $output;

echo "Copia de seguridad creada en: " . $filepath;
exit;
?>
