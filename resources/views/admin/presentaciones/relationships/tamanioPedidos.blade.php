@can('pedido_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.pedidos.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.pedido.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.pedido.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Pedido">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.pedido.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.pedido.fields.cliente') }}
                        </th>
                        <th>
                            {{ trans('cruds.pedido.fields.nombre_produto') }}
                        </th>
                        <th>
                            {{ trans('cruds.pedido.fields.tamanio') }}
                        </th>
                        <th>
                            {{ trans('cruds.pedido.fields.cantidad') }}
                        </th>
                        <th>
                            {{ trans('cruds.pedido.fields.req_leche') }}
                        </th>
                        <th>
                            {{ trans('cruds.pedido.fields.req_bacteria') }}
                        </th>
                        <th>
                            {{ trans('cruds.pedido.fields.req_saborizante') }}
                        </th>
                        <th>
                            {{ trans('cruds.pedido.fields.req_colorante') }}
                        </th>
                        <th>
                            {{ trans('cruds.pedido.fields.req_envases') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pedidos as $key => $pedido)
                        <tr data-entry-id="{{ $pedido->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $pedido->id ?? '' }}
                            </td>
                            <td>
                                {{ $pedido->cliente->nombre_empresa ?? '' }}
                            </td>
                            <td>
                                {{ $pedido->nombre_produto->nombre ?? '' }}
                            </td>
                            <td>
                                {{ $pedido->tamanio->capacidad ?? '' }}
                            </td>
                            <td>
                                {{ $pedido->cantidad ?? '' }}
                            </td>
                            <td>
                                {{ $pedido->req_leche ?? '' }}
                            </td>
                            <td>
                                {{ $pedido->req_bacteria ?? '' }}
                            </td>
                            <td>
                                {{ $pedido->req_saborizante ?? '' }}
                            </td>
                            <td>
                                {{ $pedido->req_colorante ?? '' }}
                            </td>
                            <td>
                                {{ $pedido->req_envases ?? '' }}
                            </td>
                            <td>
                                @can('pedido_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.pedidos.show', $pedido->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('pedido_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.pedidos.edit', $pedido->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('pedido_delete')
                                    <form action="{{ route('admin.pedidos.destroy', $pedido->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('pedido_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.pedidos.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Pedido:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection