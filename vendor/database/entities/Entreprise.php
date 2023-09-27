<?php
    namespace Service\Database\Entities;

    use Service\Database\PDO;

    class Entreprise extends Model {
        public string $tableName = "entreprise";

        public function selectFromEtudiantFormation (int $id) {
            $sql = "SELECT DISTINCT
                    entreprise.*
                FROM
                    entreprise
                JOIN
                    offre
                ON
                    entreprise.id_entreprise = offre.id_entreprise
                WHERE
                    offre.id_formation = :id_formation;";
            return PDO::query($sql, [":id_formation" => $id])->fetchAll();
        }
    }
?>