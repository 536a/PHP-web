

<?php include 'header.php'; 




?>

<head>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
</head>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Kategori Ekleme <small>

                      
                    </small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      
                                        </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ad<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text"  name="kategori_ad" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


                      



            			


                      	<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sıra<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text"  name="kategori_sira" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


                      

                      

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Durum<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="kategori_durum" required="">
                            
                            <option value="1">Aktif</option>

                             <option value="0">Pasif</option>

                          </select>
                        </div>
                      </div>
                                                                                
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          
                          <button type="submit" name= "kategoriekle" class="btn btn-success">Ekle</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>

           </div>
         </div>

         <?php include 'footer.php';?>