@extends('adminlte::page')

@section('title', 'SIESCOLA - Disciplina')

@section('content_header')
@stop

@section('content')

<div id="line-one">
  <div class="container">
    <div class="row">
      <div class="col-md-12" id="center" style='text-align: center;'>              
        <h1><b>Disciplinas</b></h1>
        <br>
      </div>             
    </div>
            
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('index')}}">Início</a></li>
        <li class="breadcrumb-item active" aria-current="page">Consultar</li>
      </ol>
    </nav>              

                    
    <div class="row">  
      <br>
      <h4 id="center" style='text-align: center;'><b>LISTA DAS DISCIPLINAS CADASTRADAS</b></h4>
      <br>              
    </div>

  
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></h3>
              <a href="{{route('disciplina.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Cadastrar</a>     
              </button>
              <form action="{{route('disciplina.search')}}" method="POST" class="form form-inline pull-right">
                {!! csrf_field() !!}
                <input type="text" name="nomedisciplina" class="form-control" placeholder="Nome Disciplina">
                <input type="text" name="nome" class="form-control" placeholder="Nome Professor">
                <button type="submit" class="btn btn-default">Pesquisar</button>
              </form>

            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <thead>
                    <tr>
                        <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit; position: center;">Nome</font></font></th>
                        <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Valor</font></font></th>
                        <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Professor</font></font></th>
                        <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ação</font></font></th>

                    </tr>
                </thead>
                <tbody>
                @foreach($listDisciplina as $value)
                    <tr>
                        <th>{{$value->nomedisciplina}}</th>
                        <th>{{$value->valor}}</th>
                        <th>{{$value->professor($value->cdprofessor)->nome}}</th>
                        <!-- <th><button type="button" class="edit-model btn btn-primary" data-mynmatricula="{{$value->nmatricula}}" data-mynome="{{$value->nome}}" data-mystatus="{{$value->status}}" data-valid="{{$value->cdaluno}}" data-toggle="modal" data-target="#edit"><i class="fas fa-user-edit"></i></button> -->
                        <th><a href="{{route('disciplina.edit', $value->cddisciplina)}}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                        </th>
                    </tr>
                @endforeach
                
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

    @stop