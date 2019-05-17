<?php

class Kairos_model  extends Video_model
{
	public $galleryID = "";
	public $videoID = "";
	public $insertData = array();
	public $updateData = array();
	public $table = "videoAnalysis";



	public function __construct() {
		parent::__construct();

		
	}

	public function startAnalysis($galleryID,$videoPath,$videoID){

		

		$this->galleryID = $galleryID;
		$this->videoID = $videoID;

		$dirname = "./frames/".$galleryID."/";
		$images = glob($dirname."*.png");

		foreach($images as $image) {
			 $this->recognize_api($image);
			 $this->enroll($image);
		}
		
		if (!empty($this->insertData)) {
			$this->add_data($this->table,$this->insertData,true);
		}

		if (!empty($this->updateData)) {
			$this->update_data($this->table,'faceID',$this->updateData,true);
		}


		$args['table'] = "videos";
		$args['where']['galleryID'] = $galleryID; 
		$args['join']['videoanalysis'] = 'videoanalysis.videoID=videos.videoID'; 

		$impressions = 0;
		$locationID = "";


		$records = $this->crud_model->get_data_new($args);

		foreach ($records as $key => $value) {
			$locationID = $value->locationID;
			if ($value->duplicate == 0) {
				$impressions++;
			}
		}


		if ($impressions > 0 && $locationID != "") {
			$this->db->where('location_id', $locationID);
			$this->db->set("impressions","impressions + ".$impressions , false);
			$this->db->update('advertisements');

		}

		





		
		

		$emotions = $this->emotionsApi($videoPath);
		
		if ($emotions) {

			$emotions = json_decode($emotions);

			$analytics = $this->analyticsApi($emotions->id,$videoID);
		
		}

	

		

	}


	public function recordAnalytics($analytics,$videoID){

		$where = array("videoID"=>$videoID);	

		if (isset($analytics->status_message)) {
			
			$data = array("emotionID"=>$analytics->id,"emotionStatus"=>$analytics->status_message);

			$msg = "Status of analytics: ".$analytics->status_message;
		
		}else{

			$recordAnalytics = array();

			$tmp_array['videoID'] = $videoID;
			foreach ($analytics->impressions as $key => $value) {
				$emotions = (array) $value->emotion_score;
				$maxs = array_keys($emotions, max($emotions));

				if (current($maxs) == "positive") {
					$tmp_array['emotion'] = 1; 
				}elseif (current($maxs)  == "negative") {
					$tmp_array['emotion'] = 2; 
				}elseif (current($maxs)  == "neutral") {
					$tmp_array['emotion'] = 0; 
				}

				$recordAnalytics[] = $tmp_array;
			}

			$this->add_data('videoemotions',$recordAnalytics,true);

			$data = array("emotionID"=>$analytics->id,"emotionStatus"=> "Completed");

			$msg = "Status of analytics: Completed";

			
		}

		$this->update_data("videos",$where,$data);

		$this->session->set_flashdata("msg",$msg);

	}

	public function analyticsApi($analyticsid,$videoID){

		$queryUrl = "https://api.kairos.com/v2/analytics/".$analyticsid;


		$request = curl_init($queryUrl);

		curl_setopt($request, CURLOPT_HTTPGET, TRUE);
		curl_setopt($request, CURLOPT_HTTPHEADER, array(
			"Content-type: application/json",
			"app_id:" . APP_ID,
			"app_key:" . APP_KEY
			)
		);
		curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($request);

		$this->recordAnalytics(json_decode($response),$videoID);

	}

	public function emotionsApi($videoPath){
		
		$payload = [
		'filename' => basename($videoPath),
		'source' => new CurlFile($videoPath, 'video/mp4')
		];



	$curl_params = [

	  CURLOPT_URL => "https://api.kairos.com/v2/media",

	  CURLOPT_RETURNTRANSFER => true,

	  CURLOPT_TIMEOUT => 0,

	  CURLOPT_FOLLOWLOCATION => false,

	  CURLOPT_CUSTOMREQUEST => "POST",

	  CURLOPT_HTTPHEADER => [

	    "Content-Type: multipart/form-data",

	    "app_id: ". APP_ID,

	    "app_key: ". APP_KEY

	  ],

		CURLOPT_POSTFIELDS => $payload

	];



	$curl = curl_init();

	curl_setopt_array($curl, $curl_params);

	$response = curl_exec($curl);

	$err = curl_error($curl);

	curl_close($curl);


	if ($err) {

		return false;

	}



	return $response;

	}

