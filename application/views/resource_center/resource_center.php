
<!-- END PAGE SIDEBAR -->
<div class="page-content-col">
	<!-- BEGIN PAGE BASE CONTENT -->

	<div class="col-md-12">
		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption">
				Resouce Center </div>
				<div class="tools">
					<a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
					
				</div>
			</div>
			<div class="portlet-body">
				<div class="panel-group accordion" id="accordion1">

					<?php

					foreach ($resources as $key => $value) {

						?>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_<?=$value->resource_id?>" aria-expanded="false"> <?=$value->title?> </a>
								</h4>
							</div>
							<div id="collapse_<?=$value->resource_id?>"  class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
								<div class="panel-body">
									<div class="row">
										<div class="col-md-12">
											<b>Resource Type:</b> <?=get_resouce_type($value->resource_type)?>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-md-12">
											<?=$value->description?>
										</div>
									</div>

									<div class="text-right">
										<a class="btn btn-primary" href="<?=base_url().RESOURCE_CENTER_UPLOAD_PATH.$value->resource_file?>" download="">Download File</a>
									</div>
								</div>
							</div>
						</div>
						<?php
					}


					?>

				</div>
			</div>
		</div>
	</div>
	
	<!-- END PAGE BASE CONTENT -->
</div>
