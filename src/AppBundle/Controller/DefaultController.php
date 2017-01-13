<?php

namespace AppBundle\Controller;

use AppBundle\Repository\ClientRepository;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
	/**
	 * @return ClientRepository
	 */
	protected function getRepository()
	{
		return $this->get('app.soap_client.service');
	}

	/**
	 * @Route("/", name="project")
	 */
	public function projectsAction(Request $request)
	{
		$devices = $this->getRepository()->getProjectDevices(1);
		return new JsonResponse($devices);
	}
}
