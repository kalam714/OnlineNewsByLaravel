   @extends('admin.layout.master')
    @section('content') 

    <script>
      jQuery(document).ready(function(){
     jQuery(".myselect").chosen({
    disable_search_threshold: 10,
    no_results_text: "Oops,Nothing Found!",
    width: "100%"
  });
});
</script>

                  <div class="row">
                  <div class="col-md-12">
                      <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Permission Create Page</strong>
                        </div>
                        <div class="card-body">
                          <!-- Credit Card -->
                          <div id="pay-invoice">
                              <div class="card-body">
                                @if(count($errors)>0)
                                <div class="alert alert danger" role="alert">
                                  <ul>
                                    @foreach($errors->all() as $error)
                                  </ul>
                                  <li>{{$error}}</li>
                                  @endforeach
                                </div>
                                @endif
                                  
                                  <hr>
   {{ Form::model($role,['route' => ['role-update',$role->id],'method'=>'PUT']) }}
                                  
                                  
                                      <div class="form-group">
                                         
                    {{Form::label('name', 'Name', array('class' => 'control-label mb-1'))}}
                    {{Form::text('name',null,['class'=>'form-control','id'=>'name'])}}
                                         
                                      </div>
                                         <div class="form-group">
                                         
                    {{Form::label('display_name', 'Display Name', array('class' => 'control-label mb-1'))}}
                    {{Form::text('display_name',null,['class'=>'form-control','id'=>'display_name'])}}
                                         
                                      </div>
                                       <div class="form-group">
                                         
                    {{Form::label('description', 'Description', array('class' => 'control-label mb-1'))}}
                    {{Form::text('description',null,['class'=>'form-control','id'=>'descriptione'])}}
                                         
                                      </div>

                                       <div class="form-group">
   {{Form::label('permission', 'Permission', array('class' => 'control-label mb-1'))}}
   {{ Form::select('permission[]',$permission,$selectPermission,['class' =>'form-control myselect','data-placeholder'=>'Select Permissions','multiple'] ) }}
                                         
                                      </div>

                          
                                      </div>
                                      <div>
                                          <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                              <i class="fa fa-lock fa-lg"></i>&nbsp;
                                              <span id="payment-button-amount">Update</span>
                                              <span id="payment-button-sending" style="display:none;">Sending…</span>
                                          </button>
                                      </div>
                                 {{ Form::close() }}
                              </div>
                          </div>

                        </div>
                    </div> <!-- .card -->
                  </div>
                </div>

                    @endsection