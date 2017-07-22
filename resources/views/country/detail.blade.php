@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Country Details</div>
        <div class="panel-body">
          @if($country)
            <table id="country-detail-table" class="table table-striped">
                        <tbody>
                          <tr>
                              <td>Name</td>
                              <td>{{ $country->name }}</td>
                          </tr>
                          <tr>
                              <td>Top Level Domain</td>
                              <td>{{ implode(', ', $country->topLevelDomain) }}</td>
                          </tr>
                          <tr>
                              <td>Alpha2Code</td>
                              <td>{{ $country->alpha2Code }}</td>
                          </tr>
                          <tr>
                              <td>Alpha3Code</td>
                              <td>{{ $country->alpha3Code }}</td>
                          </tr>
                          <tr>
                              <td>Calling Codes</td>
                              <td>{{ implode(', ', $country->callingCodes) }}</td>
                          </tr>
                          <tr>
                              <td>Capital</td>
                              <td>{{ $country->capital }}</td>
                          </tr>
                          <tr>
                              <td>Alt Spellings</td>
                              <td>{{ implode(', ', $country->altSpellings) }}</td>
                          </tr>
                          <tr>
                              <td>Region</td>
                              <td>{{ $country->region }}</td>
                          </tr>
                          <tr>
                              <td>Subregion</td>
                              <td>{{ $country->subregion }}</td>
                          </tr>
                          <tr>
                              <td>Population</td>
                              <td>{{ $country->population }}</td>
                          </tr>
                          <tr>
                              <td>Lat Long</td>
                              <td>{{ implode(', ', $country->latlng) }}</td>
                          </tr>
                          <tr>
                              <td>Demonym</td>
                              <td>{{ $country->demonym }}</td>
                          </tr>
                          <tr>
                              <td>Area</td>
                              <td>{{ $country->area }}</td>
                          </tr>
                          <tr>
                              <td>Gini</td>
                              <td>{{ $country->gini }}</td>
                          </tr>
                          <tr>
                              <td>Timezones</td>
                              <td>{{ implode(', ', $country->timezones) }}</td>
                          </tr>
                          <tr>
                              <td>Borders</td>
                              <td>{{ implode(', ', $country->borders) }}</td>
                          </tr>
                          <tr>
                              <td>NativeName</td>
                              <td>{{ $country->nativeName }}</td>
                          </tr>
                          <tr>
                              <td>NumericCode</td>
                              <td>{{ $country->numericCode }}</td>
                          </tr>
                          <tr>
                              <td>Currencies</td>
                              <td>
                               @php($currencies = [])
                               @foreach($country->currencies as $currency)
                               @php($currencies[] = $currency->code)
                               @endforeach
                               {{ implode(', ', $currencies) }}
                           </td>
                       </tr>
                       <tr>
                          <td>Languages</td>
                          <td>
                           @php($languages = [])
                           @foreach($country->languages as $language)
                           @php($languages[] = $language->name)
                           @endforeach
                           {{ implode(', ', $languages) }}
                       </td>
                   </tr>
                   <tr>
                      <td>Translations</td>
                      <td>
                           @php($translations = [])
                           @foreach($country->translations as $translation)
                           @php($translations[] = $translation)
                           @endforeach
                           {{ implode(', ', $translations) }}
                       </td>
                  </tr>
                  <tr>
                      <td>Flag</td>
                      <td><img src="{{ $country->flag }}" width="25px;" /></td>
                  </tr>
                  <tr>
                      <td>Regional Blocs</td>
                      <td>
                           @php($regionalBlocs = [])
                           @foreach($country->regionalBlocs as $regionalBloc)
                           @php($regionalBlocs[] = $regionalBloc->name)
                           @endforeach
                           {{ implode(', ', $regionalBlocs) }}
                       </td>
                  </tr>
              </tbody>
          </table>
          @else
            <p>Country not found</p>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
