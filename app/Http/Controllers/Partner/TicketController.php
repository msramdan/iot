<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class TicketController extends Controller
{
    public function index()
    {
        $ticket = Ticket::where('author_id', auth()->id());

        if (request()->get('id')) {
            $ticket->where('tickets.id', request()->get('id'));
        }


        if (request()->get('status')) {
            $ticket->where('tickets.status', request()->get('status'));
        }

        $ticket->orderBy('id', 'desc')->get();

        if (request()->ajax()) {
            return DataTables::of($ticket)
                ->addIndexColumn()
                ->addColumn('action', 'partner.ticket._action')
                ->toJson();
        }

        return view('partner.ticket.index');
    }

    public function create()
    {
        return view('partner.ticket.create');
    }

    public function store()
    {
        $attr = request()->validate([
            'subject' => 'required',
            'description' => 'required',
            'image_1' => 'mimes:jpg,jpeg,png',
            'image_2' => 'mimes:jpg,jpeg,png',
        ]);

        if (request()->has('image_1')) {
            $attr['image_1'] = request('image_1')->store('image');
        }

        if (request()->has('image_2')) {
            $attr['image_2'] = request('image_2')->store('image');
        }

        $attr['author_id'] = auth()->id();
        $attr['is_device'] = 0;
        $attr['status'] = 'open';

        try {
            Ticket::create($attr);
            Alert::toast('Ticket successfully created', 'success');
        } catch (Exception $err) {
            Alert::toast('Failed to save records', 'error');
        }

        return redirect()->route('instances.tickets.index');
    }

    public function edit(Ticket $ticket)
    {
        return view('partner.ticket.edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        $attr = request()->validate([
            'subject' => 'required',
            'description' => 'required',
            'image_1' => 'mimes:jpg,jpeg,png',
            'image_2' => 'mimes:jpg,jpeg,png',
        ]);

        if (request()->has('image_1')) {
            $attr['image_1'] = request('image_1')->store('image');
        }

        if (request()->has('image_2')) {
            $attr['image_2'] = request('image_2')->store('image');
        }

        try {
            $ticket->update($attr);
            Alert::toast('Ticket successfully updated', 'success');
        } catch (Exception $err) {
            Alert::toast('Failed to update records', 'error');
        }

        return redirect()->route('instances.tickets.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $ticket = Ticket::find($id);
            if (!empty($ticket->image_1)) Storage::delete($ticket->image_1);
            if (!empty($ticket->image_2)) Storage::delete($ticket->image_2);
            $ticket->delete();
            Alert::toast('Ticket successfully deleted', 'success');
        } catch (Exception $err) {
            Alert::toast('Failed to delete records', 'error');
        }

        return redirect()->route('instances.tickets.index');
    }
}
