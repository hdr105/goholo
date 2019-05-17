<?php
class Video_model extends Crud_model{


	public $table = "videos";

	public function __construct() {
		parent::__construct();

	}


	public function makeFrames($videoFile){

		$galleryID = generateGalleryID();   
		if (!file_exists('./frames/'.$galleryID)) {
			mkdir('./frames/'.$galleryID, 0777, true);
		}

		$imgOut= "./frames/".$galleryID."/out%d.png";

		$complete = system("ffmpeg -i $videoFile -vf fps=0.0625 -vsync 0 $imgOut 2>&1");
		
		if ($complete) {
			return $galleryID;
		}
		
		return false;
	}


	public function insertGalleryID($galleryID,$locationID){

		$data['galleryID'] = $galleryID;
		$data['locationID'] = $locationID;

		$res = $this->add_data($this->table,$data);

		if ($res) {
			
			return $this->db->insert_id();
		}

		return false;
	}

	public function get_emotions($params = array(), $filter = "Percentage"){

		$data = array("happy_cent"=>0,"sad_cent"=>0,"normal_cent"=>0);

		$happy = 0;
		$sad = 0;
		$normal = 0;

		$get_data['table'] = "videoemotions";
		$get_data['join']['videos v'] = "v.videoID=videoemotions.videoID";


		if (!empty($params)) {

			if (isset($params['start_date']) && isset($params['end_date'])) {
				
				$where['date(created_at) >='] = $params['start_date']; 
				$where['date(created_at) <='] = $params['end_date']; 

			}elseif ($params['locationID']) {
				
				$where['V.locationID'] = $params['locationID'];
			}
			
			$get_data['where'] = $where;
		}


		$res = $this->get_data_new($get_data);

		if (!empty($res)) {
			
			foreach ($res as $key => $value) {

				if ($value->emotion == 0) {
					$normal++;
				}elseif ($value->emotion == 1) {
					$happy++;
				}elseif ($value->emotion == 2) {
					$sad++;
				}
			}

			if ($filter == "Percentage") {
				$data['happy_cent'] = round(($happy/count($res))*100);
				$data['sad_cent'] = round(($sad/count($res))*100);
				$data['normal_cent'] = round(($normal/count($res))*100);
			}else{
				
				$data['happy_cent'] = $happy;
				$data['sad_cent'] = $sad;
				$data['normal_cent'] = $normal;
			}

			

		}

		return $data;		


	}


	public function get_analytics($params = array(), $filter = "Percentage"){

		$data = array('total_visitors'=>0,'avg_age'=>0,'total_male'=>0,'total_female'=>0,"male_cent"=> 0, "female_cent"=> 0,"age_group"=>array(),"unique_visitors"=>array());
		$total_age = 0;

		$get_data['join']['videos v'] = "v.videoID=videoanalysis.videoID";

		$get_data['table'] = "videoanalysis";

		if (!empty($params)) {

			if (isset($params['start_date']) && isset($params['end_date'])) {
				
				$where['date(created_at) >='] = $params['start_date']; 
				$where['date(created_at) <='] = $params['end_date']; 

			}elseif ($params['locationID']) {
				
				$where['V.locationID'] = $params['locationID'];
			}
			
			$get_data['where'] = $where;
		}

		$res = $this->get_data_new($get_data);

		if (!empty($res)) {

			$age_group = array();
			$unique_visitors = array();

			$i = 1;

			while ($i <= 90) {
			
				$j = $i;
				$i = $i + 4;

				$age_group[$j."-".$i] = 0;

				$i++;


			}
			
			foreach ($res as $key => $value) {

				if ($value->duplicate == 0) {
					$data['total_visitors']++;
					$total_age += $value->age;

					foreach ($age_group as $k => $v) {
						
						$age_array = explode("-", $k);

					if ( ($age_array[0] <= $value->age) && ($value->age <= $age_array[1])) {

							$age_group[$k]++;
						}
					}



					if ($value->gender == "M") {
						$data['total_male']++;
					}elseif ($value->gender == "F") {
						$data['total_female']++;
					}

					$unique_visitors[] = $value;
				}
			}


			$data['avg_age'] = round($total_age/$data['total_visitors'],2);

				if ($filter == "Percentage") {
				
				$data['male_cent'] = round(($data['total_male']/$data['total_visitors'])*100);
				$data['female_cent'] = round(($data['total_female']/$data['total_visitors'])*100);
			
			}else{
				
				$data['male_cent'] = $data['total_male'];
				$data['female_cent'] = $data['total_female'];
			}

			

			$data['age_group'] = $age_group;
			$data['unique_visitors'] = $unique_visitors;
		}

		$emotions = $this->get_emotions($params,$filter);

		$data = array_merge($emotions,$data);

		return $data;
	}


	public function deleteVideoData($videoID){

		$where['videoID'] = $videoID;

		$this->delete_data('videos',$where);
		$this->delete_data('videoanalysis',$where);
		$this->delete_data('videoemotions',$where);

		
	}



}
?>