<h1>Ultimos contactos</h1>
		
<table class="table table-striped">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Email</th>
      <th>Asunto</th>
      <th>Mensaje</th>
      <th>Fecha</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($contacts as $key => $contact)
        <tr>
          <td>{{ $contact->first_name }}</td>
          <td>{{ $contact->email }}</td>
          <td>{{ $contact->subject }}</td>
          <td>{{ str_limit($contact->message, $limit = 20, $end = ' [...]') }}</td>
          <td>{{ $contact->created_at }}</td>
        </tr>
    @endforeach
  </tbody>
</table>

<hr/>