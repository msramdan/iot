<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:ticket_show')->only('index');
    }

    public function index()
    {
        $ticket = Ticket::with('created_by');

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
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->format('d M Y H:i:s');
                })
                ->addColumn('updated_at', function ($row) {
                    return $row->updated_at->format('d M Y H:i:s');
                })
                ->addColumn('is_device', function ($row) {
                    if ($row->is_device == 1) {
                        return '<span class="badge badge-label bg-success"><i class="mdi mdi-circle-medium"></i>Yes</span>';
                    } else {
                        return '<span class="badge badge-label bg-danger"><i class="mdi mdi-circle-medium"></i>No</span>';
                    }
                })

                ->addColumn('action', 'admin.ticket._action')
                ->rawColumns(['action', 'is_device'])
                ->toJson();
        }

        return view('admin.ticket.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ticket.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attr = request()->validate([
            'subject' => 'required',
            'description' => 'required',
            'image_1' => 'mimes:jpg,jpeg,png',
            'image_2' => 'mimes:jpg,jpeg,png',
            'status' => 'required',
        ]);

        if (request()->has('image_1')) {
            $attr['image_1'] = request('image_1')->store('image');
        }

        if (request()->has('image_2')) {
            $attr['image_2'] = request('image_2')->store('image');
        }

        $attr['is_device'] = 0;

        try {
            Ticket::create($attr);
            Alert::toast('Ticket successfully created', 'success');
        } catch (Exception $err) {
            Alert::toast('Failed to save records', 'error');
        }

        return redirect()->route('tickets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        return view('admin.ticket.edit', compact('ticket'));
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
            'status' => 'required',
        ]);
        if (request()->has('image_1')) {
            $attr['image_1'] = request('image_1')->store('image');
        }

        if (request()->has('image_2')) {
            $attr['image_2'] = request('image_2')->store('image');
        }

        try {
            $ticket->update($attr);
            if ($ticket->is_device == 1) {
                if ($request->status == 'closed') {
                    $is_error = null;
                } else {
                    $is_error = 1;
                }
                DB::table('devices')
                    ->where('id', $ticket->device_id)
                    ->update(['is_error' => $is_error]);
            }
            Alert::toast('Ticket successfully updated', 'success');
        } catch (Exception $err) {
            Alert::toast('Failed to update records', 'error');
        }

        return redirect()->route('tickets.index');
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

        return redirect()->route('tickets.index');
    }
}
