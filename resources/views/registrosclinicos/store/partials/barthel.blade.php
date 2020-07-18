 <div class="card card-custom">
          <div class="card-header">
            <div class="card-title">
              <h3 class="card-label">
                Escala de Barthel
                
              </h3>
            </div>
          </div>
          <div class="card-body">
             <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">Comer</label>
                    <div class="col-8">
                        <select class="form-control barthel" name="{{$tag_blade}}barthel[]" data-form="{{$tag_blade}}" >
                              <option value="Independiente - 10">Independiente. Capaz de comer por sí solo y en un tiempo razonable. La comida puede ser cocinada y servida por otra persona.</option>
                              <option value="Necesita ayuda - 5">Necesita ayuda. Para cortar la carne o el pan, extender la mantequilla, etc., pero es capaz de comer solo.    
                              </option>
                              <option value="Totalmente dependiente - 0">Dependiente. Necesita ser alimentado por otra persona.    
                              </option>   
                        </select>
                    </div>
                    
                </div>

               <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">Bañarse</label>
                    <div class="col-8">
                        <select class="form-control barthel" name="{{$tag_blade}}barthel[]" data-form="{{$tag_blade}}" >
                             <option value="Independiente  - 5">Independiente. Capaz de lavarse entero. Incluye entrar y salir del baño. Puede realizarlo todo sin estar una persona presente.        
                              </option>
                              <option value="Necesita ayuda  - 0">Dependiente. Necesita alguna ayuda o supervisión.       
                              </option>  
                        </select>
                    </div>
                    
                </div>

                 <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">Vestirse</label>
                    <div class="col-8">
                        <select class="form-control barthel" name="{{$tag_blade}}barthel[]" data-form="{{$tag_blade}}">
                              <option value="Independiente  - 10">Independiente. Capaz de ponerse y quitarse la ropa sin ayuda.</option>
                              <option value="Necesita ayuda  - 5">Necesita ayuda. Realiza solo al menos la mitad de las tareas en un tiempo razonable.        
                              </option>
                              <option value="Totalmente dependiente  - 0">Dependiente.    
                              </option>  
                        </select>
                    </div>
                    
                </div>

                 <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">Arreglarse</label>
                    <div class="col-8">
                        <select class="form-control barthel" name="{{$tag_blade}}barthel[]"  data-form="{{$tag_blade}}">
                              <option value="Independiente  - 5">Independiente. Realiza todas las actividades personales sin ninguna ayuda. Los complementos necesarios pueden ser provistos por otra persona.     
                              </option>
                              <option value="Necesita ayuda  - 0">Dependiente. Necesita alguna ayuda.    
                              </option>   
                        </select>
                    </div>
                    
                </div>

                 <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">Deposicion</label>
                    <div class="col-8">
                        <select class="form-control barthel" name="{{$tag_blade}}barthel[]"  data-form="{{$tag_blade}}">
                              <option value="Sin problemas  - 10">Continente. Ningún episodio de incontinencia.</option>
                              <option value="Algún accidente  - 5">Accidente ocasional. Menos de una vez por semana o necesita ayuda para enemas y supositorios.  
                              </option>
                              <option value="Accidentes frecuentes  - 0">Incontinente.       
                              </option>  
                        </select>
                    </div>
                    
                </div>

                 <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">Miccion</label>
                    <div class="col-8">
                        <select class="form-control barthel" name="{{$tag_blade}}barthel[]"  data-form="{{$tag_blade}}">
                            <option value="Sin problemas  - 10">Continente. Ningún episodio de incontinencia. Capaz de usar cualquier dispositivo por sí solo.</option>
                              <option value="Algún accidente  - 5">Accidente ocasional. Máximo un episodio de incontinencia en 24 horas. Incluye necesitar ayuda en la manipulación de sondas y otros dispositivos.     
                              </option>
                              <option value="Accidentes frecuentes  - 0">Incontinente.       
                              </option>  
                        </select>
                    </div>
                    
                </div>

                 <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">Usar el retrete</label>
                    <div class="col-8">
                        <select class="form-control barthel" name="{{$tag_blade}}barthel[]"  data-form="{{$tag_blade}}">
                             <option value="Independiente  - 10">Independiente. Entra y sale solo y no necesita ningún tipo de ayuda por parte de otra persona.</option>
                              <option value="Necesita ayuda  - 5">Necesita ayuda. Capaz de manejarse con pequeña ayuda: es capaz de usar el cuarto de baño. Puede limpiarse solo. 
                              </option>
                              <option value="Totalmente dependiente  - 0">Dependiente. Incapaz de manejarse sin ayuda mayor.       
                              </option>  
                        </select>
                    </div>
                    
                </div>

                 <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">Traslado al Sillon/Cama</label>
                    <div class="col-8">
                        <select class="form-control barthel" name="{{$tag_blade}}barthel[]" data-form="{{$tag_blade}}" >
                               <option value="Independiente  - 15">Independiente. No precisa ayuda.</option>
                              <option value="Mínima ayuda - 10">Mínima ayuda. Incluye supervisión verbal o pequeña ayuda física.</option>
                              <option value="Necesita ayuda  - 5">Gran ayuda. Precisa la ayuda de una persona fuerte o entrenada.
                              </option>
                              <option value="Totalmente dependiente  - 0">Dependiente. Necesita grúa o alzamiento por dos personas. Incapaz de permanecer sentado. 
                              </option>  
                        </select>
                    </div>
                    
                </div>

                 <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">Deambulacion</label>
                    <div class="col-8">
                        <select class="form-control barthel" name="{{$tag_blade}}barthel[]" data-form="{{$tag_blade}}">
                             <option value="Independiente  - 15">Independiente. Puede andar 50 m, o su equivalente en casa, sin ayuda o supervisión de otra persona.
                              Puede usar ayudas instrumentales (bastón, muleta), excepto andador.
                             Si utiliza prótesis, debe ser capaz de ponérsela y quitársela solo.</option>
                              <option value="Necesita ayuda  - 10">Necesita ayuda. Necesita supervisión o una pequeña ayuda física por parte de otra persona. Precisa utilizar andador.</option>
                              <option value="Independiente en silla de ruedas  - 5">Independiente. (En silla de ruedas) en 50 m. No requiere ayuda o supervisión.</option>
                              <option value="Incapaz de desplazarse  - 0">Dependiente.</option>  
                        </select>
                    </div>
                    
                </div>

                 <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">Subir / Bajar Escaleras</label>
                    <div class="col-8">
                        <select class="form-control barthel" name="{{$tag_blade}}barthel[]" data-form="{{$tag_blade}}" >
                              <option value="Independiente  - 10">Independiente. Capaz de subir y bajar un piso sin la ayuda ni supervisión de otra persona.</option>
                              <option value="Necesita ayuda  - 5">Necesita ayuda. Precisa ayuda o supervisión.</option>
                              <option value="Incapaz de subirlas  - 0">Dependiente. Incapaz de salvar escalones</option>
                        </select>
                    </div>
                    
                </div>

                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">TOTAL</label>
                    <div class="col-8">
                      <input type="number" class="form-control text-right"  readonly name="{{$tag_blade}}totalbarthel" id="{{$tag_blade}}totalbarthel">
                    </div>
                    
                	
                </div>

               

          
          </div>
        </div>