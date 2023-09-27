<?php
    namespace Service\Database\Entities;

    use Service\Database\PDO;

    class Entretien extends Model {
        public string $tableName = "entretien";

        public function getAllEntrepriseFromEtudiant (int $id) {
            $sql = "SELECT
                entreprise.*
                FROM
                    entreprise
                WHERE
                    entreprise.id_entreprise IN (
                        SELECT id_entreprise
                        FROM entretien
                        WHERE id_etudiant = :id
                    );";
            return PDO::query($sql, [":id" => $id])->fetchAll();
        }
    }
?>