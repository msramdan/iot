<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ticket = Ticket::with('created_by')->orderBy('id', 'desc')->get();
        if (request()->ajax()) {
            $parsed_data = Ticket::with('device:id,devEUI,appID,cluster_id');

            $query_parsed = intval($request->query('parsed_data'));

            if (isset($query_parsed) && !empty($query_parsed)) {
                $parsed_data = $parsed_data->where('tickets.id', $query_parsed);
            }
            $parsed_data = $parsed_data->orderBy('tickets.id', 'DESC')->get();
            return DataTables::of($parsed_data)
                ->addIndexColumn()
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->format('d M Y H:i:s');
                })->addColumn('updated_at', function ($row) {
                    return $row->updated_at->format('d M Y H:i:s');
                })->addColumn('status', function ($row) {
                    if ($row->status == "Opened") {
                        return '<button class="btn btn-pill btn-danger btn-air-danger btn-xs" type="button" title="btn btn-pill btn-danger btn-air-danger btn-xs"> Open</button>';
                    } else {
                        return '<button class="btn btn-pill btn-primary btn-air-primary btn-xs" type="button" title="btn btn-pill btn-primary btn-air-primary btn-xs">Close</button>';
                    }
                })
                ->addColumn('description', function ($row) {
                    $result = json_decode($row->description);
                    if (json_last_error() === JSON_ERROR_NONE) {
                        $arr =  json_decode($row->description);
                        $output = '';
                        foreach ($arr as $value) {
                            $output .= "<li>" . $value . "</li>";
                        }
                        return $output;
                    } else {
                        return $row->description;
                    }
                })
                ->addColumn('user', function ($row) {
                    if ($row->author_id) {
                        $user = User::find($row->author_id);
                        return $user->name;
                    }

                    return '-';
                })
                ->addColumn('branches', function ($row) {
                    return $row->device ? getInstance($row->device->appID)->instance_name  : '';
                })
                ->addColumn('cluster', function ($row) {
                    return $row->device ? getCluster($row->device->cluster_id)->cluster_name  : '';
                })

                ->addColumn('device', function ($row) {
                    return $row->device ? $row->device->dev_eui : '';
                })->addColumn('action', 'admin.ticket._action', 'description')
                ->rawColumns(['description', 'action', 'admin.ticket._action', 'status'])
                ->toJson();
        } if (request()->ajax()) {
            return DataTables::of($ticket)
                ->addIndexColumn()
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->format('d M Y H:i:s');
                })

                ->addColumn('description', function ($row) {
                    $result = json_decode($row->description);
                    if (json_last_error() === JSON_ERROR_NONE) {
                        $arr =  json_decode($row->description);
                        $output = '';
                        foreach ($arr as $value) {
                            $output .= "<li>" . $value . "</li>";
                        }
                        return $output;
                    } else {
                        return $row->description;
                    }
                })
                ->addColumn('action', 'admin.ticket._action', 'description')
                ->rawColumns(['description', 'action', 'admin.ticket._action'])
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
