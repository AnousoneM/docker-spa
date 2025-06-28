<?php

class Colors
{

    // Nous déterminons les propriétés de la classe Colors selon les colonnes de la table colors de la base de données.
    private int $col_id;
    private string $col_name;

    /**
     * Permet d'avoir toutes les couleurs
     * @return array Tableau contenant toutes les couleurs
     */
    public static function getAllColors(): array
    {
        try {
            // création d'une instance de PDO à l'aide de la méthode static createInstancePDO() de la classe Database
            $pdo = Database::createInstancePDO();
            // On prépare la requête SQL
            $sql = "SELECT * FROM colors";
            // On exécute la requête SQL à l'aide de query() qui renvoie un objet PDOStatement
            $stmt = $pdo->query($sql);
            // On utilise la méthode fetchAll() pour récupérer toutes les données sous forme de tableau associatif
            $colors = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // On retourne le tableau contenant toutes les couleurs
            return $colors;
        } catch (PDOException $e) {
            // echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }
}
