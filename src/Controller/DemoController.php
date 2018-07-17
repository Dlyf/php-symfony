<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


use Symfony\Component\HttpFoundation\Response;
//use Symfony\Component\HttpFoundation\Request;

class DemoController extends Controller
{
  public $players = [
    array(
      'id' => 1,
      'name' => 'Pogba',
      'num' => 6,
      'substitute' => false,
      'photo' => 'https://cdn-media.rtl.fr/cache/cF_cpQchwkEenyULSozZYw/880v587-0/online/image/2016/0613/7783642440_paul-pogba-le-10-juin-2016-sur-la-pelouse-du-stade-de-france.jpg'
    ),
    array(
      'id' => 2,
      'name' => 'Lloris',
      'num' => 1,
      'substitute' => true,
      'photo' => 'https://cdn.static01.nicematin.com/media/npo/mobile_1440w/2017/06/sweden-vs-france-21139351.jpg'
    ),
    array(
      'id' => 3,
      'name' => 'Mbappé',
      'num' => 10,
      'substitute' => false,
      'photo' => 'https://o.aolcdn.com/images/dims3/GLOB/crop/3993x2000+7+473/resize/630x315!/format/jpg/quality/85/http%3A%2F%2Fo.aolcdn.com%2Fhss%2Fstorage%2Fmidas%2Fd29c75dee4addd58a632c716ad3dd867%2F206139045%2Fparis-saintgermains-french-forward-kylian-mbappe-celebrates-his-goal-picture-id889341858'
    )
  ];
  public function index()
  {
    $colors = ['bleu', 'blanc', 'rouge'];

    // La méthode render() provient de la classe Controller
    return $this->render('demo.html.twig', array(
      'title' => 'Demo TWIG',
      'message' => 'Simple message en provenance du controller',
      'available' => true,
      'colors' => $colors,
      'players' => $this->players
    ));
  }

  public function player($id)
  {
    // $id correspond au paramètre d'url {id} défini
    // dans le fichier le routage

    // à partir de l'identifiant, on va récupérer la
    // totalité des données concernant le joueur identifié

    $player = null;

    //cette boucle sert à circuler le tableau des joueurs
    foreach($this->players as $p) {
      //joueur trouvé dans la source de donnée
      if ($p['id'] == $id) {
        $player = $p;
      }
    }

    return $this->render('player.html.twig', array(
      'player' => $player
    ));
  }
}