	public function recognize_api($image){

		$gallery_name = $this->galleryID;

		$path = $image;
		$type = pathinfo($path, PATHINFO_EXTENSION);
		$data = file_get_contents($path);
		$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

		$queryUrl = "https://api.kairos.com/recognize";

		$data = array('image' => $base64,"gallery_name"=>$gallery_name);

		$data = json_encode($data);
		$request = curl_init($queryUrl);
			// set curl options
		curl_setopt($request, CURLOPT_POST, true);
		curl_setopt($request, CURLOPT_POSTFIELDS, $data);
		curl_setopt($request, CURLOPT_HTTPHEADER, array(
			"Content-type: application/json",
			"app_id:" . APP_ID,
			"app_key:" . APP_KEY
		)
	);
		curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($request);

		$res =  json_decode( $response);

		if (isset($res->images)) {
			foreach ($res->images as $key => $value) {

				if (isset($value->candidates)) {
					$candidates = $value->candidates;

					foreach ($candidates as $k => $v) {

						$faceID = $v->face_id;

						if (!in_array_r($faceID, $this->updateData)) {
							$tmp_array = array();
							$tmp_array['faceID'] = $faceID;
							$tmp_array['duplicate'] = 1;
							$this->updateData[] = $tmp_array;
						}

					}
				}

			}
		}



	}

	
	function enroll($image){

		$gallery_name = $this->galleryID;

		$path = $image;
		$type = pathinfo($path, PATHINFO_EXTENSION);
		$data = file_get_contents($path);
		$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

		$queryUrl = "https://api.kairos.com/enroll";

		$data = array('image' => $base64,"gallery_name"=>$gallery_name,'subject_id'=>$gallery_name, 'multiple_faces'=>true);

		$data = json_encode($data);
		$request = curl_init($queryUrl);
			// set curl options
		curl_setopt($request, CURLOPT_POST, true);
		curl_setopt($request, CURLOPT_POSTFIELDS, $data);
		curl_setopt($request, CURLOPT_HTTPHEADER, array(
			"Content-type: application/json",
			"app_id:" . APP_ID,
			"app_key:" . APP_KEY
		)
	);
		curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($request);

		$res =  json_decode( $response);


		if (isset($res->images)) {
			foreach ($res->images as $key => $value) {
				$tmp_array = array();

				$tmp_array['videoID'] = $this->videoID;
				$tmp_array['faceID'] = $value->transaction->face_id;
				$tmp_array['age'] = $value->attributes->age;
				$tmp_array['gender'] = $value->attributes->gender->type;

				$nationality = array();

				$nationality['asian'] = $value->attributes->asian;
				$nationality['black'] = $value->attributes->black;
				$nationality['hispanic'] = $value->attributes->hispanic;
				$nationality['white'] = $value->attributes->white;

				$tmp_array['nationality'] = current(array_keys($nationality, max($nationality)));

				if (!empty($tmp_array)) {
					$this->insertData[] = $tmp_array;
				}

			}

			
		}




	}


	public function deleteGallery($galleryID){

		$queryUrl = "https://api.kairos.com/gallery/remove";

		$data = array("gallery_name"=>$galleryID);

		$data = json_encode($data);
		$request = curl_init($queryUrl);
			// set curl options
		curl_setopt($request, CURLOPT_POST, true);
		curl_setopt($request, CURLOPT_POSTFIELDS, $data);
		curl_setopt($request, CURLOPT_HTTPHEADER, array(
			"Content-type: application/json",
			"app_id:" . APP_ID,
			"app_key:" . APP_KEY
		)
	);
		curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($request);

	}


	

}	