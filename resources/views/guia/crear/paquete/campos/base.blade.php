<div class="input-group mb-3">
	<div class="input-group-prepend">
		<span class="input-group-text" id="basic-addon1">Mensajeria <span class="tx-danger">*</span></span>
	</div>

	{!! Form::select('1'
		,  array("uno", "dos") 
		, null
		,['class' 		=> 'form-control'
			,'placeholder'	=> 'Seleccionar'
			,'required'	=> ''
			,'id'		=> 'id_mensajeria'
		]);
	!!}
</div>

<div class="input-group mb-3">
	<div class="input-group-prepend">
		<span class="input-group-text" id="basic-addon1">Servicio 
			<span class="tx-danger">*</span>
		</span>
	</div>

   {!! Form::select('servicio', array(
	    '70' 	=> 'Terrestre'
	    ,'60' 	=> 'Sig. Dia'
	    ,'50'	=>	'2 Dias')
		,0
		,['class' 		=> 'form-control'
			,'placeholder'	=> 'Seleccionar'
			,'required'	=> ''
			,'name'		=> 'servicio'
			,'id'		=> 'servicio'
		]);
	!!}
</div>