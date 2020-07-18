var evolucionMedica = function(form){
 
      const EMedica =  FormValidation.formValidation(evolucion_medicinageneral, {
      fields: {
             motivo:{
                  validators:{
                        notEmpty: {
                    message: 'Campo requerido'
                        }
                  }
            },
            valoracion_medicina_generaltotalbarthel:{
                  validators:{
                        notEmpty: {
                        message: 'Campo requerido'
                        }
                  }
            },
            systolic:{
                validators:{
                    notEmpty:{
                      message:'Campo requerido'
                    },
                    between: {
                      min: 90,
                      max: 150,
                      message: 'La sistolica debe estar entre 90 y 150',
                    }
                }
            },
            diastolic:{
                validators:{
                    notEmpty:{
                      message:'Campo requerido'
                    },
                    between: {
                      min: 50,
                      max: 90,
                      message: 'La diastolica debe estar entre 50 y 90',
                    }
                }
            },
            fc:{
                validators:{
                    notEmpty:{
                      message:'Campo requerido'
                    },
                    between: {
                      min: 50,
                      max: 100,
                      message: 'La frecuencia cardiaca debe estar entre 50 y 100',
                    }
                }
            },
             fr:{
                validators:{
                    notEmpty:{
                      message:'Campo requerido'
                    },
                    between: {
                      min: 10,
                      max: 20,
                      message: 'La frecuencia cardiaca debe estar entre 10 y 20',
                    }
                }
            },
            temp:{
                validators:{
                    notEmpty:{
                      message:'Campo requerido'
                    },
                    between: {
                      min: 35,
                      max: 39,
                      message: 'La Temperatura estar entre 35 y 40',
                    }
                }
            },
            peso:{
                validators:{
                    notEmpty:{
                      message:'Campo requerido'
                    },
                    between: {
                      min: 40,
                      max: 200,
                      message: 'El peso debe estar entre 40 y 200',
                    }
                }
            },
            talla:{
                validators:{
                    notEmpty:{
                      message:'Campo requerido'
                    },
                    between: {
                      min: 70,
                      max: 250,
                      message: 'La talla debe estar entre 70 y 250',
                    }
                }
            },
            saturacion:{
                validators:{
                    notEmpty:{
                      message:'Campo requerido'
                    },
                    between: {
                      min: 10,
                      max: 20,
                      message: 'La frecuencia cardiaca debe estar entre 10 y 20',
                    }
                }
            },
            circunferencia:{
                validators:{
                    notEmpty:{
                      message:'Campo requerido'
                    }
                }
            },
             fisicExam:{
                validators:{
                    notEmpty:{
                      message:'Campo requerido'
                    }
                }
            },
            mna1:{
                validators:{
                    choice:{
                      min:1,
                      message:'Campo requerido'
                    }
                }
            },
             mna1:{
                validators:{
                    choice:{
                      min:1,
                      message:'Campo requerido'
                    }
                }
            },
             mna2:{
                validators:{
                    choice:{
                      min:1,
                      message:'Campo requerido'
                    }
                }
            },
             mna3:{
                validators:{
                    choice:{
                      min:1,
                      message:'Campo requerido'
                    }
                }
            },
             mna4:{
                validators:{
                    choice:{
                      min:1,
                      message:'Campo requerido'
                    }
                }
            },
             mna5:{
                validators:{
                    choice:{
                      min:1,
                      message:'Campo requerido'
                    }
                }
            },
             mna6:{
                validators:{
                    choice:{
                      min:1,
                      message:'Campo requerido'
                    }
                }
            },
             cfs:{
                validators:{
                    choice:{
                      min:1,
                      message:'Campo requerido'
                    }
                }
            },
            analisis:{
                  validators:{
                    notEmpty:{
                      message:'Campo requerido'
                    }
                  }
            },
            planmedico:{
                  validators:{
                    notEmpty:{
                      message:'Campo requerido'
                    }
                  }
            },
            alarma:{
                  validators:{
                    notEmpty:{
                      message:'Campo requerido'
                    }
                  }
            },
            evolucion_medicinageneraltotalbarthel:{
                  validators:{
                        notEmpty: {
                        message: 'Campo requerido'
                        }
                  }
            }

      },
      plugins: {
        //Learn more: https://formvalidation.io/guide/plugins
        trigger: new FormValidation.plugins.Trigger(),
        // Bootstrap Framework Integration
        bootstrap: new FormValidation.plugins.Bootstrap(),
        // Validate fields when clicking the Submit button
        //submitButton: new FormValidation.plugins.SubmitButton(),
        // Submit the form when all fields are valid
        //defaultSubmit: new FormValidation.plugins.DefaultSubmit()
      }
    });

    EMedica.validate().then(function(status){
                        if(status=='Invalid'){
                            sweetMessage('Registro clinico con errores','Tienes campos con error en el registro','error');        
                        }
                        if(status=='Valid'){
                          
                              if(planValidate(form)){

                                    let url = '/ClinicRecordStore/'+form;
                                    ajaxSubmitform(url,form);
                             }else{
                             sweetMessage('Error en plan de manejo','Recuerde seleccionar el plan de manejo para el proximo mes del paciente','warning');
                             }
                             
                        }
                               
            });
  
	
}

