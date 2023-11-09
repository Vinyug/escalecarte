@extends('layouts.admin')
@section('content')
@can('carte_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.cartes.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.carte.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.carte.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Carte">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.carte.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.carte.fields.ref') }}
                        </th>
                        <th>
                            {{ trans('cruds.carte.fields.aprenom') }}
                        </th>
                        <th>
                            {{ trans('cruds.carte.fields.anom') }}
                        </th>
                        <th>
                            {{ trans('cruds.carte.fields.deprenom') }}
                        </th>
                        <th>
                            {{ trans('cruds.carte.fields.denom') }}
                        </th>
                        <th>
                            {{ trans('cruds.carte.fields.institut') }}
                        </th>
                        <th>
                            {{ trans('cruds.carte.fields.stripeid') }}
                        </th>
                        <th>
                            {{ trans('cruds.carte.fields.statut') }}
                        </th>
                        <th>
                            {{ trans('cruds.carte.fields.use') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($users as $key => $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartes as $key => $carte)
                        <tr data-entry-id="{{ $carte->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $carte->id ?? '' }}
                            </td>
                            <td>
                                {{ $carte->ref ?? '' }}
                            </td>
                            <td>
                                {{ $carte->aprenom ?? '' }}
                            </td>
                            <td>
                                {{ $carte->anom ?? '' }}
                            </td>
                            <td>
                                {{ $carte->deprenom ?? '' }}
                            </td>
                            <td>
                                {{ $carte->denom ?? '' }}
                            </td>
                            <td>
                                {{ $carte->institut->name ?? '' }}
                            </td>
                            <td>
                                {{ $carte->stripeid ?? '' }}
                            </td>
                            <td>
                                {{ $carte->statut ?? '' }}
                            </td>
                            <td>
                                {{ $carte->use ?? '' }}
                            </td>
                            <td>
                                @can('carte_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.cartes.show', $carte->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('carte_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.cartes.edit', $carte->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('carte_delete')
                                    <form action="{{ route('admin.cartes.destroy', $carte->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('carte_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.cartes.massDestroy') }}",
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
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Carte:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection