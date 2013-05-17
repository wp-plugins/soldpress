<?php if(get_option('sp_debug') == '1'){ ?>   
<div class="alert alert-warning"><strong>This is a template for a simple listing website. Use it as a starting point to create something more unique </div>
<?php } ?>   
<?php
function my_scripts_method() {
	wp_enqueue_script('jquery', false, array(), false, true);
	wp_enqueue_script(
		'bootstrap',
		'http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.1/js/bootstrap.min.js',
		array('jquery'), 
        '2.3.1', 
        true);
	wp_enqueue_script(
		'jquery.cycle2',
		'//cdnjs.cloudflare.com/ajax/libs/jquery.cycle2/20130409/jquery.cycle2.min.js',
		array('jquery'), 
        '2', 
        true);

	/*	wp_enqueue_script(
		'analyticsclick',
		get_post_meta($post->ID,'dfd_AnalyticsClick',true),
		array(''), 
        '1', 
        true);*/
		
	//	get_post_meta($post->ID,'dfd_AnalyticsClick',true);

}

add_action( 'wp_enqueue_scripts', 'my_scripts_method' ); // wp_enqueue_scripts action hook to link only on the front-end


function soldpress_styles()  
{ 
  wp_register_style( 'bootstrap-style', 
    '//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css', 
    array(), 
    '2.3.1', 
    'all' );

  // enqueing:
  wp_enqueue_style( 'custom-style' );
}

add_action('wp_enqueue_scripts', 'soldpress_styles');

function sp_copywrite() {
    echo '<p><div class="alert alert-error">Warning. This A Beta Version And Not To Be Used In Production. (c) 2013 Sanskript Solutions </div></p>';
}
add_action('wp_footer', 'sp_copywrite');
?>

<?php get_header(); ?>
	<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
	<style>
		.well2 {
		min-height: 20px;
		padding: 19px;
		margin-bottom: 20px;
		background-color: #f5f5f5;
		border: 1px solid #e3e3e3;
		}

		.well3 {
		min-height: 20px;
		padding: 19px;
		margin-bottom: 20px;
		background-color: white;
		border: 1px solid #e3e3e3;
		}
		
		.well-map {
		min-height: 300px;
		padding: 19px;
		margin-bottom: 20px;
		background-color: white;
		border: 1px solid #e3e3e3;
		}

		.addressbox {
			padding: 5px;
			background: #F3F3F3;
		}
		
		.sp_key{
			font-weight: bold;
			display: block;
		}
		
		.sp_value{
			display: block;
		}
		
		.table td{
			width:50%;
		}

		.container-fluid {
padding-right: 0px;
padding-left: 0px;
}

dl {
  @include columns(2);
}

dt {
  @include column-break-after(avoid);
  break-after: avoid;
}