var evolucionTerapia = function(form,terapyType){

  const terapy = FormValidation.formValidation(document.getElementById(terapyType),{
    fields:{
      tratamiento:{
        validators:{
          notEmpty:{
            message:'Campo requerido'
          }
        }
      },
      respuesta:{
        validators:{
          notEmpty:{
            message:'Campo requerido'
          }
        }
      }
    },
    plugins: {
        //Learn more: https://formvalidation.io/guide/plugins
        trigger: new FormValidation.plugins.Trigger(),
        // Bootstrap Framework Integration
        bootstrap: new FormValidation.plugins.Bootstrap(),
        // Validate fields when clicking the Submit button
        //submitButton: new FormValidation.plugins.SubmitButton(),
        // Submit the form when all fields are valid
        //defaultSubmit: new FormValidation.plugins.DefaultSubmit()
      }

  }) 

  terapy.validate().then(function(status){
      if(status=='Invalid'){
                            sweetMessage('Registro clinico con errores','Tienes campos con error en el registro','error');        
                        }
                        if(status=='Valid'){
                           
                             let url = '/ClinicRecordStore/'+form;
                                    ajaxSubmitform(url,form);
                        }
  })
}

var laboratorioClinico = function(form){
  
  const Laboratorios =  FormValidation.formValidation(laboratorio_clinico, {
      fields: {
            labList:{
                  validators:{
                        notEmpty: {
                    message: 'Campo requerido'
                        }
                  }
            }

      },
      plugins: {
        //Learn more: https://formvalidation.io/guide/plugins
        trigger: new FormValidation.plugins.Trigger(),
        // Bootstrap Framework Integration
        bootstrap: new FormValidation.plugins.Bootstrap(),
        // Validate fields when clicking the Submit button
        //submitButton: new FormValidation.plugins.SubmitButton(),
        // Submit the form when all fields are valid
        //defaultSubmit: new FormValidation.plugins.DefaultSubmit()
      }
    });

 Laboratorios.validate().then(function(status){
                        if(status=='Invalid'){
                            sweetMessage('Registro clinico con errores','Tienes campos con error en el registro','error');        
                        }
                        if(status=='Valid'){
                             
                             let url = '/ClinicRecordStore/'+form;
                                    ajaxSubmitform(url,form);
                        }
                               
            });
}


