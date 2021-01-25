<?php

namespace Source\Core;

use CoffeeCode\Uploader\Image;

class Auth
{
    protected static $entity = "Auth";
/**
 * function find with $terms , $params , $columns
 * responsavel pela busca no banco de dados do administrado
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
     * praticamente executa a busca do find
     */
    public function fetch(bool $all = false)
    {
        try {
            $stmt = Connect::getInstance()->prepare($this->query);
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
    /**
     * teste de login aond verificar ser os dados passados sao similares ao salvo no banco de dados
     */
    public function login(string $nome, string $password)
    {
        $login = (new Auth())->find("name", $nome)->fetch(true);
        foreach ($login as $login) {
            if (password_verify($password, $login->password)) {
                session_start();
                $_SESSION["is_login"] = true;
                $_SESSION["time"] = time() + (60 * 60 * 2);
                redirect("/admin/painel");
            }
        }
    }
    /**
     * function responsavel por salva a imagem em im diretorio e manda o caminho para o banco de dados
     */
    public function incluir(array $data)
    {

        $upload = new Image(CONF_UPLOAD_DIR, CONF_UPLOAD_IMAGE_DIR, false);
        $name = time();
        if (!empty($data)) {

            try {
                if (!empty($_FILES['imagem']['type'] || in_array($_FILES["imagem"]['type'], $upload::isAllowed()))) {

                    $data['imagem'] = mb_substr($upload->upload($_FILES["imagem"], $name), 6);
                    $inset = (new Model())->insert($data);
                }
            } catch (\PDOException $exception) {
                return $exception;
                redirect("/ops/problemas");
            }
        }
    }

    /** 
     * resposavel por editar os arquivos de upload verificando ser o arquivo exister para pode salva no diretorio, 
    */
    public function editar(array $data)
    {

        $upload = new Image(CONF_UPLOAD_DIR, CONF_UPLOAD_IMAGE_DIR, false);
        $name = time();
        if (!empty($_FILES)) {
            try {
                if (!empty($_FILES['imagem']['type'] || in_array($_FILES["imagem"]['type'], $upload::isAllowed()))) {

                    $data['imagem'] = mb_substr($upload->upload($_FILES["imagem"], $name), 6);
                    $editar = (new Model())->update($data);
                } else {
                    $data2 = array_diff($data, [$data['page']]);
                    if (!empty($data2)) {
                        $editar = (new Model())->update($data);
                    }
                }
            } catch (\PDOException $exception) {
                redirect("/ops/problemas");
                return $exception;
            }
        } else {
        }
    }
}
