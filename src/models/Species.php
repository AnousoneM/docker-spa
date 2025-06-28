<?php

class Species
{

    private int $spe_id;
    private string $spe_name;

    /**
     * Permet d'avoir toutes les espèces
     * @return array Tableau contenant toutes les espèces
     */
    public static function getSpecies(): array
    {
        try {
            $pdo = Database::createInstancePDO();

            $sql = "SELECT * FROM species";
            $stmt = $pdo->query($sql);
            $stmt->execute();
            $species = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $species;
        } catch (PDOException $e) {
            // echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }
}
