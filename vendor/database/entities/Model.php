<?php
    namespace Service\Database\Entities;

    use Service\Database\PDO;

    class Model {
        public string $tableName;
        public function findAll () : ?array {
            $req = "SELECT * FROM `{$this->tableName}`";
            $res = PDO::query($req);
            if($res) {
                return $res->fetchAll();
            }
        }

        public function delete(int $id): int
        {
            $sql = "DELETE FROM `{$this->tableName}` WHERE id_{$this->tableName} = :id";
            $sth = PDO::query($sql, [':id' => $id]);
    
            return $sth->rowCount() > 0;
        }

        public function update(int $id, array $datas): bool
        {
            $sql = 'UPDATE `' . $this->tableName . '` SET ';
            foreach (array_keys($datas) as $k) {
                $sql .= " {$k} = :{$k} ,";
            }
            $sql = substr($sql, 0, strlen($sql) - 1);
            $sql .= " WHERE id_{$this->tableName} =:id";
    
            foreach (array_keys($datas) as $k) {
                $attributes[':' . $k] = $datas[$k];
            }
            $attributes[':id'] = $id;
            $sth = PDO::query($sql, $attributes);
    
            return $sth->rowCount() > 0;
        }

        public function find(int $id): ?array
        {
            $sql = "SELECT * FROM `{$this->tableName}` WHERE id_{$this->tableName} = :id";
            $sth = PDO::query($sql, [':id' => $id]);
            if ($sth && $sth->rowCount()) {
                return $sth->fetch();
            }
            return null;
        }

        public function findBy(array $criterias): ?array
        {
            foreach ($criterias as $f => $v) {
                $fields[] = "$f = ?";
                $values[] = $v;
            }
            $fields_list = implode(' AND ', $fields);
            $sql = "SELECT * FROM `{$this->tableName}` WHERE $fields_list";
    
            return PDO::query($sql, $values)->fetchAll();
        }

        public function exists(int $id): bool
        {
            $sql = "SELECT COUNT(*) AS c FROM `{$this->tableName}` WHERE id_{$this->tableName} = :id";
            $sth = PDO::query($sql, [':id' => $id]);
            if ($sth) {
                return ($sth->fetch()['c'] > 0);
            }
    
            return false;
        }

        public function create(array $datas): ?int
        {
            $sql = 'INSERT INTO `' . $this->tableName . '` ( ';
            foreach (array_keys($datas) as $k) {
                $sql .= " {$k} ,";
            }
            $sql = substr($sql, 0, strlen($sql) - 1) . ' ) VALUE (';
            foreach (array_keys($datas) as $k) {
                $sql .= " :{$k} ,";
            }
            $sql = substr($sql, 0, strlen($sql) - 1) . ' )';
    
            foreach (array_keys($datas) as $k) {
                $attributes[':' . $k] = $datas[$k];
            }

            $sth = PDO::query($sql, $attributes);

            if ($sth) {
                return PDO::getInstance()->lastInsertId();
            }
    
            return null;
        }
    }
?>