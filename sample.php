<?php

class SampleController extends Controller
{
	public function index()
	{
		$event = $this->load->model_obj('Event');		
		try {
			$event->create(array(
				'event_name' 	 => 'test event',
				'event_location' => 'right here'
			));
		}catch(Exception $e){
			echo 'ERROR: '.$e->getMessage();
		}
	}

	public function findme()
	{
		$event = $this->load->model_obj('Event');

		$filters = array('eventComments');
	        $eventData = $event->find($arr,$filters);
        	echo '<pre>'; print_r($eventData); echo '</pre>';
	
		/**
		By calling with a filter on the ORM key "eventComments"
		each of your even results will have a new property called
		"eventComments" with the comments for that event
		*/
	}

	public function findmedyna()
	{
		$event = $this->load->model_obj('Event');

                $filters = array('eventComments');
                $eventData = $event->findByEventName('create from model',$filters);
                echo '<pre>'; print_r($eventData); echo '</pre>';
	}

	public function loadsingle()
	{
		$eventId = 1234;
		$event = $this->load->model_obj('Event',$eventId);

		echo 'name: '.$event->event_name;
	}
}

?>