var valoracionMedica = function(form){
	const vMedica =  FormValidation.formValidation(valoracion_medicina_general, {
      fields: {
            motivo:{
                  validators:{
                        notEmpty: {
                    message: 'Campo requerido'
                        }
                  }
            },
            valoracion_medicina_generaltotalbarthel:{
                  validators:{
                        notEmpty: {
                        message: 'Campo requerido'
                        }
                  }
            },
            systolic:{
                validators:{
                    notEmpty:{
                      message:'Campo requerido'
                    },
                    between: {
                      min: 90,
                      max: 150,
                      message: 'La sistolica debe estar entre 90 y 150',
                    }
                }
            },
            diastolic:{
                validators:{
                    notEmpty:{
                      message:'Campo requerido'
                    },
                    between: {
                      min: 50,
                      max: 90,
                      message: 'La diastolica debe estar entre 50 y 90',
                    }
                }
            },
            fc:{
                validators:{
                    notEmpty:{
                      message:'Campo requerido'
                    },
                    between: {
                      min: 50,
                      max: 100,
                      message: 'La frecuencia cardiaca debe estar entre 50 y 100',
                    }
                }
            },
             fr:{
                validators:{
                    notEmpty:{
                      message:'Campo requerido'
                    },
                    between: {
                      min: 10,
                      max: 20,
                      message: 'La frecuencia cardiaca debe estar entre 10 y 20',
                    }
                }
            },
            temp:{
                validators:{
                    notEmpty:{
                      message:'Campo requerido'
                    },
                    between: {
                      min: 35,
                      max: 39,
                      message: 'La Temperatura estar entre 35 y 40',
                    }
                }
            },
            peso:{
                validators:{
                    notEmpty:{
                      message:'Campo requerido'
                    },
                    between: {
                      min: 40,
                      max: 200,
                      message: 'El peso debe estar entre 40 y 200',
                    }
                }
            },
            talla:{
                validators:{
                    notEmpty:{
                      message:'Campo requerido'
                    },
                    between: {
                      min: 70,
                      max: 250,
                      message: 'La talla debe estar entre 70 y 250',
                    }
                }
            },
            saturacion:{
                validators:{
                    notEmpty:{
                      message:'Campo requerido'
                    },
                    between: {
                      min: 10,
                      max: 20,
                      message: 'La frecuencia cardiaca debe estar entre 10 y 20',
                    }
                }
            },
            circunferencia:{
                validators:{
                    notEmpty:{
                      message:'Campo requerido'
                    }
                }
            },
             fisicExam:{
                validators:{
                    notEmpty:{
                      message:'Campo requerido'
                    }
                }
            },
            mna1:{
                validators:{
                    choice:{
                      min:1,
                      message:'Campo requerido'
                    }
                }
            },
             mna1:{
                validators:{
                    choice:{
                      min:1,
                      message:'Campo requerido'
                    }
                }
            },
             mna2:{
                validators:{
                    choice:{
                      min:1,
                      message:'Campo requerido'
                    }
                }
            },
             mna3:{
                validators:{
                    choice:{
                      min:1,
                      message:'Campo requerido'
                    }
                }
            },
             mna4:{
                validators:{
                    choice:{
                      min:1,
                      message:'Campo requerido'
                    }
                }
            },
             mna5:{
                validators:{
                    choice:{
                      min:1,
                      message:'Campo requerido'
                    }
                }
            },
             mna6:{
                validators:{
                    choice:{
                      min:1,
                      message:'Campo requerido'
                    }
                }
            },
             cfs:{
                validators:{
                    choice:{
                      min:1,
                      message:'Campo requerido'
                    }
                }
            },
            analisis:{
                  validators:{
                    notEmpty:{
                      message:'Campo requerido'
                    }
                  }
            },
            planmedico:{
                  validators:{
                    notEmpty:{
                      message:'Campo requerido'
                    }
                  }
            },
            alarma:{
                  validators:{
                    notEmpty:{
                      message:'Campo requerido'
                    }
                  }
            },
            valoracion_medicina_generaltotalbarthel:{
                  validators:{
                        notEmpty: {
                        message: 'Campo requerido'
                        }
                  }
            }

      },
      plugins: {
        //Learn more: https://formvalidation.io/guide/plugins
        trigger: new FormValidation.plugins.Trigger(),
        // Bootstrap Framework Integration
        bootstrap: new FormValidation.plugins.Bootstrap(),
        // Validate fields when clicking the Submit button
        //submitButton: new FormValidation.plugins.SubmitButton(),
        // Submit the form when all fields are valid
        //defaultSubmit: new FormValidation.plugins.DefaultSubmit()
      }
    });

 vMedica.validate().then(function(status){
                        if(status=='Invalid'){
                            sweetMessage('Registro clinico con errores','Tienes campos con error en el registro','error');        
                        }
                        if(status=='Valid'){
                             	if(planValidate(form)){

                                    let url = '/ClinicRecordStore/'+form;
                                    ajaxSubmitform(url,form);
                             }else{
                             sweetMessage('Error en plan de manejo','Recuerde seleccionar el plan de manejo para el proximo mes del paciente','warning');
                             }
                             
                        }
                               
            });
}


