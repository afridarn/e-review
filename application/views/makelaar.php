<!DOCTYPE HTML>
<html>

<section id="top_banner">
        <div class="banner">
            <div class="inner text-center">
                <h2>Welcome to eReview, <?php echo $this->session->userdata("logged_in")["nama"]?></h2>
            </div>
        </div>
      <!--  <div class="page_info">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-8 col-xs-6">
                        <h4>FAQ</h4>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6" style="text-align:right;">Home<span class="sep"> 	/ </span><span class="current"> FAQ</span></div>
                </div>
            </div>
        </div>-->

        </div>
    </section>


    <section id="faq">
        <div class="titlebar">
            <div class="container">
                <div class="row">
                    <div class="section-heading text-center">
                        <div class="col-md-12 col-xs-12">
                            <h2>What do you <span>wanna do?</span></h2>
                           <!-- <p class="subheading">Lorem ipsum dolor sit amet sit legimus copiosae instructior ei ut vix denique fierentis ea saperet inimicu ut qui dolor oratio mnesarchum ea utamur impetus fuisset nam nostrud euismod volumus ne mei.</p>-->
                        </div>
                    </div>
                </div>



                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="rich-accordian">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <div class="icon-circle"> <i class="fa fa-cog"></i></div>
                                        <a role="button" href="<?php echo base_url()?>index.php/managealltasks/monitorprogressoftask" aria-expanded="true">
                                    MONITOR PROGRESS OF TASK
                                    </a>
                                    </h4>
                                </div>
                              <!--  <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        Lorem ipsum dolor sit amet, sed in nostro latine, eu option appetere mediocritatem duo. Pro duis magna perpetua ea. Dicant epicurei gubergren eos ne, ad suas ornatus graecis nam, pri quot liber ignota no. Usu et erat propriae invenire, blandit voluptua
                                        vim at, iuvaret albucius cu ius. Te integre diceret praesent eos, impetus legimus te vim. Ne mollis veritus est.
                                    </div>
                                </div> --> 
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <div class="icon-circle"> <i class="fa fa-desktop"></i></div>
                                        <a  role="button"  href="<?php echo base_url()?>index.php/managealltasks/CP" aria-expanded="false">
                                     CONFIRM PAYMENT
                                    </a>
                                    </h4>
                                </div>
                             <!--   <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute
                                    </div>
                                </div>-->
                            </div>

                           <!-- <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingThree">
                                    <h4 class="panel-title">
                                        <div class="icon-circle"> <i class="fa fa-magic"></i></div>
                                        <a  role="button" href="<?php echo base_url()?>index.php/managemytasks/commitpayment" aria-expanded="false">
                                     COMMIT PAYMENT
                                    </a>
                                    </h4>
                                </div>-->
                               <!-- <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="panel-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute
                                    </div>
                                </div>-->
                           <!-- </div>-->
                        </div>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="rich-accordian">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingfour">
                                    <h4 class="panel-title">
                                        <div class="icon-circle"> <i class="fa fa-cloud-download"></i></div>
                                        <a role="button" href="<?php echo base_url()?>index.php/managealltasks/manageeditors" aria-expanded="true">
                                   MANAGE EDITORS
                                    </a>
                                    </h4>
                                </div>
                                <!--<div id="collapsefour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
                                    <div class="panel-body">
                                        Lorem ipsum dolor sit amet, sed in nostro latine, eu option appetere mediocritatem duo. Pro duis magna perpetua ea. Dicant epicurei gubergren eos ne, ad suas ornatus graecis nam, pri quot liber ignota no. Usu et erat propriae invenire, blandit voluptua
                                        vim at, iuvaret albucius cu ius. Te integre diceret praesent eos, impetus legimus te vim. Ne mollis veritus est.
                                    </div>
                                </div>-->
                            </div>

                           <!-- <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingfive">
                                    <h4 class="panel-title">
                                        <div class="icon-circle"> <i class="fa fa-fonticons"></i></div>
                                        <a role="button" href="<?php echo base_url()?>index.php/managemytasks/viewtask" aria-expanded="false">
                                    VIEW TASK
                                    </a>
                                    </h4>
                                </div> -->
                                <!--<div id="collapsefive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfive">
                                    <div class="panel-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingsix">
                                    <h4 class="panel-title">
                                        <div class="icon-circle"> <i class="fa fa-fonticons"></i></div>
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
                                    How to organise icons to Projects
                                    </a>
                                    </h4>
                                </div>
                                <div id="collapsesix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingsix">
                                    <div class="panel-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute
                                    </div>
                                </div>
                            </div>
                        </div>-->
                    </div>
                </div>

            </div>
        </div>
    </section>
</html>