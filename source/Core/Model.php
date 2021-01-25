<?php

namespace Source\Core;

class Model
{
    protected static $protected = ["id"];

    protected $data;

    protected static $entity = "Conteudo";

    protected $params;

    protected $order;

    protected $offset;

    protected $fecth;

    protected $column = ["title", "subtitle", "subconteudo", "body", "url", "imagem"];

    /***
     * responsavel por fazer uma busca na tabela conteudo
     */

    public function find(?string $terms = null, ?string $params = null, string $columns = "*")
    {
        if ($terms) {
            $this->query = "SELECT {$columns} FROM " . self::$entity . " WHERE {$terms} = '{$params}'";
            return $this;
        }
        $this->query = "SELECT {$columns} FROM " . self::$entity;
        return $this;
    }
    /**
     * define a ordem
     */
    public function order(string $columnsOrder): Model
    {
        $this->order = " ORDER BY {$columnsOrder}";
        return $this;
    }

    /**define o limit para exibir */
    public function limit(int $limit): Model
    {
        $this->limit = " LIMIT {$limit}";
        return $this;
    }
    /**definir aparti de qual posicao inicia a contag */
    public function offset(int $offset): Model
    {
        $this->offset = " OFFSET {$offset}";
        return $this;
    }
    /**faz a contagem de todas as posicoes na tabela */
    public function count(string $key = "id"): int
    {
        $this->query = ("SELECT * FROM " . self::$entity );
        $stmt = Connect::getInstance()->prepare($this->query);
        $stmt->execute();
        return $stmt->rowCount();
    }
    /**
     * select *from imagem order by {} LIMIt {};
     * executa os elementos anteriores
     */
    public function fetch(bool $all = false)
    {
        try {
            $stmt = Connect::getInstance()->prepare($this->query . $this->order . $this->limit . $this->offset);
            $stmt->execute();
            if ($all) {
                return $stmt->fetchAll(\PDO::FETCH_CLASS, static::class);
            }
            return $stmt->fetchObject(static::class);
        } catch (\PDOException $exception) {
            redirect("/ops/problemas");
            return $exception;
        }
    }
    /** fazer o insert de novos dados na tabela*/
    public function insert(array $data)
    {

        $data['url'] = $data['title']  . "-" . time();

        try {
            $columns = implode(",", $this->column);
            $values = "'" . implode("','", $data) . "'";
            $stmt = Connect::getInstance()
                ->prepare("INSERT INTO " . self::$entity . " ({$columns}) VALUES ({$values})");
            $stmt->execute();
        } catch (\PDOException $exception) {
            redirect("/ops/problemas");
            return $exception;
        }
    }
    /**responsavel por deleta os arquivos do conteudo selecionado */
    public function delete(array $data)
    {

        $column = "id";
        try {
            $id = implode(" ", $data);
            $file = (new Model());
            $file->deleteFile($id);
            $values = implode(" ", $data);
            $stmt = Connect::getInstance()->prepare("DELETE FROM " . self::$entity . " WHERE {$column} = {$values}");
            $stmt->execute();
            redirect("admin/painel");
            
        } catch (\PDOException $exception) {

            return $exception;
        }
    }
    /**
     * responsavel por deleta o arquivos no diretorio
     */
    public function deleteFile($id)
    {

        $buscar = (new Model())->find("id", $id)->limit(1)->fetch(true);
        $fileurl = array_column($buscar, "imagem");
        $fileurl = implode("", $fileurl);
        $arquivo = __DIR__ . "/../../themes" . $fileurl;
        try {
            if (file_exists($arquivo)) {
                chmod("$arquivo", 0755);
                unlink($arquivo);
            } else {
                echo "error";
            }
        } catch (\PDOexception $exception) {
            return $exception;
        }
    }
    /**
     * responsavel por fazer um update na tabela com os novos dados passados pelo usuario
     */
    public function update(array $data)
    {
        $id = $data["page"];
        $data = array_diff($data, [$data['page']]);
        $params = [];
        try {
            if (!empty($data['imagem'])) {
                $file = (new Model());
                $file->deleteFile($id);
            }
            foreach ($data as $data => $value) {
                array_push($params, "{$data} = '{$value}'");
            }
            $pr = implode(",", $params);
            $stmt = Connect::getInstance()->prepare("UPDATE " . self::$entity . " SET " . $pr . " WHERE id = {$id}");
            $stmt->execute();
            redirect("admin/painel");
        } catch (\PDOException $exception) {
            redirect("/ops/problemas");
            return $exception;
        }
    }


    /***** */
}
