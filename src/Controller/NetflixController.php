<?php

namespace App\Controller;

use App\Entity\Netflix;
use App\Repository\NetflixRepository;
use Core\Controller\Controller;
use Core\Http\Response;

class NetflixController extends Controller
{
    public function index(): Response
    {
        $netflixRepo = new NetflixRepository();
        $netflixs = $netflixRepo->findAll();


        return $this->render("netflix/index", [
            "netflixs" => $netflixs,
            "pageTitle" => "les films et séries"]);

    }


    public function show(): Response
    {
        if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            return $this->redirect();
        }

        $netflixRepo = new NetflixRepository();
        $netflix = $netflixRepo->find($id);


        return $this->render("netflix/show", [
            "netflix" => $netflix,
            "pageTitle" => "le film"
        ]);
    }

    public function delete(): Response
    {
        if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            return $this->redirect();
        }

        $netflixRepo = new NetflixRepository();
        $netflix = $netflixRepo->delete($id);


        return $this->redirect("?type=netflix&action=index");
    }

    public function edit():Response{

        if (isset($_GET["id"]) && isset($_POST["name"]) && isset($_POST["description"]) && isset($_POST["time"])) {
            $netflixRepo = new NetflixRepository();
            $netflix = $netflixRepo->find($_GET["id"]);
            if($netflix){
                $netflix->setName($_POST["name"]);
                $netflix->setDescription($_POST["description"]);
                $netflix->setTime($_POST["time"]);

                $netflixRepo->edit($netflix);

                return $this->redirect("?type=netflix&action=index");
            }


        }
        return $this->render("netflix/edit",[]);
    }

    public function create():Response{

        if (isset($_POST["name"]) && $_POST["description"] && $_POST["time"]){

            $netflix = new Netflix();
            $netflix->setName($_POST["name"]);
            $netflix->setDescription($_POST["description"]);
            $netflix->setTime($_POST["time"]);

            $netflixRepo = new NetflixRepository();
            $netflixRepo->save($netflix);
            return $this->redirect("?type=netflix&action=index");
        }


        return $this->render("netflix/create",[
            "pageTitle"=>"Ajouter netfix"
        ]);
    }
}