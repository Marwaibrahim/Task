<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \App\UserTickets;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
class TicketsController extends Controller
{

    public function index()
    {
        $data = UserTickets::all();

        return view("tickets.index");
    }


    public function create()
    {
        return view("tickets.create");
    }

    public function store(Request $request)
    {
        $request->validate([
           'name'=>'required|max:50',
           'age'=>'required|max:50',
           'gender'=>'required|max:50',
           'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

       ]);
       $image = $request->file('image');
       $imageName = str_slug($image->getClientOriginalName());
       $image->move(public_path('images'), $imageName);

       $ticket= UserTickets::create([
           'name' => $request->name,
           'age' => $request->age,
           'gender' => $request->gender,
           'image' => $imageName,
       ]);
       if($ticket){
           Session::put('msg','This ticket Is created Sucessful');
           return view('tickets.show')->with("ticket",$ticket);
       }

    }

    public function show($id)
    {
        $data= UserTickets::find($id);

        return view("tickets.show")->with("ticket",$data);
    }

    public function edit($id)
    {
        $data = UserTickets::find($id);
        return view("tickets.edit")->with("ticket",$data);
    }

    public function update(Request $request, $id)
    {
        $data = UserTickets::find($id)->update($request->all());
        return redirect("/tickets");

    }

    public function destroy($id)
    {
        $user = Auth::user();
            $ticket = UserTickets::findOrFail($id);
            $path = public_path() . '/images/' . $ticket->image;
            if (file_exists($path)) {
                unlink($path);
            }
            $ticket->delete();
            return redirect('/tickets')->with('message', 'Delete Success');
    }
}