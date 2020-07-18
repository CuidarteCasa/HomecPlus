


//VALIDACION DE MEDICAMENTOS
    
    const medVal = FormValidation.formValidation(modalMedicamentos,{
      fields:{
        posologia:{
          validators:{
            notEmpty:{
              message:'Campo Obligatorio'
            }
          }
        },
        medList:{
          validators:{
            notEmpty:{
              message:'Campo Obligatorio'
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

 //validacion de nutricion
 const nutVal = FormValidation.formValidation(modalNutricion,{
      fields:{
        nutposologia:{
          validators:{
            notEmpty:{
              message:'Campo Obligatorio'
            }
          }
        },
        nutList:{
          validators:{
            notEmpty:{
              message:'Campo Obligatorio'
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

     const compVal = FormValidation.formValidation(modalComplementario,{
      fields:{
        compposologia:{
          validators:{
            notEmpty:{
              message:'Campo Obligatorio'
            }
          }
        },
        compList:{
          validators:{
            notEmpty:{
              message:'Campo Obligatorio'
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
//VALIDADOR DE EVENTOD DE DX
    const dxForm =FormValidation.formValidation(DxEventForm,{
      fields:{
        eventoDxobs:{
          validators:{
            notEmpty:{
              message:'Campo Obligatorio'
            }
          }
        },
        dxDate:{
          validators:{
            notEmpty:{
              message:'Campo Obligatorio'
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

//VALIDADOR DE DIAGNOSTICO
const newdxForm =FormValidation.formValidation(NewDxForm,{
      fields:{
        newDxobs:{
          validators:{
            notEmpty:{
              message:'Campo Obligatorio'
            }
          }
        },
        newdxDate:{
          validators:{
            notEmpty:{
              message:'Campo Obligatorio'
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
//    






