@extends('adminlte::page')

@section('title', 'SIESCOLA - Turma')

@section('content_header')
@stop

@section('content')
<div id="line-one">
  <div class="container">
    <div class="row">
      <div class="col-md-12" id="center" style='text-align: center;'>              
        <h1><b>Turma</b></h1>
        <br>
      </div>             
    </div>
            
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('index')}}">Início</a></li>
        <li class="breadcrumb-item active" aria-current="page">Cadastrar</li>
      </ol>
    </nav>              

                    
    <div class="row">  
      <br>
      <h4 id="center" style='text-align: center;'><b>CADASTRO DOS DADOS DA TURMA</b></h4>
      <br>              
    </div>
                
    <div class="box box-primary">
      
      <div class="box-body">
      @if ($errors->any())
        <div class="alert alert-warning">
          @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
          @endforeach
        </div>
      @endif
        <form method="POST" action="{{ route('turma.store')}}">
          @csrf
          <div class="row">
            <div class="col-md-5">
              <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nome:</font></font></label>
              <input type="text" name='nometurma' class="form-control" placeholder="">
            </div> 
          </div>
                  
          <div class="box-footer" style="margin-top: 4%;">
            <a href="{{route('index')}}" class="btn btn-default">Cancelar</a>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
          </div>
                      
        </form>
      </div>
    </div>             
  </div>
</div>
<!-- /.box-body -->
          
            
@stop