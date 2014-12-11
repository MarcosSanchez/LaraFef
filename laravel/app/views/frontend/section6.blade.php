<section class="section" id="section6" data-section="6">
                    <div class="container-fluid">
                        <div class="row-fluid title">
                            <div class="span4">
                                <h2>Acceso Usuarios</h2>
                            </div><!-- /span4 -->
                        </div><!-- /row-fluid -->
                        <div class="row-fluid content">
                            <div class="span8">
                                <div class="row-fluid">
                                    <div class="span12">
                                        <!--TODO : class de error mejorar -->
                                            <div style="display:block" id="formAlertLogin" class="label label-danger">
                                               @if(Session::has('message'))
                                                   {{ Session::get('message') }}
                                               @endif
                                            </div>                                  
                                        
                                    </div><!-- /span12 -->
                                </div><!-- /row-fluid -->
                                    {{ Form::open(array(
                                           'id' => 'FormLogin'
                                    ))}}                                               
                                    <div class="row-fluid">
                                        <div class="span6">
                                            <div class="control-group">
                                                {{ Form::label('email', 'Email', array('class' => 'control-label')) }}
                                                <div class="controls">
                                                    {{ Form::text('email', '', array('placeholder' => 'Email')) }}
                                                </div><!-- /controls -->

                                            </div><!-- /control-group -->
                                        </div><!-- /span6 -->

                                        <div class="span6">
                                            <div class="control-group">
                                                {{ Form::label('password', 'Password', array('class' => 'control-label')) }}
                                                <div class="controls">
                                                    {{ Form::password('password', '', array()) }}
                                                </div><!-- /controls -->
                                            </div><!-- /control-group -->
                                        </div><!-- /span6 -->
                                    </div><!-- /row-fluid -->
                            
                                {{ Form::submit('Login',array( 'class' => 'btn-inverse pull-right')) }}             

                                {{ Form::close() }}
                           </div><!-- /span8 -->       
                        </div><!-- /row-fluid content -->
                </div><!-- /container-fluid -->
        </section><!-- /section -->