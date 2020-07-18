
<div class="tab-pane fade show active" role="tabpanel" id="informacionPersonal">
	<div class="card card-custom" data-card="true" data-card-tooltips="false" id="kt_card_2">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Informacion personal</h3>
                </div>
				<div class="card-toolbar">
					<button type="reset" class="btn btn-success mr-2">Guardar cambios</button>
					<button type="reset" class="btn btn-secondary">Cancelar</button>
				</div>
            </div>
            <div class="card-body">
					<div class="row">
						<label class="col-xl-3"></label>
						<div class="col-lg-9 col-xl-6">
							<h5 class="font-weight-bold mb-6">Informacion</h5>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-xl-3 col-lg-3 col-form-label text-right">Avatar</label>
						<div class="col-lg-9 col-xl-6">
							<div class="image-input image-input-outline" id="kt_profile_avatar" style="background-image: url(/metronic/themes/metronic/theme/html/demo1/dist/assets/media/users/blank.png)">
                                <div class="image-input-wrapper" style="background-image: url(/metronic/themes/metronic/theme/html/demo1/dist/assets/media/users/300_21.jpg)"></div>

                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                    <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg">
        							<input type="hidden" name="profile_avatar_remove">
                                </label>

        						<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="" data-original-title="Cancel avatar">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>

                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="" data-original-title="Remove avatar">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>
                            </div>
                            <span class="form-text text-muted">Permite archivos tipo:  png, jpg, jpeg.</span>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-xl-3 col-lg-3 col-form-label text-right">Nombres</label>
						<div class="col-lg-9 col-xl-6">
							<input class="form-control form-control-lg form-control-solid" type="text" value="Nick">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-xl-3 col-lg-3 col-form-label text-right">Apellidos</label>
						<div class="col-lg-9 col-xl-6">
							<input class="form-control form-control-lg form-control-solid" type="text" value="Bold">
						</div>
					</div>
					<div class="row">
						<label class="col-xl-3"></label>
						<div class="col-lg-9 col-xl-6">
							<h5 class="font-weight-bold mt-10 mb-6">Informacion de contacto</h5>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-xl-3 col-lg-3 col-form-label text-right">Telefono</label>
						<div class="col-lg-9 col-xl-6">
							<div class="input-group input-group-lg input-group-solid">
								<div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
								<input type="text" class="form-control form-control-lg form-control-solid" value="+35278953712" placeholder="Phone">
							</div>
							
						</div>
					</div>
					<div class="form-group row">
						<label class="col-xl-3 col-lg-3 col-form-label text-right">Email Address</label>
						<div class="col-lg-9 col-xl-6">
							<div class="input-group input-group-lg input-group-solid">
								<div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
								<input type="text" class="form-control form-control-lg form-control-solid" value="{{\Auth::user()->email}}" placeholder="Email">
							</div>
							<span class="form-text text-muted">La informacion de correo no se compartira con nadie.</span>
						</div>
					</div>
					
				</div>
        </div>

</div>