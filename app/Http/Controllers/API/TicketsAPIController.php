<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\UserTickets;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class TicketsAPIController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->query('search');
        if($search) {
            $tickets = UserTickets::where('name', 'like', '%' . $search . '%')->orderBy('created_at', 'asc')->get();
        }
        else $tickets = UserTickets::all();
        return $this->sendResponse($tickets, 200, 'tickets retrived  Successfully');

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
           return $this->sendResponse($ticket, 200, 'tickets created  Successfully');
       }

    }

    public function show($id)
    {
        $ticket= UserTickets::find($id);
        if (!$ticket) {
            return $this->sendError("Sorry ticket not found", 404);
        }
        return $this->sendResponse($ticket, 200, 'subscriptions retrived  Successfully');
    }

    public function update(Request $request, $id)
    {
        $ticket = UserTickets::find($id);
        if (!$ticket) {
            return $this->sendError("Sorry ticket not found", 404);
        }
        $ticket->update($request->all());
        return $this->sendResponse([], 200, "Ticket Saved Successfully");
    }

    public function destroy($id)
    {
            $ticket = UserTickets::findOrFail($id);
            if (!$ticket) {
                return $this->sendError("Sorry ticket not found", 404);
            }
            $path = public_path() . '/images/' . $ticket->image;
            if (file_exists($path)) {
                unlink($path);
            }
            $ticket->delete();
            return $this->sendResponse(['success' => true], 200, "ticket deleted Successfully");

    }
}