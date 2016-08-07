    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
                <h2>Ženski ugao admin web shop</h2>
                 <br />
            </div>
        </div>
         <div class="row ">
                  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>Upišite svoje podatke za logovanje</strong>  
                            </div>
                            <div class="panel-body">
                                <form role="form" action="<?=_WEB_PATH?>admin/login" method="POST">
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="email" name="email" class="form-control" placeholder="Email " />
                                        </div>
                                                                              <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" name="sifra" class="form-control"  placeholder="Šifra" />
                                        </div>
<!--                                    <div class="form-group">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" /> Remember me
                                            </label>
                                            <span class="pull-right">
                                                   <a href="#" >Forget password ? </a> 
                                            </span>
                                        </div>-->
                                     <hr />
                                     <button type="submit" class="btn btn-primary ">Uloguj se</button>
<!--                                    <hr />-->
<!--                                    Not register ? <a href="registeration.html" >click here </a> -->
                                    </form>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>