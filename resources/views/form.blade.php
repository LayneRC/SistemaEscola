<div class="form-group">
	<label for="nmatricula">Número Matricula</label>
  @if(isset($aluno) && !empty($aluno->nmatricula)) 
  	<input type="text" class="form-control" name="nmatricula" id="nmatricula" value="{{ $aluno->nmatricula }}">
  @else
  	<input type="text" class="form-control" name="nmatricula" id="nmatricula">
  @endif
</div>

<div class="form-group">
	<label for="des">Nome</label>
  @if(isset($aluno) && !empty($aluno->nome))      
    <input type="text" class="form-control" name="nome" id="title" value="{{ $aluno->nome }}">
  @else
    <input type="text" class="form-control" name="nome" id="title">
  @endif
</div>

<div class="form-group">
  <label for="status">Status:</label>
  <select name='status' class="form-control">
    <option {{ isset($aluno) && !empty($aluno->status) && $aluno->status == 'AT' ? 'selected': '' }}>AT</option>
    <option {{ isset($aluno) && !empty($aluno->status) && $aluno->status == 'IN' ? 'selected': '' }}>IN</option>
  </select>
</div>