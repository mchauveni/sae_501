<?php
    namespace Service\Database\Entities;

    class Auth {
        public static function auth () {
            $sql = "SELECT
                CASE
                    WHEN et.email_etudiant = :email AND et.mp_etudiant = :password THEN 'etudiant'  -- Vérifiez les étudiants
                    WHEN resp.email_resp = :email AND resp.mp_resp = :password THEN 'responsable' -- Vérifiez les responsables
                END AS user_type,
                CASE
                    WHEN et.email_etudiant = :email AND et.mp_etudiant = :password THEN et.*  -- Sélectionnez toutes les colonnes de l'étudiant
                    WHEN resp.email_resp = :email AND resp.mp_resp = :password THEN resp.* -- Sélectionnez toutes les colonnes du responsable
                END AS user_data
            FROM
                etudiant et
            LEFT JOIN
                responsable resp
            ON
                et.email_etudiant = :email OR resp.email_resp = :email
            LIMIT 1;";
        }
    }
?>