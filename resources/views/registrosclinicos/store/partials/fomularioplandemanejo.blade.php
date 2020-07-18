 <div class="card card-custom">
          <div class="card-header">
            <div class="card-title">
              <h3 class="card-label">
                {{$package->nombre}}
              </h3>
            </div>
          </div>
          <div class="card-body">
            
              
            	
                <table class="table">
                  <thead>
                    <tr>
                      <th>Servicio</th>
                      <th>Cantidad</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($formulacionMedico==true)
                      @foreach($servicios as $key => $value)
                      <tr>
                        <td>{{$value->tag}}</td>
                        <td><input type="number" name="services[]" class="form-control" data-service="{{$value->id}}" data-name="{{$value->tag}}"></td>
                      </tr>
                      @endforeach
                    @endif
                     @if($formulacionMedico==false)
                      <tr>
                        <td>{{$servicios['tag']}}</td>
                        <td><input type="number" name="services[]" class="form-control" data-service="{{$servicios['id']}}" readonly data-name="{{$servicios['tag']}}" value="1"></td>
                      </tr>
                    @endif
                  </tbody>
                </table>
              
            
             
          </div>
        </div>