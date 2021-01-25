<?php

namespace Source\App;

use Source\Core\Controller;
use Source\Core\Model;
use Source\Core\Auth;
use Source\Core\Pager;

class Web extends Controller
{
    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../themes/");
    }
    /**
     * home $data 
     * @return void
     */
    public function home(?array $data): void
    {
        $count = (new Model())->count();
        $pager = new Pager(url("/p/"));
        $pager->pager($count, 10, ($data['pager']?? 1));
                $conteudo = (new Model())->find()->order("id DESC")->limit($pager->limit())->offset($pager->offset())->fetch(true);
        $head = "Hielo";
        echo $this->view->render("home", [
            "conteudo" => $conteudo,
            "head" => $head,
            "paginator" => $pager->render()
        ]);
    }
    /**
     * terms
     * @return void
     */
    public function terms(): void
    {
        $head = "Hielo - terms";
        echo $this->view->render("terms", [
            "head" => $head
        ]);
    }
    /**
     * generic
     * @return void
     */
    public function generic(): void
    {
        $conteudo = (new Model())->find("id", "1")
            ->order("id ASC")->limit(1)->fetch(true);
        $head = "Hielo - generic";
        echo $this->view->render("generic", [
            "conteudo" => $conteudo,
            "head" => $head
        ]);
    }
    /**
     * genericpost resposavel pela paste de conteudo do post
     * @return void
     */
    public function genericpost(array $data): void
    {
        $data = implode("", $data);
        $head = "Hielo -" . $data;
        $conteudo = (new Model())->find("url", $data)->order("id ASC")->limit(1)->fetch(true);
        echo $this->view->render("generic", [
            "conteudo" => $conteudo,
            "head" => $head
        ]);
    }
    //******admin */
    public function admin(?array $data)
    {
        if (!empty($data)) {
            $login = (new Auth())->login($data["name"], $data["password"]);
        };
        $head = "admin";
        echo $this->view->render("admin", [
            "head" => $head
        ]);
    }
    /**
     * exbibicao  os itens salvo no bd e excluir os itens que o admin deseja
     */
    public function painel(array $data)
    {
        
        session_start();
        if (isset($_SESSION["is_login"])) 
        {
            if (time() < $_SESSION["time"]) 
            {   
                
                
                $count = (new Model())->count();
                $pager = new Pager(url("/admin/painel/p/"));
                $pager->pager($count, 10, ($data['pager']?? 1));
                $conteudo = (new Model())->find()->order("id DESC")->limit($pager->limit())->offset($pager->offset())->fetch(true);
                echo $this->view->render("painel", [
                    "head" => "Painel",
                    "editar" => $conteudo,
                    "paginator"=> $pager->render()
                    ]);
                $data = array_diff($data, [$data['pager'] ?? 1]);
                if (!empty($data)) 
                {   
                 $excluir = new Model();
                 $excluir->delete($data);
                 header('Location: painel' );
                } else {
                    
                }
            } else {
                setcookie("PHPSESSID","",time() - 3600);
                redirect("/admin");
            }
        } else {
            redirect("/admin");
        }
    }
    /**
     * responsavel por adicionar conteudo no site
     */
    public function adicionar(array $data)
    {
        session_start();
        if (isset($_SESSION["is_login"])) 
        {
            if (time() < $_SESSION["time"]) 
            {     
                  echo $this->view->render("adicionar", [
                    "head" => "Adicionar"
                   
                    ]);
                if (!empty($data)) 
                {
                  $adicionar = new Auth();
                  $adicionar->incluir($data); 
                    redirect("/admin/painel");
                } else {}
            } else {
                setcookie("PHPSESSID","", 0);
                redirect("/admin");
            }
        } else {
            redirect("/admin");
        }
    }
    /**
     * resposavel por editar o conteudo do site, alem disso excluir a imagem salva e coloca a que foi adicionada 
     */
    public function editar(array $data)
    {
            session_start();
            if (isset($_SESSION["is_login"])) 
            {
                if (time() < $_SESSION["time"]) 
                {    
                     $conteudo = (new Model())->find("id" , $data['page'])->limit(1)->fetch(true);;
                      echo $this->view->render("editar", [
                        "head" => "Editar",
                        "editar" => $conteudo
                       
                        ]);
                    if (!empty($data)) 
                    {
                        $editar = (new Auth);
                        $editar->editar($data);
                       
                    } else {}
                } else {
                    setcookie("PHPSESSID","",time() - 3600);
                    redirect("/admin");
                }
            } else {
                redirect("/admin");
            }
    }

    /**
     * Error 
     */
    public function error(array $data): void
    {
        $error = new \stdClass();
        switch ($data['errcode']) {
            case "problemas":
                $error->code = "OPS";
                $error->title = "Estamos enfrentando problemas!";
                $error->message = "Parece que nosso serviço não está diponível no momento. Já estamos vendo isso mas caso precise, envie um e-mail :)";
                $error->linkTitle = "ENVIAR E-MAIL";
                $error->link = "mailto:" . CONF_MAIL_SUPPORT;
                break;

            case "manutencao":
                $error->code = "OPS";
                $error->title = "Desculpe. Estamos em manutenção!";
                $error->message = "Voltamos logo! Por hora estamos trabalhando para melhorar nosso conteúdo para você controlar melhor as suas contas :P";
                $error->linkTitle = null;
                $error->link = null;
                break;
            default:
                $error->code = $data['errcode'];
                $error->title = "Ooops. Conteúdo indispinível :/";
                $error->message = "Sentimos muito, mas o conteúdo que você tentou acessar não existe, 
                está   indiponivel no momento ou foi removido, mas caso precise nós envie um e-mail";
                $error->linkTitle = "Continue Navegando";
                $error->link = url_back();
                
                break;
            }
            $head = $data['errcode'] . "- Not Fould";
        echo $this->view->render("error", [
            "error" => $error,
            "head" => $head
        ]);
    }
}