var valoracionEspecialistaGeriatra = function(form){
	const fv =  FormValidation.formValidation(valoracion_especialista_geriatria, {
      fields: {
            motivo:{
                  validators:{
                        notEmpty: {
                    message: 'Campo requerido'
                        }
                  }
            },
            systolic:{
                validators:{
                    notEmpty:{
                      message:'Campo requerido'
                    },
                    between: {
                      min: 90,
                      max: 150,
                      message: 'La sistolica debe estar entre 90 y 150',
                    }
                }
            },
            diastolic:{
                validators:{
                    notEmpty:{
                      message:'Campo requerido'
                    },
                    between: {
                      min: 50,
                      max: 90,
                      message: 'La diastolica debe estar entre 50 y 90',
                    }
                }
            },
            fc:{
                validators:{
                    notEmpty:{
                      message:'Campo requerido'
                    },
                    between: {
                      min: 50,
                      max: 100,
                      message: 'La frecuencia cardiaca debe estar entre 50 y 100',
                    }
                }
            },
             fr:{
                validators:{
                    notEmpty:{
                      message:'Campo requerido'
                    },
                    between: {
                      min: 10,
                      max: 20,
                      message: 'La frecuencia cardiaca debe estar entre 10 y 20',
                    }
                }
            },
            temp:{
                validators:{
                    notEmpty:{
                      message:'Campo requerido'
                    },
                    between: {
                      min: 35,
                      max: 39,
                      message: 'La Temperatura estar entre 35 y 40',
                    }
                }
            },
            peso:{
                validators:{
                    notEmpty:{
                      message:'Campo requerido'
                    },
                    between: {
                      min: 40,
                      max: 200,
                      message: 'El peso debe estar entre 40 y 200',
                    }
                }
            },
            talla:{
                validators:{
                    notEmpty:{
                      message:'Campo requerido'
                    },
                    between: {
                      min: 70,
                      max: 250,
                      message: 'La talla debe estar entre 70 y 250',
                    }
                }
            },
            saturacion:{
                validators:{
                    notEmpty:{
                      message:'Campo requerido'
                    },
                    between: {
                      min: 10,
                      max: 20,
                      message: 'La frecuencia cardiaca debe estar entre 10 y 20',
                    }
                }
            },
            circunferencia:{
                validators:{
                    notEmpty:{
                      message:'Campo requerido'
                    }
                }
            },
             fisicExam:{
                validators:{
                    notEmpty:{
                      message:'Campo requerido'
                    }
                }
            },
            mna1:{
                validators:{
                    choice:{
                      min:1,
                      message:'Campo requerido'
                    }
                }
            },
             mna1:{
                validators:{
                    choice:{
                      min:1,
                      message:'Campo requerido'
                    }
                }
            },
             mna2:{
                validators:{
                    choice:{
                      min:1,
                      message:'Campo requerido'
                    }
                }
            },
             mna3:{
                validators:{
                    choice:{
                      min:1,
                      message:'Campo requerido'
                    }
                }
            },
             mna4:{
                validators:{
                    choice:{
                      min:1,
                      message:'Campo requerido'
                    }
                }
            },
             mna5:{
                validators:{
                    choice:{
                      min:1,
                      message:'Campo requerido'
                    }
                }
            },
             mna6:{
                validators:{
                    choice:{
                      min:1,
                      message:'Campo requerido'
                    }
                }
            },
             cfs:{
                validators:{
                    choice:{
                      min:1,
                      message:'Campo requerido'
                    }
                }
            },
            analisis:{
                  validators:{
                    notEmpty:{
                      message:'Campo requerido'
                    }
                  }
            },
            planmedico:{
                  validators:{
                    notEmpty:{
                      message:'Campo requerido'
                    }
                  }
            },
            alarma:{
                  validators:{
                    notEmpty:{
                      message:'Campo requerido'
                    }
                  }
            },
            valoracion_especialista_geriatriatotalbarthel:{
                  validators:{
                        notEmpty: {
                        message: 'Campo requerido'
                        }
                  }
            }




      },
      plugins: {
        //Learn more: https://formvalidation.io/guide/plugins
        trigger: new FormValidation.plugins.Trigger(),
        // Bootstrap Framework Integration
        bootstrap: new FormValidation.plugins.Bootstrap(),
        // Validate fields when clicking the Submit button
        //submitButton: new FormValidation.plugins.SubmitButton(),
        // Submit the form when all fields are valid
        //defaultSubmit: new FormValidation.plugins.DefaultSubmit()
      }
    });
                  fv.validate().then(function(status){
                        if(status=='Invalid'){
                            sweetMessage('Registro clinico con errores','Tienes campos con error en el registro','error');        
                        }
                        if(status=='Valid'){
                             	if(planValidate(form)){

                                    let url = '/ClinicRecordStore/'+form;
                                    ajaxSubmitform(url,form);
                             }else{
                             sweetMessage('Error en plan de manejo','Recuerde seleccionar el plan de manejo para el proximo mes del paciente','warning');
                             }
                             
                        }
                               
            });
}