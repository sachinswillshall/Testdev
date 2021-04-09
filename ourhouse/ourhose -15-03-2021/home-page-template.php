<?php
/**
Template Name: Home Page Template

***/
?>
<?php get_header();
global $wpdb;
$states = $wpdb->get_results( "SELECT DISTINCT States FROM wp_states_isb WHERE Status = 1" , ARRAY_A);
$Pledge_amount = $wpdb->get_results( "SELECT user_id,amount FROM wp_stripe_transaction_table" , ARRAY_A);
$total_pledge_amt = "";
for($isb1=0; $isb1 < count($Pledge_amount); $isb1++) {
 $total_pledge_amt += $Pledge_amount[$isb1]['amount'];
 }

?>

<!----------------Carousel section start here-------------->
<section id="carousel-sec">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
          

        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="col-sm-6 left-sec">
                    <div class="banner-content-l">
                        <h3>Businesses Participating in the "Safe Schools Pledge"</h3>
                        <h4>Total Businesses Who Pledged</h4>
            <div class="businesses_pledge_amount">
              <?php echo count($Pledge_amount); ?>
            </div>
                        <!--img src="<?php //echo get_template_directory_uri(); ?>/images/counter-button1.png" alt="Counter Button" class="counter-button-img-1"--->
                        <h4>Total Amount Pledged (in USD)</h4>
            <div class="businesses_pledge_amount">
              <?php echo '$ '.$total_pledge_amt; ?>
            </div>
                        <!--img src="<?php //echo get_template_directory_uri(); ?>/images/counter-button2.png" alt="Counter Button" class="counter-button-img-2"--->
                    </div>
                </div>
                <div class="col-sm-6 top-businesses right-sec">
                    <div class="banner-content-r">
                        <h3>Top businesses who pledged the most</h3>
                        <ul>
                          <?php
                            $top_bussiness = $wpdb->get_results( "SELECT wp_busi_filter_isb.service, wp_busi_filter_isb.state,wp_busi_filter_isb.company_name,wp_stripe_transaction_table.amount
                                                  FROM wp_busi_filter_isb
                                                  INNER JOIN wp_stripe_transaction_table ON wp_busi_filter_isb.uid = wp_stripe_transaction_table.user_id ORDER BY wp_stripe_transaction_table.amount DESC LIMIT 8", ARRAY_A );
                            for($topb=0; $topb < count($top_bussiness); $topb++) {
                               $top_amount = $top_bussiness[$topb]['amount'];
                               $top_service = $top_bussiness[$topb]['service'];
                               $top_state = $top_bussiness[$topb]['state'];
                               $company_name = $top_bussiness[$topb]['company_name'];
                            ?>
                               <li><?php echo $company_name; ?>, <?php echo $top_state ?>, <?php echo $top_service ?> / $<?php echo $top_amount ?></li>
                            <?php } ?>

                        </ul>
                        <div class="view-btn"><a href="/businesses-sign-up/">VIEW MORE</a></div>
                    </div>
                </div>
            </div>
			
			
			            <div class="item second-slide">
                <div class="col-sm-6 left-sec">
                    <div class="banner-content-l">
					<h2>Open House</h2>
                        <h3>For all Davidson County Businesses</h3>
                      <p>Please register and participate in the Safe Schools Pledge. Make a positive difference for K-12 school safety and security needs.</p>
                  <div class="view-btn"><a href="/businesses-sign-up/">REGISTER  NOW</a></div>
                    </div>
					
						<div class="banner-content-l visible-xs">
						<h2>Open House</h2>
                         <h3>For Middle Tennessee Consumers</h3>
                      <p>Please register and participate in the Safe Schools Pledge. Make a positive difference for K-12 school safety and security needs.</p>
                  <div class="view-btn"><a href="/consumer-sign-up/">REGISTER  NOW</a></div>
                    </div>
					
					
                </div>
                <div class="col-sm-6 top-businesses right-sec">
                    <div class="banner-content-r">
					<h2>Open House</h2>
                        <h3>For Middle Tennessee Consumers</h3>
                      <p>Please register as a consumer and support the businesses in Davidson County that are participating in the Safe Schools Pledge.</p>
                        <div class="view-btn"><a href="/consumer-sign-up/">REGISTER  NOW</a></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!----------------Kansas section start here-------------->

<section id="kansas-sec">
    <div class="container">
       <h3>Safe School Pledge</h3>
        <div class="form-group kansas-map-sec">
            <div class="select-btn">


                <div class="col-sm-12 col-xs-12 form-selection ">
                  <label for="state" class="  control-label">Select State:</label>
                  <select name="busi_state" id="busi_state" class="get-pledge_data">
                      <option value="All States">All States</option>
                      <?php for ($i=0; $i <= count($states); $i++) {?>
                      <option value="<?php echo $states[$i]['States'] ; ?>">
                      <?php echo $states[$i]['States']; ?></option>
                      <?php } ?>
                  </select>
                </div>
            </div>
        </div>
        <img class="loading" src="/wp-content/themes/html5blank-stable/profile-img/spinner-big.gif" alt="Loader" style="display:none;" >
        <div class="kansas-cnt">
            <div class="kansas-info">
                <div class="kansas-businesses">
                    <h2>USA</h2>
                    <h5>Total Businesses</h5>
                    <h3>Who Pledged</h3>
                    <h4><?php echo count($Pledge_amount); ?></h4>
                </div>
                <div class="kansas-amount">
                    <h5>Total amount </h5>
                    <h3>Pledged</h3>
                    <h5 class="in-kansas">(In USD)</h5>
                    <h4><?php echo '$ '.$total_pledge_amt; ?></h4>
                </div>
            </div>
            <div class="kansas-info-new" style="display:none;"></div>
        </div>
        <div class="kansas-map-cont">
          <?php echo do_shortcode('[mapsvg id="227"]'); ?>
            <!--<img src="<?php echo get_template_directory_uri(); ?>/images/kansas-map.jpg">-->

        </div>
    </div>
</section>
<!----------------safety-resources section start here-------------->

<div id="safety-resources">
<div class="container">
  <div class="col-md-12">
    <h3>Americans Working United</h3>
    <div class="col-md-4 video-room business-video">
      <h4>Business Explainer</h4>
      <video id="about-video" poster="/wp-content/themes/html5blank-stable/images/video-frame.jpg" controls controlsList="nofullscreen nodownload noremoteplayback">
        <source src="/wp-content/uploads/2019/02/OurhouseUSA.Business.Explainer.mp4" type="video/mp4">
      </video>
    </div>
    <div class="col-md-4 video-room consumer-video">
      <h4>Consumer Explainer</h4>
      <video id="about-video"  poster="/wp-content/themes/html5blank-stable/images/video-frame.jpg" controls controlsList="nofullscreen nodownload noremoteplayback">
        <source src="/wp-content/uploads/2018/12/Ourhouse.mp4" type="video/mp4">
      </video>
    </div>
    <div class="col-md-4 video-room superintendent-video">
      <h4>Superintendent Explainer</h4>
      <video id="about-video"  poster="/wp-content/themes/html5blank-stable/images/video-frame.jpg" controls controlsList="nofullscreen nodownload noremoteplayback">
        <source src="/wp-content/uploads/2019/02/Ray-Harriman-OurHouse-Superintendent_02202019_V1_1080p.mp4" type="video/mp4">
      </video>
    </div>
  </div>
</div>
</div>


<section id="services-slider">
  <div class="container">
    <h3>Schools in Action</h3>
        <div class="separator-border"></div>
    <div class="row">
      <div class="col-md-12">
        <div class="carousel carousel-showmanymoveone slide media-carousel" id="carousel123">
          <div class="carousel-inner">

            <?php
              $school_action = $wpdb->get_results( "SELECT * FROM wp_sup_videos ORDER BY id DESC LIMIT 10" );
              $counschool_action = count($school_action);
              for($si=0; $si<$counschool_action; $si++){ ?>
                <div id="item<?php echo $si; ?>" class="item" data-toggle="modal" data-target="#myModal">
                  <div class="col-md-3 col-sm-6 col-xs-12 video-room">
                      
                    <?php
                    $vimeo = $school_action[$si]->video_src;
                    if(preg_match("/(https?:\/\/)?(www\.)?(player\.)?vimeo\.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/", $vimeo, $output_array)) {
                      $imgid = "$output_array[5]";
                    }
                    $hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$imgid.php"));
                    
                    $urll = 'https://player.vimeo.com/video/'.$imgid.'?color=c2546a845b&autoplay=0';
                    //echo $hash[0]['thumbnail_medium'];
                    ?>
                    <div class="schools-action-w">
                    <video id="superint-video"  poster="<?php echo $hash[0]['thumbnail_medium']; ?>" data="<?php echo $urll; ?>" class="video_iframe" controls controlsList="nofullscreen nodownload noremoteplayback">
                      <iframe src="<?php echo $urll; ?>"></iframe>
					 
                    </video>
					<!--  <img class="schools-action-v" src="/wp-content/uploads/2019/02/play-button.png" alt="play"> -->
					</div>
                    <h4><?php echo $school_action[$si]->title; ?></h4>
				    
                  </div>
                </div>
              <?php } ?>

          </div>
          <a class="left carousel-control" href="#carousel123" data-slide="prev">
          </a>
          <a class="right carousel-control" href="#carousel123" data-slide="next"></a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog" style="display:none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default modal-close" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!----------------faqs section start here-------------->
<div id="faqs-sec">
    <div class="faq-sec">
        <h3>Frequently Asked Questions</h3>
        <div class="separator-faq-heading"></div>
        <div id="accordion" class="panel-group wow fadeInUp" role="tablist" aria-multiselectable="true" style="visibility: visible; animation-name: fadeInUp;">

            <div class="panel panel-default">
                <div id="heading1329" class="panel-heading" role="tab">
                    <a class="collapsed" role="button" href="#collapse1329" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapse1329"><h4 class="panel-title"><span class="pluz">+</span><span class="minuz">-</span><p>How secure is the OurhouseUSA website?</p></h4></a>
                </div>
                <div id="collapse1329" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" aria-expanded="false" style="height: 0px;">
                    <div class="panel-body">
                        <p>OurhouseUSA is very sincere and dedicated about providing all participants a secure community to support our youth.  OurhouseUSA takes extra steps to ensure participants and all money transactions are fully secure.  The website is built on a secured format.  The host server used is an ecommerce secure server. The money transactions are transferred using the secure and well established Stripe payment processing software, and we purchased additional security software to protect all.</p>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div id="heading1325" class="panel-heading" role="tab">
                    <a class="" role="button" href="#collapse1325" data-toggle="collapse" data-parent="#accordion" aria-expanded="true" aria-controls="collapse1325"><h4 class="panel-title"><span class="pluz">+</span><span class="minuz">-</span><p>Is there a fee to register with OurhouseUSA?</p></h4></a>
                </div>
                <div id="collapse1325" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading" aria-expanded="true" style="">
                    <div class="panel-body">
                        <p>It's a free site to register for consumers and superintendents. Businesses only need to start a crowdfunding campaign with no minimum amount required. </p>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div id="heading1326" class="panel-heading" role="tab">
                    <a class="collapsed" role="button" href="#collapse1326" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapse1326"><h4 class="panel-title"><span class="pluz">+</span><span class="minuz">-</span><p>What are the benefits for businesses to register with OurhouseUSA?</p></h4></a>
                </div>
                <div id="collapse1326" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" aria-expanded="false" style="height: 0px;">
                    <div class="panel-body">
                        <p>When businesses register with OurhouseUSA, they get a free marketing and crowdfunding platform.  95% of all money raised and donated by the businesses is tax deductible. In addition, businesses are provided a great opportunity to make a true, positive difference for our youth. </p>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div id="heading1327" class="panel-heading" role="tab">
                    <a class="collapsed" role="button" href="#collapse1327" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapse1327"><h4 class="panel-title"><span class="pluz">+</span><span class="minuz">-</span><p>What are the benefits for consumers to register with OurhouseUSA?</p></h4></a>
                </div>
                <div id="collapse1327" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" aria-expanded="false" style="height: 0px;">
                    <div class="panel-body">
                        <p>When consumers register with OurhouseUSA, they get an opportunity to support local businesses that are interested in investing in our youth.  In addition, they will receive unique promotional discount emails from the businesses they support. </p>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div id="heading1328" class="panel-heading" role="tab">
                    <a class="collapsed" role="button" href="#collapse1328" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapse1328"><h4 class="panel-title"><span class="pluz">+</span><span class="minuz">-</span><p>What are the benefits for superintendents to register with OurhouseUSA?</p></h4></a>
                </div>
                <div id="collapse1328" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" aria-expanded="false" style="height: 0px;">
                    <div class="panel-body">
                        <p>When superintendents register with OurhouseUSA, they are provided a search tool to locate safety-related businesses.  In addition, they will have access to chat with other superintendents across the United States to gather information to better their own current safety and education methods. </p>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div id="heading1319" class="panel-heading" role="tab">
                    <a class="collapsed" role="button" href="#collapse1319" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapse1319"><h4 class="panel-title"><span class="pluz">+</span><span class="minuz">-</span><p>What is the Safe Schools Pledge?</p></h4></a>
                </div>
                <div id="collapse1319" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" aria-expanded="false" style="height: 0px;">
                    <div class="panel-body">
                        <p>This is a Pledge businesses agree to participate in for one year.  During the pledge, businesses and their marketing teams come up with creative unique promotional discount emails for the OurhouseUSA consumers only.  Businesses take a percentage of the profits from these newly added sales and invest these profits into their businesses crowdfunding campaign.  </p>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div id="heading1331" class="panel-heading" role="tab">
                    <a class="collapsed" role="button" href="#collapse1331" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapse1331"><h4 class="panel-title"><span class="pluz">+</span><span class="minuz">-</span><p>Is there a minimum amount of money a business must contribute to the Safe Schools Pledge Crowdfunding Campaign? </p></h4></a>
                </div>
                <div id="collapse1331" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" aria-expanded="false" style="height: 0px;">
                    <div class="panel-body">
                        <p>No.  There is no minimum.  Any amount collected in a year, will be greatly appreciated.  </p>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div id="heading1332" class="panel-heading" role="tab">
                    <a class="collapsed" role="button" href="#collapse1332" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapse1332"><h4 class="panel-title"><span class="pluz">+</span><span class="minuz">-</span><p>How is money distributed to the public school districts?</p></h4></a>
                </div>
                <div id="collapse1332" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" aria-expanded="false" style="height: 0px;">
                    <div class="panel-body">
                        <p>Businesses register by county and state.  All money raised by businesses will be evenly distributed to all public school districts from the same county and states that the businesses are physically located and or registered (online businesses with no physical address). </p>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div id="heading1333" class="panel-heading" role="tab">
                    <a class="collapsed" role="button" href="#collapse1333" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapse1333"><h4 class="panel-title"><span class="pluz">+</span><span class="minuz">-</span><p>Can superintendents from private school districts also register with OurhouseUSA? </p></h4></a>
                </div>
                <div id="collapse1333" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" aria-expanded="false" style="height: 0px;">
                    <div class="panel-body">
                        <p>Yes.  We encourage all superintendents to register with OurhouseUSA and use the safety-related business search tool and free chat feature to communicate with other superintendents to improve their own current safety and education methods.  Our vision at OurhouseUSA is to build the ultimate youth development community.  The reason business donations are only being distributed to public school districts initially, is due to need analysis.  This approach can and will change if a situation warrants. We want all our youth to benefit from this unified community of support!  </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<?php get_footer(); ?>
<script>
//Get search list of businesses
 jQuery(".get-pledge_data").on('change',function() {
  var stat = jQuery(this).val();
  var data = "state=" + stat;
    jQuery.ajax({
        url: '<?php echo get_template_directory_uri();?>/home_pledge_ajax.php',
        type: "POST",
        data: data,
        beforeSend: function(){
           jQuery(".loading").show();
           jQuery(".kansas-info").hide();
           jQuery(".kansas-map-cont").hide();
         },
        success: function(result){
           //alert(result);
           jQuery(".loading").hide();
           jQuery(".kansas-map-cont").show();
           jQuery(".kansas-info-new").html(result);
           jQuery(".kansas-info-new").show();
          }
    });

    jQuery.ajax({
        url: '<?php echo get_template_directory_uri();?>/state-abbreviations.php',
        type: "POST",
        data: data,
        success: function(result){
           //alert(result);
           jQuery('.state-hover').removeClass('state-hover');
           jQuery('#'+ result).addClass('state-hover');
          }
    });
 });



   setTimeout(function(){

   jQuery(".mapsvg-region").each(function(){
     jQuery(this).click(function(){
       //alert(jQuery(this).attr('id'));
       var statt = jQuery(this).attr('id');
       var msg = "abbreviation";
       var data = "state=" + statt + "&msgg=" + msg;
       //alert(data);
       jQuery.ajax({
           url: '<?php echo get_template_directory_uri();?>/home_pledge_ajax.php',
           type: "POST",
           data: data,
           beforeSend: function(){
              jQuery(".loading").show();
              jQuery(".kansas-info").hide();
              jQuery(".kansas-map-cont").hide();
            },
           success: function(result){
              //alert(result);
              jQuery(".loading").hide();
              jQuery(".kansas-map-cont").show();
              jQuery(".kansas-info-new").html(result);
              jQuery(".kansas-info-new").show();

              jQuery('.state-hover').removeClass('state-hover');
              jQuery('#'+ statt).addClass('state-hover');
             }
       });

     });
   });
   },2000);

</script>

<script>
   jQuery(document).ready(function(){
     jQuery('#item0').addClass('active');

     jQuery(".video_iframe").on('click',function() {
     var aa = jQuery(this).attr('data');
     //alert(aa);
      jQuery(".modal-body").empty();
      jQuery(".modal-body").append('<iframe class="video_iframe" src="'+ aa +'" width="850px" height="450px"></iframe>');
     });
   });
</script>