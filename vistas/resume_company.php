<?php 
if(isset($_SESSION['session_started'])){
if ($_SESSION['session_started']=='yes') {
if ( $_SESSION['nivel_de_acceso']=='E') { ?>
 

 <?php ob_start() ?>
        <div class="container">
          <div class="text-center logo"><h1 class="color-white">Nombre de La Empresa</h1></div>
        </div>

      </header><!-- end main-header -->
      <!-- body-content -->
      <div class="body-content clearfix" >
        <!-- company profile -->
        <div class="bg-color2">
          <div class="container">
            <div class="row">
              <div class="col-md-9">

                <!-- box item details -->
                <div class="block-section box-item-details">
                  <!-- logo company-->
                  <div class="row">
                    <div class="col-md-8">
                      <a href=""><img src="./assets/theme/images/patner/4.png" alt=""></a>
                    </div>
                    <div class="col-md-4">
                      <p class="text-right"><a href="#">Ir al sitio web</a></p>
                    </div>
                  </div><!-- end logo company-->

                  <!-- Bout Company-->
                  <h3 class="title " id="cp-about">Acerca de Nosotros</h3>
                  <h4>Razon Social: <strong>ss</strong></h3>
                  <h4>Sector: <strong>ss</strong></h3>
                  <p>For over 50 years, Our Company has been a leader in the global IT industry. </p> 
                  <p>Early on, we were instrumental in the rise of the U.S. space program, the creation of global computer timesharing networks, the use of complex databases to consolidate credit information, and we were the first software firm to be listed on the New York Stock Exchange. </p>
                  <p>More recently we invented the concept of business process reengineering, implemented the first airport ground traffic system, pioneered the strategic use of IT outsourcing by the world’s leading businesses, and led the first major public sector cloud computing project. </p>
                  <p>Currently, Our Company employs 91,000 professionals in 90 countries and is listed as a Fortune "World's Most Admired Company," ranking in the Top 4 of IT services providers (2011) for the second consecutive year.</p>
                  <p>Our Company offers challenging professional opportunities that will draw on your skills and allow you to identify and achieve your career goals in a supportive environment. Our Company also offers many avenues to mastering your chosen profession - with exciting work assignments, training opportunities and exposure to new business ideas, knowledge and people. At Our Company, you can have a voice in your job, take control of your career path and contribute to the company's overall operation and growth. Count on us for excellent career opportunities.</p>

                  <h3 class="title" id="cp-contact">Contacto</h3>
                  <h4>Teléfono: <strong>info</strong></h4>
                  <h4>Dirección: <strong>info</strong></h4>
                  <h4>E-mail: <strong>info</strong></h4>
                  <h4>Sitio Web: <strong>info</strong></h4>
                  
                  <!-- jobs list-->
                  <h3 class="title" id="cp-jobs">Requerimientos <small>(303)</small></h3>
                  <div class="mt-20">
                    <h4><a href="job_details.html" class="">PHP Engineer <i class="fa fa-link color-white-mute font-1x"></i></a></h4>
                    <p>Oak Ridge, TN</p>
                    <p>Comercial Asignado: <strong>Pepito Perez</strong></p>
                    <p>Estado: <strong>Jale aqui estado</strong></p>
                  </div>                  
                </div><!-- end box item details -->


              </div>
              <div class="col-md-3">

                <!-- box afix right -->
                <div class="block-section " id="affix-box">
                  <div class="text-center">
                    <p><a href="../index.php/update_resume_company" class="btn btn-theme btn-t-primary btn-block">Actualizar Información</a></p>

                    <ul class="list-unstyled nav-sidebar">
                      <li>
                        <a href="#cp-about" class="link-innerpage">Acerca de Nosotros</a>
                      </li>
                      <li>
                        <a href="#cp-contact" class="link-innerpage">Contacto</a>
                      </li>
                      <li>
                        <a href="#cp-jobs" class="link-innerpage">Requerimientos</a>
                      </li>
                    </ul>
                    <p>Share This Company </p>
                    <p class="share-btns">
                      <a href="#" class="btn btn-primary"><i class="fa fa-facebook"></i></a>
                      <a href="#" class="btn btn-info"><i class="fa fa-twitter"></i></a>
                      <a href="#" class="btn btn-danger"><i class="fa fa-google-plus"></i></a>
                      <a href="#" class="btn btn-warning"><i class="fa fa-envelope"></i></a>
                    </p>
                  </div>
                </div><!-- end box afix right -->


              </div>
            </div>
          </div>
        </div> <!-- end company profile -->

        <!-- block map -->
        <div class="collapse" id="map-toogle">
          <div class=" bg-color2" id="map-area">
            <div class="container">

              <!-- map description -->
              <div class="marker-description">
                <div class="inner">
                  <h4 class="no-margin-top">Office Location</h4>
                  Central Jakarta No 1234, Jakarta, Indonesia
                </div>
              </div><!-- end map description -->

            </div>
            <div class="map-area-detail">
              <!-- change this data lat and lng -->
              <div class="box-map-detail" id="map-detail-job" data-lat="48.856318" data-lng="2.351866"></div>
            </div>

          </div><!-- end block map -->
        </div>





        <!-- modal apply -->
        <div class="modal fade" id="modal-apply">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <form>
                <div class="modal-header ">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" >Apply</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label>Full name</label>
                    <input type="email" class="form-control "  placeholder="Enter Email">
                  </div>
                  <div class="form-group">
                    <label>Email address</label>
                    <input type="email" class="form-control "  placeholder="Enter Email">
                  </div>
                  <div class="form-group">
                    <label>Tell us why you better?</label>
                    <textarea class="form-control" rows="6" placeholder="Something Comment"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Your Resume</label>
                    <div class="input-group">
                      <span class="input-group-btn">
                        <span class="btn btn-default btn-theme btn-file">
                          File  <input type="file" >
                        </span>
                      </span>
                      <input type="text" class="form-control form-flat" readonly>
                    </div>
                    <small>Upload your CV/resume. Max. file size: 24 MB.</small>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default btn-theme" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success btn-theme">Send Application</button>
                </div>
              </form>
            </div>
          </div>
        </div><!-- end modal  apply -->        
      </div><!--end body-content -->

<?php $contenido=ob_get_clean(); ?>
<?php include "plantilla/plantilla_base.php"; ?>


<?php
}else{
  header("Location: /empleo/index.php/404_error");
}}}
else{
  header("Location: /empleo/index.php/404_error");
  
  }?>