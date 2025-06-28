<?php

class Breeds
{
    private int $bre_id;
    private string $bre_name;
    private int $spe_id;

    /**
     * Permet d'avoir toutes les races avec ou sans filtre  
     * @param int $id_specie Id de l'espèce
     * @return array Tableau contenant toutes les races demandées
     */
    public static function getBreeds(?int $id_specie = null): array
    {
        try {
            $pdo = Database::createInstancePDO();

            // Je regarde si l'id de l'espèce est null ou non : pas de param'
            if ($id_specie === null) {
                $sql = "SELECT * FROM breeds";
                $stmt = $pdo->prepare($sql);
            } else {
                $sql = "SELECT * FROM breeds WHERE spe_id = :id_specie";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(':id_specie', $id_specie, PDO::PARAM_INT);
            }

            $stmt->execute();
            $breeds = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $breeds;
        } catch (PDOException $e) {
            // echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }
}
