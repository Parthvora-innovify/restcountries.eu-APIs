@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Country List</div>
                <div class="panel-body">
                    <table id="country-table" class="table table-striped">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Capital</th>
                            <th>Alpha2 Code</th>
                            <th>Calling Codes</th>
                            <th>Population</th>
                            <th>Region</th>
                            <th>Currencies</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th class="searchable"></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th class="searchable"></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($allCountries as $country)
                        <tr>
                            <td><a href="{{ route('country.show', [$country->name]) }}">{{ $country->name }}</a></td>
                            <td>{{ $country->capital }}</td>
                            <td>{{ $country->alpha2Code }}</td>
                            <td>{{ implode(', ', $country->callingCodes) }}</td>
                            <td>{{ $country->population }}</td>
                            <td>{{ $country->region }}</td>
                            <td>
                                @foreach($country->currencies as $currency)
                                <a href="{{ route('country.currency', [$currency->code]) }}">{{ $currency->code }}</a>
                                @if(!$loop->last),@endif
                                @endforeach
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
