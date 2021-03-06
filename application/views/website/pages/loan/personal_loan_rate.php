
<style>
.form-control{
  line-height:1.5!important;
}
</style>
<!-- TOP NAME DIV -->
<div class="container pt-5 pb-4">
        <div class="row">
            <div class="col-md-12">
                <h1 class="font-weight-900 mb-2">Personal Loan Rates for <?php echo date('F Y')?></h1>
            </div>
        </div>
    </div>

    <div class="container">
        <?php if(count($page_data)>=1){
                foreach($page_data as $d){
                if($d->div_type == "top"){?>
                    <h5 class="mb-2"><?php echo $d->heading;?></h5>
                   <div class="text-justify"><?php echo $d->content;?></div>
            <?php } 
            }
        }?>
    </div>
    <div class="container pb-4" >
        <iframe  id="Ifrmae" style="height:150vh;width:100%;border:2px solid #d79f01" src="https://widgets.icanbuy.com/c/standard/us/en/personalloan/tables/q/PersonalLoans.aspx?siteid=9e42fea46ee9090e"></iframe>
    </div>
    <div class="container pb-5">
        <?php if(count($page_data)>=1){
                foreach($page_data as $d){
                if($d->div_type == "bottom"){?>
                    <h5 class="mb-2"><?php echo $d->heading;?></h5>
                   <div class="text-justify"><?php echo $d->content;?></div>
            <?php } 
            }
        }?>
    </div>

<!-- Calculate form div -->
<!-- <div class="col-md-12 py-4 mortgag_form_div">
  <div class="col-md-10 mx-auto px-0 ">
        <div class="row">
          <div class="col-md-3">
                <label>Loan Amount</label>
                <input type="text" class="form-control" value="$500"/>
          </div>
          <div class="col-md-3">
                <label>Credit Score</label>
                <input type="text" class="form-control" value="720"/>
          </div>
          <div class="col-md-3">
                <label>Zip Code</label>
                <input type="text" class="form-control" value="12345"/>
          </div>
          <div class="col-md-3">
                <label>Loan Purpose</label>
                <select class="form-control">
                    <option>Drop Down</option>
                    <option>Purchase</option>
                </select>
          </div>
        </div>
        <div class="row pt-4">
            <div class="col-md-4 text-center mx-auto">
                <button class="btn button_yellow">FIND BEST RATES</button>
            </div>
        </div>
      </div>
</div>  -->

<!-- Table div -->
<!-- <div class="col-md-12 py-5 ">
    <div class="col-md-10 mx-auto px-0 ">
        <table class="table text-center font-weight-900">
            <thead>
                <tr class="text-secondary">
                    <th class="w-25">BANK</th>
                    <th class="w-25">APY</th>             
                    <th class="w-25">TERM</th>
                    <th class="w-25">DEPOSIT </th>
                    <th class="w-25">EARNINGS</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr class="active">
                    <td><img src="<?php echo base_url()?>assets/img/overview/bank1.png"/></td>
                    <td>1.15% </td>
                    <td>1 yr  </td>
                    <td>$1000 </td>
                    <td>$400  </td>
                    <td><button class="btn button_blue btn-sm">SEE OFFER DETAILS</button></h5></td>              
                </tr>                       
            </tbody>  
        </table>   
    </div>
    <div class="col-md-10 mx-auto px-0 pt-5 ">
       <h4 class="border_bottom_golden font-weight-900">Learn More About Personal Loans</h4>
       <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed luctus dictum nisl ac ultricies.
        Proin viverra velit rhoncus dignissim luctus. Sed mattis, velit non elementum malesuada, 
        urna turpis mattis libero, semper semper leo tortor vel ex. Vestibulum gravida faucibus vulputate.
        Suspendisse placerat mi eget ipsum egestas, vitae consectetur ipsum tincidunt.
       </p>
    </div>
    
    <div class="col-md-10 mx-auto px-0 py-3 ">
        <h4 class="border_bottom_golden font-weight-900">Summary of Banks Best CD Rates for July 2020</h4>
            <table class="table text-center text-secondary">
                <thead>
                    <tr>
                        <th class="w-25">Bank</th>
                        <th>APR FROM</th>             
                        <th>TERM</th>             
                        <th>MAX AMOUNT </th>
                        <th class="w-25"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="table_bank_image"><img src="<?php echo base_url();?>assets/img/bank_images/bank_of_america.png"><br>
                        </td>
                        <td><span>1.15%</span></td>
                        <td><span>1.20%</span></td>
                        <td><span>1.25%</span></td>
                        <td><h4><button class="btn button_blue btn-sm px-5">SEE OFFER DETAILS</button></h4></td>              
                    </tr>       
                    <tr>
                        <td class="table_bank_image"><img src="<?php echo base_url();?>assets/img/bank_images/bank_of_america.png"><br>
                        </td>
                        <td><span>1.15%</span></td>
                        <td><span>1.20%</span></td>
                        <td><span>1.25%</span></td>
                        <td><h4><button class="btn button_blue btn-sm px-5">SEE OFFER DETAILS</button></h4></td>              
                    </tr>       
                    <tr>
                        <td class="table_bank_image"><img src="<?php echo base_url();?>assets/img/bank_images/bank_of_america.png"><br>
                        </td>
                        <td><span>1.15%</span></td>
                        <td><span>1.20%</span></td>
                        <td><span>1.25%</span></td>
                        <td><h4><button class="btn button_blue btn-sm px-5">SEE OFFER DETAILS</button></h4></td>              
                    </tr>       

                </tbody>  
            </table>   
            <small>
            This line can be used as a disclaimer for when the information was pulled last. 
            Thus way the end user might feel more confident with up-to-date numbers.
            </small>
    </div>
</div>  -->


 



