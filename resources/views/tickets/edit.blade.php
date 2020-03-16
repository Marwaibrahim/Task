@extends('layouts.master')
@section("content")

<h2>Edit Ticket</h2>

 <form action = "/tickets/{{$ticket->id}}" method="post">
 {{csrf_field()}}
{{ method_field('PATCH') }}
    <div class="form-group">
        <label for="name">Name:</label>
        <input type = "text" name = "name" class="form-control" value="{{ isset($ticket->name) ? $ticket->name : '' }}" />
      </div>

    <div class="form-group">
        <label for="age">age</label>
                  <select  name="age" data-placeholder="Select your student age" data-minimum-results-for-search="Infinity">
                    @for ($i = 5; $i < 17; $i++)
                      <option value="{{$i}}">{{$i}}</option>
                    @endfor
                  </select>

    </div>
    <div class="form-group">
                                      <label class="form-label form-label-outside" for="checkout-child-info-gender-1">Gender</label>
                                      <select id="checkout-child-info-gender-1" class="form-input select-filter" name="gender" data-placeholder="Select your child gender" data-minimum-results-for-search="Infinity">
                                          <option value="Male" selected="selected">Male</option>
                                          <option value="Female">Female</option>
                                      </select>

        </div>
        <div class="form-group">
                        <label for="image">image</label>
                        <input class="file-path validate" type="file" placeholder="Upload your file" name="image" value="{{ isset($ticket->image) ? $ticket->image : '' }}" required>

                    </div>
    <div class="form-group">
        <input type = "submit" value = "Update" class="btn btn-primary form-control" />
         
    </div>
</form>


<br>
<hr>
<br>


   
@endsection
