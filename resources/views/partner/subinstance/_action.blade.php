<td>
    @php
        $jml = DB::table('clusters')
            ->where('subinstance_id', '=', $model->id)
            ->count();
    @endphp
    <a href="" class="btn btn-sm  btn-success"> {{ $jml }} Cluster </a>
</td>
