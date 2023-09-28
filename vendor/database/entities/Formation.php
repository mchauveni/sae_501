<?php
    namespace Service\Database\Entities;
    use Service\Database\PDO;

    class Formation extends Model {
        public string $tableName = "formation";

        public function getAllEtudiants (int $id) : ?array {
            $sql = "SELECT
                e.*,
                COUNT(o.id_entretien) AS nb_entretiens
            FROM
                etudiant e
            LEFT JOIN
                entretien o ON e.id_etudiant = o.id_etudiant
            WHERE
                e.id_formation = :id_formation
            GROUP BY
                e.id_etudiant, e.nom_etudiant, e.prenom_etudiant, e.id_formation, e.tel_etudiant, e.email_etudiant
            ORDER BY nb_entretiens DESC";
            return PDO::query($sql, [":id_formation" => $id])->fetchAll();
        }
    }
?>