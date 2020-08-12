
  <!--==========================
    over view banner
  ============================-->
  <div class="overview_banner">
    <div class="banner_heading w-75 text-justify">
        <?php if(count($page_data)>=1){
              foreach($page_data as $d){
                if($d->div_type == "overview_heading"){?>
                  <h1 class="display-4"><?php echo $d->heading ?></h1>
                  <p><?php echo $d->content ?></p>
          <?php } 
          }
        }?>
    </div>
  </div>
 
  <!-- Card view -->

  <div class="container  card_row pb-4">    
        <div class="pt-5 col-md-12  row card_view">
            <div class="col-md col-sm-4">
                <div class="card pb-3">
                <div style="width:100%; text-align:center">
                  <img src="<?php echo base_url();?>assets/images/website/insurance/card_icon/Home-Insurance.png" style="width:100px; height:100px;">
                </div>
                  <a href="<?php echo base_url()?>homeowner_insurance"><h6>Home Insurance</h6></a>
                </div>
            </div>
            <div class="col-md col-sm-4">
            <div class="card pb-3">
              <div style="width:100%; text-align:center">
                  <img src="<?php echo base_url();?>assets/images/website/insurance/card_icon/Auto-Insurance.png" style="width:100px; height:100px;">
                </div>
                  <a href="<?php echo base_url()?>auto_insurance"><h6>Auto Insurance</h6></a>
                </div>
            </div>
            <div class="col-md col-sm-4">
              <div class="card pb-3">
              <div style="width:100%; text-align:center">
                  <img src="<?php echo base_url();?>assets/images/website/insurance/card_icon/Life-Insurance.png" style="width:100px; height:100px;">
                </div>
              <a href="<?php echo base_url()?>life_insurance"><h6>Life Insurance</h6></a>
                </div>
            </div>
            <div class="col-md col-sm-4">
              <div class="card pb-3">
              <div style="width:100%; text-align:center">
                  <img src="<?php echo base_url();?>assets/images/website/insurance/card_icon/Health-Insurance.png" style="width:100px; height:100px;">
                </div>
              <a href="<?php echo base_url()?>health_insurance"><h6>Health Insurance</h6></a>
                </div>
            </div>
        </div>
  </div> 

  <!-- TRENDING IN BANKSSS -->
<section id="portfolio" class="">
    <div class="container">
        <header class="section-header pb-4">
          <h3 class="section-title">INSURANCE 101</h3>
        </header>
        <div class="row portfolio-container" style="position: relative; height: 1080px;">
          <?php if(count($page_data)>=1){
              foreach($page_data as $d){
                if($d->div_type == "trending_article"){?>
                     <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" style="position: absolute; left: 0px; top: 0px; visibility: visible; animation-name: fadeInUp;">
                        <div class="portfolio-wrap">
                          <figure style="background-image:url('<?php echo base_url() . $d->image ?>');" class="figure_image">
                          </figure>
                          <div class="portfolio-info">
                            <h4><?php echo $d->heading?></h4>
                            <p><?php echo $d->content?> 
                            </p>
                          </div>
                        </div>
                      </div>
               <?php }
              }
          }?>
        </div>
    </div>
</section>

 <!-- Content Related to Loans -->
 <div class="container px-0 py-5 ">
       <h3 class="border_bottom_golden font-weight-900">Related Articles</h3>
       <?php if(count($page_data)>=1){
        foreach($page_data as $d){
          if($d->div_type == "related_article"){?>
              <div class=" row px-0">
                <div class="col-md-6 related_image" style="background-image:url('<?php echo base_url() . $d->image ?>')">
                </div>
                <div class="col-md-6 related_content">
                    <p class="mb-2">EDITOR'S PICK </p>
                    <h4><?php echo $d->heading?></h4>
                    <p><?php echo $d->content?></p>
                    <div class="row">
                          <div class="col-md-1">
                            <i class="fa fa-arrow-circle-right"  aria-hidden="true"></i>
                          </div>
                          <div class="col-md-8 pt-2">6 MIN </div>
                      </div>
                </div>
              </div>
          <?php }
        }
      }?>
</div>
