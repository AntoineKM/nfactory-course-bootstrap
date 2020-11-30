<?php

/**
 * Vérifie et fix la faille XSS.
 * 
 * @param string $value
 * @return string
 */
function checkXss($value)
{
    return trim(strip_tags($value));
}

/**
 * Vérifie la longueur d'une chaine de caractères.
 * 
 * @param array<string> $errors
 * @param string $data
 * @param string $key
 * @param int $min
 * @param int $max
 * @return array<string>
 */
function checkField($errors, $data, $key, $min, $max)
{
    if (!empty($data)) {
        if (mb_strlen($data) < $min) {
            $errors[$key] = 'Min ' . $min . ' caractères';
        } elseif (mb_strlen($data) > $max) {
            $errors[$key] = 'Max ' . $max . ' caractères';
        }
    } else {
        $errors[$key] = 'Veuillez renseigner ce champ';
    }
    return $errors;
}

/**
 * Insert des valeurs dans la table d'une base de donnée.
 * 
 * @param PDO $pdo
 * @param string $table
 * @param array<string> $columns
 * @param array<string> $values
 * @return null
 */
function insert($pdo, $table, $columns, $values)
{
    if (!is_array($columns) || !is_array($values)) return;

    $bindValues = [];
    for ($i = 0; $i < count($values); $i++) {
        $bindValues[] = ':value' . $i;
    }

    $strBindValues = implode(', ', $bindValues);
    $strColumns = implode(', ', $columns);

    $sql = 'INSERT INTO ' . $table . ' (' . $strColumns . ') VALUES (' . $strBindValues . ')';
    $query = $pdo->prepare($sql);
    for ($i = 0; $i < count($values); $i++) {
        $query->bindValue(':value' . $i, $values[$i]);
    }
    $query->execute();
}