dd {
  @include column-break-before(avoid);
  break-before: avoid;
}
	</style>
	<h2><?php the_title(); ?></h2>	
		<div class="well2">
			<div class="cycle-slideshow" data-cycle-fx="carousel" data-cycle-timeout="2000">
							<?php 
								$photos = get_children( array('post_parent' => get_the_ID(), 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID') );
								if($photos){
									foreach ($photos as $photo) {
										echo '<image src="' . wp_get_attachment_url($photo->ID,'thumbnail') . '">';
									}
								}
							?>			
						</div>
			<div class="well3">
						<div class="row">
							<div class="span4">MLS®: <?php echo get_post_meta($post->ID,'dfd_ListingId',true); ?> </div>	
							<div class="span4 pull-right"><span class="pull-right">For Sale: $<?php echo get_post_meta($post->ID,'dfd_ListPrice',true); ?></span></div>
						</div>
						
			</div>	
			
			
			<i class="icon-camera"></i><i class="icon-map-marker"></i> 
		</div>	
	<div class="container-fluid">	
		<div class="row-fluid">
			<div class="span8">	
				<div class="well3">									
					<table class="table">
						 <caption><?php echo get_post_meta($post->ID,'dfd_UnparsedAddress',true); ?> , <?php echo get_post_meta($post->ID,'dfd_City',true); ?> , <?php echo get_post_meta($post->ID,'dfd_StateOrProvince',true); ?> <?php echo get_post_meta($post->ID,'dfd_PostalCode',true); ?></caption>
							<tbody>
								<tr>
									<td><span class="sp_key">Bathrooms</span><span><?php echo get_post_meta($post->ID,'dfd_BathroomsTotal',true);?></span></td>
									<td><span class="sp_key">Bedrooms</span><span><?php echo get_post_meta($post->ID,'dfd_BedroomsTotal',true);?></span></td>
								</tr>
								<tr>
									<td><span class="sp_key">Property Type</span><span><?php echo get_post_meta($post->ID,'dfd_PropertyType',true);?></span></td>
									<td><span class="sp_key">Built in</span><span><?php echo get_post_meta($post->ID,'dfd_YearBuilt',true);?></span></td>
								</tr>
								<tr>
									<td><span class="sp_key">LotSize</span><span><?php echo get_post_meta($post->ID,'dfd_LotSizeArea',true); ?> <?php echo get_post_meta($post->ID,'dfd_LotSizeUnits',true); ?></span></td>
									<td><span class="sp_key">Building Area</span><span><?php echo get_post_meta($post->ID,'dfd_BuildingAreaTotal',true); ?> <?php echo get_post_meta($post->ID,'dfd_BuildingAreaUnits',true); ?></span></td>
								</tr>											
							</tbody>
					</table>
				</div>
				<div class="well3">
					<table class="table">
						 <caption>Description</caption>
						 <tbody>
								<tr>
									<td>
										<p class="muted">
											<?php echo get_post_meta($post->ID,'dfd_PublicRemarks',true); ?>
										</p>
									</td>
								</tr>
							</tbody>
					</table>
				</div>
				<div class="well3">
					<table class="table ">
						 <caption>Details</caption>
							<tbody>
								<tr>
								 
									<dl>
									<?php 
									$array = array("dfd_GarageYN" => "Garage", "dfd_CarportYN" => "Carport", "dfd_CoveredSpaces" => "Coverd Spaces","dfd_AttachedGarageYN" => "Attached Garage", "dfd_OpenParkingYN" => "Open Parking", "dfd_LotFeatures" => "Features","dfd_WaterfrontYN" => "Waterfront","dfd_PoolYN" => "Pool");
										foreach ($array as $i => $value) {
											$meta = get_post_meta($post->ID,$i,true);
											$name = $value;
											echo '<dt>'. $name .'</dt><dd>'. $meta .'</dd>';
										}										
									?>
									</dl>
								</tr>
								
							</tbody>
					</table>
				</div>
				<?php
				
				$max_per_row = 2;
				$item_count = 0;
				echo "<table>";
				echo "<tr>";
				$array = array("dfd_GarageYN" => "Garage", "dfd_CarportYN" => "Carport", "dfd_CoveredSpaces" => "Coverd Spaces","dfd_AttachedGarageYN" => "Attached Garage", "dfd_OpenParkingYN" => "Open Parking", "dfd_LotFeatures" => "Features","dfd_WaterfrontYN" => "Waterfront","dfd_PoolYN" => "Pool");
				foreach ($array as $i => $value) {
					if ($item_count == $max_per_row)
					{
						echo "</tr><tr>";
						$item_count = 0;
					}
					$meta = get_post_meta($post->ID,$i,true);
					$name = $value;
					echo '<td><span class="sp_key">' .$name.'</span><span>' .$meta .'</span></td>';
					$item_count++;
				}
				echo "</tr>";
				echo "</table>";
				
				?>
				
				<div class="well3">
					<table class="table ">
						 <caption>Details</caption>
							<tbody>
								<tr>
									<td><span class="sp_key">Garage</span><span><?php echo get_post_meta($post->ID,'dfd_GarageYN',true);?></span></td>
									<td><span class="sp_key">Carport</span><span><?php echo get_post_meta($post->ID,'dfd_CarportYN',true);?></span></td>
								</tr>
								<tr>
									<td><span class="sp_key">CoveredSpaces</span><span><?php echo get_post_meta($post->ID,'dfd_CoveredSpaces',true);?></span></td>
									<td><span class="sp_key">Attached Garage</span><span><?php echo get_post_meta($post->ID,'dfd_AttachedGarageYN',true);?></span></td>
								</tr>
								<tr>
									<td><span class="sp_key">Open Parking</span><span><?php echo get_post_meta($post->ID,'dfd_OpenParkingYN',true);?></span></td>
									<td><span class="sp_key">GarageSpaces</span><span><?php echo get_post_meta($post->ID,'dfd_CoveredSpaces',true);?></span></td>
								</tr>											
								<tr>
									<td><span class="sp_key">Lot Features</span><span><?php echo get_post_meta($post->ID,'dfd_LotFeatures',true);?></span></td>
									<td><span class="sp_key"></span><span><?php echo get_post_meta($post->ID,'dfd_Dummy',true);?></span></td>
								</tr>
							</tbody>
					</table>

				</div>
				<div class="well3">
					<table class="table">
					 <caption>Building</caption>
						<tbody>
							<tr>
								<td><span class="sp_key">Bathrooms(Half)</span><span><?php echo get_post_meta($post->ID,'dfd_BathroomsHalf',true);?></span></td>
								<td><span class="sp_key">Flooring</span><span><?php echo get_post_meta($post->ID,'dfd_Flooring',true);?></span></td>
							</tr>
							<tr>
								<td><span class="sp_key">Cooling</span><span><?php echo get_post_meta($post->ID,'dfd_Cooling',true);?></span></td>
								<td><span class="sp_key"></span><span><?php echo get_post_meta($post->ID,'dfd_Dummy',true);?></span></td>
							</tr>
							<tr>
								<td><span class="sp_key">Heating</span><span><?php echo get_post_meta($post->ID,'dfd_Heating',true);?></span></td>
								<td><span class="sp_key">Heating Fuel</span><span><?php echo get_post_meta($post->ID,'dfd_HeatingFuel',true);?></span></td>
							</tr>											
							<tr>
								<td><span class="sp_key">Fireplace Fuel</span><span><?php echo get_post_meta($post->ID,'dfd_FireplaceFuel',true);?></span></td>
								<td><span class="sp_key">Fireplace Features</span><span><?php echo get_post_meta($post->ID,'dfd_FireplaceFeatures',true);?></span></td>
							</tr>
							<tr>
								<td><span class="sp_key">Fireplaces</span><span><?php echo get_post_meta($post->ID,'dfd_FireplacesTotal',true);?></span></td>
								<td><span class="sp_key"></span><span><?php echo get_post_meta($post->ID,'dfd_Dummy',true);?></span></td>
							</tr>
						</tbody>
					</table>
				</div>				
				<div class="well3">			
				<table class="table table-striped table-condensed ">
						 <caption>Rooms</caption>
						 <tbody>
							<tr>
								<th>Level</th>
								<th>Type</th>
								<th>Dimensions</th>
							</tr>									
							<?php
								for ($i=1; $i<=20; $i++)
								  {	
									if(get_post_meta($post->ID,'dfd_RoomLevel' . $i ,true) != ''){
										 echo "<tr data-dp='".'dfd_RoomLevel' . $i . "'>";
										 echo "<td>" . get_post_meta($post->ID,'dfd_RoomLevel' . $i ,true) . "</td>";	
										 echo "<td>" . get_post_meta($post->ID,'dfd_RoomType' . $i ,true) . "</td>";
										 echo "<td>" . get_post_meta($post->ID,'dfd_RoomDimensions' . $i ,true) . "</td>";
										 echo "</tr>";
									 }
								  }
								?>
						</tbody>
					</table>
					
					<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&"></script> <!-- &language=ja -->
				<script>
					// Enable the visual refresh
					google.maps.visualRefresh = true;

					var address = '<?php echo get_post_meta($post->ID,'dfd_UnparsedAddress',true); ?> , <?php echo get_post_meta($post->ID,'dfd_StateOrProvince',true); ?> <?php echo get_post_meta($post->ID,'dfd_PostalCode',true); ?>';	

							
					var map;
					
					function initialize() {					
						var geocoder = new google.maps.Geocoder();		
						geocoder.geocode( { 'address' : address }, function( results, status ) {
							if( status == google.maps.GeocoderStatus.OK ) {
								var latlng = results[0].geometry.location;
								var mapOptions = {
									zoom: 15,
									center: latlng,
									mapTypeId: google.maps.MapTypeId.ROADMAP, 
									streetViewControl: true
								};
						  
								map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
								
								var panoramaOptions = {
									position: map.latlngbyaddress,
									  pov: {
										heading: 0,
										pitch: 0,
										zoom: 1
									  },
									visible: true
								};
								
								var panorama = new  google.maps.StreetViewPanorama(document.getElementById("streetview"), panoramaOptions);
								map.setStreetView(panorama);
								panorama.setVisible(true);
								
							}else{
							//	alert("Geocode was not successful for the following reason: " + status);
							}
						});
					}
					
					google.maps.event.addDomListener(window, 'load', initialize);
				</script>

				
				<table class="table table-striped table-condensed ">
						 <caption>Map</caption>
						 <tbody>
							<tr><td>
								<div id="map-canvas" class="well-map"></div>
								<div id="streetview" class="well-map"></div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="span4 well2">
				<!-- Agent --><h3>Agent Details</h3>
				<div class="row-fluid">
					<div class="well3 span12">
						<address>
						  <strong><?php echo get_post_meta($post->ID,'dfd_ListAgentFullName',true); ?></strong><br>
						<?php echo get_post_meta($post->ID,'dfd_ListAgentDesignation',true); ?><br>
						<?php if(get_post_meta($post->ID,'dfd_ListAgentOfficePhone',true) != ''){ ?>  	
							<abbr title="Phone">O:</abbr> <?php echo get_post_meta($post->ID,'dfd_ListAgentOfficePhone',true); ?></br>
						<?php }?> 
						<?php if(get_post_meta($post->ID,'dfd_ListAgentPager',true) != ''){ ?> 
						  <abbr title="Pager">P:</abbr> <?php echo get_post_meta($post->ID,'dfd_ListAgentPager',true); ?></br>
						<?php }?> 
						<?php if(get_post_meta($post->ID,'dfd_ListAgentFax',true) != ''){ ?>   
						  <abbr title="Fax">F:</abbr> <?php echo get_post_meta($post->ID,'dfd_ListAgentFax',true); ?></br>
						<?php }?> 
						<?php if(get_post_meta($post->ID,'dfd_ListAgentURL',true) != ''){ ?>   
						  <abbr title="Web">W:</abbr> <?php echo get_post_meta($post->ID,'dfd_ListAgentURL',true); ?></br>
						<?php }?> 
						<?php if(get_post_meta($post->ID,'dfd_ListAgentCellPhone',true) != ''){ ?>   
						  <abbr title="Cell">C:</abbr> <?php echo get_post_meta($post->ID,'dfd_ListAgentCellPhone',true); ?></br>
						<?php }?> 
						</address>
						<address>
						<small><?php echo get_post_meta($post->ID,'dfd_ListOfficeName',true); ?></small></br>
						<?php echo get_post_meta($post->ID,'dfd_ListOfficePhone',true); ?></br>
						<?php echo get_post_meta($post->ID,'dfd_ListOfficeFax',true); ?></br>
						<?php echo get_post_meta($post->ID,'dfd_ListOfficeURL',true); ?></br>
						</address>
					</div>	
				</div>	
				<?php if(get_post_meta($post->ID,'dfd_CoListAgentFullName',true) != ''){ ?>  
				<div class="row-fluid">			
					<div class="well3 span12">	
						<!-- Co Agent -->
						<address>
							<strong><?php echo get_post_meta($post->ID,'dfd_CoListAgentFullName',true); ?></strong><br>
							<?php echo get_post_meta($post->ID,'dfd_CoListAgentDesignation',true); ?><br>
							<?php if(get_post_meta($post->ID,'dfd_CoListAgentOfficePhone',true) != ''){ ?>  	
								<abbr title="Phone">O:</abbr> <?php echo get_post_meta($post->ID,'dfd_CoListAgentOfficePhone',true); ?></br>
							<?php }?> 
							<?php if(get_post_meta($post->ID,'dfd_CoListAgentPager',true) != ''){ ?> 							
								<abbr title="Pager">P:</abbr> <?php echo get_post_meta($post->ID,'dfd_CoListAgentPager',true); ?></br>
							<?php }?> 
							<?php if(get_post_meta($post->ID,'dfd_CoListAgentFax',true) != ''){ ?> 							
								<abbr title="Fax">F:</abbr> <?php echo get_post_meta($post->ID,'dfd_CoListAgentFax',true); ?></br>
							<?php }?> 
							<?php if(get_post_meta($post->ID,'dfd_CoListAgentURL',true) != ''){ ?> 							
								<abbr title="Web">W:</abbr> <?php echo get_post_meta($post->ID,'dfd_CoListAgentURL',true); ?></br>
							<?php }?> 
							<?php if(get_post_meta($post->ID,'dfd_CoListAgentCellPhone',true) != ''){ ?> 				
								<abbr title="Cell">C:</abbr> <?php echo get_post_meta($post->ID,'dfd_CoListAgentCellPhone',true); ?></br>
							<?php }?> 							
						</address>
						<address>
						<small><?php echo get_post_meta($post->ID,'dfd_CoListOfficeName',true); ?></small></br>
						<?php echo get_post_meta($post->ID,'dfd_CoListOfficePhone',true); ?></br>
						<?php echo get_post_meta($post->ID,'dfd_CoListOfficeURL',true); ?></br>
						</address>
					</div>
									
				</div>
				<?php }?> 
				<div class="row-fluid">			
					<div class="well3 span12">
				<p><small>Data Provided by <?php echo get_post_meta($post->ID,'dfd_ListAOR',true); ?></small></p>
				<p><small>Last Modified<?php echo get_post_meta($post->ID,'dfd_ModificationTimestamp',true); ?></small></p>		
					</div>
				</div>
			</div>	
		</div>				
	</div>

<!-- empty element for pager links -->
<?php //echo get_post_meta($post->ID,'dfd_AnalyticsClick',true); ?>
<?php //echo get_post_meta($post->ID,'dfd_AnalyticsView',true); ?>
<p><small>
©1998-2013 The Canadian Real Estate Association. All rights reserved. MLS®, Multiple Listing Service®, and all related graphics are trademarks of The Canadian Real Estate Association. REALTOR®, REALTORS®, and all related graphics are trademarks of REALTOR® Canada Inc. a corporation owned by The Canadian Real Estate Association and the National Association of REALTORS®.</small> </p>
<p><small>©2013 Sanskript Solutions, Inc. All rights reserved. Powered by SoldPress.</small></p>
<?php get_footer(); ?>
<script src="http://malsup.github.com/jquery.cycle2.carousel.js"></script>