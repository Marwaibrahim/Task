@extends('layouts.master')


@section('title','All News')


@section('content')
<div class="row">
<div class="col-lg-8">

  <p class="lead">
  </p>


  <hr>
  <blockquote class="blockquote">
  <td><h4 class="name">Name: {{ $ticket->name }} </h4></td>
  <td><h4 class="name">Age: {{ $ticket->age }} </h4></td>
  <td><h4 class="name">Gender: {{ $ticket->gender }} </h4></td>
  <td> <h4 class="name">Image: {{ $ticket->image }} </h4></td>


 <td class="action_btns"><a href="/tickets/{{ $ticket->id }}/edit" class="btn btn-primary">Edit</a>

                                        <form action="/ticket/{{ $ticket->id }}/delete" method="post">
                                    {{method_field('DELETE')}}
                                        @csrf
                                    <input type="submit" class="btn btn-danger" value="Delete"/>
                                    </form>
                                    </td>

  </blockquote>

  <hr>

</div>



@endsection