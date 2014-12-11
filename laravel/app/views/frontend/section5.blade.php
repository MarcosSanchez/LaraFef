<section class="section" id="section5" data-section="5">
    <div class="container-fluid">
        <div class="row-fluid title">
                <div class="span4">
                      <h2>Contacto</h2>
                </div><!-- /span4 -->
                <div class="span8 hidden-phone alt">    
                    <hr>
                </div><!-- /span8 -->
        </div><!-- /row-fluid -->
        <div class="row-fluid content">
                <div class="span4">
                    <h4 class="introsss">
                         La Federación esta a vuestra disposición en:</h4>
                        <span>    <br /> <br /> <br /> 
                        <p>Su domicilio social: <br />Cl. Moises de León, bloque 26 Of. 24006 LEÓN<br /><br />       
                            Direccion postal Administración: <br />
                                        Apartado de correos 169 <br />
                                        47080 Valladolid <br />

                                    Tfno.: (34) 983374668  <br /> <br />      

                                    Centro grabación de datos: <br />
                                            Cl. Moises de León, bloque 26- Of. 24006 LEON <br />

                                            Tfno.: (34) 606017925 Fax: (34) 987211515</p>
                        </span>
                        <div class="row-fluid alt">
                            <h5>Email:</h5>
                            <span>fefricale@fefricale.com</span>
                        </div><!-- /row -->
                        <div class="row-fluid alt">
                            <h5>Telf:</h5>
                            <span>(+34) 606 017 925</span>
                        </div><!-- /row -->
                </div><!-- /span4 -->
                            
                <div class="span8">
                    <div class="row-fluid">
                         <div class="span12">Envíenos un mensaje y nos podremos en contacto con usted a la mayor brevedad posible : <br/> <br/> </div><!-- /span12 -->

                    </div><!-- /row-fluid -->

                    {{ Form::open(array('','id' => 'FormContact')) }}  

                    <!--<form method="POST" action="#">-->
                                    
                        <div class="row-fluid">
                            <div class="span6">
                                <div class="control-group">

                                    <!--<label for="name" class="control-label">Nombre:</label>-->
                                        {{ Form::label('nombre', 'Nombre', array('class' => 'control-label')) }}
                                    <div class="controls">
                                        <!--<input class="span12" type="text" name="contact_name" id="name">-->
                                        {{ Form::text('nombre', '', array('placeholder' => 'Nombre')) }}
                                    </div><!-- /controls -->

                                </div><!-- /control-group -->
                            </div><!-- /span6 -->
                            <div class="span6">
                                <div class="control-group">
                                      {{ Form::label('email', 'Email', array('class' => 'control-label')) }}
                                     <!--<label for="email" class="control-label">Email:</label>-->
                                    
                                    <div class="controls">
                                       {{ Form::text('email', '', array('placeholder' => 'Email')) }}
                                        <!--<input class="span12" type="email" name="contact_email" id="email">-->
                                    
                                    </div><!-- /controls -->
                                </div><!-- /control-group -->
                            </div><!-- /span6 -->
                        </div><!-- /row-fluid -->
                                    
                        <div class="row-fluid">
                            <!--<div class="span6">
                                <div class="control-group">
                                    <label for="phone" class="control-label">Teléfono:</label>
                                    <div class="controls">
                                        <input class="span12" type="tel" name="contact_phone" id="phone">  
                                    </div>
                                </div>
                            </div>-->
                            <div class="span12">
                                    <div class="control-group">
                                    {{ Form::label('asunto', 'Asunto', array('class' => 'control-label')) }}
                                    <!--<label for="website" class="control-label">Asunto:</label>-->
                                    <div class="controls">
                                        {{ Form::text('asunto', '', array('placeholder' => 'Asunto','class' => 'span-12')) }}

                                        <!--<input class="span12" type="url" name="contact_website" id="website">-->
                                    </div><!-- /controls -->
                                </div><!-- /control-group -->
                            </div><!-- /span6 -->
                        </div><!-- /row-fluid -->
                                    
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="control-group">
                                    <!--<label for="message" class="control-label">Mensaje:</label>-->
                                    {{ Form::label('mensaje', 'Mensaje', array('class' => 'control-label')) }}

                                    <div class="controls">
                                    {{ Form::textarea('mensaje', '', array('placeholder' => 'Mensaje', 'class' => 'span-12')) }}
                                        <!--<textarea class="span12" type="text" name="contact_message" id="message" rows="4"></textarea>-->
                                    </div><!-- /controls -->
                                </div><!-- /control-group -->
                             </div><!-- /span12 -->
                        </div><!-- /row-fluid -->

                         {{ Form::submit('Enviar Contacto',array( 'class' => 'btn-inverse pull-right')) }}             
                        
        
                         {{ Form::close() }}
                          <div class="formAlert" style="display:none; border:1px solid red; padding:20px; margin:20px;"></div>
   <!--en este div mostramos el preloader-->
            <div style='margin: 10px 0px 0px 300px' class='before'></div>   
            <!--en este los errores del formulario--> 
            <div class='errors_form' style='border-style: solid;
    border-color: #ff0000 #0000ff;'>errores</div>
            <!--en este el mensaje de registro correcto-->
            <div style='display: none' class='success_message alert-box success'></div>     

            <!--<input type="hidden" name="save" value="contact">  
                        <button type="submit" class="btn-inverse pull-right">
                            Enviar <span>Mensaje</span>
                            <i class="icon-circle-arrow-right"></i>
                        </button>
                        -->
                   <!-- </form> /form -->
                </div><!-- /span8 -->   
        </div><!-- /row-fluid content -->
    </div><!-- /container-fluid -->
</section><!-- /section -->

