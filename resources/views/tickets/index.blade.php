@extends('layouts.master')


@section('title','All News')


@section('content')



 <div class="row mx-auto">

<!-- Post Content Column -->
<div class="col-lg-8" id ='tickets-container'>

  <!-- Author -->
  <p class="lead">
    <a href="#">All Tickets</a>
  </p>

 <div class='row mb-3'>
  <div class='col-3 font-weight-bold'>Name</div>
  <div class='col-1 font-weight-bold'>Age</div>
  <div class='col-2 font-weight-bold'>Gender</div>
  <div class='col-3 font-weight-bold'>Avatar</div>
  <div class='col-2 font-weight-bold'>Actions</div>
 </div>

</div>

<script>
$((function(){
  let q = window.location.toString().split('?'), search;
  if(q.length > 1) {
    search = q[1];
  }
  let url = 'http://127.0.0.1:8000/api/tickets' + (search? "?"+search : '');
  $.ajax({
      url: url,
      type: 'GET',
      dataType: 'json',
      success:function (result) {
        result.data.forEach(function (ticket){
          $('#tickets-container').append(
            $('<div></div>',{ class: 'ticket row mb-2', id: ticket.id }).append([
              $('<div></div>', { class: 'col-3'}).append($('<a></a>', { href: '/ticket/' + ticket.id + '/show'}).html(ticket.name)),
             $('<div></div>', { class: 'mr-2 col-1'}).html(ticket.age),
              $('<div></div>', { class: 'mr-2 col-2'}).html(ticket.gender),
              $('<img/>', { class: 'col-3'}).attr('src', '/images/' + ticket.image).css({
                height: '80px',
                width: '80px'
              }),
              $('<div></div>', { class: 'col-1'}).append($('<a></a>', { href: '/tickets/' + ticket.id + '/edit', class: 'btn btn-primary'}).html('Edit')),
              $('<div></div>', { class: 'col-1'}).append($('<a></a>', { href: '/ticket/' + ticket.id + '/delete', class: 'btn btn-danger'}).html('Delete')).on('click', function(e) {
                e.preventDefault();
                $.ajax({
                  url: '/api/ticket/' + ticket.id + '/delete',
                  type: 'delete',
                  success: function(res) {
                    if(res.data.success) {
                      $('div#'+ticket.id).remove();
                    }
                  }
                })
              }),
              $('<hr/>')
            ])
          )
        })
      }
  });
}));

  </script>

@endsection