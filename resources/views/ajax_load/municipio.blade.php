{{Form::label('municipio', "Município")}} <span class="text-danger">*</span>
                            {{Form::select('municipio',
                                        $getMunicipio,null,
                                        ['placeholder'=>'Município',
                                         'class'=>'form-control input-sm'
                                        ]
                                        )}}

                            @if($errors->has('municipio'))
                            <span class="text-danger">{{$errors->first('municipio')}}</span>
                            @endif