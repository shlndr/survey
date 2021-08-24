<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Stat;

class StatController extends AbstractController
{
    /**
     * @Route("/admin/stat", name="stat")
     */
    public function index()
    {
        $stats = $this->getDoctrine()
            ->getRepository(Stat::class)
            ->findAll();
        $statsFlatten   = [];
        $uniqueUrls     = [];
        $newArray = [];
        foreach ($stats as $key => $stat) {
            $count[$stat->getSurveyUrl()]          = 1;
        }
        foreach ($stats as $key => $stat) {
            if(!in_array($stat->getSurveyUrl(), $uniqueUrls))
            {
                $uniqueUrls[]                 = $stat->getSurveyUrl();
            }else{
                $count[$stat->getSurveyUrl()] = $count[$stat->getSurveyUrl()] + 1;
            }
            $statsFlatten       = array(
                'surveyTitle'   => $stat->getSurveyTitle(),
                'surveyUrl'     => $stat->getSurveyUrl(),
                'count'         => $count[$stat->getSurveyUrl()]
            );
            array_push($newArray,$statsFlatten);
            // var_dump($stat->getSurveyUrl(),$stat->getSurveyTitle());
        }
        var_dump($newArray);
        $temp = array_unique(array_reverse(array_column($newArray, 'surveyUrl')));
        var_dump($temp);
        $unique_arr = array_intersect_key($newArray, $temp);
        var_dump($unique_arr);
        // var_dump($this->array_unique_multidimensional($newArray));
        // die();
        if (!$stats) {
            throw $this->createNotFoundException(
                'No stat found for id'
            );
        }

        // var_dump($count);die();

        return $this->render('stat/index.html.twig', [
            'stats' => $unique_arr,
        ]);
    }

    /**
     * @Route("/save-form", name="save_form")
     */
    public function createProduct(Request $request): Response
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
        $surveyUrl		= $request->get('surveyUrl');
    	$cookies = $request->cookies;

	    if ($cookies->has('survey') and $cookies->get('survey') == $surveyUrl)
	    {
	        return new Response('already');
	    }


    	$surveyTitle	= $request->get('surveyTitle');
    	
    	$surveyOptions 	= $request->get('surveyOptions');
    	$surveySelected = $request->get('options');
        $others         = $request->get('others');
    	$email 			= $request->get('emailId');
    	$utmSource  	= $request->get('utmSource');
    	$utmMedium  	= $request->get('utmMedium');
    	$utmCampaign  	= $request->get('utmCampaign');
    	$utmTerm  		= $request->get('utmTerm');
    	$utmContent  	= $request->get('utmContent');

        if(empty($others))
        {
            $others = ""; 
        }

    	if(!empty($email))
    	{
    		$emailId	= base64_decode($email);
    	}else{
    		$emailId 	= "";
    	}

        $entityManager = $this->getDoctrine()->getManager();

        $stat = new Stat();
        $stat->setSurveyTitle($surveyTitle);
        $stat->setSurveyUrl($surveyUrl);
        $stat->setOthers($others);
        $stat->setVisitorEmail($emailId);
        $stat->setSurveyOption($surveyOptions);
        $stat->setSurveyOptionSelected($surveySelected);
        $stat->setUtmSource($utmSource);
        $stat->setUtmMedium($utmMedium);
        $stat->setUtmCampaign($utmCampaign);
        $stat->setUtmTerm($utmTerm);
        $stat->setUtmContent($utmContent);

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($stat);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('success');
    }

    /**
     * @Route("/admin/stat/{slug}", name="singleStat")
     */
    public function singleStat($slug)
    {
        // var_dump($slug);
        $stats = $this->getDoctrine()
            ->getRepository(Stat::class)
            ->findBySurveyUrl('/'.$slug);


        foreach ($stats as $key => $stat) {
        $statOption = $stat->getSurveyOption();
        }

        return $this->render('stat/single.html.twig', [
            'stats' => $stats,
        ]);
    }
}
