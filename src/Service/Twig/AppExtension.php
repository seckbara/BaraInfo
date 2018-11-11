<?php
/**
 * Created by PhpStorm.
 * User: seck
 * Date: 11/11/2018
 * Time: 11:58
 */

namespace App\Service\Twig;


use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class AppExtension extends  AbstractExtension
{
    private $em;
    public const NB_SUMMARY_CHAR = 170;

    /**
     * AppExtension constructor.
     */
    public function __construct(EntityManagerInterface $manager)
    {
        $this->em = $manager;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('getLastArticlesNational', function (){
                return $this->em->getRepository(Article::class)->getLastArticlesNational();
            }),
            new TwigFunction('getLastArticlesInterNational', function (){
                return $this->em->getRepository(Article::class)->getLastArticlesInterNational();
            })
        ];
    }

    public function getFilters()
    {
        return [
            new TwigFilter('summary', function ($text){
                # Suppresion des balises HTML
                $string = strip_tags($text);
                # Si mon string est supérieur à 170, je continue
                if (strlen($string) > self::NB_SUMMARY_CHAR) {
                    # Je coupe ma chaine à 170
                    $stringCut = substr($string, 0, self::NB_SUMMARY_CHAR);
                    # Je m'assure de ne pas couper un mot
                    $string = substr($stringCut, 0, strrpos($stringCut, ' ')). '...';
                }
                return $string;
            })
        ];
    }
}