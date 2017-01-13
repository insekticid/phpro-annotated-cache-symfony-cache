<?php

namespace AppBundle\Repository;

use AppBundle\Cache\Annotation\Cacheable;

class ClientRepository
{
	/**
	 * @Cacheable(pools="soapClient", key="projectId", tags="getProjectDevices", ttl=15000)
	 *
	 * @param $projectId
	 * @return array
	 */
	public function getProjectDevices($projectId)
	{
		$devices = [];//run some heavy code here
		sleep(7);
		return $devices;
	}
}