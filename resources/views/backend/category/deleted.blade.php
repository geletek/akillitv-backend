@extends ('backend.layouts.app')

@section ('title', __('labels.backend.category.management') . ' | ' . __('labels.backend.category.deleted'))

@section('breadcrumb-links')
    @include('backend.category.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.category.management') }}
                    <small class="text-muted">{{ __('labels.backend.category.deleted') }}</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('labels.backend.category.table.title') }}</th>
                            <th>{{ __('labels.backend.category.table.status') }}</th>
                            <th>{{ __('labels.general.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if ($categories->count())
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->title }}</td>
                                <td>{{ $category->status }}</td>
                                <td>{!! $category->action_buttons !!}</td>
                            </tr>
                        @endforeach
                        @else
                            <tr><td colspan="9"><p class="text-center">{{ __('strings.backend.category.no_deleted') }}</p></td></tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {!! $users->total() !!} {{ trans_choice('labels.backend.category.table.total', $users->total()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $users->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
